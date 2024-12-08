<?php
require_once '../../config/config.php';
require_once '../../services/NewsServices.php';
session_start();

// Lấy danh sách tin tức từ cơ sở dữ liệu
$newsService = new NewsService();
$newsList = $newsService->getAllNews();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .dropdown-menu a {
            cursor: pointer;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center text-success my-3">Việt Nam News</h1>

    <!-- Phần đăng nhập -->
    <?php if (isset($_SESSION['user'])): ?>
        <div class="dropdown mb-3">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Xin chào, <?= htmlspecialchars($_SESSION['user']->getUsername()); ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="../../views/user/detail.php">Xem chi tiết thông tin của bạn</a></li>
                <li><a class="dropdown-item" href="../../views/user/edit.php">Sửa thông tin của bạn</a></li>
                <li><a class="dropdown-item" href="../../views/logout.php">Đăng xuất</a></li>
            </ul>
        </div>
    <?php else: ?>
        <a href="../../views/login.php" class="btn btn-primary mb-3">Đăng nhập</a>
    <?php endif; ?>

    <!-- Danh sách tin tức -->
    <?php if (!empty($newsList)): ?>
        <?php foreach ($newsList as $news): ?>
            <div class="card mb-3">
                <div class="card-header">
                    Tin nổi bật
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($news['title']); ?></h5>
                    <p class="card-text"><?= htmlspecialchars($news['summary']); ?></p>
                    <?php if (!empty($news['image'])): ?>
                        <img src="<?= htmlspecialchars($news['image']); ?>" alt="<?= htmlspecialchars($news['title']); ?>" class="img-fluid mb-3">
                    <?php endif; ?>
                    <p class="card-text text-muted">Ngày tạo: <?= htmlspecialchars($news['created_at']); ?></p>
                    <a href="../news/detail_news.php?id=<?= $news['id']; ?>" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-warning text-center">Hiện chưa có tin tức nào.</div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
