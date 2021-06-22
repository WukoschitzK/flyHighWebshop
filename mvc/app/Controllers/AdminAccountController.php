<?php

namespace App\Controllers;

use App\Models\User;
use Core\View;
use Core\Session;
use Core\Helpers\Config;


class AdminAccountController
{
    // Alle Accounts anzeigen
    
    public function list ()
    {
        // Überprüfen ob eingeloggter User Admin-Berechtigung hat
        if (User::isLoggedIn() && User::getLoggedInUser()->is_admin === true) {

            $users = User::all();

            View::load('admin/users', [
                'users' => $users
            ]);
        } else {
            header("Location: login");
        }
    }


    // Formular zum User bearbeiten laden
    public function editForm (int $id)
    {

        if (User::isLoggedIn() && User::getLoggedInUser()->is_admin === true) {

            // User aus der Datenbank laden
            $user = User::find($id);

            View::load('admin/account-edit', [
                'user' => $user
            ]);
        } else 
        // Ist kein Admin User eingeloggt, leiten wir auf den Login weiter.
        {
            header("Location: login");
        }
    }

    // User bearbeiten (als Admin)

    public function edit (int $id)
    {

        if (User::isLoggedIn() && User::getLoggedInUser()->is_admin === true) {

            $user = User::find($id);

            // Eigenschaften mit Formulardaten überschreiben
            $user->firstname = trim($_POST['firstname']);
            $user->lastname = trim($_POST['lastname']);
            $user->email = trim($_POST['email']);

            // Password wird nur geändert wenn gesetzt und die beiden Passwörter übereinstimmen - Password Hash wird mit setPassword generiert
            if (
                !empty($_POST['password']) &&
                !empty($_POST['password2']) &&
                $_POST['password'] == $_POST['password2']
            ) {
                $user->setPassword($_POST['password']);
            }

            // User erhält Admin-Rolle, is_admin wird in der Datenbank auf true gesetzt
            $user->is_admin = (isset($_POST['isAdmin']) && $_POST['isAdmin'] === 'on') ? true : false;

            // speichern
            $user->save();

            // Erfolgsmeldung
            Session::set('flash', 'Success!');

            $baseUrl = Config::get('app.baseUrl');
            header("Location: {$baseUrl}dashboard");

        } else  {
            header("Location: login");
        }


    }

    /**
     * @param int $id
     *
     * 
     */

    // Es soll bestätigt werden ob ein Account gelöscht werden soll
    public function deleteForm (int $id)
    {
        if (User::isLoggedIn() && User::getLoggedInUser()->is_admin === true) {

            $user = User::find($id);

            View::load('admin/confirm-user-delete', [
                'user' => $user
            ]);
        } else  {
            header("Location: login");
        }
    }

    /**
     * @param int $id
     *
     * 
     */

    // Account löschen
    public function delete (int $id)
    {
        if (User::isLoggedIn() && User::getLoggedInUser()->is_admin === true) {

            User::delete($id);

            $baseUrl = Config::get('app.baseUrl');
            header("Location: {$baseUrl}dashboard");
            

        } else  {
            header("Location: login");
        }
    }

}
