<?php
include "db.php";

if (!isset($_SESSION["user_id"])) {
    echo json_encode([]);
    exit;
}

$id = $_SESSION["user_id"];
$result = $conn->query("SELECT name, username, gmail, address, phone FROM users WHERE id = $id");
$user = $result->fetch_assoc();

echo json_encode($user);
?>
