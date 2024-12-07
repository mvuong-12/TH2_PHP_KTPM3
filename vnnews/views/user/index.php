<?php
// Xử lý phân trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10; // Số lượng bài viết mỗi trang
$offset = ($page - 1) * $limit;

try {
    $con = new PDO('mysql:host=localhost;dbname=tintuc', 'root', '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Truy vấn dữ liệu từ bảng `news`
    $sqp = "SELECT * FROM user ORDER BY id DESC LIMIT :offset, :limit";
    $stmt = $con->prepare($sqp);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    $news = $stmt->fetchAll(); // Sử dụng biến $news để lấy dữ liệu

    // Đếm số lượng bài viết
    $countQuery = "SELECT COUNT(*) FROM user";
    $countStmt = $con->prepare($countQuery);
    $countStmt->execute();
    $totalRows = $countStmt->fetchColumn();

    $totalPages = ceil($totalRows / $limit); // Tính số trang
} catch (PDOException $e) {
    echo "Lỗi kết nối CSDL: " . $e->getMessage();
    die();
}

$con = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Quản lý Bài Viết</title>
</head>
<body>
<div class="container">
    <h1 class="text-primary text-center">QUẢN LÝ BÀI VIẾT</h1>
    <a href="views/user/login.php" class="btn btn-primary mb-3">Đăng nhập</a>
    <div class="row">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Hình ảnh</th>
                <th>Ngày đăng</th>
                <th colspan="1">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($news)): ?> <!-- Dùng biến $news -->
                <?php $counter = $offset + 1; ?>
                <?php foreach ($news as $article): ?> <!-- Dùng $article để lặp qua bài viết -->
                    <tr>
                        <td><?= $counter++; ?></td>
                        <td><?= htmlspecialchars($article['title']); ?></td> <!-- Sử dụng dữ liệu từ $article -->
                        <td><?= htmlspecialchars($article['content']); ?></td>
                        <td >
                            <img src="<?= htmlspecialchars($article['image']); ?>" >
                        </td>
                        <td><?= htmlspecialchars($article['create_at']); ?></td>
                        <td><a href="views/user/detail.php?id=<?= htmlspecialchars($article['id']); ?>"><i class="bi bi-eye"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Không có bài viết nào.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item <?= $page <= 1 ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?= $page - 1; ?>">Trước</a>
            </li>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $i == $page ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?= $page >= $totalPages ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?= $page + 1; ?>">Sau</a>
            </li>
        </ul>
    </nav>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
