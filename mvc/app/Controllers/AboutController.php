<?php

namespace App\Controllers;

use Core\View;

class AboutController {

    public function loadView () {

        View::load('about', [
            
        ]);
    }

}