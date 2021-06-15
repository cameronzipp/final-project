<?php
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload files
require_once ('vendor/autoload.php');

require ($_SERVER["DOCUMENT_ROOT"] . '/../../db.php');


//start a session after autoload
session_start();

//instantiate fat-free
$f3 = Base::instance();
$con = new Controller($f3);
//$dataLayer = new DataLayer();

//setup categories for navbar
$catNav = $pdo->query('SELECT * FROM Category');
$f3->set("navCategory", $catNav);

//define routes
$f3->route('GET /', FUNCTION(){
    //display the home page
    $GLOBALS['con']->home();
});

$f3->route('GET /store', FUNCTION($f3){
    //get CPUs and load
    $CPUProducts = $GLOBALS['pdo']->query('SELECT * FROM CPUProduct INNER JOIN Product ON CPUProduct.product_id = Product.id');
    $f3->set("cpu", $CPUProducts);
    //get GPUs and load
    $CPUProducts = $GLOBALS['pdo']->query('SELECT * FROM GPUProduct INNER JOIN Product ON GPUProduct.product_id = Product.id');
    $f3->set("gpu", $CPUProducts);
    //display the store browser
    $GLOBALS['con']->store($f3);
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