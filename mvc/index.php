<?php



//  require_once 'vendor/autoload.php';

//+ Route und Controller von composer noch einfügen

spl_autoload_register(function ($namespaceAndClassname) {
    
    $namespaceAndClassname = str_replace('Core', 'core', $namespaceAndClassname);
    $namespaceAndClassname = str_replace('App', 'app', $namespaceAndClassname);
    $filepath = str_replace('\\', '/', $namespaceAndClassname);

    require_once __DIR__ . "/{$filepath}.php";
});

/**
 * MVC "anstarten"
 */
$app = new \Core\Bootstrap();