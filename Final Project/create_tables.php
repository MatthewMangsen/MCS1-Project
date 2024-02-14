<?php
include('connect.php');

//Create tables if they don't exisit
$product_table = "PRODUCTS";
$product_sql = "CREATE TABLE IF NOT EXISTS $product_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price VARCHAR(50) NOT NULL,
    image VARCHAR(255) NOT NULL
)";

$user_table = "LOGIN";
$user_sql = "CREATE TABLE IF NOT EXISTS $user_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    adminlevel VARCHAR(1) DEFAULT 'u' NOT NULL
)";

$cart_table = "CART";
$cart_sql = "CREATE TABLE IF NOT EXISTS $cart_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price VARCHAR(50) NOT NULL,
    image VARCHAR(255) NOT NULL,
    quantity VARCHAR(5) NOT NULL
)";



// Create tables
mysqli_query($conn, $product_sql) or die('Product table creation query failed: ' . mysqli_error($conn));
mysqli_query($conn, $user_sql) or die('User table creation query failed: ' . mysqli_error($conn));
mysqli_query($conn, $cart_sql) or die('Cart table creation query failed: ' . mysqli_error($conn));

// Check if admin data already exists
$check_admin_sql = "SELECT * FROM $user_table WHERE username = 'Matthew' AND password = 'Mangsen'";
$result = mysqli_query($conn, $check_admin_sql) or die('Checking admin query failed: ' . mysqli_error($conn));

if (mysqli_num_rows($result) == 0) {
    // Insert admin data
    $insert_mattadmin_sql = "INSERT INTO $user_table (username, password, adminlevel) 
                          VALUES ('Matthew', 'Mangsen', 'a')";
    mysqli_query($conn, $insert_mattadmin_sql) or die('Inserting admin query failed: ' . mysqli_error($conn));

    echo "Admin data inserted successfully!";
} else {
    //echo "Admin data already exists!";
}
?>
