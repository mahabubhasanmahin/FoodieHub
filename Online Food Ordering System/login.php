<?php
session_start();
include "db.php";

$username = $_POST["username"];
$password = $_POST["password"];

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "not_found";
} elseif (!password_verify($password, $user["password"])) {
    echo "invalid";
} else {
    $_SESSION["user_id"] = $user["id"];
    unset($user["password"]);
    echo json_encode($user);
}
?>
