<?php

    include("header.php");

?>
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-lg-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Slider - Add Banner</h4>
        </div>

        <div class="header-elements ">
            <div class="d-flex justify-content-center">
            <?php
                if(isset($_GET["status"]) && $_GET["status"]==6)
                {
                    
                ?>
                <div class="alert alert-success alert-styled-right alert-arrow-right alert-dismissible" style="margin-top : 7%;">
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
                <span class="breadcrumb-item active">Slider</span>
                <span class="breadcrumb-item active">Add Banner</span>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
<!-- Elastic textarea -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Add Banner</h5>
    </div>

    <div class="card-body">
        <form method="post" action="action.php">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    <h6 class="font-weight-semibold">Heading</h6>

                    <div class="form-group">
                        <textarea type="text"  name="heading" rows="1" cols="4" class="form-control elastic" placeholder="Enter Heading" required></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    <h6 class="font-weight-semibold">Description</h6>

                    <div class="form-group">
                        <textarea type="text" name="description" rows="4" cols="4" class="form-control elastic" placeholder="Textarea" required></textarea>
                    </div>

                    
                </div>
            </div>
        </div>
        <button type="submit" name="add_banner" class="btn btn-primary">Submit form</button>
    </form>
    </div>
</div>
    <!-- /elastic textarea -->
    <?php

    include("footer.php");

?>
