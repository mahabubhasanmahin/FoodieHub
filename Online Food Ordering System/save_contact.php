<?php
include "db.php"; 

if (!isset($_POST["name"], $_POST["email"], $_POST["message"])) {
    echo "missing_data";
    exit;
}

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
if (!$stmt) {
    echo "prepare_failed";
    exit;
}

$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "db_error: " . $stmt->error;
}
?>
