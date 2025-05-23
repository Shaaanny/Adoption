<?php
include 'connect.php';

if (isset($_POST['donation'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $message = $_POST['message'];
    $paymentMethod = $_POST['paymentMethod'];

    $insertQuery = "INSERT INTO donations (name, email, amount, message, payment_method) 
                    VALUES ('$name', '$email', '$amount', '$message', '$paymentMethod')";  
    if ($conn->query($insertQuery) === TRUE) {
        // Redirect with success (optional: pass a success flag or session var)
        header("Location: donate.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
