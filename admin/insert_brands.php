<?php
include("../includes/connect.php");

if (isset($_POST['insert_brand'])) {
    $brand_title = isset($_POST['brand_title']) ? $_POST['brand_title'] : '';

    if (!empty($brand_title)) {
        $select_query = "SELECT * FROM `brands` WHERE brand_title = '$brand_title'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);
        
        if ($number > 0) {
            echo "<script>alert('This Brand is present in the database')</script>";
        } else {
            $insert_query = "INSERT INTO `brands` (brand_title) VALUES ('$brand_title')";
            $result = mysqli_query($con, $insert_query);
            if ($result) {
                echo "<script>alert('Brand has been inserted successfully')</script>";
            }
        }
    }
}
?>

<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2 m-5">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-info p-2" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="brands" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-2 w-10">
        <input type="submit" class="bg-info border-0 px-5 p-2 my-3" name="insert_brand" value="Insert Brand">
    </div>
</form>
