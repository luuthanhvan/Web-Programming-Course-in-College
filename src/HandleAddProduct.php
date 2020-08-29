<!DOCTYPE html>
<?php 
	session_start();
?>
<html>
	<head>
		<title> Handle Add Product </title>
	</head>
	<body>
		<?php
			if(!isset($_SESSION['username'])) {
				header("location: LoginPage.html");
			}

			// job1: get data from form
			$username = $_SESSION['username'];
			// echo $username . "<br/>";
			
			$productName = $_POST['productName'];
			// echo $productName . "<br/>";
			
			$productDetail = $_POST['productDetail'];
			// echo $productDetail . "<br/>";
			
			$productPrice = $_POST['productPrice'];
			// echo $productPrice . "<br/>";

			// job2: database working

			// handle product image
			$fileName = $_FILES['productImage']['name']; // get image name
			$fileContent = $_FILES['productImage']['tmp_name']; // get image content
			$path  = "../file_uploaded/product_images/".$fileName;

			// step 1: create a connection to database buoi3
			// $connection = new mysqli("localhost", "root", "", "buoi3");
			// $connection->set_charset("utf8");
			require 'connect.php';

			// step2: write sql
			$sql = "SELECT id from thanhvien where (tendangnhap='$username')";
			// echo $sql;
			
			// step 3: execute the query
			$result = $connection->query($sql);

			$row = $result->fetch_assoc();
			$userID = $row['id'];
			// echo $row['id'];

			$sql = "INSERT INTO sanpham (tensp, chitietsp, giasp, hinhanhsp, idtv) VALUES ('$productName', '$productDetail', $productPrice, '$path', $userID)";
			echo $sql;
			
			$connection->query($sql);
			
			// upload image to server
			move_uploaded_file($fileContent, $path);
			// the last step: close the connection
			$connection->close();

			header("location: AddProduct.php");
		?>
	</body>
</html>