<?php
include_once ("user.php");

class customer extends User
{
    private $productList;
    private $adress;

    public function __construct($person, $password, $fname, $lname, $email, $id)
    {
        $this->productList = array();
        parent::__construct($person, $password, $fname, $lname, $email, $id);
    }



    public function addProduct($product)
    {
        $this->productList[] = $product;
    }
    public function getProducts()
    {
        return $this->productList;
    }
    public function deleteProduct($product)
    {
        foreach ($this->productList as $key => $value) {
            if ($value == $product) {
                unset($this->productList[$key]);
            }
        }
    }
    public function getProduct($product)
    {
        foreach ($this->productList as $key => $value) {
            if ($value == $product) {
                return $this->productList[$key];
            }
        }
    }
    public function getAdress()
    {
        return $this->adress;
    }
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }
}
?>