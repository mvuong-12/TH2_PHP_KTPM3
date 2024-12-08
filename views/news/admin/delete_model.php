<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $action = $_POST['action'];
    if($action == 'delete')
    {
        $id = $_POST['id'];
    
    //kết nối database server
        try {
            $conn = new PDO("mysql:host=localhost;dbname=ktpm3", 'root','');
            $query = "DELETE FROM articales WHERE id = :id";
            $stmt = $conn->prepare($query);
            
            $stmt->bindParam(":id", $id) ;
        
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $message = 'Xóa bài viết thành công!';
            } else {
                $message = 'Không tìm thấy bài viết để xóa.';
            }
            } catch ( PDOException $e ) {
                echo ''. $e->getMessage() .'';}
            $conn = null; //đóng kết nối
        }
}
?>