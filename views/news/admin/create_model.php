<?php
//thêm dũ liệu
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $action = $_POST['action'];
    if($action == 'create')
    {
        if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['author']) && !empty($_POST['create_at'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];
        $create_at = $_POST['create_at'];
        $create_at = date("Y/m/d", strtotime($create_at));
        }
    
    //kết nối database server
        try {
        $conn = new PDO("mysql:host=localhost;dbname=ktpm3", 'root','');
        $query = "INSERT INTO articales(title, content, author, created_at) VALUES (:title, :content, :author, :created_at)";
        $stmt = $conn->prepare($query);
    
        $stmt->bindParam(":title", $title) ;
        $stmt->bindParam(":content", $content) ;
        $stmt->bindParam(":author", $author) ;
        $stmt->bindParam(":create_at", $create_at) ;
    
        $stmt->execute();
        } catch ( PDOException $e ) {
            echo ''. $e->getMessage() .'';}
        $conn = null; //đóng kết nối
    } 
}
?>