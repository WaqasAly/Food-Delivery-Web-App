<?php
include 'backend/productCRUD.php';
session_start();
if (!isset($_SESSION["email"])) {
    echo "<script>location='login.php'</script>";
}
include "header.php";
if (isset($_GET['status'])) {
    $product = productCRUD::getProductById($_GET['status']);
    $rating = $product->getRating();
    $total = $product->getAvailable_qtty();
    if ($product->getOrdered_qtty() != NULL) {
        $total = $total + $product->getOrdered_qtty();
    }
    $rating = $rating / $total * 100;
} else {
    echo "<script>location='userAccount.php'</script>";
}
$category = categoryCRUD::getCategoryById($product->getCategory_id());

?>

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span>
                    <?php echo $category->getCategoryName() ?>
                </a> <span></span> <?php echo $product->getName() ?>
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50 mt-30">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="<?php echo '../foodAdmin/images/products/'.$product->getImage()?>" alt="product image" />
                                    </figure>
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <h2 class="title-detail">
                                    <?php echo $product->getName() ?>
                                </h2>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: <?php echo $rating?>%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">$<?php echo $product->getPrice() ?></span>
                                    </div>
                                </div>
                                <div class="detail-extralink mb-50">
                                    <div class="product-extra-link2">
                                        <button type="submit" onclick="windows.location.href = 'backend/shop-cart.php?status=1'" class="button button-add-to-cart"><i
                                                class="fi-rs-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include "footer.php";
?>