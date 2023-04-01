<?php

include("header.php");
$query = "SELECT * FROM credentials WHERE person = 'admin'";
$admins = db::getRecords($query);
?>
<script>
        $(document).ready(function() {
        $('#algos').change(function() {
            var category_id = $(this).find('option:selected').val();
            alert(category_id);
            $.ajax({
                url: "get_admin_sorted.php",
                type: "POST",
                data:  "id=" + category_id,
                success: function(response) {
                    $("#table1").html(response);
                },
            });
        });
    });
</script>
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-lg-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - View - Admin
            </h4>
        </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">View</span>
                <span class="breadcrumb-item active">User</span>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Bordered table</h5>
        </div>
        <div class="row" style="margin: 10px;">
            <div class="col-lg-12">
                <div class="mb-3">
                    <h6 class="font-weight-semibold">Sort</h6>

                    <div class="form-group">

                        <select id="algos" name="algos" rows="1" cols="4" class="form-control elastic">
                            <option value="0">Bubble Sort</option>
                            <option value="1">Selection Sort</option>
                            <option value="2">Insertion Sort</option>
                            <option value="3">Merge Sort</option>
                            <option value="4">Quick Sort</option>
                            <option value="5">Heap Sort</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Person</th>
                    </tr>
                </thead>
                <tbody id ="table1">
                    <?php
                if($admins!= NULL)
                    {
                        foreach ($admins as $value) {
                            echo "<tr>";
                            echo "<td>" . $value['id'] . "</td>";
                            echo "<td>" . $value['fname'] . "</td>";
                            echo "<td>" . $value['lname'] . "</td>";
                            echo "<td>" . $value['email'] . "</td>";
                            echo "<td>" . $value['person'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>