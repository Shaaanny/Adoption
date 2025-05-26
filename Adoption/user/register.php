<?php

include 'connect.php'; // Include the database connection file

if(isset($_POST['signUp'])) {
    $username = $_POST['username']; // Get the user from the form
    $email = $_POST['email']; // Get the email from the form
    $password = $_POST['password']; // Get the password from the form
    //$password =md5($password); // Hash the password using MD5


    // Check if the user already exists in the database
    $checkEmail = "SELECT * FROM user WHERE email='$email'";
    $result = $conn->query($checkEmail);
    if($result->num_rows > 0) {
        echo "Email already exists"; // Display error message if email exists
    } else {
        $insertQuery = "INSERT INTO user (username, email, password) 
                                    VALUES ('$username', '$email', '$password')"; // Insert the new user into the database
                if($conn->query($insertQuery) === TRUE) {
                    header("Location: index.php"); // Redirect to login page if insertion is successful
                } else {
                    echo "Error:". $conn->error; // Display error message if insertion fails
                }
    }
}

if(isset($_POST['signIn'])) {
    $username = $_POST['username']; // Get the user from the form
    $password = $_POST['password']; // Get the password from the form
    //$password = md5($password);

    $sql= "SELECT * FROM user WHERE username='$username' AND password='$password'"; // Check if the user exists in the database
    $result = $conn->query($sql); 
    if($result->num_rows > 0) {
        session_start(); // Start a session
        $row=$result->fetch_assoc(); // Fetch the user data
        $_SESSION['username'] = $row['username']; // Store the user in the session
        header("Location: homepage.php"); // Redirect to the dashboard page if login is successful
        //exit(); // Exit the script
    } else {
        echo "Invalid user or password"; // Display error message if login fails
    }
}
?>