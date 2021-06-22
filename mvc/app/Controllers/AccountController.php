<?php

namespace App\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use Core\Helpers\Config;
use Core\Session;
use Core\View;

class AccountController
{

    // Liste der eigenen Orders anzeigen
    public function orders ()
    {
        
        if (User::isLoggedIn()) {

            // wenn User eingelogged ist
            $user = User::getLoggedInUser();

            // Alle Bestellungen laden
            $orders = Order::findByUser($user->id);


            View::load('account-orders', [
                'orders' => $orders
            ]);
        } else {
            // Wenn nicht eingelogged, wird zum Login weitergeleitet
            header("Location: login");
        }
    }

    // Account-Bearbeitung
    public function editForm ()
    {

        if (User::isLoggedIn()) {

            // Daten laden
            $user = User::getLoggedInUser();
            $orders = Order::findByUser($user->id);
            $addresses = Address::findByUser($user->id);

            View::load('account-edit', [
                'user' => $user,
                'addresses' => $addresses,
                'orders' => $orders,
            ]);
        } else {
            header("Location: login");
        }
    }


    // Geänderte Daten in DB speichern
    public function edit ()
    {
        if (User::isLoggedIn()) {
            
            $user = User::getLoggedInUser();

            $user->firstname = trim($_POST['firstname']);
            $user->lastname = trim($_POST['lastname']);
            $user->email = trim($_POST['email']);

            // Passwort nur überschreiben, wenn beide Passwort Felder gesetzt und ident sind
            if (
                !empty($_POST['password']) &&
                !empty($_POST['password2']) &&
                $_POST['password'] == $_POST['password2']
            ) {

                $user->setPassword($_POST['password']);
            }

            // speichern
            $user->save();

            if (isset($_POST['address']) && is_array($_POST['address'])) {
                foreach ($_POST['address'] as $addressId => $addressText) {
                    $address = Address::find($addressId);
                    $address->address = $addressText;
                    $address->save();
                }
            }

            // redirecten
            $baseUrl = Config::get('app.baseUrl');
            header("Location: {$baseUrl}account");
        } else {
            header("Location: login");
        }
    }

}
