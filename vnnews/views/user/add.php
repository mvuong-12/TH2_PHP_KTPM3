<?php
// Kết nối cơ sở dữ liệu
require_once '../../services/UserServices.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        $error = "Mật khẩu xác nhận không khớp.";
    } else {
        $userService = new UserService();

        // Kiểm tra nếu người dùng đã tồn tại
        if ($userService->isUsernameExist($username)) {
            $error = "Tên đăng nhập đã tồn tại.";
        } else {
            // Đăng ký người dùng mới
            $newUser = $userService->register($username, $password);

            if ($newUser) {
                header("Location: views/login.php?success=" . urlencode("Đăng ký thành công!"));
                exit;
            } else {
                $error = "Đã có lỗi xảy ra. Vui lòng thử lại.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="text-center mt-5">Đăng ký tài khoản</h1>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <form method="POST" action="add.php" class="mt-4">
        <div class="mb-3">
            <label for="username" class="form-label">Tên đăng nhập</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Xác nhận mật khẩu</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Đăng ký</button>
    </form>
    <div class="mt-3">
        <a href="../../views/login.php">Đã có tài khoản? Đăng nhập</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
