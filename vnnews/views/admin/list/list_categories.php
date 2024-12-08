<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>

<body>
    <div class="container pt-5">
        <h1 class="text-center">Danh sách category</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success btn-primary mb-3" data-bs-toggle="modal"
            data-bs-target="#addCategory">
            Thêm mới
        </button>

        <!-- Modal -->
        <form method="post">
            <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategoryLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addCategoryLabel">Thêm mới</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="NAME">NAME</label>
                                <input type="text" class="form-control" name="NAME" id="NAME">
                            </div>
                            <input type="hidden" name="action" value="add">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-success btn-primary">Lưu</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <table class="table table-striped table-hover">
            <thead class="table-info">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (!empty($newsList)) {
                    foreach ($newsList as $item) {
                        echo '
                        <tr>
                            <td>' . $item['id'] . '</td>
                            <td>' . $item['NAME'] . '</td>
                            <td>
                                <form method="post" class="delete-form" style="display: inline-block;">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="' . $item['id'] . '">
                                    <div class="d-flex" style="gap: 10px;">
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <!-- Nút Sửa -->
                                        <button type="button" class="btn btn-warning btn-primary" data-bs-toggle="modal" data-bs-target="#editCategory' . $item['id'] . '">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </div>
                                </form>
                                <!-- Modal Edit -->
                                <form method="post">
                                    <div class="modal fade" id="editCategory' . $item['id'] . '" tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editCategoryLabel">Cập nhật thông tin</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="NAME">NAME</label>
                                                        <input type="text" class="form-control" name="NAME" id="NAME" value="' . $item['NAME'] . '">
                                                    </div>
                                                    <input type="hidden" name="id" value="' . $item['id'] . '">
                                                    <input type="hidden" name="action" value="edit">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        ';
                    }
                }
                ?>
            </tbody>

        </table>
        <!-- Phân trang -->
        <nav>
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?php echo $i == $currentPage ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

    </script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.delete-form'); // Lấy form liên quan đến nút Xóa
            const confirmDelete = confirm("Bạn có chắc chắn muốn xóa bản ghi này không?");
            if (confirmDelete) {
                form.submit(); // Nếu người dùng xác nhận, gửi form để xóa
            }
        });
    });
    </script>
</body>

</html>