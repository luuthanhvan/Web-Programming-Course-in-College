<!DOCTYPE html>
<?php 
	session_start();
?>
<html>
	<head>
		<title> Product Modify </title>
		<meta charset="utf-8">
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
				width: 700px;
				margin: auto;
				top: 120px;
				position: relative;
				background-color: white;
				border-radius: 10px;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			}

			#header {
				text-align: center;
				padding-top: 20px;
				margin-bottom: 10px;
			}

			#content {
				padding-bottom: 10px;
			}

			#content table{
				margin: auto;
				width: 600px;
			}

			td {
				font-size: 18px;
				padding-top: 10px;
				padding-bottom: 10px;
			}

			.inputTextForm {
				width: 220px;
				height: 30px;
				padding: 5px;
				border-radius: 3px;
				font-size: 20px;
				background-color: #e1e7eb;
				border: none;
			}

			#inputSubmitResetForm span input{
				width: 100px;
				margin-top: 20px;
				margin-right: 20px;
				border-radius: 5px;
				background-color: #ed2445;
				color: white;
				padding: 5px;
				font-weight: bold;
				font-size: 18px;
				/*float: right;*/
				border: none;
			}

			#inputSubmitForm a {
				border: 1px solid #ed2445;
				border-radius: 5px;
				color: white;
				padding: 5px;
				/*display: block;*/
				width: 100px;
				font-weight: bold;
				font-size: 20px;
				background-color: #ed2445;
				text-decoration: none;
				/*float: left;*/
				margin-right: 10px;
				text-align: center;
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
			if(!isset($_SESSION['username'])){
				header("location: LoginPage.html");
			}

			$productID = $_GET['productID'];
			// echo $productID;

			// $connection = new mysqli("localhost", "root", "", "buoi3");
			// $connection->set_charset("utf8");
			require 'connect.php';

			$sql = "SELECT tensp, chitietsp, giasp FROM sanpham WHERE idsp=$productID";
			
			$result = $connection->query($sql);

			$row = $result->fetch_assoc();
			// echo $row['tensp'] . "<br/>";
			// echo $row['chitietsp'] . "<br/>";
			// echo $row['giasp'] . "<br/>";
			$productName = str_replace(" ", "", $row['tensp']);
			$productDetail = str_replace(" ", "", $row['chitietsp']);
			$productPrice = $row['giasp'];

			$connection->close();

			echo "<div id='container'>";
				echo "<div id='header'>";
					echo "<h1> Sửa sản phẩm </h1>";
				echo "</div>"; // end div header

				echo "<div id='content'>";
					echo "<table>";
						echo "<form action='./HandleProductModify.php' method='POST' enctype='multipart/form-data'>";
							echo "<input type='hidden' name='productID' value=".$productID.">";
							
							echo "<tr>";
								echo "<td> Tên sản phẩm </td>";
								echo "<td> <input class='inputTextForm' type='text' name='productName' value='$productName'> </td>";
							echo "</tr>";
							
							echo "<tr>";
								echo "<td> Chi tiết sản phẩm </td>";
								echo"<td> <input class='inputTextForm' type='textarea' name='productDetail' value='$productDetail'> </td>";
							echo "</tr>";
							
							echo "<tr> ";
								echo "<td> Giá sản phẩm </td>";
								echo "<td> <input class='inputTextForm' type='text' name='productPrice' value='$productPrice'> VNĐ</td>";
							echo "</tr>";
							
							echo "<tr> ";
								echo "<td></td>";
								echo "<td id='inputSubmitResetForm'> 
										<span><input type='submit' name='submit' value='Sửa'></span>
										<span><input type='reset' name='reset' value='Làm lại'></span>
									</td>";
							echo "</tr>";
						echo "</form>";
					echo "</table>";
				echo "</div>"; // end div content
			echo "</div>"; // end div container
		?>
	</body>
</html>