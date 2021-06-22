# Fly High MVC

## Datenbankstruktur

+ `users`: Die Tabelle enthält folgende Spalten
    + `id`
    + `firstname`: wird bei der Registrierung angegeben und kann unter den Account Details bearbeitet werden
    + `lastname`: wird bei der Registrierung angegeben und kann unter den Account Details bearbeitet werden
    + `email`: wird als Benutzername verwendet
    + `password`: wird gehashed
    + `is_admin`: ob ein User die Admin-Rolle erhält, kann nur von einem Admin über das Dashboard -> User bearbeiten gesetzt werden
    + `is_deleted`: für die Funktion 'User löschen' wird ein softdelete verwendet
+ `addresses`: Die Tabelle enthält folgende Spalten
    + `id`
    + `user_id`: Jede Adresse ist einem User zugeordet und ein User kann mehrere Adressen haben
    + `address`: Adresse wird als String in die Datenbank gespeichert, die Adresse wird über die Registrierung erstmals angelegt, sie kann über die Account Details vom User bearbeitet werden und bei einer Bestellung kann eine Adresse hinzugefügt werden
+ `orders`: 
    + `id`
    + `crdate`: Bestelldatum
    + `user_id`: Jede Bestellung ist einem User zugewiesen
    + `products`: bei der Bestellung wird ein Snapshot der Produkte erstellt und als JSON String abgespeichert und in der Datenbank erfasst. 
    + `delivery_address_id`: Lieferadresse
    + `invoice_address_id`: Rechnungsadresse
    + `payment_id`: Zahlungsart
    + `status`: Status der Bestellung
+ `payments`: Die Tabelle enthält folgende Spalten
    + `id`
    + `name`: Wird bei der Bestellung angegeben
    + `number`: Kreditkartennummer, wird bei der Bestellung angegeben
    + `expires`: Wird bei der Bestellung angegeben
    + `ccv`: Wird bei der Bestellung angegeben
    + `user_id`: Jede Zahlungsart ist einem User zugeordet und ein User kann mehrere Adressen haben
+ `products`: Die Tabelle enthält folgende Spalten
    + `id`
    + `name`: Produktname
    + `description`: Produktbeschreibung, darf Null sein
    + `price`: Produktpreis
    + `stock`: Bestand
    + `images`: Produktbilder - werden als string in die Datenbank übertragen. Die Bilder befinden sich im Ordner storage/uploads
    + `create_date`: Datum der Produktanlage, wird für die Funktion loadLatestProducts auf der Home-Seite verwendet um die 4 zuletzt hinzugefügten Produkte anzuzeigen

## Folders

+ `/app`: App, die mit dem MVC Framework gebaut wird
+ `/config`
+ `/core`: MVC-Framework Files
+ `/public`: CSS, JS, Bilder, etc.
+ `/resources`: Views + CSS/JS+Rohdaten (LESS, Sass, Vue.js, React, ...)
+ `/storage`: Uploads, Temporäre Dateien etc.

## Daten für Login

+ als Admin: 
Benutzer: testkunde.admin@test.com
Passwort: Passw0rd!   

+ als normaler User: 
Benutzer: testkunde@test.at
Passwort: Passw0rd!

## Datenbank Dump

Datenbank `mvc` erstellen und dump.sql importieren


baseUrl in `app.php` und die config daten in `database.php` müssen zum Öffnen der Abgabe evt. noch angepasst werden. 