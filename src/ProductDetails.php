<!DOCTYPE html>
<?php 
	session_start();
?>
<html>
	<head>
		<title> Products </title>
		<meta charset="utf8"/>
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
				width: 800px;
				margin: auto;
				position: relative;
				top: 50px;
			}

			#header {
				/*border: 1px solid blue;*/
				text-align: center;
				background-color: #150e7d;
				color: white;
				font-size: 32px;
				padding: 3px 0;
				border-radius: 10px 10px 0 0;
				width: 750px;
				margin: auto;
			}

			#content table {
				border-radius: 0 0 10px 10px;
				background-color: white;
				width: 750px;
				margin: auto;
			}

			#content table td{
				border-top: 1px solid black;
			}

			#content table th, td {
				text-align: center;
				font-size: 20px;
				border-right: 1px solid black;
			}

			#content td a {
				text-decoration: none;
			}

			#productImg {
				padding-top: 100px;
				padding-left: 200px;
				width: 400px;
				height: 400px;
				display: none;
			}
		</style>
	</head>
	<body>
		<div id="fixedButton1">
			<a class="buttonStyle" href="./ProfilePage.php"> Trở về </a>
		</div>
		<div id="fixedButton2">
			<a class="buttonStyle" href="./LogoutPage.php"> Đăng xuất </a>
		</div>
		<?php 
			if(!isset($_SESSION['username']))
				header("location: LoginPage.html");
			$username = $_SESSION['username'];
			// echo $username;

			// $connection = new mysqli("localhost", "root", "", "buoi3");
			// $connection->set_charset("utf8");
			require 'connect.php';

			$sql = "SELECT id FROM thanhvien WHERE (tendangnhap='$username')";
			// echo $sql;
			$result = $connection->query($sql);
			// echo $result->num_rows;
			$row = $result->fetch_assoc();
			$userID = $row['id'];
			// echo $userID;
			$sql = "SELECT idsp, tensp, giasp FROM sanpham 
				WHERE idtv = $userID";
			
			$result = $connection->query($sql);

			if($result->num_rows > 0){
				echo "<div id='container'>";
					echo "<div id='header'>";
						echo "<h3> Danh sách các sản phẩm </h3>";
					echo "</div>"; // end div header
					
					echo "<div id='content'>";
						echo "<table>";
						echo "<tr> 
							<th> STT </th>
							<th> Tên sản phẩm </th>
							<th> Giá sản phẩm </th>
							<th colspan=3 style='border-right: 1px solid white;'> Lựa chọn </th>
						</tr>";
						while($row = $result->fetch_assoc()){
							// echo $row['idsp'] . " " . $row['tensp'] . " " . $row['giasp'] . "<br/>";
							echo "<tr> 
								<td>".$row['idsp']."</td>
								<td>".$row['tensp']."</td>
								<td>".$row['giasp']." VNĐ</td>
								<td> 
									<button type='button' value='".$row['idsp']."' onclick='showImage(this.value)'> Xem chi tiết </button>
								</td>
							</tr>";
						}
						echo "</table>";
					echo "<div>"; // end div content
				echo "</div>"; // end div container
			}
			else {
				echo "No product";
			}

			$connection->close();
		?>
		<img id="productImg" src="" alt="Click xem chi tiết để xem hình ảnh sản phẩm"/>
	</body>
	<script> 
			function showImage(imgId){
				console.log("Image ID: " + imgId);
				var xmlHTTP;
				if(window.XMLHttpRequest){
					xmlHTTP = new XMLHttpRequest();
				}
				else{
					xmlHTTP = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlHTTP.onreadystatechange = function(){
					if(xmlHTTP.readyState == 4 && xmlHTTP.status == 200){
						console.log(xmlHTTP.responseText);
						let path = xmlHTTP.responseText;
						document.getElementById("productImg").setAttribute("src", path);
						document.getElementById("productImg").style.display = "block";
					}
				}
				xmlHTTP.open("GET", `HandleProductDetails.php?productID=${imgId}`, true);
				xmlHTTP.send();
			}
	</script>
</html>