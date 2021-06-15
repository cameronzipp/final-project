<?php
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);


//require autoload files
require_once ('vendor/autoload.php');

require ($_SERVER["DOCUMENT_ROOT"] . '/../db.php');

//instantiate fat-free
$f3 = Base::instance();
$f3->set("DEBUG", 3);

if (!isset($_SESSION)){
    //start a session after autoload
    //start a session after autoload
    session_start();
}


//setup categories for navbar
$catNav = $pdo->query('SELECT * FROM Category');
$f3->set("navCategory", $catNav);

//define routes
$f3->route('GET|POST /', 'Controller->home');

$f3->route('GET|POST /store', 'Controller->store');

$f3->route('GET /cart', 'Controller->cart');

$f3->redirect('GET|HEAD /home', '/');

$f3->route('GET /register', 'Controller->register');

$f3->route('GET|HEAD /logout', FUNCTION(){
    session_destroy(); //this could cause an issue with the session if the session doesnt actually recreate when redirected
    header("Location:home");
});

$f3->set('ONERROR', 'Controller->error');

//run fat-free
$f3->run();
