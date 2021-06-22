<?php

namespace App\Models;

use Core\Database;
use Core\Models\ModelTrait;

class Address
{

    use ModelTrait;

    /**
     *
     * @var string
     */

    public static $tableName = 'addresses';

    // alle Spalten aus der Tabelle definieren
    public $id = 0;
    public $user_id = 0;
    public $address = '';

    /**
     *
     * @param array $data
     */

    // mit der fill methode alle Eigenschaften der Klasse aus einem DB Ergebnis befüllen
    public function fill (array $data = [])
    {
        $this->id = $data['id'];
        $this->user_id = $data['user_id'];
        $this->address = $data['address'];
    }

    // geänderte Daten in die Datenbank speichern oder eine neue Zeile anlegen
    public function save ()
    {

        // Neue Datenbankverbindung herstellen
        $db = new Database();

        // Wenn die Adresse schon in der DB besteht, wird eine neue angelegt
        if ($this->id > 0) {
            $result = $db->query('UPDATE ' . self::$tableName . ' SET user_id = ?, address = ? WHERE id = ?', [
                'i:user_id' => $this->user_id,
                's:address' => $this->address,
                'i:id' => $this->id
            ]);
        } else {
            $result = $db->query('INSERT INTO ' . self::$tableName . ' SET user_id = ?, address = ?', [
                'i:user_id' => $this->user_id,
                's:address' => $this->address
            ]);
            
            $this->id = $db->getInsertId();
        }

        return $result;
    }


    /**
     *
     * @param int $userId
     *
     * @return array
     */

    // Adresse von einem User finden
    public static function findByUser (int $userId)
    {
        $db = new Database();

        $tableName = self::$tableName;
        $result = $db->query("SELECT * FROM {$tableName} WHERE user_id = ?", [
            'i:user_id' => $userId
        ]);

        $data = [];
        foreach ($result as $resultItem) {
            $date = new self($resultItem);
            $data[] = $date;
        }

        return $data;
    }

    /**
     *
     * @return string
     */

    // Funktionalität, die Newline-Steuerzeichen aus der Datenbank in <br>-Tags umzuwandelt
    public function getAddressHtml ()
    {
        $addressWithBR = nl2br($this->address);

        return $addressWithBR;
    }

}
