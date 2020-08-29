<!DOCTYPE html>
<?php 
	session_start();
?>
<html>
	<head>
		<title> Profile Page </title>
		<style type="text/css">
			* {
				margin: 0;
				padding: 0;
			}

			body {
				background-image: linear-gradient(to top left, #05b5af, #056cb5);
				background-attachment: fixed;
			}

			#container {
				/*border: 1px solid yellow;*/
				width: 1080px;
				margin: auto;
				position: relative;
				overflow: hidden;
				top: 100px;
				/*background-image: linear-gradient(to top right, #5a05ed, #320187);*/
			}

			#content {
				border-right: 1px solid white;
				padding-right: 50px;
				width: 200px;
				float: left;
				/*background-color: white;*/
				/*position: relative;*/
				margin-left: 20px;
			}

			#content a {
				/*border: 1px solid orange;*/
				display: block;
				padding: 10px;
				text-decoration: none;
				text-align: center;
				color: white;
				font-weight: bold;
				font-size: 20px;

			}

			#content img{
				/*float: left;*/
				border: 2px solid white;
				margin-top: 20px;
				margin-bottom: 10px;
				/*margin: auto;*/
				border-radius: 100px;
				/*display: block;*/
			}

			#mainContent {
				/*border: 1px solid white;*/
				width: 800px;
				float: right;
				margin-top: 120px;
				position: relative;
			}

			#mainContent h2 {
				/*border: 1px solid blue;*/
				text-align: center;
				background-color: #150e7d;
				color: white;
				font-size: 35px;
				padding: 3px 0;
				border-radius: 10px 10px 0 0;
				/*border: 1px solid white;*/
				/*float: right;*/
				width: 700px;
				margin: auto;
			}
			
			#mainContent table {
				/*border: 1px solid blue;*/
				border-radius: 0 0 10px 10px;
				/*margin-top: 0px;*/
				width: 700px;
				margin: auto;
				background-color: white;
				padding-left: 20px;
			}

			#mainContent td {
				/*padding-left: 20px;*/
				/*padding-right: 20px;*/
				font-size: 26px;

			}
		</style>
	</head>
	<body>
		<?php
			// checking user login 
			if(isset($_SESSION['username'])){ // if logged in
				$username = $_SESSION['username']; // get username
			}
			else {
				header("location: LoginPage.html"); // redirect
			}

			// step 1: create a connection to database
			// $connection = new mysqli("localhost", "root", "", "buoi3");
			// $connection->set_charset("utf8");
			require 'connect.php';

			// step 2: write sql
			$sql = "SELECT * from thanhvien WHERE (tendangnhap='$username')";

			// step 3: execute query
			$result = $connection->query($sql);
			$row = $result->fetch_assoc();
			
			// display user informations
			echo "<div id='container'>";
				echo "<div id='content'>";
					echo "<div>";
					echo "<img src=".$row['hinhanh']." width='200px' height='200px'/>";
					echo "</div>";
					echo "<a href='./AddProduct.php'> Thêm sản phẩm </a> <br/>";
					echo "<a href='./Products.php'> Danh sách sản phẩm </a> <br/>";
					echo "<a href='./ImageFromDatabase.php'> Xem sản phẩm </a> <br/>";
					echo "<a href='./LogoutPage.php'> Đăng xuất </a> <br/>";
				echo "</div>"; // end div content

				echo "<div id='mainContent'>";
					echo "<h2> Thông tin cá nhân </h2>";
					echo "<table>";
						echo "<tr>
							<td> Tên đăng nhập </td>
							<td>".$row['tendangnhap']."</td>
						</tr>";

						echo "<tr>
							<td> Giới tính </td>
							<td>".$row['gioitinh']."</td>
						</tr>";

						echo "<tr>
							<td> Nghề nghiệp </td>
							<td>".$row['nghenghiep']."</td>
						</tr>";

						echo "<tr>
							<td> Sở thích </td>
							<td>".$row['sothich']."</td>
						</tr>";
					echo "</table>";
				echo "</div>"; // end div main content
			echo "</div>"; // end div container
			
			// the last step: close the connection
			$connection->close();
		?>
	</body>
</html>