<?php

$host  = "localhost"; // Database host
$user  = "root"; // Database user
$pass  = ""; // Database password
$db    = "user_db"; // Database name

$conn = new mysqli($host, $user, $pass, $db); // Create connection
if($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error; // Display error message
} else {
    // echo "Connected successfully"; // Uncomment for debugging
}
?>