<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/tlunews/TH2_PHP_KTPM3/vnnews/services/UserService.php';

// Kiểm tra nếu người dùng chưa đăng nhập
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$userService = new UserService();
$user = $_SESSION['user']; // Lấy người dùng từ session

// Xử lý sửa thông tin
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $role = $_POST['role'];

    $userService->updateUser($user->getId(), $username, $role);
    $_SESSION['user'] = $userService->getUserById($user->getId()); // Cập nhật thông tin người dùng trong session

    header("Location: detail.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Sửa thông tin người dùng</h1>
    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label for="username" class="form-label">Tên đăng nhập</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user->getUsername()); ?>" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Vai trò</label>
            <select class="form-select" id="role" name="role" required>
                <option value="1" <?= $user->getRole() == 1 ? 'selected' : ''; ?>>Quản trị viên</option>
                <option value="0" <?= $user->getRole() == 0 ? 'selected' : ''; ?>>Người dùng</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
    </form>
</div>
</body>
</html>
