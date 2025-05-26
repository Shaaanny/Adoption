<?php


include 'connect.php'; 


if(isset($_POST['donate'])) {
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $amount = $_POST['amount']; 
    $message = $_POST['message']; 
    $paymentMethod = $_POST['paymentMethod']; 

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO donations (name, email, amount, message, payment_method) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $name, $email, $amount, $message, $paymentMethod);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: thank_you.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    header("Location: donate.php");
    exit();
}
?>