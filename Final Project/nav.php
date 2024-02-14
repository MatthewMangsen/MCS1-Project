<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav Page</title>

     <!--Fonts Used  -->
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="assets/shop.css">
    

</head>
<body>

<header class = "header-sticky">
    <h1> Matt's Bakery</h1>

    <ul class="nav-menu">
        <li><a href="index.php"> Home</a></li>
        <li><a href="products.php" class="btn-deal">Shop</a></li>
    </ul>
    
    <div class="nav-icon">
        <div class="dropdown">
            <!--<a href="#"><i class='bx bx-search'></i></a>-->
        </div>

        <div class="dropdown">
            <label for="userDropdown"><i class='bx bx-user'></i></label>
            <input type="checkbox" id="userDropdown" style="display: none;">
            <ul class="dropdown-list">
                <?php
                if (!isset($_SESSION["username"])) {
                    ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                    <?php
                    
                } 
                if (isset($_SESSION["adminlevel"]) && $_SESSION["adminlevel"] == "a") {
                    // Admin user
                    ?>
                    <li><a href="myaccount.php">My Account</a></li>
                    <li><a><?php echo $_SESSION["username"] ?></a></li>
                    <li><a href="admin.php">Admin</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <?php
                }
                else {
                    ?>
                    <li><a href="myaccount.php">My Account</a></li>
                    <li><a><?php echo $_SESSION["username"] ?></a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <?php
                }
                ?>

            </ul>
        </div>

        <div class="dropdown">
            <a href="cart.php"><i class='bx bx-cart'></i></a>
        </div>
    </div>

</header>

<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
</body>
</html>