<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $action = $_POST['action'];
    if($action == 'update')
    {
        if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['author']) && !empty($_POST['create_at'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];
        $create_at = $_POST['create_at'];
        $create_at = date("Y/m/d", strtotime($create_at));
        }
        
    //kết nối database server
        try {
        $conn = new PDO("mysql:host=localhost;dbname=ktpm3", 'root','' );
        $query = "UPDATE articales SET title = :title, content = :content, author = :author, create_at = :create_at WHERE id = :id";
        $stmt = $conn->prepare($query);
        
        $stmt->bindParam(":title", $title) ;
        $stmt->bindParam(":content", $content) ;
        $stmt->bindParam(":author", $author) ;
        $stmt->bindParam(":create_at", $create_at) ;
        $stmt->bindParam(":id", $id) ;
        
        $stmt->execute();
        } catch ( PDOException $e ) {
            echo ''. $e->getMessage() .'';}
        $conn = null; //đóng kết nối
    } 
}
?>