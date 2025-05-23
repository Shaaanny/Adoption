<?php

include 'connect.php'; // Include the database connection file

if(isset($_POST['signIn'])) {
    $username = $_POST['username']; // Get the user from the form
    $password = $_POST['password']; // Get the password from the form
    //$password = md5($password);

    $sql= "SELECT * FROM admin WHERE username='$username' AND password='$password'"; // Check if the user exists in the database
    $result = $conn->query($sql); 
    if($result->num_rows > 0) {
        session_start(); // Start a session
        $row=$result->fetch_assoc(); // Fetch the user data
        $_SESSION['username'] = $row['username']; // Store the user in the session
        header("Location: admin.php"); // Redirect to the dashboard page if login is successful
        //exit(); // Exit the script
    } else {
        echo "Invalid user or password"; // Display error message if login fails
    }
}
?>