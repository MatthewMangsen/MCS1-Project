<?php 

include('connect.php')?> 

<?php

if(array_key_exists('Register', $_POST)) {
    //echo "Button pressed";
    addData();
}

function addData(){

    global $conn;

    // Validate inputs
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if inputs are not empty
    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        return;
    }

    $sql = "INSERT INTO LOGIN (Username, Password)
            VALUES ('" . $username . "', '" . $password . "')";

    if (mysqli_query($conn, $sql)) {
        echo " New account created successfully";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/account.css">
    <title>Register Page</title>
</head>
<body>

    <!-- Start Navigation -->
    <?php include 'nav.php' ?>
    
    <!-- End Navigation -->
    <div class="login">
    <h3>Register</h3>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" name="Register" value="Register">

            <div class="login-register">
                <h4>Already have an account? <a href="login.php">Sign in</a>.</h4>
            </div>
    </form>
    <?php
    if (isset($error)) {
        echo "<p>$error</p>";
    }
    ?>
    </div>
</body>
</html>