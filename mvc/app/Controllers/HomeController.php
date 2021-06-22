<?php

namespace App\Controllers;

use App\Models\Product;
use Core\View;

class HomeController
{
       
    // Funktion die die letzten 4 Einträge wiedergibt


    public function loadLatestProducts ()
    {
        $products = Product::getLatestProducts();

        View::load('home', [
            'products' => $products
        ]);
    }

}
