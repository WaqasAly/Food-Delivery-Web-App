<?php
include_once("database.php");
include_once("user.php");
include_once("customer.php");


class customerCRUD
{
    public static function getAllCustomers()
    {
        $query = "SELECT * FROM credentials";
        $result = db::getRecords($query);
        $customers = array();
        if ($result) {
            foreach ($result as $row) {
                $query = "SELECT * FROM customeradress WHERE customer_id = '$row[id]'";
                $result = db::getRecord($query);
                $customer = new customer($row['person'], $row['password'], $row['fname'], $row['lname'], $row['email'], $row['id']);
                array_push($customers, $customer);
            }
        }
        return $customers;
    }
    public static function getCustomerById($id)
    {
        $query = "SELECT * FROM customer WHERE id = '$id'";
        $result = db::getRecord($query);
        $query = "SELECT * FROM customeradress WHERE customer_id = '$result[id]'";
        $result1 = db::getRecord($query);
        $customer = new customer($result['person'], $result['password'], $result['fname'], $result['lname'], $result['email'], $result['id']);
        return $customer;
    }
    //get customer by email
    public static function getCustomerByEmail($email)
    {
        $query = "SELECT * FROM credentials WHERE email = '$email'";
        $result = db::getRecord($query);
        $id = $result['id'];
        $query = "SELECT * FROM customer WHERE user_id = '$id'";
        $result1 = db::getRecord($query);
        if ($result1['adress'] == NULL) {
            return;
        }
        $customer = new customer($result['person'], $result['password'], $result['fname'], $result['lname'], $result['email'], $result['id']);
        return $customer;


    }
    public static function getCustomerByEmail1($email)
    {
        $query = "SELECT * FROM credentials WHERE email = '$email'";
        $result = db::getRecord($query);
        $id = $result['id'];
        $query = "SELECT adress FROM customer WHERE user_id = '$id'";
        $result1 = db::getRecord($query);
        $customer = new customer($result['person'], $result['password'], $result['fname'], $result['lname'], $result['email'], $result['id']);
        $r = $result1['adress'];
        $customer->setAdress($r);
        return $customer;


    }


}
?>