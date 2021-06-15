<?php

class Controller
{
    function login($f3, $username, $pass) {
        $loginInfo = $GLOBALS['pdo']->prepare('SELECT * FROM User WHERE username = ? LIMIT 1');
        $loginInfo->execute([$username]);
        if ($loginInfo->rowCount() > 0){
            foreach ($loginInfo as $row){
                if (strcasecmp($row['pass'], hash("sha256", $pass)) == 0) {
                    $_SESSION['userId'] = $row['id'];
                    $user = new User($row['id'], $row['username']);
                    $_SESSION['user'] = $user;
                    header("Location:store");
                } else { //password incorrect
                    $f3->set("error_status", 1);
                }
            }
        } else { //user not found
            $f3->set("error_status", 1);
        }
    }

    function home($f3)
    { //home and login
        $f3->set("error_status", 0);
        if (isset($_SESSION['userId'])){
            header("Location:store");
        } else {
            $_SESSION = Array();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->login($f3, $_POST['uname'], $_POST['pass']);
        }

        //Display the home page
        $view = new Template();
        echo $view->render('views/home.html');

    }

    function store($f3)
    {
        if (!isset($_SESSION['userId'])){
            header("Location:logout");
        }
        //get CPUs and load
        $CPUProducts = $GLOBALS['pdo']->query('SELECT * FROM CPUProduct INNER JOIN Product ON CPUProduct.product_id = Product.id');
        $f3->set("cpu", $CPUProducts);
        //get GPUs and load
        $CPUProducts = $GLOBALS['pdo']->query('SELECT * FROM GPUProduct INNER JOIN Product ON GPUProduct.product_id = Product.id');
        $f3->set("gpu", $CPUProducts);
        //display the store browser
        //print_r($_SESSION['user']);
        $view = new Template();
        echo $view->render('views/store.html');
    }

    function cart()
    {
        if (!isset($_SESSION['userId'])){
            header("Location:logout");
        }

        //Display the cart page
        $view = new Template();
        echo $view->render('views/cart.html');
    }

    function register($f3) {
        if (isset($_SESSION['userId'])){
            header("Location:store");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['uname'];
            $password = hash("sha256", $_POST['pass']);

            $loginInfo = $GLOBALS['pdo']->prepare('INSERT INTO User (username, pass) VALUES (?, ?)');
            $success = $loginInfo->execute([$username, $password]);

            if ($success) {
                $this->login($f3, $username, $_POST['pass']);
            }
        }

        //Display the cart page
        $view = new Template();
        echo $view->render('views/register.html');
    }

    function error($f3) {
        if ($f3->get("DEBUG") > 0){
            echo $f3->get('ERROR.text');
        } else {
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
        }

    }
}