<?php
session_start();

//include my connection and tables
include('connect.php'); 
include "create_tables.php";

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
   header("Location: login.php"); // Redirect to the login page
   exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/shop.css">


    <title>Matt's Bakery</title>
</head>
<body>
    <!-- Start Navigation -->
    <?php include 'nav.php' ?>
    <!-- End Navigation -->

    <!--Start Main Body -->
    <!--<h3>Welcome to Matt's Bakery! <?php //echo $_SESSION['username']; ?>!</h3> -->

    <!-- My main content -->
    <main> 
        <div class="sticky">
        <div class="slide-area">
            <div class="image-container">
                <img class="slide-img" src="assets/images/bread2.jpeg">
                <div class="slide-content">
                    <!--<span>Delicious Treats</span> -->
                    <h1>Featured Product: Assorted Baked Goods!</h1>
                    <!--<h2>Shop Now</h2> -->
                     <!--<a href="shop.php" class="btn-deal">Shop Now</a> -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- End Main Body -->

    <!-- Start Products -->
   <?php include "products.php"; ?>
    <!-- End Products -->

</body>
</html>