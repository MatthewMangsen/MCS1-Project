<?php
session_start();

include('connect.php');

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Update user preferences if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["color"])) {
        // Get selected color
        $selectedColor = $_POST["color"];

        // Update user preferences in the session 
        $_SESSION["nameColor"] = $selectedColor;
    }
}
    // Fetch the password from the database
$username = $_SESSION["username"];
$sql = "SELECT password FROM LOGIN WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $password = $row['password'];
} else {
    // Handle the error if the query fails
    $password = "Error fetching password";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="assets/product.css">

    <style>
        /* In file css, to overide product css */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 120px;
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
            margin-bottom: 10px;
            font-size: 18px; 
        }


        .my-account {
            font-family: Arial, sans-serif;
        }

        .welcome,
        .username,
        .admin-level,
        #password,
        label {
            color: <?php echo isset($_SESSION["nameColor"]) ? $_SESSION["nameColor"] : "black"; ?>;
            margin-bottom: 10px;
            font-size: 20px; /* Adjusted font size */
        }

        .preferences-form {
            margin-top: 20px;
        }
    </style>

</head>
<body>

    <?php include 'nav.php' ?>

    <!-- My Account Section -->
    <div class="container">
        <h2 class="welcome">Welcome, <?php echo $_SESSION["username"]; ?>!</h2>

        <!-- Display Username -->
        <p class="username">Your username is: <?php echo $_SESSION["username"]; ?></p>

        <!-- Show Password -->
        <p class="username">Your password is: <?php echo $password; ?></p>

        <!-- Show Admin Level -->
        <p class="admin-level">Your <?php echo "Admin Level: " . $_SESSION["adminlevel"] . "<br>"; ?></p>

        <!-- User Preferences Form -->
        <form method="post" class="preferences-form">
            <label for="color" style="color: <?php echo isset($_SESSION["nameColor"]) ? $_SESSION["nameColor"] : "black"; ?>">
                Choose the color of your name and website features in your account page:
            </label>
            <select name="color" id="color">
                <option value="black">Black</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
                <option value="red">Red</option>
                <option value="ghostwhite">Ghostwhite</option>
                <option value="purple">Purple</option>
                <option value="yellow">Yellow</option>
                <option value="pink">Pink</option>
            </select>
            <button type="submit">Update Preferences</button>
        </form>
    </div>

</body>
</html>
