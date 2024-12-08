<?php
// Kết nối đến cơ sở dữ liệu
require_once '../../../config/config.php';

// Truy vấn danh sách người dùng từ cơ sở dữ liệu
$query = "SELECT * FROM users"; // Giả sử bảng 'users' chứa thông tin người dùng
$stmt = $connection->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="text-center my-4">Danh sách người dùng</h1>
    <a href="../../../views/user/add.php" class="btn btn-success mb-3">Thêm người dùng</a>

    <!-- Bảng danh sách người dùng -->
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Tên người dùng</th>
            <th>Mật khẩu</th>
            <th>Vai trò</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['username'] ?></td>
                <td><?= $user['password'] ?></td>
                <td><?= $user['role'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>