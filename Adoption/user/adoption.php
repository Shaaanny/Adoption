<?php
session_start(); // Start the session to manage user sessions
include 'connect.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['applicationForm'])) {
    // Sanitize and validate inputs
    $name    = trim($_POST['name']);
    $age     = intval($_POST['age']);
    $address = trim($_POST['address']);
    $phone   = trim($_POST['phone']);
    $email   = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $place   = trim($_POST['place']);
    $visit   = trim($_POST['visit']);

    if ($email === false) {
        die("Invalid email format.");
    }

    // Prepare and bind statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO applications (name, age, address, phone, email, place, visit_permission) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("sisssss", $name, $age, $address, $phone, $email, $place, $visit);

        if ($stmt->execute()) {
            header("Location: homepage.php");
            exit();
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>
