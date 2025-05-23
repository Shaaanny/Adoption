<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? '';

    if (!empty($id)) {
        $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "User deleted successfully", "id" => $id]);
        } else {
            echo json_encode(["success" => false, "message" => "Delete failed"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Missing user ID"]);
    }
}
?>
