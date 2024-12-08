<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simple hardcoded validation
    if ($username === 'admin' && $password === 'password') {
        echo "Đăng nhập thành công!";
    } else {
        echo "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}
?>