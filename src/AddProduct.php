<!DOCTYPE html>
<?php 
	session_start();
?>
<html>
	<head>
		<title> Add Product </title>
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

			#inputFileForm {
				font-size: 16px;
				padding: 10px;
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

		</style>
	</head>
	<body>
		<?php
			if(!isset($_SESSION['username'])){
				header("location: LoginPage.html");
			}
		?>
		<div id="container"> 
			<div id="fixedButton1">
				<a class="buttonStyle" href="./ProfilePage.php"> Trở về </a>
			</div>
			<div id="fixedButton2">
				<a class="buttonStyle" href="./LogoutPage.php"> Đăng xuất </a>
			</div>
			
			<div id="header"> 
				<h1> Thêm sản phẩm </h1>
			</div> <!-- end div header -->
			
			<div id="content">
				<table>
					<form action="./HandleAddProduct.php" method="POST" enctype="multipart/form-data">
						<tr> 
							<td> Tên sản phẩm </td>
							<td> <input class="inputTextForm" type="text" name="productName"/> </td>
						</tr>
						<tr> 
							<td> Chi tiết sản phẩm </td>
							<td> <input class="inputTextForm" type="textarea" name="productDetail"/> </td>
						</tr>
						<tr> 
							<td> Giá sản phẩm </td>
							<td> <input class="inputTextForm" type="text" name="productPrice"/> VNĐ</td>
						</tr>
						<tr> 
							<td> Hình ảnh sản phẩm </td>
							<td> <input id="inputFileForm" type="file" name="productImage"/></td>
						</tr>
						<tr> 
							<td></td>
							<td id="inputSubmitResetForm">
								<span>
									<input type="submit" name="add" value="Thêm">
								</span>
								<span>
									<input type="reset" name="reset" value="Làm lại">
								</span>
							</td>
						</tr>
					</form>
				</table>
			</div>  <!-- end div content -->
		</div> <!-- end div footer -->
	</body>
</html>