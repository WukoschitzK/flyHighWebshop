<?php

namespace App\Models;

use Core\Models\ModelTrait;
use Core\Database;

class Product
{

    use ModelTrait;

    /**
     *
     * @var string
     */
    public static $tableName = 'products';

    public $id = 0;
    public $name = '';
    public $description = null;
    public $price = 0.0;
    public $stock = 0;
    public $images = [];
    public $create_date = 0;

     /**
     *
     * @var string
     */

    // Trenner um Produktbilder in einen String umzuwandeln oder String aus DB in ein Array umwandeln
    public static $imagesDelimiter = ';';

    /**
     *
     * @param array $data
     */
    public function fill (array $data = [])
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->price = $data['price'];
        $this->stock = $data['stock'];
        $this->images = $data['images'];
        $this->create_date = $data['create_date'];


        // Wert aus der Datenbank also nur dann weiterverarbeiten, wenn er nicht leer ist (mittels Trenner)
        if (!empty($data['images'])) {
            if (strpos($data['images'], self::$imagesDelimiter) >= 0) {
                $this->images = explode(self::$imagesDelimiter, $data['images']);
            } else {
                $this->images[] = $data['images'];
            }
        }
    }

    public function save ()
    {
        $db = new Database();

        // Array hier in einen String umwandeln
        $_images = implode(self::$imagesDelimiter, $this->images);

        if ($this->id > 0) {
            $result = $db->query('UPDATE ' . self::$tableName . ' SET name = ?, description = ?, price = ?, stock = ?, create_date = ?, images = ? WHERE id = ?', [
                's:name' => $this->name,
                's:description' => $this->description,
                'd:price' => $this->price,
                'i:stock' => $this->stock,
                'i:create_date' => $this->create_date,
                's:images' => $_images,
                'i:id' => $this->id
            ]);
        } else {
            $result = $db->query('INSERT INTO ' . self::$tableName . ' SET name = ?, description = ?, price = ?, stock = ?, create_date = ?, images = ?', [
                's:name' => $this->name,
                's:description' => $this->description,
                'd:price' => $this->price,
                'i:stock' => $this->stock,
                'i:create_date' => $this->create_date,
                's:images' => $_images
            ]);

            $this->id = $db->getInsertId();
        }
        

        return $result;
    }

    /**
     *
     * @return string
     */

    // Preis direkt formatiert zurück bekommen
    public function getPrice ()
    {
        return self::formatPrice($this->price);
    }


    /**
     *
     * @return string
     */

    //  Preis im richtigen Format zurückgeben
    public function getPriceFloat ()
    {
        return sprintf('%.2f', $this->price);
    }

    /**
     * @param $price
     *
     * @return string
     */
    public static function formatPrice ($price)
    {
        return sprintf('&euro; %.2f ,-', $price);
    }



    /**
     *
     * @param string $filepath
     */

    // Übergebenen Pfad in $this->images einfügen
    public function addImage (string $filepath)
    {

        if (!in_array($filepath, $this->images)) {
            $this->images[] = $filepath;
        }
    }

    /**
     *
     * @param string $filepath
     */
    // Übergebenen Pfad aus $this->images löschen
    public function removeImage (string $filepath)
    {
        // überprüfen an welchem Array Index $filepath in $this->images vorkommt
        $indexForFilepath = array_search($filepath, $this->images);

        if ($indexForFilepath !== false) {
            unset($this->images[$indexForFilepath]);
        }
    }

    /**
    * @return array
    */
    // Funktion welche die 4 zuletzt hinzugefügten Produkte anzeigen soll -> Methode all aus dem Modultrait umgewandelt
    public static function getLatestProducts ()
    {

        $db = new Database();

        $tableName = self::$tableName;

        // Query für die 4 zuletzt hinzugefügten Produkte
        $result = $db->query("SELECT * FROM {$tableName} ORDER BY create_date DESC LIMIT 4");

        $data = [];
        foreach ($result as $resultItem) {
            $date = new self($resultItem);
            $data[] = $date;
        }

        // Array an Objekten zurückgeben, die die Werte aus dem Query beinhalten
        return $data;
    }

    /**
     * @return array
     */
    // Funktion für den Shop welche alle Produkte außer das supersonic produkt ausgibt
    public static function allShopProducts ()
    {
        $db = new Database();

        $tableName = self::$tableName;

        $result = $db->query("SELECT * FROM $tableName where id != 6");


        $data = [];
        foreach ($result as $resultItem) {
            $date = new self($resultItem);
            $data[] = $date;
        }

        return $data;
    }


    /**
    * @return array
    */
    // Funktion welche für die Seite "Design your Bike" nur das Produkt Supersonic Rocket Bike ausgibt
    public static function showSupersonic ()
    {

        $db = new Database();

        $tableName = self::$tableName;


        $result = $db->query("SELECT * FROM {$tableName} WHERE name = 'Supersonic Rocket Bike' LIMIT 1");

        $data = [];
        foreach ($result as $resultItem) {
            $date = new self($resultItem);
            $data[] = $date;
        }

        return $data[0];
    }


}
