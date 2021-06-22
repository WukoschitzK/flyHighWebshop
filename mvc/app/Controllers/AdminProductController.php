<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\User;
use Core\Helpers\Config;
use Core\Helpers\Validator;
use Core\Session;
use Core\View;

class AdminProductController
{

    /**
     *
     * @param int $id
     */

    // Bearbeitungsformular für ein Produkt laden
    public function editForm (int $id)
    {
        // Product anhand der Produkt $id aus der DB abfragen
        $product = Product::find($id);

        // View für das Produkt laden
        View::load('admin/productForm', [
            'product' => $product,
            'errors' => Session::get('errors', [], true)
        ]);
    }

    /**
     *
     * @param int $id
     */

     // Daten aus dem Bearbeitungsformular entgegen nehmen und speichern
    public function edit (int $id)
    {
        // Validieren der Eingabefelder
        $validator = new Validator();
        $validator->validate($_POST['name'], 'Name', true, 'textnum', 2, 255);
        $validator->validate($_POST['stock'], 'Stock', true, 'num');
        
        $errors = $validator->getErrors();

        $baseUrl = Config::get('app.baseUrl');

        // Wenn Fehler aufgetreten sind, wird erneut zum Formular weitergeleitet
        if ($errors !== false) {
            Session::set('errors', $errors);
            header("Location: $baseUrl/products/$id/edit");
            exit;
        }

        // Product aus der DB abfragen
        $product = Product::find($id);
        
        // Eigenschafen des Products überschreiben. Daten im PHP Objekt speichern
        $product->name = $_POST['name'];
        $product->description = $_POST['description'];
        $product->price = (float)$_POST['price'];
        $product->stock = (int)$_POST['stock'];

        // Dateien aus dem Formular entgegennehmen und als Array speichern und dann einer Schleife durchgehen
        foreach ($_FILES['images']['error'] as $index => $error) {
            
            // Wenn kein Fehler beim Upload aufgetreten ist, werden die Daten verarbeitet
            if ($error === 0) {
                
                //  Über den MIME Type herausfinden ob es sich um ein Bild handelt
                $type = $_FILES['images']['type'][$index];
                $type = explode('/', $type)[0];

                if ($type === 'image') {

                    // $tmp_name ist der Dateipfad, an den PHP das File temporär gespeichert hat
                    $tmp_name = $_FILES['images']['tmp_name'][$index];

                    // mit der basename-Funktion wird sichergestellt dass der originale Dateiname zurückkommt
                    $filename = basename($_FILES['images']['name'][$index]);

                    

                    // absoluten Pfad, an den die Datei vom $tmp_name aus verschoben werden soll
                    $destination = __DIR__ . "/../../storage/uploads/$filename";

                    // verschieben der hochgeladenen Datei von $tmp_name nach $destination
                    move_uploaded_file($tmp_name, $destination);

                    // Hochgeladenes Bild zum Product hinzufügen
                    $product->addImage("uploads/$filename");
                }
            }
        }

        // Wurden Dateien zur Löschung angehakt?
        if (isset($_POST['delete-images'])) {
            
            foreach ($_POST['delete-images'] as $imagePath => $unusedValue) {
                // Datei aus dem Product entfernen
                $product->removeImage($imagePath);

                unlink(__DIR__ . "/../../storage/$imagePath");
            }
        }

        // Aktualisierte Eigenschaften in die Datenbank speichern.
        $product->save();

        header("Location: $baseUrl/dashboard");
        exit;
    }

    // Add Formular für ein Produkt anzeigen
    public function addForm ()
    {
       
        View::load('admin/productAddForm', [
            'errors' => Session::get('errors', [], true)
        ]);
    }

    // Daten aus dem Add Formular eines Produkts entgegen nehmen und neues Produkt in die Datenbank speichern
    public function add ()
    {
        // Eingabe validieren
        $validator = new Validator();
        $validator->validate($_POST['name'], 'Name', true, 'textnum', 2, 255);
        $validator->validate($_POST['stock'], 'Stock', true, 'num');
        
        $errors = $validator->getErrors();

        $baseUrl = Config::get('app.baseUrl');

       
        // wenn Fehler aufgetreten sind wird erneut zum Formular weitergeleitet
        if (!empty($errors)) {
            Session::set('errors', $errors);
            header("Location: {$baseUrl}dashboard/products/add");
            exit;
        }

        // Product aus der DB abfragen
        $product = new Product();
        
        // Eigenschafen des Products überschreiben
        $product->name = $_POST['name'];
        $product->description = $_POST['description'];
        $product->price = (float)$_POST['price'];
        $product->stock = (int)$_POST['stock'];
        $product->create_date = $_POST['create_date'];

        // Dateien aus dem Formular entgegennehmen und als Array speichern und dann einer Schleife durchgehen (siehe Beschreibung oben)
        foreach ($_FILES['images']['error'] as $index => $error) {
            
            if ($error === 0) {
                
                $type = $_FILES['images']['type'][$index];
                $type = explode('/', $type)[0];

                
                if ($type === 'image') {
                    
                    $tmp_name = $_FILES['images']['tmp_name'][$index];

                    $filename = basename($_FILES['images']['name'][$index]);

                    
                    // $filename = time() . "_" . $filename;

                    
                    $destination = __DIR__ . "/../../storage/uploads/$filename";

                   
                    move_uploaded_file($tmp_name, $destination);

                   
                    $product->addImage("uploads/$filename");
                }
            }
        }

        // Neues Produkt in die Datenbank speichern
        $product->save();

       
        header("Location: $baseUrl/dashboard");
        exit;
    }

    /**
     * @param int $id
     *
     */

    // Bestätigung ob Produkt gelöscht werden soll
    public function deleteForm (int $id)
    {
        
        if (User::isLoggedIn() && User::getLoggedInUser()->is_admin === true) {

            $product = Product::find($id);
            

            View::load('admin/confirm-product-delete', [
                'product' => $product
            ]);
        } else {
            header("Location: login");
        }
    }

    /**
     * @param int $id
     */

    //  Produkt löschen
    public function delete (int $id)
    {
        if (User::isLoggedIn() && User::getLoggedInUser()->is_admin === true) {

            Product::delete($id);

            $baseUrl = Config::get('app.baseUrl');
            header("Location: {$baseUrl}dashboard/");
            

        } else {
            header("Location: login");
        }
    }


}