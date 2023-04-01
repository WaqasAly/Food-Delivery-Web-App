<?php
    include_once "products.php";

    class ProductDelivery
    {
        private $product;
        private $adress;
        private $ownwerName;
        private $deliveryManId;

        public function __construct($product , $adress , $ownwerName, $deliveryManId)
        {
            $this->product = $product;
            $this->adress = $adress;
            $this->ownwerName = $ownwerName;
            $this->deliveryManId = $deliveryManId;
        }

        //getters
        public function getProduct(){
            return $this->product;
        }
        public function getAdress(){
            return $this->adress;
        }
        public function getOwnwerName(){
            return $this->ownwerName;
        }
        public function getDeliveryManId(){
            return $this->deliveryManId;
        }
    }
?>