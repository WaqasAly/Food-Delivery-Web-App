<?php
    class User{
        private $id;
        private $password;
        private $fname;
        private $lname;
        private $email;
        private $person;

        

        public function __construct($person,$password, $fname, $lname, $email, $id){
            $this->password = $password;
            $this->fname = $fname;
            $this->lname = $lname;
            $this->email = $email;
            $this->id = $id;
            $this->person = $person;
        }

        //getters

        public function getPassword(){
            return $this->password;
        }

        //get id
        public function getId(){
            return $this->id;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getFname(){
            return $this->fname;
        }

        //setters
        public function setPassword($password){
            $this->password = $password;
        }
        public function setFname($fname){
            $this->fname = $fname;
        }
        public function setLname($lname){
            $this->lname = $lname;
        }
        public function setEmail($email){
            $this->email = $email;
        }

    }
?>