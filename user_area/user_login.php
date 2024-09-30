<?php
include('../includes/connect.php');

if (isset($_POST['user_login'])) {
    $user_username = mysqli_real_escape_string($con, $_POST['user_username']); 
    $user_password = $_POST['user_password'];
    $select_query = "SELECT * FROM `user_table` WHERE user_name = '$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $user_ip = getIPAddress();  

    // cart item 
    $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address = '$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);      
    $row_count_cart = mysqli_num_rows($row_count_cart); 
    if ($row_count > 0) {
        $row_data = mysqli_fetch_assoc($result);
        if (password_verify($user_password, $row_data['user_password'])) {
            echo "<script>alert('Login Successfully');</script>";
            // echo "<script>alert('Login Successfully'); window.location='your_redirect_page.php';</script>"; 
        } else {
            echo "<script>alert('Invalid Credentials');</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-12 col-xl-6">
                <form action="" method="post">
                    <!-- Username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" name="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" />
                    </div>

                    <!-- Password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required" />
                    </div>

                    <div class="mt-4">
                        <input type="submit" value="Login" class="btn btn-info px-3" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="user_registration.php" class="text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>