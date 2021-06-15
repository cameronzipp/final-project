<?php
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);


//require autoload files
require_once ('vendor/autoload.php');

require ($_SERVER["DOCUMENT_ROOT"] . '/../db.php');

//instantiate fat-free
$f3 = Base::instance();

if (!isset($_SESSION)){
    //start a session after autoload
    session_start();
}

if (isset($_SESSION['user'])) {
    $f3->set("user", $_SESSION['user']);
}

//define routes
$f3->route('GET|POST /', 'Controller->home');

$f3->route('GET|POST /store', 'Controller->store');

$f3->route('GET /cart', 'Controller->cart');

$f3->redirect('GET|HEAD /home', '/');

$f3->route('GET|POST /register', 'Controller->register');

$f3->route('GET|HEAD /logout', FUNCTION(){
    session_destroy(); //this could cause an issue with the session if the session doesnt actually recreate when redirected index.php:18
    header("Location:home");
});

$f3->set('ONERROR', 'Controller->error');

//run fat-free
$f3->run();
