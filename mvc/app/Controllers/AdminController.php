<?php

namespace App\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Core\Database;
use Core\View;

class AdminController
{

    // Dashboard wird nach Login als Admin angezeigt
    public function dashboard ()
    {
        // Datenbankverbindung herstellen
        $db = new Database();

        // Wenn kein Account eingeloggt ist oder der Account kein Admin ist, dann leiten wir auf die Home Seite weiter
        if (!User::isLoggedIn() || !User::getLoggedInUser()->is_admin) {
            header('Location: home');
            exit;
        }

        // Liste der Produkte
        $products = Product::all();

        // Produkte werden nach Bestand sortiert
        usort($products, function ($a, $b) {
            if ($a->stock === $b->stock) {
                return 0;
            }

            if ($a->stock < $b->stock) {
                return -1;
            } else {
                return 1;
            }
        });

        // Liste offener Bestellungen
        $openOrders = Order::findByStatus('open');
        $inProgressOrders = Order::findByStatus('in progress');
        $ordersToList = array_merge($openOrders, $inProgressOrders);

        // Liste der User
        $users = User::all();
        


        // Daten an View übergeben
        View::load('admin/dashboard', [
            'products' => $products,
            'openOrders' => $ordersToList,
            'users' => $users
        ]);
    }

}
