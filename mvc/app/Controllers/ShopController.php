<?php

namespace App\Controllers;

use App\Models\Product;
use Core\View;

class ShopController {

    
    public function listAllProducts () {

        $products = Product::allShopProducts();

        View::load('shop', [
            'products' => $products
        ]);
    }



}