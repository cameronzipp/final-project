<?php
//this is the controller class

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload files
require_once ('vendor/autoload.php');

//instantiate fat-free
$f3 = Base::instance();

//define routes
$f3->route('GET /', FUNCTION(){
    //display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

/*//prepare route for errors
$f3->set('ONERROR', function() {
    $view = new Template();
    echo $view->render('views/error.html');
});*/

$f3->set('ONERROR', function($f3) {

    switch ($f3->get('ERROR.code')) {

        case 403:
            $view = new Template();
            echo $view->render('views/custom-403-error.html');
            break;
        case 404:
            $view = new Template();
            echo $view->render('views/error.html');
            break;
        case 500:
            $view = new Template();
            echo $view->render('views/custom-500-error.html');
            break;
    }
});

//run fat-free
$f3->run();
