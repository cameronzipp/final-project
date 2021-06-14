<?php
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload files
require_once ('vendor/autoload.php');

//start a session after autoload
session_start();

//instantiate fat-free
$f3 = Base::instance();
$con = new Controller($f3);
//$dataLayer = new DataLayer();

//define routes
$f3->route('GET /', FUNCTION(){
    //display the home page
    $GLOBALS['con']->home();
});

$f3->route('GET /store', FUNCTION(){
    //display the store browser
    $GLOBALS['con']->store();
});

$f3->route('GET /cart', FUNCTION(){
    //display the cart
    $GLOBALS['con']->cart();
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