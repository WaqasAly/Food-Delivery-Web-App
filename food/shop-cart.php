<?php

session_start();
if (!isset($_SESSION["email"])) {
    echo "<script>location='login.php'</script>";
}
include_once 'backend/customerCRUD.php';
include_once 'backend/customer.php';
include_once 'backend/database.php';
include 'header.php';
$total = 0;
$products = array();
if(isset($_GET["status"]))
{
    if($_GET["status"] == 1)
    {
        $email = $_SESSION["email"];
        $customer = customerCRUD::getCustomerByEmail($email);
        if($customer == NULL)
        {
            echo "<script>alert('first update your adress')</script>";
            echo "<script>location='userAccount.php'</script>";
        }
        $id1 = $customer->getId();
        $query = "SELECT * FROM cart WHERE customer_id = '$id1'";
        $results = db::getRecords($query);
        if($results != NULL)
        {
            foreach ($results as $row) {
                $query = "SELECT * FROM products WHERE id = '$row[product_id]'";
                
                $result = db::getRecord($query);
                array_push($products, $result);
            }
        }
    }
    else
    {
        $email = $_SESSION["email"];
        $customer = customerCRUD::getCustomerByEmail($email);
        if($customer == NULL)
        {
            
            echo "<script>alert('first update your adress')</script>";
            echo "<script>location='userAccount.php'</script>";
        }

        $id = $_GET["status"];
        $query = "SELECT * FROM products WHERE id = '$id'";
        $result = db::getRecord($query);
        //add product in tobedelivered in database
        $adress = $customer->getAdress();
        $id1 = $customer->getId();
        $query = "INSERT INTO cart (customer_id, product_id) VALUES ('$id1','$result[id]')";
        db::insertRecord($query);
        $query = "SELECT * FROM cart WHERE customer_id = '$id1'";
        $results = db::getRecords($query);
        $products = array();
        foreach ($results as $row) {
            $query = "SELECT * FROM products WHERE id = '$row[product_id]'";
            $result = db::getRecord($query);
            array_push($products, $result);
        }
    }
}
else
{
    echo "<script>location='login.php'</script>";
}
?>
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Cart
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Your Cart</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span class="text-brand">3</span> products in your cart</h6>
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Unit Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($products as $pro) {
                                ?>
                            <tr class="pt-30">
                                <td class="image product-thumbnail pt-40"><img src="../foodAdmin/images/products/<?php echo $pro['image']?>"
                                        alt="#"></td>
                                <td class="product-des product-name">
                                    <h6 class="mb-5"><a class="product-name mb-10 text-heading"
                                            href="#"><?php echo $pro['name']?></a>
                                    </h6>
                                </td>
                                <td class="price" data-title="Price">
                                    <h4 class="text-body">$<?php echo $pro['price']?> </h4>
                                </td>
                            </tr>
                            <?php
                            $total = $total + $pro['price'];
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                 </div>
            <div class="col-lg-4">
                <div class="border p-md-4 cart-totals ml-30">
                    <div class="table-responsive">
                        <table class="table no-border">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Subtotal</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">$<?php echo $total?></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="col" colspan="2">
                                        <div class="divider-2 mt-10 mb-10"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Shipping</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h5 class="text-heading text-end">Free</h4></td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Estimate for</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h5 class="text-heading text-end">United Kingdom</h4></td>
                                </tr>
                                <tr>
                                    <td scope="col" colspan="2">
                                        <div class="divider-2 mt-10 mb-10"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Total</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">$<?php echo $total?></h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="#" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>