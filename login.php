<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Đăng nhập</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card shadow mx-auto" style="max-width:400px">
    <div class="card-body">
      <h4 class="text-center text-success mb-4">Đăng nhập</h4>
      <form method="POST">
        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
        <input type="password" name="matkhau" class="form-control mb-3" placeholder="Mật khẩu" required>
        <button class="btn btn-success w-100" name="dangnhap">Đăng nhập</button>
      </form>
      <p class="mt-3 text-center small">Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></p>
    </div>
  </div>
</div>

<?php
if (isset($_POST['dangnhap'])) {
  $email = $_POST['email'];
  $matkhau = md5($_POST['matkhau']);
  $stmt = $pdo->prepare("SELECT * FROM taikhoan WHERE email=? AND matkhau=?");
  $stmt->execute([$email, $matkhau]);
  $user = $stmt->fetch();

  if ($user) {
    $_SESSION['user_id'] = $user['id'];
    if ($user['role'] == 'ungvien') header("Location: ungvien/home.php");
    elseif ($user['role'] == 'nhatuyendung') header("Location: nhatuyendung/home.php");
    else header("Location: index.php");
  } else {
    echo "<script>alert('Sai thông tin đăng nhập!');</script>";
  }
}
?>
</body>
</html>
