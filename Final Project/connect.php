<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Webpage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection: Unable to connect! " . $conn->connect_error);
  }
  //echo "Connection: Connected Successfully!";

?>