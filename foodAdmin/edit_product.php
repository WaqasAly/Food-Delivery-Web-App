<?php

include("header.php");

$query = "SELECT * FROM category";
$categories = db::getRecords($query);

$query = "SELECT * FROM products";
$products = db::getRecords($query);

?>
<script>
    $(document).ready(function () {
        $('#category').change(function () {
            var category_id = $(this).find('option:selected').val();
            alert(category_id);
            $.ajax({
                url: "get_sub_category.php",
                type: "POST",
                data: "category_id=" + category_id,
                success: function (response) {
                    $("#subcategory").html(response);
                },
            });
        });
    });
</script>
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-lg-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Product - Add
                Product</h4>
        </div>

        <div class="header-elements ">
            <div class="d-flex justify-content-center">
                <?php
                if (isset($_GET["status"]) && $_GET["status"] == 6) {

                    ?>
                    <div class="alert alert-success alert-styled-right alert-arrow-right alert-dismissible"
                        style="margin-top : 7%;">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        <span class="font-weight-semibold">Well done!</span> Data Uploaded.
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Product</span>
                <span class="breadcrumb-item active">Add Product</span>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
<!-- Elastic textarea -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit Product</h5>
    </div>


    <div class="card-body">
        <form method="post" action="action.php" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h6 class="font-weight-semibold">Products</h6>

                        <div class="form-group">

                            <select id="Product" name="product" rows="1" cols="4" class="form-control elastic">
                                <option>No option Selected</option>
                                <?php
                                if ($products != Null) {
                                    foreach ($products as $product) {
                                        ?>

                                        <option value="<?php echo $product['id']; ?>">
                                            <?php echo $product['name']; ?>
                                        </option>



                                        <?php
                                    }
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h6 class="font-weight-semibold">Category</h6>

                        <div class="form-group">

                            <select id="category" name="category" rows="1" cols="4" class="form-control elastic">
                                <option>No option Selected</option>
                                <?php
                                if ($categories != Null) {
                                    foreach ($categories as $category) {
                                        ?>

                                        <option value="<?php echo $category['id']; ?>">
                                            <?php echo $category['CategoryName']; ?>
                                        </option>



                                        <?php
                                    }
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h6 class="font-weight-semibold">Sub Category</h6>

                         <div class="form-group" >

                            <select id="subcategory" name="subcategory" rows="1" cols="4" class="form-control elastic">
                                <option >No option Selected</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h6 class="font-weight-semibold">Product Name</h6>

                        <div class="form-group">
                            <textarea type="text" name="name" rows="1" cols="4" class="form-control elastic"
                                placeholder="Enter product Name"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h6 class="font-weight-semibold">Images</h6>

                        <div class="form-group">
                            <input type="file" multiple name="file[]" rows="1" cols="4" class="form-control elastic"
                                placeholder="Enter product Name"></input>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h6 class="font-weight-semibold">Number of Reviews</h6>

                        <div class="form-group">
                            <textarea type="text" name="rating" rows="1" cols="4" class="form-control elastic"
                                placeholder="Enter reviews"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h6 class="font-weight-semibold">Price</h6>

                        <div class="form-group">
                            <textarea type="text" name="price" rows="1" cols="4" class="form-control elastic"
                                placeholder="Enter Price"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h6 class="font-weight-semibold">Total Quantity</h6>

                        <div class="form-group">
                            <textarea type="text" name="tqtty" rows="1" cols="4" class="form-control elastic"
                                placeholder="Enter Quantity"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h6 class="font-weight-semibold">Tthreshold Quantity</h6>

                        <div class="form-group">
                            <textarea type="text" name="threshqtty" rows="1" cols="4" class="form-control elastic"
                                placeholder="Enter Threshold Quantity"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" name="edit_product" class="btn btn-primary">Submit form</button>
        </form>
    </div>
</div>
<!-- /elastic textarea -->
<?php

include("footer.php");

?>