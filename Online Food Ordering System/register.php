<?php
include "db.php";

$name = $_POST["name"];
$username = $_POST["username"];
$gmail = $_POST["gmail"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$address = $_POST["address"];
$phone = $_POST["phone"];

$stmt = $conn->prepare("INSERT INTO users (name, username, gmail, password, address, phone) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $username, $gmail, $password, $address, $phone);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}
?>
