<?php
require_once 'config/config.php';
//Routing: Nhận vào request và phân tích request
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ tin tức</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center text-success my-3">Việt Nam News</h1>
        <a href="views/login.php" class="btn btn-light mb-3">Đăng nhập</a>
        
        <?php
        for ($i = 0; $i < 3; $i++) {
        ?>
            <div class="card mb-3">
                <div class="card-header">
                    Featured <?= $i+1?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Tiêu đề</h5>
                    <p class="card-text">Tóm tắt nội dung</p>
                    <p class="card-text">Hình ảnh</p>
                    <p class="card-text">Ngày tạo</p>
                    <a href="#" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>