<?php
class Product {
    private $id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $quanityLimit;
    private $thumbnail;

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param mixed $thumbnail
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    /**
     * @return mixed
     */
    public function getQuanityLimit()
    {
        return $this->quanityLimit;
    }

    /**
     * @param mixed $quanityLimit
     */
    public function setQuanityLimit($quanityLimit)
    {
        $this->quanityLimit = $quanityLimit;
    }

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     * @param $stock
     * @param $quanityLimit
     */
    public function __construct($id, $name, $description, $price, $stock, $quanityLimit, $thumbnail)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stock = $stock;
        $this->quanityLimit = $quanityLimit;
        $this->thumbnail = $thumbnail;
    }

}

class CPUProduct extends Product {
    private $productID;
    private $cores;
    private $tdp;
    private $socket;
    private $manufacturer;
    private $freq_ghz;

    public function __construct($id, $name, $description, $price, $stock, $quanityLimit, $thumbnail,
                                $productID, $cores, $tdp, $socket, $manufacturer, $freq_ghz) {
        parent::__construct($id, $name, $description, $price, $stock, $quanityLimit, $thumbnail);
        $this->productID = $productID;
        $this->cores = $cores;
        $this->tdp = $tdp;
        $this->socket = $socket;
        $this->manufacturer = $manufacturer;
        $this->freq_ghz = $freq_ghz;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return parent::getId();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return parent::getName();
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return parent::getDescription();
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return parent::getPrice();
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return parent::getStock();
    }

    /**
     * @return mixed
     */
    public function getQuanityLimit()
    {
        return parent::getQuanityLimit();
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return parent::getThumbnail();
    }

    /**
     * @return mixed
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * @param mixed $productID
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    /**
     * @return mixed
     */
    public function getCores()
    {
        return $this->cores;
    }

    /**
     * @param mixed $cores
     */
    public function setCores($cores)
    {
        $this->cores = $cores;
    }

    /**
     * @return mixed
     */
    public function getTdp()
    {
        return $this->tdp;
    }

    /**
     * @param mixed $tdp
     */
    public function setTdp($tdp)
    {
        $this->tdp = $tdp;
    }

    /**
     * @return mixed
     */
    public function getSocket()
    {
        return $this->socket;
    }

    /**
     * @param mixed $socket
     */
    public function setSocket($socket)
    {
        $this->socket = $socket;
    }

    /**
     * @return mixed
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param mixed $manufacturer
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return mixed
     */
    public function getFreqGhz()
    {
        return $this->freq_ghz;
    }

    /**
     * @param mixed $freq_ghz
     */
    public function setFreqGhz($freq_ghz)
    {
        $this->freq_ghz = $freq_ghz;
    }

}

class GPUProduct extends Product {
    private $productID;
    private $chipBrand;
    private $tdp;
    private $vmem_mb;
    private $manufacturer;
    private $freq_mhz;

    public function __construct($id, $name, $description, $price, $stock, $quanityLimit, $thumbnail,
                                $productID, $chipBrand, $tdp, $vmem_mb, $manufacturer, $freq_mhz)
    {
        parent::__construct($id, $name, $description, $price, $stock, $quanityLimit, $thumbnail);
        $this->productID = $productID;
        $this->chipBrand = $chipBrand;
        $this->tdp = $tdp;
        $this->vmem_mb = $vmem_mb;
        $this->manufacturer = $manufacturer;
        $this->freq_mhz = $freq_mhz;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return parent::getId();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return parent::getName();
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return parent::getDescription();
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return parent::getPrice();
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return parent::getStock();
    }

    /**
     * @return mixed
     */
    public function getQuanityLimit()
    {
        return parent::getQuanityLimit();
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return parent::getThumbnail();
    }

    /**
     * @return mixed
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * @param mixed $productID
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    /**
     * @return mixed
     */
    public function getChipBrand()
    {
        return $this->chipBrand;
    }

    /**
     * @param mixed $chipBrand
     */
    public function setChipBrand($chipBrand)
    {
        $this->chipBrand = $chipBrand;
    }

    /**
     * @return mixed
     */
    public function getTdp()
    {
        return $this->tdp;
    }

    /**
     * @param mixed $tdp
     */
    public function setTdp($tdp)
    {
        $this->tdp = $tdp;
    }

    /**
     * @return mixed
     */
    public function getVmemMb()
    {
        return $this->vmem_mb;
    }

    /**
     * @param mixed $vmem_mb
     */
    public function setVmemMb($vmem_mb)
    {
        $this->vmem_mb = $vmem_mb;
    }

    /**
     * @return mixed
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param mixed $manufacturer
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return mixed
     */
    public function getFreqMhz()
    {
        return $this->freq_mhz;
    }

    /**
     * @param mixed $freq_mhz
     */
    public function setFreqMhz($freq_mhz)
    {
        $this->freq_mhz = $freq_mhz;
    }

}

class User {
    private $userID;
    private $username;

    /**
     * User constructor.
     * @param $userID
     * @param $username
     */
    public function __construct($userID, $username)
    {
        $this->userID = $userID;
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

}

