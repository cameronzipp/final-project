<?php

class Controller
{

    private $_f3; //router

    function __construct($f3)
    { //default constructor
        $this->_f3 = $f3;
    }

    function home()
    {
        //Display the home page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function store()
    {
        //Display the store page
        $view = new Template();
        echo $view->render('views/store.html');
    }

    function cart()
    {
        //Display the cart page
        $view = new Template();
        echo $view->render('views/cart.html');
    }
}