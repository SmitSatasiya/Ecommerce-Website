<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website-Cart Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">

    <style>
        .cart_img {
            /* width: 100px; */
            height: 100px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="./img/logo1-removebg-preview.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cart_item(); ?></sup></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- calling cart function -->
        <?php
        cart();
        ?>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Login</a>
                </li>
            </ul>
        </nav>

        <!-- Third Child -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">communications at the heart of ecommerce and community</p>
        </div>

        <!-- fourth child-table -->
        <div class="container">
            <div class="row">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan="2">Operations</th>
                        </tr>
                    </thead>
                    <!-- php code to display dynamic data -->
                    <?php
                    global $con;
                    $get_ip_add = getIPAddress();
                    $total_price = 0;
                    $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                    $result = mysqli_query($con, $cart_query);
                    while ($row = mysqli_fetch_array($result)) {
                        $product_id = $row['product_id'];
                        $select_products = "Select * from `products` where product_id='$product_id'";
                        $result_products = mysqli_query($con, $select_products);
                        while ($row_product_price = mysqli_fetch_array($result_products)) {
                            $product_price = array($row_product_price['product_price']);
                            $price_table = $row_product_price['product_price'];
                            $product_title = $row_product_price['product_title'];
                            $product_image1 =  $row_product_price['product_image1'];
                            $product_values = array_sum($product_price);
                            $total_price += $product_values;

                    ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $product_title ?></td>
                                    <td><img src="./img/<?php echo $product_image1 ?>" class="cart_img" alt=""></td>
                                    <td><input type="text" name="" id="" class="form-input w-50"></td>
                                    <td><?php echo $price_table ?>/-</td>
                                    <td><input type="checkbox"></td>
                                    <td>
                                        <button class="bg-info btn">Update</button>
                                        <button class="bg-info btn">Remove</button>
                                    </td>
                                </tr>
                        <?php
                        }
                    }
                        ?>
                            </tbody>
                </table>

                <!-- subtotal -->
                <div class="d-flex">
                    <h4 class="px-3">Subtotal:<strong class="text-info"><?php echo $total_price ?>/-</strong></h4>
                    <a href="index.php"><button class="bg-info px-3 py-2 btn mx-3">Continue Shopping</button></a>
                    <a href="#"><button class="bg-secondary text-light px-3 py-2 btn ">Checkout</button></a>
                </div>
            </div>
        </div>

        <!-- Last Child -->
        <!-- include Footer -->
        <?php include("./includes/footer.php") ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>