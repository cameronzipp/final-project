<?php


class controller
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

    function order()
    {
        //Reinitialize session array
        $_SESSION = array();

        $_SESSION['order'] = new Order();
    }

}