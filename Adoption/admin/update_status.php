<?php
session_start();
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
  $action = $_POST['action'];

  if (!$id || !in_array($action, ['approve', 'reject'])) {
    $_SESSION['message'] = "Invalid input.";
    header("Location: admin_dashboard.php#adoption-applications");
    exit();
  }

  $status = ($action === 'approve') ? 'approved' : 'rejected';

  $stmt = $conn->prepare("UPDATE applications SET status = ? WHERE id = ?");
  $stmt->bind_param("si", $status, $id);

  if ($stmt->execute()) {
    $_SESSION['message'] = "Application has been $status.";
  } else {
    $_SESSION['message'] = "Failed to update application status.";
  }

  $stmt->close();
  $conn->close();
  
  header("Location: admin_dashboard.php#adoption-applications");
  exit();
}

// If not POST request, just redirect
header("Location: admin_dashboard.php");
exit();
