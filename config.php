<?php
session_start();

$host = "localhost";
$dbname = "quanlytuyendung";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

// Lấy thông tin người dùng đang đăng nhập
function current_user() {
    if (!isset($_SESSION['user_id'])) return null;
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM taikhoan WHERE id=?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
