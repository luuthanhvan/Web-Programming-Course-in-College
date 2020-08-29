<!DOCTYPE html>
<?php 
	session_start();
?>
<html>
	<head>
		<title> Handle Product Modify </title>
	</head>
	<body>
		<?php 
			if(!isset($_SESSION['username'])){
				header("location: LoginPage.html");
			}
			$productID = $_POST['productID'];
			// echo $productID . "<br/>";
			$productName = $_POST['productName'];
			// echo $productName . "<br/>";
			$productDetail = $_POST['productDetail'];
			// echo $productDetail . "<br/>";
			$productPrice = $_POST['productPrice'];
			// echo $productPrice . "<br/>";
			
			// $connection = new mysqli("localhost", "root", "", "buoi3");
			// $connection->set_charset("utf8");
			require 'connect.php';
			
			$sql = "UPDATE sanpham 
				SET tensp='$productName', chitietsp='$productDetail', giasp=$productPrice
				WHERE idsp=$productID";
			// echo $sql;

			$connection->query($sql);
			$connection->close();
			// echo "<p> Đã cập nhật thông tin sản phẩm thành công! </p>";
			// echo "<a href='./Products.php'> Trở về </a>"
			header("location: Products.php");
		?>
	</body>
</html>