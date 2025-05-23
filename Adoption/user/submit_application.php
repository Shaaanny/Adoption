<?php

include("connect.php");

$name = $_POST['name'];
$age = $_POST['age'];
$nationality = $_POST['nationality'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$occupation = $_POST['occupation'];
$otherOccupation = $_POST['otherOccupation'] ?? null;
$place = $_POST['place'];
$otherPlace = $_POST['otherPlace'] ?? null;
$allowed = $_POST['allowed'];
$support = $_POST['support'];
$visit = $_POST['visit'];
$monetary = $_POST['monetary'];
$secure = $_POST['secure'];
$responsibility = $_POST['responsibility'];
$familiar = $_POST['familiar'];

// Prepare SQL statement
$stmt = $conn->prepare("
    INSERT INTO applications (
        name, age, nationality, address, phone, email,
        occupation, other_occupation, place, other_place,
        allowed_pets, support, visit_permission, monetary_ability,
        secure_home, responsibility, familiar
    ) VALUES ($name, $age, $nationality, $address, $phone, $email, $occupation, $otherOccupation, $place, $otherPlace, $allowed, $support, $visit
     , $monetary, $secure, $responsibility, $familiar)
");

$stmt->bind_param(
    "sisssssssssssssss",
    $name, $age, $nationality, $address, $phone, $email,
    $occupation, $otherOccupation, $place, $otherPlace,
    $allowed, $support, $visit, $monetary,
    $secure, $responsibility, $familiar
);

if ($stmt->execute()) {
    echo "Application submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>