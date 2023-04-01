<?php
    include_once("database.php");
    include_once("category.php");

    class categoryCRUD
    {
        public static function getAllCategories()
        {
            $query = "SELECT * FROM category";
            $result = db::getRecords($query);
            $categories = array();
            if($result)
            {
                foreach($result as $row)
                {
                    $category = new Category($row['id'], $row['CategoryName'], $row['imagename']);
                    array_push($categories, $category);
                }
            }
            return $categories;
        }
        public static function getCategoryById($id)
        {
            $query = "SELECT * FROM category WHERE id = '$id'";
            $result = db::getRecord($query);
            $category = new Category($result['id'], $result['CategoryName'], $result['imagename']);
            return $category;
        }
        
    }
?>