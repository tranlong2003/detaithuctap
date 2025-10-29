<?php
include 'config.php';
$stmt = $pdo->query("SELECT * FROM congviec ORDER BY id DESC");
$congviecs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tuyển Dụng 24h</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Inter',Segoe UI,Roboto,Arial}
body{background:#f3f6f9;color:#222}
header{background:#008037;color:#fff;padding:16px 5%;display:flex;align-items:center;justify-content:space-between;box-shadow:0 2px 6px rgba(0,0,0,0.15)}
header h1{font-size:1.6rem;font-weight:600;display:flex;align-items:center;gap:8px}
header h1 i{color:#fff}
nav a{color:#fff;text-decoration:none;margin-left:20px;font-weight:500;transition:0.3s}
nav a:hover{color:#ffeb3b}
.search-box{margin:35px auto;display:flex;justify-content:center;align-items:center;gap:8px;width:90%}
.search-box input{width:60%;padding:12px 15px;border-radius:10px;border:1px solid #ccc;box-shadow:inset 0 1px 4px rgba(0,0,0,0.05);font-size:15px}
.search-box button{background:#008037;color:#fff;padding:12px 20px;border:none;border-radius:10px;cursor:pointer;transition:.3s;font-weight:600}
.search-box button:hover{background:#00682b;transform:translateY(-1px)}

.container{width:90%;max-width:1200px;margin:auto;padding-bottom:60px}
.container h2{margin:25px 0;color:#008037;font-size:1.4rem;font-weight:700}

.job-card{
  background:#fff;
  border-radius:14px;
  padding:22px 25px;
  margin:20px 0;
  box-shadow:0 3px 12px rgba(0,0,0,0.07);
  transition:all .3s ease;
  border-left:6px solid #008037;
}
.job-card:hover{
  transform:translateY(-4px);
  box-shadow:0 8px 18px rgba(0,0,0,0.12);
}
.job-title{
  font-weight:700;
  font-size:1.25rem;
  color:#008037;
  margin-bottom:8px;
}
.job-info{
  font-size:15px;
  color:#444;
  line-height:1.6;
}
.job-info p{margin:4px 0;display:flex;align-items:center;gap:6px}
.job-info i{color:#008037;min-width:18px}
.apply-btn{
  margin-top:12px;
  background:#008037;
  color:#fff;
  border:none;
  padding:10px 16px;
  border-radius:8px;
  cursor:pointer;
  transition:all .3s;
  font-weight:600;
}
.apply-btn:hover{background:#00682b;transform:translateY(-2px)}

footer{
  background:#008037;
  color:#fff;
  text-align:center;
  padding:15px;
  font-size:.9rem;
  margin-top:40px;
}
</style>
</head>
<body>
<header>
  <h1><i class="fa-solid fa-briefcase"></i> Tuyển Dụng 24h</h1>
  <nav>
    <a href="index.php">Trang chủ</a>
    <a href="login.php">Đăng nhập</a>
    <a href="register.php">Đăng ký</a>
  </nav>
</header>

<form method="GET" action="index.php" style="max-width:800px;margin:20px auto;text-align:center;">
  <input type="text" name="keyword" placeholder="Tìm công việc, vị trí..." 
         value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>"
         style="padding:10px 15px;width:55%;border-radius:8px;border:1px solid #ccc;">

  <button type="submit" style="background:#00b14f;color:#fff;padding:10px 18px;border:none;
          border-radius:8px;cursor:pointer;margin-left:8px;">
    <i class="fa-solid fa-magnifying-glass"></i> Tìm kiếm
  </button>
</form>


<div class="container">
  <h2>🎯 Danh sách công việc mới nhất</h2>
  <?php if(count($congviecs) > 0): ?>
    <?php foreach($congviecs as $cv): ?>
      <div class="job-card">
        <div class="job-title"><i class="fa-solid fa-briefcase"></i> <?= htmlspecialchars($cv['tencongviec']) ?></div>
        <div class="job-info">
          <p><i class="fa-solid fa-building"></i><b>Công ty:</b> <?= htmlspecialchars($cv['tencty'] ?? 'Công ty TNHH ABC') ?></p>
          <p><i class="fa-solid fa-location-dot"></i><b>Địa điểm:</b> <?= htmlspecialchars($cv['diadiem'] ?? 'Hà Nội, Việt Nam') ?></p>
          <p><i class="fa-solid fa-sack-dollar"></i><b>Mức lương:</b> <?= htmlspecialchars($cv['mucluong'] ?? '15 - 20 triệu / tháng') ?></p>
        </div>
       <a href="login.php" style="text-decoration:none;">
  <button class="apply-btn">
    <i class="fa-solid fa-paper-plane"></i> Ứng tuyển ngay
  </button>
</a>

        <a href="chitiet.php?id=<?= $cv['id'] ?>" style="margin-left:10px;color:#008037;font-weight:600;text-decoration:none;">Xem chi tiết &rarr;</a>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p>Hiện chưa có công việc nào được đăng.</p>
  <?php endif; ?>
</div>

<footer>
  © 2025 - Website Tuyển Dụng 24h | Designed by Long Trần
</footer>
</body>
</html>
