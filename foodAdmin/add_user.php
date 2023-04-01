<?php

include("header.php");

$query = "SELECT * FROM category";
$categories = db::getRecords($query);

?>
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-lg-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Slider - Add
                User</h4>
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
                } else if (isset($_GET["status"]) && $_GET["status"] == 4) {

                    ?>
                    <div class="alert alert-warning alert-styled-right alert-arrow-right alert-dismissible"
                        style="margin-top : 7%;">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        <span class="font-weight-semibold">Sorry</span> email arleady exists.
                    </div>
                    <?php
                }
                if (isset($_GET["status"]) && $_GET["status"] == 3) {

                    ?>
                    <div class="alert alert-warning alert-styled-right alert-arrow-right alert-dismissible"
                        style="margin-top : 7%;">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        <span class="font-weight-semibold">Sorry</span> Password and confirm password are not same.
                    </div>
                    <?php
                }
                if (isset($_GET["status"]) && $_GET["status"] == 5) {

                    ?>
                    <div class="alert alert-warning alert-styled-right alert-arrow-right alert-dismissible"
                        style="margin-top : 7%;">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        <span class="font-weight-semibold">Sorry!</span>
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
                <span class="breadcrumb-item active">User</span>
                <span class="breadcrumb-item active">Add User</span>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
<!-- Elastic textarea -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Add User</h5>
    </div>

    <div class="card-body">
        <form method="post" action="action.php">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h6 class="font-weight-semibold">First Name</h6>

                        <div class="form-group">
                            <textarea type="text" name="fname" rows="1" cols="4" class="form-control elastic"
                                placeholder="Enter First Name" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h6 class="font-weight-semibold">Last Name</h6>

                        <div class="form-group">
                            <textarea type="text" name="lname" rows="1" cols="4" class="form-control elastic"
                                placeholder="Enter Last Name" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h6 class="font-weight-semibold">Email</h6>

                        <div class="form-group">
                            <input type="email" name="email" rows="1" cols="4" class="form-control elastic"
                                placeholder="Enter email" required></input>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h6 class="font-weight-semibold">Password</h6>

                        <div class="form-group">
                            <input type="password" class="form-control" minlength="8" placeholder="Password" name="password" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h6 class="font-weight-semibold">Confirm</h6>

                        <div class="form-group">
                            <input type="password" class="form-control" minlength="8" placeholder="Password" name="cpassword"
                                required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h6 class="font-weight-semibold">Person</h6>

                        <div class="form-group">
                            <textarea type="text" name="person" rows="1" cols="4" class="form-control elastic"
                                placeholder="Enter person" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" name="add_user" class="btn btn-primary">Submit form</button>
        </form>
    </div>
</div>
<!-- /elastic textarea -->
<?php

include("footer.php");

?>