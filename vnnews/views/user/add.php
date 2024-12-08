<?php
// Kết nối cơ sở dữ liệu
require_once '../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Nhận thông tin từ biểu mẫu
    $username = $_POST['username'];
    $role = $_POST['role'];  // Vai trò của người dùng (0 hoặc 1)
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Mã hóa mật khẩu

    try {
        // Thêm người dùng vào cơ sở dữ liệu
        $query = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $connection->prepare($query);
        $stmt->execute(['username' => $username, 'password' => $password, 'role' => $role]);

        // Chuyển hướng về danh sách người dùng sau khi thêm thành công
        header("Location: ../admin/list/list_users.php");
        exit;
    } catch (PDOException $e) {
        // Hiển thị thông báo lỗi nếu có
        echo "Lỗi: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
    <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="text-center my-4">Thêm người dùng mới</h1>

    <form method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Tên người dùng</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Vai trò</label>
            <select class="form-control" id="role" name="role" required>
                <option value="1">Quản trị viên</option>
                <option value="0">Người dùng</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm người dùng</button>
    </form>
</div>

<script src="../../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
