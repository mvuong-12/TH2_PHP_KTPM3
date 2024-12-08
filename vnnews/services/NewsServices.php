<?php
    require_once 'models/News.php';
    class NewsService{
        public function getAllNews(){
            try
            {
                $conn = new PDO("mysql:host=localhost;dbname=tintuc", 'root','12345' );
                
                $query = "SELECT * FROM news";
                $stmt = $conn->prepare($query);
                
                $stmt->execute();
                
                $newss = [];
                while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
                    $news = new News($row['id'],$row['title'],$row['content'],$row['image'],$row['create_at'], $row['category_id']);
                    $newss[] = $news;
                }
                return $newss;
            }
            catch(PDOException $e)
                {
                    return false;
                }
            finally{
                $conn = null;
            }
        }
    }
?>