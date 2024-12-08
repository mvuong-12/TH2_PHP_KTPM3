<?php
//Routing: Nhận vào request và phân tích request
session_start();
if (($_SESSION["admin"] === true))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="bg-light text-white py-3">
        <div class="container">
        <h1 class="text-center text-success my-3">Việt Nam News (Khu vực quản trị viên)</h1>
        <hr>
        <div class="d-flex flex-row-reverse bd-highlight">
            <a href="../logout.php" class="btn btn-danger">Đăng xuất</a>
        </div>
        </div>
    </header>
    <div class="container my-3">
        <div class="d-flex justify-content-around">
            <a href="list/list_users.php" class="btn btn-primary">Quản lý người dùng</a>
            <a href="list/list_categories.php" class="btn btn-primary">Quản lý thể loại</a>
            <a href="list/list_news.php" class="btn btn-primary">Quản lý tin tức</a>
        </div>
        <div class="d-flex justify-content-center my-4">
            <img src="https://icolor.vn/wp-content/uploads/2024/08/co-nuoc-viet-nam-la-gi-e1667528714698.jpg" alt="Hình ảnh Việt Nam" class="img-fluid rounded w-50">
        </div>
    </div>
    <!-- Footer -->
    <footer class="bg-secondary text-white text-center py-3 mt-5">
        <p>&copy; 2024 Việt Nam News. All Rights Reserved.</p>
    </footer>
</body>
</html>
<?php
}
?>