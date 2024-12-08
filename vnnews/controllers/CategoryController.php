<?php

declare(strict_types=1);
require_once './models/Category.php';
require_once './services/CategoryServices.php';
class CateGoryController
{
    public function index()
    {
        $title = "Category";
        //Gọi dữ liệu từ CateGoryService
        $cateGoryServices = new CategoryServices();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST)) {
                $feedback = true;
                $text = '';
                if ($_POST['action'] === 'add') {
                    $feedback = $cateGoryServices->create($_POST['NAME']);
                    $text = 'Thêm mới';
                } else if ($_POST['action'] === 'delete') {
                    $feedback = $cateGoryServices->deleteRow($_POST['id']);
                    $text = 'Xóa';
                } else if ($_POST['action'] === 'edit') {
                    $ctg = new Category($_POST['id'], $_POST['NAME']);
                    $feedback = $cateGoryServices->updateRow($ctg);
                    $text = 'Cập nhật';
                }

                if ($feedback) {
                    echo "<script>alert('" . $text . " thành công!')</script>";
                } else {
                    echo "<script>alert('" . $text . " thất bại vui lòng thử lại sau :((')</script>";
                }

                // Redirect để tránh gửi lại dữ liệu khi reload
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit();  // Đảm bảo script không tiếp tục chạy sau khi redirect
            }
        }

        $count = $cateGoryServices->getRowCount();
        $limit = 8;
        // Tổng số trang
        $totalPages = ceil($count / $limit);
        // Lấy trang hiện tại từ query string
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($currentPage < 1) $currentPage = 1;
        if ($currentPage > $totalPages) $currentPage = $totalPages;

        // Tính toán offset và limit cho phân trang
        $offset = ($currentPage - 1) * $limit;

        // Lấy danh sách tin tức cho trang hiện tại
        $newsList = $cateGoryServices->getAllNews([$offset, $limit]);
        //Render dữ liệu ra Danh mục
        require_once './views/admin/list/list_categories.php';
    }
}