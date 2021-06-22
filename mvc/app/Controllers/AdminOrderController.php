<?php

namespace App\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Core\View;

class AdminOrderController
{

    /**
     * 
     *
     * @param int $id
     */

    // Bearbeitungsformular für eine Bestellung
    public function editForm (int $id)
    {
        // Daten der Bestellung aus der Datenbank abfragen
        $order = Order::find($id);
        $user = User::find($order->user_id);
        $delivery_address = Address::find($order->delivery_address_id);
        $invoice_address = Address::find($order->invoice_address_id);
        $payment = Payment::find($order->payment_id);


        // Daten an View übergeben
        View::load('admin/orderForm', [
            'order' => $order,
            'user' => $user,
            'delivery_address' => $delivery_address,
            'invoice_address' => $invoice_address,
            'payment' => $payment
        ]);
    }

    /**
     *
     * @param int $id
     */

    // Daten aus dem Bearbeitungsformular entgegen nehmen und speichern
    public function edit (int $id)
    {

        // Bestellung aus der DB abfragen
        $order = Order::find($id);

        // Order Status mit neuem Wert überschreiben
        $order->status = $_POST['status'];

        // Lieferadresse aus DB abfragen
        $oldDeliveryAddress = Address::find($order->delivery_address_id);


        // Wenn die Liefer- oder Rechnungsadresse geändert wird, soll eine neue Adresse angelegt werden
        if ($oldDeliveryAddress->address !== $_POST['delivery_address']) {
            $deliveryAddress = new Address();
            $deliveryAddress->user_id = $order->user_id;
            $deliveryAddress->address = $_POST['delivery_address'];
            $deliveryAddress->save();
            $order->delivery_address_id = $deliveryAddress->id;
        }

        $oldInvoiceAddress = Address::find($order->invoice_address_id);
        if ($oldInvoiceAddress->address !== $_POST['invoice_address']) {
            $invoiceAddress = new Address();
            $invoiceAddress->user_id = $order->user_id;
            $invoiceAddress->address = $_POST['invoice_address'];
            $invoiceAddress->save();
            $order->invoice_address_id = $invoiceAddress->id;
        }

        $order->save();

        header('Location: ' . BASE_URL . 'dashboard');
        exit;
    }

}
