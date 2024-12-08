<?php
include("read_model.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Việt Nam News</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-light py-3">
        <div class="container text-center">
            <h1 class="text-success">Việt Nam News</h1>
        </div>
    </header>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Nút đăng nhập -->
            <a href="login_view.php" class="btn btn-success header-login">
                Đăng nhập <i class="bi bi-box-arrow-in-right"></i>
            </a>

            <!-- Ô tìm kiếm -->
            <form class="d-flex search" action="search.php" method="GET">
                <input class="form-control me-2" type="search" placeholder="Tìm kiếm tin tức" name="q">
                <button class="btn btn-outline-secondary header-search" type="submit">
                    <img src="image/search_icon.png">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <!-- Các card hiển thị nội dung -->
        <div class="row">
            <?php for ($i = 0; $i < 6; $i++): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Image">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the card's content.
                            </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!-- Trang trước -->
                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">Trước</a>
                        </li>
                    <?php endif; ?>

                    <!-- Các số trang: Hiển thị tối đa 4 trang -->
                    <?php
                    // Giới hạn số trang hiển thị xung quanh trang hiện tại
                    $start = max(1, $page - 2); // Trang bắt đầu hiển thị
                    $end = min($totalPages, $page + 2); // Trang kết thúc hiển thị

                    // Nếu tổng số trang nhỏ hơn 4, hiển thị tất cả các trang
                    if ($totalPages < 4) {
                        $start = 1;
                        $end = $totalPages;
                    }

                    // Hiển thị các số trang
                    for ($i = $start; $i <= $end; $i++):
                    ?>
                        <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <!-- Trang sau -->
                    <?php if ($page < $totalPages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">Sau</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>