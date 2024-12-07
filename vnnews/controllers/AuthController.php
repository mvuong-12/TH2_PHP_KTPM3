<?php
require_once '../services/AuthServices.php';

class AuthController {
    private $authService;

    public function __construct() {
        $this->authService = new AuthService();
    }

    public function login($username, $password) {
        session_start();
                  
            $role = $this->authService->validateLogin($username, $password);
            // echo "<pre>";
            // print_r($role);
            // echo "</pre>";
            // die("Role: " . $role);
            if ($role === 1) {
                $_SESSION["admin"] = true;
                header("Location: ../views/admin/index.php");
                exit;
            } elseif ($role === 0) {
                $_SESSION["user"] = true;
                header("Location: ../views/user/index.php");
                exit;
            } else {
                $_SESSION["user"] = false;
                header("Location: ../views/login.php");
                exit;
            }
        }
    

    public function logout() {
        // Implement logout logic
        session_start();
        session_destroy(); // Xóa toàn bộ session
        header("Location: ../index.php"); // Quay về trang chủ
        exit;
    }

    public function register($username, $password) {
        //session_start();
        $register = $this->authService->validateRegister($username, $password);

        if($register === true){
            //$_SESSION["user"] = false;
            header("Location: ../views/login.php");
            exit;
        }
        // Implement register logic
    }
}
?>
