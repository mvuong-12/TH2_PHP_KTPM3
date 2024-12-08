<?php
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user']; // Lấy người dùng từ session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết thông tin người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Thông tin người dùng</h1>
    <table class="table table-bordered mt-4">
        <tr>
            <th>Tên đăng nhập</th>
            <td><?= htmlspecialchars($user->getUsername()); ?></td>
        </tr>
        <tr>
            <th>Vai trò</th>
            <td><?= $user->getRole() == 1 ? 'Quản trị viên' : 'Người dùng'; ?></td>
        </tr>
    </table>
</div>
</body>
</html>
