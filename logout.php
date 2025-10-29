<?php
session_start();

// Xoá toàn bộ session hiện tại
$_SESSION = [];
session_destroy();

// Chuyển về trang đăng nhập
header("Location: login.php");
exit;
?>
