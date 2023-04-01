<?php
session_start();
include("database.php");

if (isset($_POST["login"])) {
    /*save data of form in var*/
    $email = $_POST["email"];
    $password = $_POST["password"];

    /*generating query*/
    $query = "Select * from credentials where email='$email'";

    /*passing query to method to get record*/
    $res = db::getRecord($query);
    if ($res != NULL && password_verify("$password", $res['password'])) {
        $_SESSION["email"] = $email;
        echo "<script>location='dashboard.php'</script>";
    } else {
        echo "<script>location='index.php?status=1'</script>";
    }
}

if (isset($_GET["admin_logout"])) {
    session_destroy();
    echo "<script>location='../food/index.php'</script>";
}

if (isset($_POST["signup"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $person = $_POST["person"];

    $query2 = "Select * from credentials where email='$email'";
    $res2 = db::getRecord($query2);

    if ($password != $cpassword) {
        echo "<script>location='signUp.php?status=3'</script>";
    } elseif ($res2 != null) {
        echo "<script>location='signUp.php?status=4'</script>";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query3 = "INSERT INTO credentials(fname,lname,email,password,person) VALUES ('$fname','$lname','$email','$password','$person')";
        $res3 = db::insertRecord($query3);
        if ($res3 != null) {
            echo "<script>location='index.php'</script>";
        } else {
            echo "<script>location='signUp.php?status=5'</script>";
        }
    }
}

if (isset($_POST["add_banner"])) {
    $heading = $_POST["heading"];
    $description = $_POST["description"];

    $query = "INSERT INTO banner(heading,description) VALUES ('$heading','$description')";
    $res = db::insertRecord($query);

    if ($res != NULL) {
        echo "<script>location='add_banner.php?status=6'</script>";
    }
}
if (isset($_POST["edit_banner"])) {
    $id = $_POST["banner"];
    if ($_POST["name"] != NULL) {

        $heading = $_POST["name"];
        $query = "UPDATE banner SET heading='$heading' WHERE id=$id";
        $res = db::insertRecord($query);
    }
    if ($_POST["description"] != NULL) {

        $description = $_POST["description"];
        $query = "UPDATE banner SET description='$description' WHERE id=$id";
        $res = db::insertRecord($query);
    }

    echo "<script>location='edit_banner.php?status=6'</script>";

}

if (isset($_POST["add_product"])) {
    $image_name = NULL;

    foreach ($_FILES['file']['name'] as $i => $name) {
        $file = rand(1000,100000) . "-" . $_FILES['file']['name'][$i];
        $file_loc = $_FILES['file']['tmp_name'][$i];
        $file_size = $_FILES['file']['size'][$i];
        $file_type = $_FILES['file']['type'][$i];
        $folder = "images/products/";
        $new_size = $file_size / 1024;
        $new_file_name = strtolower($file);
        $final_file = str_replace(' ', '-', $new_file_name);

        if (move_uploaded_file($file_loc, $folder . $final_file)) {
            $image_name = $image_name . $final_file . ",";

        } else {
            echo "<script>location='index.php?status=2'</script>";
        }
    }
    $category = $_POST["category"];
    $name = $_POST["name"];
    $rating = $_POST["rating"];
    $price = $_POST["price"];
    $tqtty = $_POST["tqtty"];
    $threshqtty = $_POST["threshqtty"];



    $arr = explode(',', $image_name);

    $size = sizeof($arr);

    for ($i = 0; $i < $size - 1; $i++) {
        $img_name = $arr[$i];
        $query = "INSERT INTO products(category_id,name,rating,price,image,available_qtty,threshold_qtty,ordered_qtty) VALUES ($category,'$name','$rating','$price','$img_name','$tqtty','$threshqtty','0')";
        $res = db::insertRecord($query);
    }

    if ($res != NULL) {
        echo "<script>location='add_products.php?status=6'</script>";
    }
}

if (isset($_POST["edit_product"])) {
    $res = null;
    $image_name = NULL;
    $id = $_POST["product"];
    $category_id = $_POST["category"];
    if ($_FILES['file']['name'] != NULL) {
        foreach ($_FILES['file']['name'] as $i => $name) {
            $file = rand(1000, 100000) . "-" . $_FILES['file']['name'][$i];
            $file_loc = $_FILES['file']['tmp_name'][$i];
            $file_size = $_FILES['file']['size'][$i];
            $file_type = $_FILES['file']['type'][$i];
            $folder = "images/products/";
            $new_size = $file_size / 1024;
            $new_file_name = strtolower($file);
            $final_file = str_replace(' ', '-', $new_file_name);

            if (move_uploaded_file($file_loc, $folder . $final_file)) {
                $image_name = $image_name . $final_file . ",";

            }

            $arr = explode(',', $image_name);

            $size = sizeof($arr);
            if ($image_name != NULL) {
                for ($i = 0; $i < $size - 1; $i++) {
                    $img_name = $arr[$i];

                    $query = "UPDATE products SET image='$image_name' WHERE id=$id";

                    $res = db::insertRecord($query);
                }
            }
        }
    }
    if($category_id != "No option Selected")
    {
        $query = "UPDATE products SET category_id='$category_id' WHERE id=$id";

        $res = db::insertRecord($query);
    }
    $name = $_POST["name"];
    if($name != NULL)
    {
        $query = "UPDATE products SET name='$name' WHERE id=$id";

        $res = db::insertRecord($query);
    }
    $rating = $_POST["rating"];
    if($rating != NULL)
    {
        $query = "UPDATE products SET rating='$rating' WHERE id=$id";

        $res = db::insertRecord($query);
    }
    $price = $_POST["price"];
    if($price != NULL)
    {
        $query = "UPDATE products SET price='$price' WHERE id=$id";

        $res = db::insertRecord($query);
    }
    $tqtty = $_POST["tqtty"];
    if($tqtty != NULL)
    {
        $query = "UPDATE products SET available_qtty='$tqtty' WHERE id=$id";

        $res = db::insertRecord($query);
    }
    $threshqtty = $_POST["threshqtty"];
    if($threshqtty != NULL)
    {
        $query = "UPDATE products SET threshold_qtty='$threshqtty' WHERE id=$id";

        $res = db::insertRecord($query);
    }
        echo "<script>location='edit_product.php?status=6'</script>";
}

if (isset($_POST["add_category"])) {
    $image_name = NULL;

    foreach ($_FILES['file']['name'] as $i => $name) {
        $file = rand(1000, 100000) . "-" . $_FILES['file']['name'][$i];
        $file_loc = $_FILES['file']['tmp_name'][$i];
        $file_size = $_FILES['file']['size'][$i];
        $file_type = $_FILES['file']['type'][$i];
        $folder = "images/products/";
        $new_size = $file_size / 1024;
        $new_file_name = strtolower($file);
        $final_file = str_replace(' ', '-', $new_file_name);

        if (move_uploaded_file($file_loc, $folder . $final_file)) {
            $image_name = $image_name . $final_file . ",";

        } else {
            echo "<script>location='index.php?status=2'</script>";
        }
    }
    $category = $_POST["name"];

    $arr = explode(',', $image_name);

    $size = sizeof($arr);

    for ($i = 0; $i < $size - 1; $i++) {
        $img_name = $arr[$i];


        $query = "INSERT INTO category(CategoryName , imagename) VALUES ('$category','$img_name')";
        $res = db::insertRecord($query);
    }

    if ($res != NULL) {
        echo "<script>location='add_category.php?status=6'</script>";
    }
}
if (isset($_POST["edit_category"])) {
    $image_name = NULL;
    $id = $_POST["category"];
    if ($_FILES['file']['name'] != NULL) {
        foreach ($_FILES['file']['name'] as $i => $name) {
            $file = rand(1000, 100000) . "-" . $_FILES['file']['name'][$i];
            $file_loc = $_FILES['file']['tmp_name'][$i];
            $file_size = $_FILES['file']['size'][$i];
            $file_type = $_FILES['file']['type'][$i];
            $folder = "images/products/";
            $new_size = $file_size / 1024;
            $new_file_name = strtolower($file);
            $final_file = str_replace(' ', '-', $new_file_name);

            if (move_uploaded_file($file_loc, $folder . $final_file)) {
                $image_name = $image_name . $final_file . ",";

            }

            $arr = explode(',', $image_name);

            $size = sizeof($arr);
            if ($image_name != NULL) {
                for ($i = 0; $i < $size - 1; $i++) {
                    $img_name = $arr[$i];

                    $query = "UPDATE category SET imagename='$image_name' WHERE id=$id";

                    $res = db::insertRecord($query);
                }
            }
        }
    }
    if ($_POST["name"] != NULL) {

        $category = $_POST["name"];
        $query = "UPDATE category SET CategoryName='$category' WHERE id=$id";
        $res = db::insertRecord($query);
    }

    echo "<script>location='edit_category.php?status=6'</script>";

}
if (isset($_POST["add_user"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $person = $_POST["person"];

    $query2 = "Select * from credentials where email='$email'";
    $res2 = db::getRecord($query2);

    if ($password != $cpassword) {
        echo "<script>location='add_user.php?status=3'</script>";
    } elseif ($res2 != null) {
        echo "<script>location='add_user.php?status=4'</script>";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query3 = "INSERT INTO credentials(fname,lname,email,password,person) VALUES ('$fname','$lname','$email','$password','$person')";
        $res3 = db::insertRecord($query3);
        if ($res3 != null) {
            echo "<script>location='add_user.php'</script>";
        } else {
            echo "<script>location='add_user.php?status=5'</script>";
        }
    }
}