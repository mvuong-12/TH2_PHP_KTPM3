<?php
require_once 'models/User.php';

class UserService {
    private $db;

    public function __construct() {
        // Kết nối cơ sở dữ liệu (giả sử bạn đã cấu hình kết nối trong config.php)
        require_once 'config/config.php';
        $this->db = $connection;
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
            // Trả về đối tượng User nếu tìm thấy
            return new User($user['id'], $user['username'], $user['password'], $user['role']);
        }
        return 'Tên đăng nhập hoặc mật khẩu không đúng'; // Nếu không tìm thấy
    }

    // Xử lý đăng ký
    public function register($username, $password) {
        $query = "INSERT INTO users (username, password, role) VALUES (:username, :password, 0)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            // Lấy ID vừa tạo và trả về đối tượng User
            $id = $this->db->lastInsertId();
            return new User($id, $username, $password, 0);
        }
        return 'Đăng ký không thành công!'; // Nếu đăng ký thất bại
    }

    // Lấy người dùng theo ID
    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return new User($user['id'], $user['username'], $user['password'], $user['role']);
        }
        return null;
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

    // Cập nhật thông tin người dùng
    public function updateUser($id, $username, $role) {
        $query = "UPDATE users SET username = :username, role = :role WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Xóa người dùng
    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
?>
