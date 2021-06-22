<?php

namespace App\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Core\Helpers\Config;
use Core\Helpers\Validator;
use Core\Session;
use Core\View;

class CheckoutController
{

    const PAYMENT_KEY = 'checkout-paymentId';
    const ADDRESS_KEY = 'checkout-addressId';

    // Formular für Zahlungsdaten - vorhandene Adressen des Usern werden geladen
    public function paymentForm ()
    {
        
        if (User::isLoggedIn()) {
            
            $user = User::getLoggedInUser();

            // Zahlungsarten des eingeloggten Users abfragen
            $payments = Payment::findByUser($user->id);

            // Zahlungsarten an View übergeben
            View::load('payment', [
                'payments' => $payments,
                'errors' => Session::get('errors', [], true)
            ], 'checkout');
        } else {
            header("Location: login");
        }
    }

    // Zahlungsmethoden Formular entgegen nehmen und Daten verarbeiten
    public function handlePayment ()
    {
        // $baseUrl abfragen für redirects
        $baseUrl = Config::get('app.baseUrl');
        
        $user = User::getLoggedInUser();

        // wurde eine vorhande Zahlungsart ausgewählt
        if (isset($_POST['payment']) && $_POST['payment'] !== '_default') {
            
            // PaymentId in die Session speichern
            Session::set(self::PAYMENT_KEY, (int)$_POST['payment']);
        }

        // wurde eine neue Adresse angelegt? Überprüfen ob erstes Feld 'name' befüllt ist
        if (isset($_POST['name']) && !empty($_POST['name'])) {

        // validieren
        $validator = new Validator();
        $validator->validate($_POST['name'], 'Name', true, 'textnum', 2, 255);
        $validator->validate($_POST['number'], 'Number', true, 'num');
        $validator->validate($_POST['expires'], 'Expires', true, 'num');
        $validator->validate($_POST['ccv'], 'CCV', true, 'num');
        

        $errors = $validator->getErrors();

       
        // Wenn im Validator Fehler aufgetreten sind, dann schreiben wir sie in die Session und leiten zurück zum Formular
        if (!empty($errors)) {
            Session::set('errors', $errors);
            header("Location: {$baseUrl}checkout");
            exit;
        }
            // Neue Payment Methode erstellen und in die Datenbank speichern
            $payment = new Payment();
            $payment->name = $_POST['name'];
            $payment->number = $_POST['number'];
            $payment->expires = $_POST['expires'];
            $payment->ccv = $_POST['ccv'];
            $payment->user_id = $user->id;
            $payment->save();

            // Neue Payment Methode in die Session speichern
            Session::set(self::PAYMENT_KEY, (int)$payment->id);
        }

        
        // Überprüfen ob keine Zahlungsart ausgewählt wurde und keine neue eingegeben
        if (
            (
                !isset($_POST['payment']) ||
                $_POST['payment'] === '_default'
            )
            &&
            (
                !isset($_POST['name']) ||
                empty($_POST['name'])
            )
        ) {
            // Wurde weder ein Payment ausgewählt noch ein neues eingegeben wird zurück geleitet
            Session::set('errors', [
                'Please choose a payment or enter a new payment!'
            ]);

            header("Location: {$baseUrl}checkout");
            exit;
        }

        // wenn keine Fehler wird zum nächsten Schritt weitergeleitet
        header("Location: {$baseUrl}checkout/address");
        exit;

    }


    // Adressen des Users in einem Formular anzeigen, damit eine bestehende Adresse gewählt, oder eine neue Adresse hinzugefügt werden kann
    public function addressForm ()
    {
      
        if (User::isLoggedIn()) {
            
            $user = User::getLoggedInUser();

            // Alle Adressen des eingeloggten Users abfragen
            $addresses = Address::findByUser($user->id);

            View::load('address', [
                'addresses' => $addresses,
                'errors' => Session::get('errors', [], true)
            ], 'checkout');
        } else {

            header("Location: login");
        }
    }

    // Daten aus dem Adress-Formular entgegennehmen und verarbeiten
    public function handleAddress ()
    {
        $baseUrl = Config::get('app.baseUrl');

        $user = User::getLoggedInUser();

        // Wurde eine vorhandene Adresse ausgewählt?
        if (isset($_POST['address_id']) && $_POST['address_id'] !== '_default') {
            
            Session::set(self::ADDRESS_KEY, (int)$_POST['address_id']);
        }

        // Wurde eine neue Adresse angegeben?
        if (isset($_POST['address']) && !empty($_POST['address'])) {
           
        $validator = new Validator();
        // $validator->validate($_POST['address'], 'Address', true, 'textnum');
        
        $errors = $validator->getErrors();

        if (!empty($errors)) {
            Session::set('errors', $errors);
            header("Location: {$baseUrl}checkout/address");
            exit;
        }

            // Neue Adresse erstellen und in die Datenbank speichern
            $address = new Address();
            $address->address = $_POST['address'];
            $address->user_id = $user->id;
            $address->save();

            Session::set(self::ADDRESS_KEY, (int)$address->id);
        }

       // Überprüfen ob keine Adresse ausgewählt wurde und keine neue eingegeben
        if (
            (
                !isset($_POST['address_id']) ||
                $_POST['address_id'] === '_default'
            )
            &&
            (
                !isset($_POST['address']) ||
                empty($_POST['address'])
            )
        ) {
           
            Session::set('errors', [
                'Please choose a address or enter a new address!'
            ]);

            header("Location: {$baseUrl}checkout/address");
            exit;
        }

        header("Location: {$baseUrl}checkout/final");
        exit;

    }




    // Anzeigen einer Bestellübersicht
    public function finalOverview ()
    {
        // PaymentId und AddressID aus der Session auslesen
        $paymentId = Session::get(self::PAYMENT_KEY);
        $addressId = Session::get(self::ADDRESS_KEY);

        // Payment und Address anhand der IDs aus der Datenbank holen
        $payment = Payment::find($paymentId);
        $address = Address::find($addressId);

        // Cart aus der Session laden
        $cart = new Cart();

        $user = User::getLoggedInUser();

        View::load('checkout-final', [
            'products' => $cart->getProducts(),
            'payment' => $payment,
            'address' => $address,
            'user' => $user
        ], 'checkout');
    }

    // Checkout durchführen und Bestellung anlegen
    public function finaliseCheckout ()
    {
        
        $paymentId = Session::get(self::PAYMENT_KEY);
        $addressId = Session::get(self::ADDRESS_KEY);

        $cart = new Cart();

        $products = $cart->getProducts();

        $user = User::getLoggedInUser();

        // Neue Order anlegen und befüllen
        $order = new Order();
        $order->user_id = $user->id;
        $order->delivery_address_id = $addressId;
        $order->invoice_address_id = $addressId;
        $order->payment_id = $paymentId;
       
        // Produkte als Json String in DB speichen
        $order->setProducts($products);
        $order->save();

        // Cart leeren, wenn die Order erfolgreich gespeichert wurde
        $cart->flush();

        // Zahlungsart und Adresse aus Session löschen
        Session::forget(self::PAYMENT_KEY);
        Session::forget(self::ADDRESS_KEY);

        $baseUrl = Config::get('app.baseUrl');
        header("Location: {$baseUrl}account/orders");
        exit;
    }

}
