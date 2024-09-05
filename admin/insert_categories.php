<?php
include("../includes/connect.php");
if(isset($_POST['insert_cat'])) {
    $category_title=$_POST['cat_title'];
    $insert_query="insert into `categories` (category_title) values ('$category_title')";
    $result=mysqli_query($con,$insert_query);
    if($result) {
        echo"<script>alert('Category has been inserted successfully'</script>)";
    }
}
?>

<form action="" method="post" class="mb-2 m-5 ">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-info p-2" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-2 w-10">
        <input type="submit" class="bg-info border-0 px-5 p-2 my-3" name="insert_cat" placeholder="Insert categories">
        <!-- <button class="bg-info p-2 my-3 border-0">Insert categories</button> -->
    </div>
</form>