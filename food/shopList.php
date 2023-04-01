<?php

session_start();
if (!isset($_SESSION["email"])) {
    echo "<script>location='login.php'</script>";
}
include_once("backend/categoryCRUD.php");
include_once("backend/productCRUD.php");
$categories = categoryCRUD::getAllCategories();
include "header.php";
if(isset($_GET["status"])){
    $products = productCRUD::getProductByCategory($_GET["status"]);
}
else{
    $products = productCRUD::getAllProducts();
}
?>
<main class="main">
    <div class="container mb-30">
        <div class="row">
            <div class="col-lg-4-5">
                <div class="product-list mb-50">
                    <?php
                        $count = 50;
                    foreach ($products as $product) {
                        $count--;
                        $category = categoryCRUD::getCategoryById($product->getCategory_id());
                        $rating = $product->getRating();
                                $total = $product->getAvailable_qtty();
                                if ($product->getOrdered_qtty() != NULL) {
                                    $total = $total + $product->getOrdered_qtty();
                                }
                                $rating = $rating / $total * 100;
                        ?>
                    <!--single product-->
                    <div class="product-cart-wrap">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <div class="product-img-inner">
                                    <a href="<?php echo ('shop-product.php?status='.$product->getId())?>">
                                        <img class="default-img"  alt="" src="<?php echo '../foodAdmin/images/products/' .$product->getImage();?>"/>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="sale">sale</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="<?php echo ('shop-product.php?status='.$product->getId())?>"><?php echo $category->getCategoryName();?></a>
                            </div>
                            <h2><a href="<?php echo ('shop-product.php?status='.$product->getId())?>"><?php echo $product->getName();?></a></h2>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: <?php echo $rating?>%"></div>
                                </div>
                            </div>
                            <div class="product-price">
                                <span>$<?php echo $product->getPrice();?> </span>
                            </div>
                            <div class="mt-30">
                                <a aria-label="Buy now" class="btn" href="<?php echo ('shop-cart.php?status='.$product->getId())?>"><i
                                        class="fi-rs-shopping-cart mr-5"></i>Add to Cart</a>
                                
                            </div>
                        </div>
                    </div>
                    <?php
                        if($count == 0){
                            break;
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                <div class="sidebar-widget widget-category-2 mb-30">
                    <h5 class="section-title style-1 mb-30">Category</h5>
                    <ul>
                    <?php
                        $count = 0;
                        foreach ($categories as $category) {
                            $count++;
                            ?>
                            <li>
                                <a href="<?php echo ('shopList.php?status='.$category->getId())?>"> <img
                                        src="<?php echo '../foodAdmin/images/products/' . $category->getImage(); ?>"
                                        alt="" />
                                    <?php echo $category->getCategoryName() ?>
                                </a>
                            </li>
                            <?php
                            if ($count == 5) {
                                break;
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="main">
    <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="position-relative newsletter-inner">
                        <div class="newsletter-content">
                            <h2 class="mb-20">
                                Stay home & get your daily <br />
                                needs from our shop
                            </h2>
                            <p class="mb-45">Start You'r Daily Shopping with <span class="text-brand">Nest Mart</span>
                            </p>
                            <form class="form-subcriber d-flex">
                                <input type="email" placeholder="Your emaill address" />
                                <button class="btn" type="submit">Subscribe</button>
                            </form>
                        </div>
                        <img src="assets/imgs/banner/banner-9.png" style=" width : 400px ; height: 400px "
                            alt="newsletter" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                        data-wow-delay="0">
                        <div class="banner-icon">
                            <img src="assets/imgs/theme/icons/icon-1.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Best prices & offers</h3>
                            <p>Order in your cravings</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                        data-wow-delay=".1s">
                        <div class="banner-icon">
                            <img src="assets/imgs/theme/icons/icon-2.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">250Rs./delivery</h3>
                            <p>24/7 amazing services</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                        data-wow-delay=".2s">
                        <div class="banner-icon">
                            <img src="assets/imgs/theme/icons/icon-3.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Great daily deal</h3>
                            <p>When you sign up</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                        data-wow-delay=".3s">
                        <div class="banner-icon">
                            <img src="assets/imgs/theme/icons/icon-4.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Wide assortment</h3>
                            <p>Mega Discounts</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                        data-wow-delay=".5s">
                        <div class="banner-icon">
                            <img src="assets/imgs/theme/icons/icon-6.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Safe delivery</h3>
                            <p>Within 30 days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp"
                        data-wow-delay="0">
                        <div class="logo mb-30">
                            <a href="index.php" class="mb-15"><img src="assets/imgs/theme/logo.svg" alt="logo" /></a>
                            <p class="font-lg text-heading">Fast Food Delivery Web</p>
                        </div>
                        <ul class="contact-infor">
                            <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong>
                                <span>Department of Computer Science - UET Lahore</span></li>
                            <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Call
                                    Us:</strong><span>(+92)-334-8076605</span></li>
                            <li><img src="assets/imgs/theme/icons/icon-email-2.svg"
                                    alt="" /><strong>Email:</strong><span><a
                                        href="https://wp.alithemes.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="780b19141d38361d0b0c561b1715">waqasghani14@gmail.com</a></span>
                            </li>
                            <li><img src="assets/imgs/theme/icons/icon-clock.svg"
                                    alt="" /><strong>Hours:</strong><span>10:00 - 18:00, Mon - Sat</span></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <h4 class="widget-title">Company</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact_us.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="widget-title">Account</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="login.php">Sign In</a></li>
                        <li><a href="shop-cart.php">View Cart</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                    <h4 class="widget-title">Popular</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Burger</a></li>
                        <li><a href="#">Sandwich</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget widget-install-app col wow animate__animated animate__fadeInUp"
                    data-wow-delay=".5s">
                    <h4 class="widget-title">Install App</h4>
                    <p class="">From App Store or Google Play</p>
                    <div class="download-app">
                        <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active"
                                src="assets/imgs/theme/app-store.jpg" alt="" /></a>
                        <a href="#" class="hover-up mb-sm-2"><img src="assets/imgs/theme/google-play.jpg" alt="" /></a>
                    </div>
                    <p class="mb-20">Secured Payment Gateways</p>
                    <img class="" src="assets/imgs/theme/payment-method.png" alt="" />
                </div>
            </div>
    </section>
    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <p class="font-sm mb-0">&copy; 2022, <strong class="text-brand">FoodBear</strong> - Made by ❤️ <br />All
                    rights reserved</p>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>Follow Us</h6>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img src="assets/imgs/theme/loading.gif" alt="" />
            </div>
        </div>
    </div>
</div>
<!-- Vendor JS-->
<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="assets/js/plugins/slick.js"></script>
<script src="assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="assets/js/plugins/waypoints.js"></script>
<script src="assets/js/plugins/wow.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.js"></script>
<script src="assets/js/plugins/magnific-popup.js"></script>
<script src="assets/js/plugins/select2.min.js"></script>
<script src="assets/js/plugins/counterup.js"></script>
<script src="assets/js/plugins/jquery.countdown.min.js"></script>
<script src="assets/js/plugins/images-loaded.js"></script>
<script src="assets/js/plugins/isotope.js"></script>
<script src="assets/js/plugins/scrollup.js"></script>
<script src="assets/js/plugins/jquery.vticker-min.js"></script>
<script src="assets/js/plugins/jquery.theia.sticky.js"></script>
<script src="assets/js/plugins/jquery.elevatezoom.js"></script>
<!-- Template  JS -->
<script src="assets/js/main2cc5.js?v=5.6"></script>
<script src="assets/js/shop2cc5.js?v=5.6"></script>
</body>


</html>