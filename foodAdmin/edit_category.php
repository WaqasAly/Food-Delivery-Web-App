<?php

    include("header.php");

    $query = "SELECT * FROM category";
    $categories = db::getRecords($query);

?>
<!-- <script>
    $(document).ready(function() {
        $('#category').change(function() {
            var category_id = $(this).find('option:selected').val();
            alert(category_id);
            $.ajax({
                url: "get_category.php",
                type: "POST",
                data: "category_id=" + category_id,
                success: function(response) {
                    $("#name").html(response);
                },
            });
        });
    });
</script> -->
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-lg-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Category - Edit Category</h4>
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
                <span class="breadcrumb-item active">Category</span>
                <span class="breadcrumb-item active">Edit Category</span>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
<!-- Elastic textarea -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit Category</h5>
    </div>

    <div class="card-body">
        <form method="post" action="action.php" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h6 class="font-weight-semibold">Category</h6>

                         <div class="form-group" >

                            <select id="category" name="category" rows="1" cols="4" class="form-control elastic" required>
                                <option >No option Selected</option>
                                <?php
                        if($categories!=Null)
                        {
                            foreach($categories as $category)
                            {
                        ?>

                                <option value="<?php echo $category['id'];?>"><?php echo $category['CategoryName'];?></option>

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
                        <h6 class="font-weight-semibold">Change Category Name</h6>

                        <div id = "name" class="form-group">
                        <textarea type="text" name="name"  rows="1" cols="4" class="form-control elastic" placeholder="Rename category"></textarea>
                        </div>
                    </div>
                </div>
            </div><div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h6 class="font-weight-semibold">Change Image</h6>

                        <div class="form-group">
                            <input type="file" multiple name="file[]" id="name"rows="1" cols="4" class="form-control elastic" placeholder="Insert Image"></input>
                        </div>
                    </div>
                </div>
            </div>
           
            <button type="submit" name="edit_category" class="btn btn-primary">Submit form</button>
        </form>
    </div>
</div>
<!-- /elastic textarea -->
<?php

    include("footer.php");

?>
