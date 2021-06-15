<?php
class Product {
    private $id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $quanityLimit;

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }
}

class CPUProduct extends Product {
    private $productID;
    private $cores;
    private $tdp;
    private $socket;
    private $manufacturer;
    private $freq_ghz;


}

