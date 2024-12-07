<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container w-50">
        <form action="" method="POST">
            <h2 class="text-primary text-center">Đăng kí</h2>
                <input type="hidden" name="action" value="sign_up">
                <label for="username" name="username" id="username">Tên đăng nhập: </label>
                <input class="form-control" type="text" name="username" id="username">
                <hr>
                <label for="password" name="password" id="password">Mật khẩu: </label>
                <input class="form-control" type="password" name="password" id="password">
                <hr>
                <label for="password_cf" name="password_cf" id="password_cf">Xác nhận mật khẩu: </label>
                <input class="form-control" type="password" name="password_cf" id="password_cf">
                <hr>
            </div>
            <div class="d-flex flex-column align-items-center">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Đăng kí</button>
                </div>
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
    require_once '../controllers/AuthController.php';
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_cf = $_POST['password_cf'];
        echo "<pre>";
        print_r($username);
        print_r($password);
        print_r($password_cf);
        echo "</pre>";
        if($password === $password_cf)
        {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $authController = new AuthController();
            $authController->register($username, $hashed_password);
            
        }
        else
        {
            echo "<pre>";
            print_r("Đăng ký thất bại");
            echo "</pre>";
        }
    }
?>