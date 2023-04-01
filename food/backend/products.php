<?php

    class Products{
        private $id;
        private $name;
        private $category_id;
        private $price;
        private $rating;
        private $image;
        private $available_qtty;
        private $threshold_qtty;
        private $ordered_qtty;
        function __construct($name, $category_id, $price, $rating, $image, $available_qtty, $threshold_qtty, $ordered_qtty, $id)
        {
            $this->id = $id;
            $this->name = $name;
            $this->category_id = $category_id;
            $this->price = $price;
            $this->rating = $rating;
            $this->image = $image;
            $this->available_qtty = $available_qtty;
            $this->threshold_qtty = $threshold_qtty;
            $this->ordered_qtty = $ordered_qtty;

        }

        //getters
        public function getName()
        {
            return $this->name;
        }
        public function getCategory_id()
        {
            return $this->category_id;

        }
        //getId
        public function getId()
        {
            return $this->id;
        }
        public function getPrice()
        {
            return $this->price;
        }
        public function getRating()
        {
            return $this->rating;
        }
        public function getImage()
        {
            return $this->image;
        }
        public function getAvailable_qtty()
        {
            return $this->available_qtty;

        }
        public function getThreshold_qtty()
        {
            return $this->threshold_qtty;

        }
        public function getOrdered_qtty()
        {
            return $this->ordered_qtty;

        }
        public function setName($name)
        {
            $this->name = $name;
        }
        
        //setters
        public function setCategory_id($category_id)
        {
            $this->category_id = $category_id;
        }
        public function setPrice($price)
        {
            $this->price = $price;
        }
        public function setRating($rating)
        {
            $this->rating = $rating;
        }
        public function setImage($image)
        {
            $this->image = $image;
        }
        public function setAvailable_qtty($available_qtty)
        {
            $this->available_qtty = $available_qtty;
        }
        public function setThreshold_qtty($threshold_qtty)
        {
            $this->threshold_qtty = $threshold_qtty;
        }
        public function setOrdered_qtty($ordered_qtty)
        {
            $this->ordered_qtty = $ordered_qtty;
        }



    }
?>