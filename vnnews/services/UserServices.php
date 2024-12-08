<?php
require_once '../config/config.php';
require_once '../models/User.php';

class UserService {
    private $db;

    public function __construct() {
        // Kết nối cơ sở dữ liệu từ config.php
        global $connection;
        $this->db = $connection;
    }

    // Kiểm tra tên đăng nhập đã tồn tại
    public function isUsernameExist($username) {
        $query = "SELECT COUNT(*) FROM users WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    // Đăng ký người dùng mới
    public function register($username, $password, $role = 0) {
        $query = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);

        if ($stmt->execute()) {
            $id = $this->db->lastInsertId();
            return new User($id, $username, $password, $role);
        }
        return null;
    }

    // Đăng nhập
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
        return null;
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
        $query = "SELECT * FROM users ORDER BY id ASC";
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

    // Xóa người dùng theo ID
    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
