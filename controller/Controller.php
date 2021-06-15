<?php

class Controller
{
    function home($f3)
    {
        if (isset($_SESSION['userId'])){
            header("Location:store");
        } else {
            $_SESSION = Array();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['uname'];
            $loginInfo = $GLOBALS['pdo']->prepare('SELECT * FROM User WHERE username = ? LIMIT 1');
            $loginInfo->execute([$username]);
            if ($loginInfo->rowCount() >= 0){
                foreach ($loginInfo as $row){
                    if ($row['pass'] = hash("sha256", $_POST['pass'])) {
                        $_SESSION['userId'] = $row['id'];
                        header("Location:store");
                    } else {
                        $f3->set("login-error-status", true);
                        echo "Login failed";
                    }
                }
            } else {
                $f3->set("login-error-status", true);
                echo "Login failed";
            }
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
        $GLOBALS['con']->store($f3);

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

    function error($f3) {
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