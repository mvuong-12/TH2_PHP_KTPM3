<?php
require_once '../../../services/UserServices.php';

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
        <div class="alert alert-warning text-center mt-4">Hiện chưa có người dùng nào.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered mt-4">
                <thead class="table-primary text-center">
                <tr>
                    <th>#</th>
                    <th>Tên đăng nhập</th>
                    <th>Vai trò</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $index => $user): ?>
                    <tr>
                        <td class="text-center"><?= $index + 1; ?></td>
                        <td><?= htmlspecialchars($user->getUsername()); ?></td>
                        <td class="text-center">
                            <?= $user->getRole() == 1 ? 'Quản trị viên' : 'Người dùng'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
