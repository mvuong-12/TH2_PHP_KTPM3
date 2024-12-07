<?php
//Routing: Nhận vào request và phân tích request
session_start();
if (($_SESSION["user"] != true))
{
    header("Location: views/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center text-success my-3">Việt Nam News</h1>
        <div class="d-flex bd-highlight mb-3">
            <a href="#" class="btn btn-success mb-3 me-auto">Thông tin tài khoản</a>
            <a href="../logout.php" class="btn btn-danger mb-3 ms-auto">Đăng xuất</a>
        </div>       
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
                    <a href="#" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>