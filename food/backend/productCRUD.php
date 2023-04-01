<?php
include_once("database.php");
include_once("products.php");

class productCRUD
{
    public static function getAllProducts()
    {
        $query = "SELECT * FROM products";
        $result = db::getRecords($query);
        $products = array();
        if($result)
        {
            foreach($result as $row)
            {
                $product = new Products( $row['name'],$row['category_id'], $row['price'], $row['rating'], $row['image'], $row['available_qtty'], $row['threshold_qtty'], $row['ordered_qtty'], $row['id']);
                array_push($products, $product);
            }
        }
        return $products;

    }
    //get product by category_id
    public static function getProductByCategory($category_id)
    {
        $query = "SELECT * FROM products WHERE category_id = '$category_id'";
        $result = db::getRecords($query);
        $products = array();
        if($result)
        {
            foreach($result as $row)
            {
                $product = new Products( $row['name'],$row['category_id'], $row['price'], $row['rating'], $row['image'], $row['available_qtty'], $row['threshold_qtty'], $row['ordered_qtty'], $row['id']);
                array_push($products, $product);
            }
        }
        return $products;
    }
    //get product by id
    public static function getProductByID($id)
    {
        $query = "SELECT * FROM products WHERE id = '$id'";
        $row = db::getRecord($query);
        return $product = new Products($row['name'], $row['category_id'], $row['price'], $row['rating'], $row['image'], $row['available_qtty'], $row['threshold_qtty'], $row['ordered_qtty'], $row['id']);
    }

    
}



?>