<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container w-50">
        <form action="controllers/AuthController.php" method="POST">
            <h2 class="text-primary text-center">Đăng nhập</h2>
                <input type="hidden" name="action" value="login">
                <label for="username" name="username" id="username">Tên đăng nhập: </label>
                <input class="form-control" type="text" name="username" id="username">
                <hr>
                <label for="password" name="password" id="password">Mật khẩu: </label>
                <input class="form-control" type="password" name="password" id="password">
                <hr>
            </div>
            <div class="d-flex flex-column align-items-center">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </div>
                <hr>
                <div class="mb-3">
                    <a href="">Quên mật khẩu?</a>
                </div>
                <div>
                    <p class="me-3"><strong>Bạn chưa có tài khoản?</strong></p>
                    <a href="#">Đăng kí</a>
                </div>
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>