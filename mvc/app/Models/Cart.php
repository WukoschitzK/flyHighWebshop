<?php

namespace App\Models;

use Core\Session;

class Cart
{
    // $products wird ein Array von ProductIDs und Anzahl enthalten, $productsConfig enthält die Config Daten des supersonic Produkts
    protected $products = [];
    protected $productsConfig = [];

    const CART_KEY = 'cart';
    const CART_KEY_CONFIG = 'cart_config';

    // Konstruktor lädt das Cart aus der Session und speichert es in $this->product
    public function __construct ()
    {
        $this->products = Session::get(self::CART_KEY, []);
        $this->productsConfig = Session::get(self::CART_KEY_CONFIG, []);
    }

    // Destruktur nimmt $this->product und speichert es zurück in die Session
    public function __destruct ()
    {
        Session::set(self::CART_KEY, $this->products);
        Session::set(self::CART_KEY_CONFIG, $this->productsConfig);
    }

    /**
     *
     * @param int $productId
     * @param int $quantity
     */

    // Anzahl eines Produktes im Warenkorb aktualisieren
    public function updateProduct (int $productId, int $quantity = 1)
    {
        if ($quantity <= 0) {
            unset($this->products[$productId]);
        } else {
            $this->products[$productId] = $quantity;
        }
    }

    /**
     *
     * @param int $productId
     * @param int $quantity
     */

    // Produkt zum Warenkorb hinzufügen - Anzahl erhöhen
    public function addProduct (int $productId, int $quantity = 1)
    {
        if (array_key_exists($productId, $this->products)) {
            $this->updateProduct($productId, $this->products[$productId] + $quantity);
        } else {
            $this->updateProduct($productId, $quantity);
        }
    }

    /**
     *
     * @param int $productId
     * @param int $quantity
     */
    // Produkt aus dem Warenkorb entfernen - Anzahl verkleinern
    public function removeProduct (int $productId, int $quantity = 1)
    {
        if (array_key_exists($productId, $this->products)) {
            $this->updateProduct($productId, $this->products[$productId] - $quantity);
        }
    }

    public function addProductConfig (array $config, int $productId) {
        $this->productsConfig[$productId] = $config;
    }

    /**
     *
     * @return array
     */

    //  Produktinformationen zu den Produkten im Warenkorb
    public function getProducts ()
    {
        $_products = [];

        // Warenkorb durchgehen
        foreach ($this->products as $productId => $quantity) {
            
            // Produkt anhand der $productId aus der Datenbank laden
            $product = Product::find($productId);

            $product->quantity = $quantity;

            if (isset($this->productsConfig[$product->id])) {

                $product->config = $this->productsConfig[$product->id];
            }

            // $product zu Rückgabe-Array hinzufügen
            $_products[] = $product;
        }

        return $_products;
    }

    // alle Produkte aus dem Cart entfernen
    public function flush ()
    {

        $this->products = [];
    }


    // aktuelle Produktanzahl im Cart anzeigen
    public static function cartProducts () {
        $pCount = 0;

        $cart = new self();

        foreach ($cart->getProducts() as $product) {
            $pCount = $pCount + $product->quantity;
        }

        return $pCount;
    }

   

}
