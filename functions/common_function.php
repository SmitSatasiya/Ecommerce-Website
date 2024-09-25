<?php
// connect include file
include('./includes/connect.php');

// getting product
function getproducts()
{
    global $con;

    // condition to ckeck isset or not
    if (!isset($_GET['categories'])) {
        if (!isset($_GET['brands'])) {

            $select_query = "Select * from `products` order by rand() LIMIT 0,4";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_keywords = $row['product_keywords'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo " <div class='col-md-4 mb-2'>
            <div class='card' style='width: 90%; text-align:center; align-item:center;'>
                <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <a href='#' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>";
            }
        }
    }
}

//getting all products
function get_all_products()
{
    global $con;

    // condition to ckeck isset or not
    if (!isset($_GET['categories'])) {
        if (!isset($_GET['brands'])) {

            $select_query = "Select * from `products` order by rand()";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_keywords = $row['product_keywords'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo " <div class='col-md-4 mb-2'>
            <div class='card'>
                <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <a href='#' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>  
                </div>
            </div>
        </div>";
            }
        }
    }
}


// getting unique categories
function get_unique_categories()
{
    global $con;
    // condition to ckeck isset or not
    if (isset($_GET['categories'])) {
        $category_id = $_GET['categories'];
        $select_query = "Select * from `products` where category_id=$category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No stock for categories</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo " <div class='col-md-4 mb-2'>
            <div class='card'>
                <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <a href='#' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>";
        }
    }
}


// getting unique brands
function get_unique_brands()
{
    global $con;
    // condition to ckeck isset or not
    if (isset($_GET['brands'])) {
        $brands_id = $_GET['brands'];
        $select_query = "Select * from `products` where brand_id=$brands_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>This Brands is not available for services</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo " <div class='col-md-4 mb-2'>
            <div class='card'>
                <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <a href='#' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>";
        }
    }
}


// displaying brands in sidenav
function getbrands()
{
    global $con;
    $select_brands = "select * from `brands`";
    $result_brands = mysqli_query($con, $select_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title =  $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item pb-2 pt-2'><a href='index.php?brands=$brand_id' class='nav-link text-light'>$brand_title</a></li>";
    }
}

// displaying categories in sidenav
function getcategories()
{
    global $con;
    $select_categories = "select * from `categories`";
    $result_categories = mysqli_query($con, $select_categories);
    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title =  $row_data['category_title'];
        $category_id  = $row_data['category_id'];
        echo "<li class='nav-item pb-2 pt-2'><a href='index.php?categories=$category_id' class='nav-link text-light'>$category_title</a></li>";
    }
}

// searching products function
function search_product()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "Select * from `products` where product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No results match. No products found on this category!</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo " <div class='col-md-4 mb-2'>
            <div class='card'>
                <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <a href='#' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>";
        }
    }
}

// view details function
function view_details()
{
    global $con;

    // condition to ckeck isset or not
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['categories'])) {
            if (!isset($_GET['brands'])) {
                $product_id = $_GET['product_id'];

                $select_query = "Select * from `products` where product_id = $product_id";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_keywords = $row['product_keywords'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];

                    echo " <div class='col-md-4 mb-2'>
            <div class='card' style='width: 90%; text-align:center; align-item:center;'>
                <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <a href='#' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>
        
        <div class='col-md-8'>
                    <div class='row'>
                         <div class='col-md-12'>
                                <h4 class='text-center text-info mb-5'>Related products</h4>
                        </div>
                        <div class='col-md-6'>
                                <img src='./admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                        </div>
                        <div class='col-md-6'>
                                <img src='./admin/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                        </div>
                    </div>
        </div>";
                }
            }
        }
    }
}
