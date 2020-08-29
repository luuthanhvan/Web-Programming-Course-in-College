<!DOCTYPE html>
<?php 
	session_start();
?>
<html>
	<head>
		<title> Product Detail </title>
		<meta charset="utf8">
		<style>
			* {
				margin: 0;
				padding: 0;
			}

			body {
				background-image: linear-gradient(to top left, #05b5af, #056cb5);
				background-attachment: fixed;
			}

			#fixedButton1 {
				position: fixed;
				top: 0;	
				left: 0;
				width: 150px;
				margin-top: 10px;
				margin-left: 10px;
				box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 4px 18px 0 rgba(0, 0, 0, 0.19);
			}

			#fixedButton2 {
				position: fixed;
				top: 0;	
				right: 0;
				width: 150px;
				margin-top: 10px;
				margin-right: 10px;
				box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 4px 18px 0 rgba(0, 0, 0, 0.19);
			}

			.buttonStyle {
				display: block;
				color: black;
				text-decoration: none;
				font-size: 20px;
				font-weight: bold;
				text-align: center;
				background-color: white;
				padding-top: 5px;
				padding-bottom: 5px;
				border-radius: 10px
			}

			#container {
				/*border: 1px solid yellow;*/
				width: 1000px;
				margin: auto;
				margin-top: 70px;
				position: relative;
				overflow: hidden;
				background-color: white;
				border-radius: 10px;
				box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 4px 18px 0 rgba(0, 0, 0, 0.19);
			}

			#image {
				float:left;
				margin-top: 10px;
				margin-left: 70px;
				margin-bottom: 5px;
			}

			#content {
				float: right;
				width: 450px;
				margin-top: 70px;
			}

			#content h2 {
				font-size: 70px;
			}

			#content #price {
				font-size: 30px;
				color: red;
				margin-bottom: 10px;
				font-weight: bold;
			}

			#content #detail {
				font-size: 20px;
				font-style: italic;
			}
		</style>
	</head>
	<body>
		<div id="fixedButton1">
			<a class="buttonStyle" href="./Products.php"> Trở về </a>
		</div>
		<div id="fixedButton2">
			<a class="buttonStyle" href="./LogoutPage.php"> Đăng xuất </a>
		</div>
		<?php 
			if(!isset($_SESSION['username']))
				header("location: LoginPage.html");
			$productID = $_GET['productID'];
			// echo $productID;
			
			// $connection = new mysqli("localhost", "root", "", "buoi3");
			// $connection->set_charset("utf8");
			require 'connect.php';

			$sql = "SELECT * FROM sanpham WHERE idsp=$productID";
			$result = $connection->query($sql);
			$row = $result->fetch_assoc();

			echo "<div id='container'>";
				echo "<div id='image'>";
					echo "<img src=".$row['hinhanhsp']." width='400px' height='500px'>";
				echo "</div>";

				echo "<div id='content'>";
					echo "<h2>".$row['tensp']."</h2>";
					echo "<p id='price'> Giá: ".$row['giasp']." VNĐ</p>";
					echo "<p id='detail'> Chi tiết sản phẩm: ".$row['chitietsp']."</p>";
				echo "</div>";
			echo "</div>";
			$connection->close();
		?>
	</body>
</html>