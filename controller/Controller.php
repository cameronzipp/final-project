<?php

/**
 * Class Controller
 */
class Controller
{
    /**
     * creates a login variable with a username and password
     * @param $f3
     * @param $username
     * @param $pass
     */
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

    /**
     * Displays the home page. If logged in will show the shop page
     * @param $f3
     */
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

    /**
     * Displays the store page with products from database
     * @param $f3
     */
    function store($f3)
    {
        if (!isset($_SESSION['userId'])) {
            header("Location:logout");
        }
        //get CPUs and load
        $cpuQuery = $GLOBALS['pdo']->query('SELECT * FROM CPUProduct INNER JOIN Product ON CPUProduct.product_id = Product.id');
        $cpuProducts = Array();
        foreach ($cpuQuery as $row) {
            array_push($cpuProducts, new CPUProduct($row['id'], $row['name'], $row['description'],
                $row['price'], $row['stock'], $row['quanityLimit'], $row['thumb'], $row['productID'],
                $row['cores'], $row['tdp'], $row['socket'], $row['manufacturer'], $row['freq_ghz']));
        }
        $f3->set("cpu", $cpuProducts);
        //get GPUs and load
        $gpuQuery = $GLOBALS['pdo']->query('SELECT * FROM GPUProduct INNER JOIN Product ON GPUProduct.product_id = Product.id');
        $gpuProducts = Array();
        foreach ($gpuQuery as $row) {
            array_push($gpuProducts, new GPUProduct($row['id'], $row['name'], $row['description'],
                $row['price'], $row['stock'], $row['quanityLimit'], $row['thumb'], $row['productID'],
                $row['manufacturer'], $row['chipBrand'], $row['tdp'], $row['vmem_mb'], $row['freq']));
        }
        $f3->set("gpu", $gpuProducts);
        //display the store browser
        $view = new Template();
        echo $view->render('views/store.html');
    }

    /**
     * displays the cart of the logged in user
     */
    function cart()
    {
        if (!isset($_SESSION['userId'])){
            header("Location:logout");
        }

        //Display the cart page
        $view = new Template();
        echo $view->render('views/cart.html');
    }

    /**
     * Displays the register page. If logged in, displays the store
     * @param $f3
     */
    function register($f3) {
        if (isset($_SESSION['userId'])){
            header("Location:store");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['uname'];
            $password = hash("sha256", $_POST['pass']);

            require("model/validation.php");

            if (validPass($_POST['pass']) && validUser($username)){
                $loginInfo = $GLOBALS['pdo']->prepare('INSERT INTO User (username, pass) VALUES (?, ?)');
                $success = $loginInfo->execute([$username, $password]);

                if ($success) {
                    $this->login($f3, $username, $_POST['pass']);
                }
            }
        }

        //Display the cart page
        $view = new Template();
        echo $view->render('views/register.html');
    }

    /**
     * Displays custom error pages instead of the default, unhelpful, pages.
     * @param $f3
     */
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