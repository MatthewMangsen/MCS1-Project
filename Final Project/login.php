<?php
session_start();

include('connect.php');


$button = "submit";
if(array_key_exists($button, $_POST)){

    formAction();
}

function formAction(){


    global $conn;
    
    // Database values
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    // Assemble SQL statement
    $sql = "SELECT username, adminlevel
            FROM LOGIN
            WHERE username='$username' AND password='$password'
            ";

    // Attempt to access database
    try{
        // Get returned data
        $returned = $conn->query($sql);

        // Check that user exists
        if($returned->num_rows > 0){
            // User exists
            // Save necessary user data to _SESSION
            $row = $returned->fetch_assoc();
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['adminlevel'] = $row['adminlevel'];

            // Redirect user out of login page
            header("Location: index.php");

        }
        else{
            // User doesn't exist
            $error = "Account could not be found";
        }

    }
    catch (Exception $error){
        echo "Exception caught: $error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/account.css">
    <title>Login Page</title>
</head>
<body>
    <!-- Start Navigation -->
    <?php include 'nav.php' ?>
    <!-- End Navigation -->

    <div class="login">
    <h3>Login Form</h3>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit"  name = "submit" value="Login">
    </form>

    <div class="login-register">
    <h4> Don't have an Account? Register Here: <a href ="register.php">Click Me!</a> </h4>
    
</div>
    <?php
    if (isset($error)) {
        echo "<p>$error</p>";
    }
    ?>
    </div>
</body>
</html>
