<?php
    include_once "user.php";
    class DeliveryMan extends User
    {
        private $deliveryList;
        private $deliveredList;
        public function __construct( $person, $password, $fname, $lname, $email, $id)
        {
            $this->deliveryList = array();
            $this->deliveredList = array();
            parent::__construct($person, $password, $fname, $lname, $email, $id);
        }

        //getters
        public function getDeliveryList(){
            return $this->deliveryList;
        }
        public function getDeliveredList(){
            return $this->deliveredList;
        }
        //setters
        public function setDeliveryList($deliveryList){
            $this->deliveryList = $deliveryList;
        }
        public function setDeliveredList($deliveredList){
            $this->deliveredList = $deliveredList;
        }

        //add delivery
        public function addDelivery($delivery)
        {
            $this->deliveryList[] = $delivery;
        }
        //add delivered
        public function addDelivered($delivered)
        {
            $this->deliveredList[] = $delivered;
        }
    }
?>