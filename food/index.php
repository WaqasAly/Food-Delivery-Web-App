<?php

session_start();
if (!isset($_SESSION["email"])) {
    echo "<script>location='login.php'</script>";
}
include "header.php";
include_once "backend/categoryCRUD.php";
include_once "backend/productCRUD.php";

$query2 = "select * from banner";
$result2 = db::getRecords($query2);
$categories = categoryCRUD::getAllCategories();
$products = productCRUD::getAllProducts();


?>
<main class="main">
    <section class="home-slider position-relative mb-30">
        <div class="container">
            <div class="home-slide-cover mt-30">
                <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                    <div class="single-hero-slider single-animation-wrap"
                        style="background-image: url(assets/imgs/slider/slider-1.png)">
                        <div class="slider-content">
                            <h1 class="display-2 mb-40">
                                Don't miss amazing<br />
                                deals
                            </h1>
                            <p class="mb-65">Sign up for the daily newsletter</p>
                            <form class="form-subcriber d-flex">
                                <input type="email" placeholder="Your emaill address" />
                                <button class="btn" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <?php
                        foreach ($result2 as $row) {
                            ?>
                            <div class="single-hero-slider single-animation-wrap"
                        style="background-image: url(assets/imgs/slider/slider-2.png)">
                        <div class="slider-content">
                            <h1 class="display-2 mb-40">
                                <?php echo $row['heading']?>
                            </h1>
                            <p class="mb-65"><?php echo $row['description']?></p>
                            <form class="form-subcriber d-flex">
                                <input type="email" placeholder="Your emaill address" />
                                <button class="btn" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                            <?php
                            break;
                        }
                    ?>
                </div>
                <div class="slider-arrow hero-slider-1-arrow"></div>
            </div>
        </div>
    </section>
    <!--End hero slider-->
    <section class="popular-categories section-padding">
        <div class="container wow animate__animated animate__fadeIn">
            <div class="section-title">
                <div class="title">
                    <h3>Featured Categories</h3>
                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow"
                    id="carausel-10-columns-arrows"></div>
            </div>
            <div class="carausel-10-columns-cover position-relative">
                <div class="carausel-10-columns" id="carausel-10-columns">
                    <?php
                    $temp = 13;
                    foreach ($categories as $category) {
                        $temp--;
                        $temp1 = "bg-" . $temp;
                        ?>
                        <div  class="card-2 <?php echo $temp1 ?> wow animate__animated animate__fadeInUp"
                            data-wow-delay=".1s">
                            <figure class="img-hover-scale overflow-hidden">
                                <a href="<?php echo ('shopList.php?status='.$category->getId())?>"><img
                                        src="<?php echo "../foodAdmin/images/products/" . $category->getImage() ?>"
                                        alt="" /></a>
                            </figure>
                            <h6><a href="<?php echo ('shopList.php?status='.$category->getId())?>">
                                    <?php echo $category->getCategoryName() ?>
                                </a></h6>
                            <span>26 items</span>
                        </div>
                        <?php
                        if ($temp == 0) {
                            break;
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
    <!--End category slider-->
    <section class="section-padding mb-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp"
                    data-wow-delay="0">
                    <h4 class="section-title style-1 mb-30 animated animated">Top Selling</h4>
                    <div class="product-list-small animated animated">
                        <article class="row align-items-center hover-up">
                            <?php
                            $count = 4;
                            foreach ($products as $product) {
                                $count--;
                                $rating = $product->getRating();
                                $total = $product->getAvailable_qtty();
                                if ($product->getOrdered_qtty() != NULL) {
                                    $total = $total + $product->getOrdered_qtty();
                                }
                                $rating = $rating / $total * 100;

                                ?>

                                <figure class="col-md-4 mb-0">
                                    <a href="<?php echo ('shop-product.php?status='.$product->getId())?>"><img src="<?php echo "../foodAdmin/images/products/" . $product->getImage() ?>"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html"><?php echo $product->getName() ?></a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:<?php echo $rating ?>%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$<?php echo $product->getPrice() ?></span>
                                        <!-- <span class="old-price">$33.8</span> -->
                                    </div>
                                </div>
                                <?php
                                if ($count == 0) {
                                    break;
                                }
                            }
                            ?>
                        </article>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp"
                    data-wow-delay=".1s">
                    <h4 class="section-title style-1 mb-30 animated animated">Trending Products</h4>
                    <div class="product-list-small animated animated">
                        <article class="row align-items-center hover-up">
                        <?php
                            $count = 4;
                            foreach ($products as $product) {
                                $count--;
                                $rating = $product->getRating();
                                $total = $product->getAvailable_qtty();
                                if ($product->getOrdered_qtty() != NULL) {
                                    $total = $total + $product->getOrdered_qtty();
                                }
                                $rating = $rating / $total * 100;

                                ?>

                                <figure class="col-md-4 mb-0">
                                    <a href="#"><img src="<?php echo "../foodAdmin/images/products/" . $product->getImage() ?>"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html"><?php echo $product->getName() ?></a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:<?php echo $rating ?>%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$<?php echo $product->getPrice() ?></span>
                                        <!-- <span class="old-price">$33.8</span> -->
                                    </div>
                                </div>
                                <?php
                                if ($count == 0) {
                                    break;
                                }
                            }
                            ?>
                        </article>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp"
                    data-wow-delay=".2s">
                    <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                    <div class="product-list-small animated animated">
                        <article class="row align-items-center hover-up">
                        <?php
                            $count = 4;
                            foreach ($products as $product) {
                                $count--;
                                $rating = $product->getRating();
                                $total = $product->getAvailable_qtty();
                                if ($product->getOrdered_qtty() != NULL) {
                                    $total = $total + $product->getOrdered_qtty();
                                }
                                $rating = $rating / $total * 100;

                                ?>

                                <figure class="col-md-4 mb-0">
                                    <a href="#"><img src="<?php echo "../foodAdmin/images/products/" . $product->getImage() ?>"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html"><?php echo $product->getName() ?></a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:<?php echo $rating ?>%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$<?php echo $product->getPrice() ?></span>
                                        <!-- <span class="old-price">$33.8</span> -->
                                    </div>
                                </div>
                                <?php
                                if ($count == 0) {
                                    break;
                                }
                            }
                            ?>
                        </article>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp"
                    data-wow-delay=".3s">
                    <h4 class="section-title style-1 mb-30 animated animated">Top Rated</h4>
                    <div class="product-list-small animated animated">
                        <article class="row align-items-center hover-up">
                        <?php
                            $count = 4;
                            foreach ($products as $product) {
                                $count--;
                                $rating = $product->getRating();
                                $total = $product->getAvailable_qtty();
                                if ($product->getOrdered_qtty() != NULL) {
                                    $total = $total + $product->getOrdered_qtty();
                                }
                                $rating = $rating / $total * 100;

                                ?>

                                <figure class="col-md-4 mb-0">
                                    <a href="#"><img src="<?php echo "../foodAdmin/images/products/" . $product->getImage() ?>"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html"><?php echo $product->getName() ?></a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:<?php echo $rating ?>%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>$<?php echo $product->getPrice() ?></span>
                                        <!-- <span class="old-price">$33.8</span> -->
                                    </div>
                                </div>
                                <?php
                                if ($count == 0) {
                                    break;
                                }
                            }
                            ?>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include "footer.php";
?>