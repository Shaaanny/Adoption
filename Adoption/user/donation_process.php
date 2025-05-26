<?php
session_start();
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request.");
}

// Collect and validate form data
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$amount = $_POST['amount'] ?? '';
$message = trim($_POST['message'] ?? '');
$paymentMethod = $_POST['paymentMethod'] ?? '';

$errors = [];

if (!$name) $errors[] = "Name is required.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
if (!is_numeric($amount) || $amount <= 0) $errors[] = "Valid donation amount is required.";
if (!$paymentMethod) $errors[] = "Payment method is required.";

// If errors exist, show them (you can also redirect back with session flash if preferred)
if ($errors) {
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
    echo "<a href='donate.php'>Go Back</a>";
    exit;
}

// Insert into the database
$stmt = $conn->prepare("INSERT INTO donations (name, email, amount, message, payment_method) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssdss", $name, $email, $amount, $message, $paymentMethod);

if ($stmt->execute()) {
    // Redirect to success message or show inline confirmation
    header("Location: donate.php?success=true");
    exit;
} else {
    echo "Something went wrong. Please try again.";
}

$stmt->close();
$conn->close();
?>
