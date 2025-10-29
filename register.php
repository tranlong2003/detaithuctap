<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Đăng ký tài khoản</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card shadow mx-auto" style="max-width:420px">
    <div class="card-body">
      <h4 class="text-center text-success mb-3">Đăng ký tài khoản</h4>
      <form method="POST">
        <input type="text" name="hoten" class="form-control mb-3" placeholder="Họ và tên" required>
        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
        <input type="password" name="matkhau" class="form-control mb-3" placeholder="Mật khẩu" required>
        <select name="role" class="form-select mb-3" required>
          <option value="">-- Chọn loại tài khoản --</option>
          <option value="ungvien">Ứng viên</option>
          <option value="nhatuyendung">Nhà tuyển dụng</option>
        </select>
        <button class="btn btn-success w-100" name="dangky">Đăng ký</button>
      </form>
      <p class="mt-3 text-center small">Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
    </div>
  </div>
</div>

<?php
if (isset($_POST['dangky'])) {
  $hoten = $_POST['hoten'];
  $email = $_POST['email'];
  $matkhau = md5($_POST['matkhau']);
  $role = $_POST['role'];
  $stmt = $pdo->prepare("INSERT INTO taikhoan (hoten, email, matkhau, role, ngaytao) VALUES (?,?,?,?,NOW())");
  $stmt->execute([$hoten, $email, $matkhau, $role]);
  echo "<script>alert('Đăng ký thành công!');window.location='login.php';</script>";
}
?>
</body>
</html>
