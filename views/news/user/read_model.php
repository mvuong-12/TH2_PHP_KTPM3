<?php
//kết nối database server
try {
    $conn = new PDO("mysql:host=localhost;dbname=ktpm3", 'root','' );
    $sql = 'SELECT COUNT(*) FROM articales';
    $stmt = $conn->prepare( $sql );
    $stmt->execute();
    $totalRecords = $stmt->fetchColumn(); //tổng số bản ghi có trong database
    
    $RecordsOfPage = 6; //số bản ghi có trong 1 trang
    
    $totalPages = ceil( $totalRecords / $RecordsOfPage ); // tổng số trang cần có, hàm ceil lấy giá trị lớn hơn hoặc bằng
    
    //xác định trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $page = max(1, min($totalPages, $page));
    $offset = ($page-1) * $RecordsOfPage; // số bản ghi cần bỏ qua
    //xử lý kết quả sau khi lấy về
    $sql = "SELECT * FROM articales  ORDER BY id DESC LIMIT $RecordsOfPage OFFSET $offset";
    $stmt = $conn->prepare( $sql );
    $stmt->execute();
    $result = $stmt->fetchAll( PDO::FETCH_ASSOC );
    //echo"<pre>";
    //print_r( $result );
    } catch ( PDOException $e ) {
        echo ''. $e->getMessage() .'';}
    $conn = null; //đóng kết nối
?>