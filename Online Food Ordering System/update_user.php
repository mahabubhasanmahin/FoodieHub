<?php
include "db.php";

if (!isset($_SESSION["user_id"])) {
    echo "not_logged_in";
    exit;
}

$id = $_SESSION["user_id"];
$name = $_POST["name"];
$username = $_POST["username"];
$gmail = $_POST["gmail"];
$address = $_POST["address"];
$phone = $_POST["phone"];

$stmt = $conn->prepare("UPDATE users SET name=?, username=?, gmail=?, address=?, phone=? WHERE id=?");
$stmt->bind_param("sssssi", $name, $username, $gmail, $address, $phone, $id);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}
?>
