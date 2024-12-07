<?php
require_once 'services/UserService.php';
class UserController{
    private $userServices;

    public function __construct() {
        $this->userServices = UserService();
    }
    public function index(){
        $users = $this->userServices->getAllUsers();
        require 'views/user/index.php';
    }
    public function create(){
        //hiển thị form thêm
        require 'views/user/index.php';
    }
    public function store(){
        //lưu dữ liệu form thêm
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $this->userServices->addUser($username, $password, $role);
            header('Location: index.php');
            exit();
        }
    }
    public function edit() {
        // Kiểm tra và lấy giá trị id từ query string
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if ($id) {
            $user = $this->userServices->getUserById($id);
            if ($user) {
                require 'views/user/index.php';
            } else {
                echo "Người dùng không tồn tại.";
            }
        } else {
            echo "ID không hợp lệ.";
        }
    }

}
?>