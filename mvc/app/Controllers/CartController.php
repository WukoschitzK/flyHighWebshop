<?php

namespace App\Controllers;

use App\Models\Cart;
use Core\Helpers\Config;
use Core\Session;
use Core\View;

class CartController
{

    // Inhalt aus dem Cart laden und einen View übergeben
    public function index ()
    {
        $cart = new Cart();
 
        View::load('cart', [
            'cartContent' => $cart->getProducts(),
        ]);
    }

    /**
     *
     * @param int $productId
     */

    // Product id und die config (beim Product Supersonic) entgegen nehmen und den Cart hinzufügen
    public function addProductToCart (int $productId)
    {
        $cart = new Cart();

        $cart->addProduct($productId);
        $config = [
            "tire" => $_POST['tire'],
            "frame" => $_POST['frame'],
            "saddle" => $_POST['saddle']
        ];
        $cart->addProductConfig($config, $productId);

        // Auf die vorherige URL zurück leiten.
        $referrer = Session::get('referrer');
        header("Location: $referrer");
    }

    /**
     *
     * @param int $productId
     */

    //  1 Produkt aus Cart entfernen
    public function removeProductFromCart (int $productId)
    {

        $cart = new Cart();

        $cart->removeProduct($productId);

        // Auf die vorherige URL zurück leiten.
        $referrer = Session::get('referrer');
        header("Location: $referrer");
    }

    /**
     *
     * @param int $productId
     */

    //  Alle Produkte dieser id aus dem Cart entfernen
    public function deleteProductFromCart (int $productId)
    {

        $cart = new Cart();

        $cart->updateProduct($productId, 0);

        $referrer = Session::get('referrer');
        header("Location: $referrer");
    }

    /**
     *
     * @param int $productId
     */
    // Produkt mit Anzahl in den Cart legen
    public function updateProductInCart (int $productId)
    {
        $newQuantity = (int)$_POST['quantity'];

        $cart = new Cart();

        $cart->updateProduct($productId, $newQuantity);

        $referrer = Session::get('referrer');
        header("Location: $referrer");
    }

}
