<?php

namespace App\Controllers;

use App\Models\Address;
use App\Models\User;
use Core\Helpers\Config;
use Core\Helpers\Validator;
use Core\Libs\PHPMailer;
use Core\Session;
use Core\View;

class AuthController
{

    // Login Formular
    public function loginForm ()
    {
        // Überprüfen ob Account bereits eingelogged ist
        if (User::isLoggedIn()) {
            
            // User Daten laden
            $user = User::getLoggedInUser();

            // Admin wird zum Dashboard weitergeleitet, normale User zur Home Seite
            $redirectUrl = 'home';
            if ($user->is_admin === true) {
                $redirectUrl = 'dashboard';
            }

            header("Location: $redirectUrl");
            exit;
        } else {
            // Bei Validierungsfehlern wird wieder zum Login weitergeleitet
            View::load('login', [
                'errors' => Session::get('errors', [], true),
            ]);
        }
    }

    // Login Prozess
    public function login ()
    {
        // Überprüfen ob User bereits eingelogged ist
        if (User::isLoggedIn()) {
            $user = User::getLoggedInUser();

            $redirectUrl = 'home';
            if ($user->is_admin === true) {
                $redirectUrl = 'dashboard';
            }

            header("Location: $redirectUrl");
            exit;
        } else {
            
            $errors = [];

            
            // Überprüfen ob Email und Passwort übergeben wurden
            if (isset($_POST['email']) && isset($_POST['password'])) {
                
                $email = $_POST['email'];
                $passwordFromForm = $_POST['password'];

                // Account über Email aus DB laden
                $user = User::findByEmail($email);

                // Wenn ein $user zur eingegeben Email-Adresse gefunden wurde und das Passwort übereinstimmt, leiten wir weiter - sonst Fehler
                if ($user && $user->checkPassword($passwordFromForm)) {
                    $redirectUrl = 'home';

                    if ($user->is_admin === true) {
                        $redirectUrl = 'dashboard';
                    }

                    $user->login($redirectUrl);
                } else {
                    $errors[] = "User not existing or Password is false";
                }
            } else {
                if (!isset($_POST['email'])) {
                    $errors[] = "Email is required";
                }

                if (!isset($_POST['password'])) {
                    $errors[] = "Password is required";
                }
            }

            // Fehler in die Session speichern und im Login-Formular ausgeben
            Session::set('errors', $errors);
            header("Location: login");
            exit;
        }
    }

    public function logout ()
    {
        // Account ausloggen und zur Startseite weiterleiten
        User::logout("home");
    }


    // Registrierungsformular
    public function signupForm ()
    {
        if (User::isLoggedIn()) {
            $user = User::getLoggedInUser();

            $redirectUrl = 'home';
            if ($user->is_admin === true) {
                $redirectUrl = 'dashboard';
            }

            header("Location: $redirectUrl");
            exit;
        } else {
            View::load('signup', [
                'errors' => Session::get('errors', [], true),
            ]);
        }
    }

    // Nimmt die Formulardaten aus dem Registrierungsformular entgegen
    public function signup ()
    {

        $baseUrl = Config::get('app.baseUrl');

        // Daten validieren
        $validator = new Validator();
        $validator->validate($_POST['firstname'], 'Firstname', true, 'text', 2, 255);
        $validator->validate($_POST['lastname'], 'Lastname', true, 'text', 2, 255);
        // $validator->validate($_POST['address'], 'Address', true, 'textnum');
        $validator->validate($_POST['email'], 'Email', true, 'email');
        $validator->validate($_POST['password'], 'Passwort', true, 'password');
        $validator->compare($_POST['password'], $_POST['password2']);

        // Fehler aus dem Validator holen
        $errors = $validator->getErrors();

        // Überprüfen ob Emailadresse in DB schon existiert
        if (User::findByEmail($_POST['email']) !== false) {
            $errors[] = "Email is already used";
        }

        // Fehler in die Session speichern und im Registrierungs-Formular ausgeben
        if (!empty($errors)) {
            Session::set('errors', $errors);
            header("Location: $baseUrl/signup");
            exit;
        }
    
        // Wenn kein Validierungsfehler auftritt, wollen wir den Account speichern
        $user = new User();

        $user->firstname = $_POST['firstname'];
        $user->lastname = $_POST['lastname'];
        $user->email = $_POST['email'];
        $user->setPassword($_POST['password']);
        $user->save();

        $address = new Address();
        $address->address = $_POST['address'];
        $address->user_id = $user->id;
        $address->save();


        // PHP Mailer zum Email verschicken bei erfolgreicher Registrierung
        if (PHPMailer::ValidateAddress($user->email)) {
            $mail = new PHPMailer();
            $mail->isMail();
            $mail->AddAddress($user->email);
            $mail->SetFrom('no-reply@mvc-flyhigh.at');
            $mail->Subject = 'Welcome!';
            $mail->Body = 'Your sign up was successfull!';

            $mail->Send();

            header("Location: $baseUrl/login");
            exit;
        } else {
            die('PHPMailer Error');
        }
    }

}
