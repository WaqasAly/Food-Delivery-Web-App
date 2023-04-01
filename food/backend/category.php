<?php
    class Category
    {
        private $id;
        private $CategoryName;
        private $image;

        public function __construct($id, $CategoryName, $image)
        {
            $this->id = $id;
            $this->CategoryName = $CategoryName;
            $this->image = $image;
        }

        //getters
        public function getId(){
            return $this->id;
        }
        public function getCategoryName(){
            return $this->CategoryName;
        }
        public function getImage(){
            return $this->image;
        }
    }
?>