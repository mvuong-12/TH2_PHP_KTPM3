<?php
//Routing: Nhận vào request và phân tích request
//session_start();
require_once 'controllers/NewsController.php';

//die(json_encode($news));
$newCtrl = new NewsController();
$result = $newCtrl->index();
// echo'<pre>';
// print_r($result);
// echo '</pre>';
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
    <!-- Header -->
    <header class="bg-light text-white py-3">
        <div class="container">
            <h1 class="text-center text-success my-3">Việt Nam News</h1>
            <hr>
            <div class="d-flex bd-highlight mb-3">
                <a href="views/login.php" class="btn btn-success mb-3 me-auto">Đăng nhập<i class="bi bi-person-circle mx-2"></i></a>
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
    <div class="d-flex flex-row bd-highlight mb-3 justify-content-center container">
        <div class="p-2 bd-highlight flex-grow-1" style="flex: 0 0 10%;">
            <h5 class="my-3">Thể loại</h5>
            <p>Thể loại 1</p>
            <p>Thể loại 2</p>
            <p>Thể loại 3</p>
            <a href="views/category/list_categories.php">Xem thêm</a>
        <!-- <table class="table table-info table-bordered text-center">
            <thead class="thead-light">
                <tr>
                    <th>Thể loại</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>abc</td>
                </tr>
            </tbody>
        </table> -->

        </div>
        <div class="p-2 bd-highlight d-flex justify-content-center container">
            <div class="row justify-content-center"> <!-- Mở một hàng -->
          
                <?php
                foreach ($result as $news) {
                ?>
                    <div class="col-md-3 my-3 mx-4"> <!-- Mỗi thẻ card chiếm 6 cột (50%) trên màn hình trung bình -->
                        <div class="card" style="width: 18rem;">
                        <img src="<?= 'assets/' . $news->getImage(); ?>" class="card-img-top" alt="News Image">
                            <div class="card-body">
                                <h5 class="card-title"><?= $news->getTitle(); ?></h5>
                                <p class="card-text"><?= substr($news->getContent(), 0, 100); ?>...</p>
                                <a href="#" class="btn btn-primary">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div> <!-- Đóng hàng -->
        </div>    
    </div>
    

    <!-- Footer -->
    <footer class="bg-secondary text-white text-center py-3 mt-5">
        <p>&copy; 2024 Việt Nam News. All Rights Reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>