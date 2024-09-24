<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./admin.css">
    <style>
        .logo {
            height: 10%;
            width: 10%;
        }
    </style>

</head>

<body>
    <!-- Navbar -->
    <!-- first Child -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../img/logo1-removebg-preview.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-3">
                    <a href="#"><img src="../img/logo.jfif" alt="" class="admin_img"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center mx-5">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1 px-4 py-1">Insert Products</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 px-4 py-1">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1 px-4 py-1">Insert Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 px-4 py-1">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1 px-4 py-1">Insert Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 px-4 py-1">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 px-4 py-1">All Orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 px-4 py-1">All Payments</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 px-4 py-1">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 px-4 py-1">Logout</a></button>
                </div>
            </div>
        </div>

        <!-- Fourth child -->

        <div class="container my-5">
            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }
            ?>
        </div>


        <!-- Footer -->
        <div class="bg-info p-3 mt-5 text-center">
            <p>All rights reserved ©- Designed by Smit-2024</p>
        </div>
    </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>