<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id']) || !$_SESSION['logged_in']) {
    echo json_encode(null);
    exit;
}

$stmt = $pdo->prepare("SELECT id, name, username, gmail, address, phone FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    echo json_encode($user);
} else {
    echo json_encode(null);
}
?>