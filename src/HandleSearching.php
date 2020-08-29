
<?php 
	session_start();
    $username = $_SESSION['username'];
    $content = $_GET['content'];
    require 'connect.php';

    $sql = "SELECT id FROM thanhvien WHERE (tendangnhap='$username')";
    
    $result = $connection->query($sql);     
    
    if($result->num_rows > 0)
        $row = $result->fetch_assoc();
    $userID = $row['id'];
    
    $sql = "SELECT tensp FROM sanpham WHERE idtv=$userID AND tensp LIKE '$content%'";
    // echo $sql;
    $result = $connection->query($sql);
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo $row['tensp'] . "<br/>" . "<br/>";
        }
    }
    else{
        echo "Không có sản phẩm nào được tìm thấy.";
    }
    
    $connection->close();
?>