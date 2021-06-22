<?php

namespace App\Controllers;

use App\Models\Product;
use Core\View;

class ProductController
{

    // Alle Produkte aus Datenbank abfragen
    public function list ()
    {
        $products = Product::all();

        View::load('home', [
            'products' => $products
        ]);

    }

    // Produktdetailseite
    public function showProduct (int $productIdFromUrl)
    {
        $id = $productIdFromUrl;

        $product = Product::find($id);

        View::load('product', [
            'product' => $product
        ]);
    }

    // Shop - Übersicht aller Produkte
    public function overview () {

        $products = Product::all();

        View::load('shop', [
            'products' => $products
        ]);
    }

}
