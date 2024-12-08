
<?php
include("create_model.php");
include("update_model.php");
include("delete_model.php");
include("read_model.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tin tức</title>
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    

</head>
<body>
    <div class="container">
        <h1 class="text-primary text-center">Quản lý tin tức</h1>
        <a href="create_view.php" class="btn btn-primary mb-2"> <i class="bi bi-plus-lg"></i> Thêm mới </a>
        <table class="table table-striped" width="70%">
            <thead class="table-info">
                <tr>
                <th scope="col" width = 5%>ID</th>
                <th scope="col" width = 15%>Tiêu đề</th>
                <th scope="col" width = 45%>Nội dung</th>
                <th scope="col" width = 15%>Người viết</th>
                <th scope="col" width = 10%>Ngày đăng</th>
                <th scope="col" width = 10%>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $startIndex = ($page - 1) * 10;
                foreach ($result as $index => $val):
                    $content = strlen($val['content']) > 50 ? substr($val['content'], 0, 50) . '...' : $val['content'];
                    ?>
                <tr>
                        <td><?php
                            //$id = (int)$val['id'];
                            echo $startIndex + $index + 1;
                            //echo $offset + $index + 1; 
                            ?>
                        </td>
                        <td><?php echo $val['title'] ?></td>
                        <td><?php echo $content ?></td>
                        <td><?php echo $val['author'] ?></td>
                        <td><?php echo $val['created_at'] ?></td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $index + 1; ?>"><i class="bi bi-eye me-2"></i></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $index + 1; ?>"><i class="bi bi-pencil-square me-2"></i></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $index + 1; ?>"><i class="bi bi-trash3 me-2"></i></a>
                        </td>
                        <div class="modal fade" id="viewModal<?php echo $index + 1; ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5><?php echo $val['title']?></h5>
                                        <button class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Người viết: </strong><?php echo $val['author']?></p>
                                        <p><strong>Ngày đăng: </strong><?php echo $val['created_at']?></p>
                                        <hr>
                                        <p><strong>Nội dung: </strong> <br> <?php echo $val['content']?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="updateModal<?php echo $index +1; ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="container w-60">
                                        <form action="list_news.php?page=<?php echo $page; ?>" method="POST">
                                            <div class="modal-header">
                                                <input type="hidden" name="action" value="update">
                                                <input type="hidden" name="id" value="<?php echo $val['id']; ?>">
                                                <h5>Chỉnh sửa bài viết có ID: <?php echo $val['id']; ?></h5><br>                                                
                                            </div>
                                            <div class="modal-body">
                                                <label for="title"><strong>Tiêu đề: </strong></label>
                                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $val['title']?>">
                                                <br>
                                                <label for="content"><strong>Nội dung: </strong></label><br>
                                                <textarea name="content" rows="4" cols="70" class="form-control"><?php echo $val['content']?></textarea>
                                                <br>
                                                <label for="author"><strong>Người viết: </strong></label>
                                                <input type="text" class="form-control" id="author" name="author" value="<?php echo $val['author']?>">
                                                <br>
                                                <label for="created_at"><strong>Ngày đăng: </strong></label>
                                                <input type="date" class="form-control" id="created_at" name="created_at" value="<?php echo $val['created_at']?>">
                                                
                                            </div>                                            
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success me-2">Lưu lại</button>
                                                <input class="btn btn-secondary" data-bs-dismiss="modal" type="reset" value="Đóng">
                                            </div>
                                        </form>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteModal<?php echo $index + 1; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="container w-60">
                                        <form action="list_news.php?page=<?php echo $page; ?>" method="POST">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?php echo $val['id']; ?>">
                                            <div class="modal-header">
                                                <h5>Xác nhận xóa</h5>
                                            </div>
                                            <div class="modal-body">
                                                <p>Bạn có chắc chắn muốn xóa bài viết có ID: <?php echo $val['id']; ?></p>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="submit" class="btn btn-danger me-2">Xóa</button>
                                                <input class="btn btn-secondary" data-bs-dismiss="modal" type="reset" value="Hủy bỏ">
                                            </div>
                                        </form>
                                    </div> 
                                </div>
                            </div>
                        </div>
                </tr>
                <?php
                endforeach;
                ?>   
                            
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    if($page > 1){
                    ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>">Trước</a></li>
                    <?php
                    }
                    ?>
                    <?php for ($i = $page; $i <= min($totalPages, $page + 2); $i++): ?>
                    <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                    <?php endfor; ?>
                    <?php if ($page < $totalPages): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>">Sau</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
<script src="bootstrap\js\bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>