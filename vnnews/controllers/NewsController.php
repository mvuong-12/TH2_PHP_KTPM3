<?php
require_once 'services\NewsServices.php';
class NewsController{
    public function index(){
        $newssevice = new NewsService();
        $news = $newssevice->getAllNews();
        
        return $news;
        //require_once'index.php';
    }
}
?>