<!DOCTYPE html>
<?php 
	session_start();
?>
<html>
	<head>
		<title> Product Delete </title>
	</head>
	<body>
		<?php
			if(!isset($_SESSION['username']))
				header("location: LoginPage.html");
			$productID = $_GET['productID'];
			// echo $productID;

			// $connection = new mysqli("localhost", "root", "", "buoi3");
			// $connection->set_charset("utf8");
			require 'connect.php';

			$sql = "DELETE FROM sanpham WHERE idsp=$productID";
			$connection->query($sql);

			$connection->close();

			// echo "<p> Đã xóa thành công! </p>";
			// echo "<a href='./Products.php'> Trở về </a>"
			header("location: Products.php");
		?>
	</body>
</html>