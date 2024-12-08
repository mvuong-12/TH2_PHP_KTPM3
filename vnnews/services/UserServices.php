<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/tlunews/TH2_PHP_KTPM3/vnnews/models/User.php';

class UserService {
    private $db;

    public function __construct() {
        // Kết nối cơ sở dữ liệu (cấu hình trong config.php)
        require_once $_SERVER['DOCUMENT_ROOT'] . '/tlunews/TH2_PHP_KTPM3/vnnews/config/config.php';
        $this->db = $connection;
    }

    // Kiểm tra tên đăng nhập đã tồn tại
    public function isUsernameExist($username) {
        $query = "SELECT COUNT(*) FROM users WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetchColumn() > 0; // Trả về true nếu tồn tại
    }

    // Xử lý đăng ký
    public function register($username, $password, $role = 0) { // Mặc định role là 0 (người dùng thường)
        $query = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);

        if ($stmt->execute()) {
            $id = $this->db->lastInsertId();
            return new User($id, $username, $password, $role);
        }
        return null; // Nếu đăng ký thất bại
    }

    // Xử lý đăng nhập
    public function login($username, $password) {
        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return new User($user['id'], $user['username'], $user['password'], $user['role']);
        }
        return null; // Sai thông tin đăng nhập
    }
    // Lấy tất cả người dùng
    public function getAllUsers() {
        $query = "SELECT * FROM users";
        $stmt = $this->db->query($query);

        $users = [];
        while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $users[] = new User($user['id'], $user['username'], $user['password'], $user['role']);
        }
        return $users;
    }

}
?>
