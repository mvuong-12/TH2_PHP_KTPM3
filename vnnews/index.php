<?php
require_once './ultilities/Database.php';
require_once './router.php';
require_once './controllers/CategoryController.php';

session_start();
//Routing: Nhận vào request và phân tích request
// Khởi tạo router
$router = new Router();
// Định nghĩa các routes
$router->addRoute('GET', '/', [new CateGoryController(), 'index']);
$router->addRoute('POST', '/', [new CateGoryController(), 'index']);

// Xử lý route
$router->dispatch();