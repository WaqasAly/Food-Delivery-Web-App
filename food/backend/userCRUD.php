<?php
include_once('database.php');
include_once("user.php");

class userCrud
{
    public static function getAllUsers()
    {
        $query = "SELECT * FROM credentials";
        $result = db::getRecords($query);
        $users = array();
        if ($result) {
            foreach ($result as $row) {
                $user = new user($row['id'], $row['username'], $row['password'], $row['fname'], $row['lname'], $row['email']);
                array_push($users, $user);
            }
        }
        return $users;
    }
    public static function getUserById($id)
    {
        $query = "SELECT * FROM credentials WHERE id = '$id'";
        $result = db::getRecord($query);
        $user = new user($result['id'], $result['username'], $result['password'], $result['fname'], $result['lname'], $result['email']);
        return $user;
    }
    public static function getUserByUsername($username)
    {
        $query = "SELECT * FROM credentials WHERE username = '$username'";
        $result = db::getRecord($query);
        $user = new user($result['id'], $result['username'], $result['password'], $result['fname'], $result['lname'], $result['email']);
    }
    //return 0 if user not found
    //return 1 if user found
    public static function checkUser($username, $password)
    {
        $query = "SELECT * FROM credentials WHERE email = '$username'";
        $result = db::getRecord($query);
        if ($result) {
            if (password_verify($password, $result['password'])) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    //get person by email
    public static function getPerson($email)
    {
        $query = "SELECT person FROM credentials WHERE email = '$email'";
        $result = db::getRecord($query);
        return $result['person'];
    }
    //get user by email
    public static function getUserByEmail($email)
    {
        $query = "SELECT * FROM credentials WHERE email = '$email'";
        $result = db::getRecord($query);
        return $result;
    }
}

?>