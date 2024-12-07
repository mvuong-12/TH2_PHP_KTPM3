<?php
class Config {
    private static $host = 'localhost';
    private static $db = 'tintuc';
    private static $user = 'root';
    private static $password = '';
    private static $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_PERSISTENT => false, // Không sử dụng kết nối bền vững (nếu không cần thiết)
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4" // Hỗ trợ tiếng Việt và ký tự đặc biệt
    ];

    private static $connection = null;

    public static function getConnection() {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db,
                    self::$user,
                    self::$password,
                    self::$options
                );
            } catch (PDOException $e) {
                // Ghi log lỗi vào file hoặc hiển thị thông báo lỗi thân thiện
                error_log("Connection failed: " . $e->getMessage());
                die("Không thể kết nối cơ sở dữ liệu. Vui lòng kiểm tra lại cấu hình!");
            }
        }
        return self::$connection;
    }
}
