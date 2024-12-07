<?php
require_once 'services/CateGoryServices.php';

declare(strict_types=1);
require_once '../services/CateGoryServices.php';
class CateGoryController {
    public function index() {
        //Gọi dữ liệu từ CateGoryService
        $cateGoryServices = CategoryServices();
        $newsList = $cateGoryServices->getAllNews();
        //Render dữ liệu ra Danh mục
        require_once '../views/category/index.php';
    }
}
?>