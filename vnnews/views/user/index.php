<?php
//Routing: Nhận vào request và phân tích request
session_start();
if (($_SESSION["user"] != true))
{
    header("Location: views/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <header class="bg-light text-white py-3">
        <div class="container">
            <h1 class="text-center text-success my-3">Việt Nam News</h1>
            <hr>
            <div class="d-flex bd-highlight mb-3">
                <a href="#" data-bs-toggle="modal" data-bs-target="#userModal" class="btn btn-success mb-3 me-auto">Thông tin tài khoản</a>

                <!-- Modal -->
                <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header with customized text color -->
                            <div class="modal-header" style="background-color: #28a745; color: white;">
                                <h5 class="modal-title" id="userModalLabel">Tài khoản ...</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- Modal Body with custom text color -->
                            <div class="modal-body" style="color: black;">
                                <p>Thông tin tài khoản sẽ hiển thị ở đây...</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <a href="../logout.php" class="btn btn-danger mb-3 ms-auto">Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="" method="post" class="d-flex align-items-center" style="width: 500px;">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tìm kiếm tin tức" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <a href="#" class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row justify-content-center"> <!-- Mở một hàng -->

            <?php
            for ($i = 0; $i < 6; $i++) {
            ?>
                <div class="col-md-3 my-3 mx-4"> <!-- Mỗi thẻ card chiếm 6 cột (50%) trên màn hình trung bình -->
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div> <!-- Đóng hàng -->
    </div>

    <!-- Footer -->
    <footer class="bg-secondary text-white text-center py-3 mt-5">
        <p>&copy; 2024 Việt Nam News. All Rights Reserved.</p>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>