<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="text-center mt-5">Đăng nhập</h1>
    <?php
    $error = isset($_GET['error']) ? urldecode($_GET['error']) : '';
    if (!empty($error)): ?>
        <div class="alert alert-danger mt-3"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <form class="mt-3">
        <div class="mb-3">
            <label for="username" class="form-label">Tên đăng nhập</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Đăng nhập</button>
    </form>
</div>
</body>
</html>
<?php

if ($user->getRole() == 1) {
    header("Location: views/admin/index.php");
    exit;
} else {
    header("Location: views/user/index.php");
    exit;
}
?>
