<?php
// Kết nối cơ sở dữ liệu
require_once $_SERVER['DOCUMENT_ROOT'] . '/tlunews/TH2_PHP_KTPM3/vnnews/services/UserService.php';

$userService = new UserService();
$users = $userService->getAllUsers(); // Lấy tất cả người dùng từ cơ sở dữ liệu
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Danh sách người dùng</h1>
    <?php if (empty($users)): ?>
        <div class="alert alert-warning">Chưa có người dùng nào.</div>
    <?php else: ?>
        <table class="table table-bordered mt-4">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên đăng nhập</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user->getId()); ?></td>
                    <td><?= htmlspecialchars($user->getUsername()); ?></td>
                    <td>
                        <?= $user->getRole() == 1 ? 'Quản trị viên' : 'Người dùng'; ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?= $user->getId(); ?>" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="delete.php?id=<?= $user->getId(); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?');">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <div class="mt-3">
        <a href="add.php" class="btn btn-success">Thêm người dùng mới</a>
    </div>
</div>
</body>
</html>
