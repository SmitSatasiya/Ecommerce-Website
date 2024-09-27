<?php
session_start();
if (isset($_SESSION["username"])) {
    echo "Welcome" . $_SESSION['username'];
    echo "<br>";
    echo "Password is" . $_SESSION['password'];
}else {
    echo 'please login again to continue';
}
