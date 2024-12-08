<?php
// Cấu hình thông tin kết nối cơ sở dữ liệu
$host = 'localhost';        // Địa chỉ máy chủ MySQL
$dbname = 'tintuc';         // Tên cơ sở dữ liệu
$username = 'root';         // Tên người dùng MySQL
$password = '';             // Mật khẩu MySQL (để trống nếu không có)

// Tạo kết nối với cơ sở dữ liệu
try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Thiết lập chế độ lỗi cho PDO
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage());
}
?>
