<?php

namespace App\Controllers;

use App\Models\Product;
use Core\View;

class SupersonicController {

    // Nur das Produkt Supersonic Rocket Bike anzeigen

    public function showProduct () {

        $product = Product::showSupersonic();

        View::load('supersonic', [
            'product' => $product
        ]);
    }



}