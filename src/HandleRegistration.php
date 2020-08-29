<!DOCTYPE html>
<html>
	<head>
		<title> Handle Registration Page </title>
	</head>
	<body> 
		<?php
			// step 1: create connection
			// $connection = new mysqli("localhost", "root", "", "buoi3");
			// $connection->set_charset("utf8");
			require 'connect.php';
			
			$username = $_POST['username'];
			// echo $username . "<br/>";
			$password1 = md5($_POST['password1']);
			// echo md5($password1) . "<br/>";
			$password2 = md5($_POST['password2']);
			// echo md5($password2) . "<br/>";
			
			// handling file uploaded
			$fileName = $_FILES['avatar']['name'];
			$fileContent = $_FILES['avatar']['tmp_name'];
			$path = "../file_uploaded/avatar/".$fileName; 
			
			$gender = $_POST['gender']; // get through name of gender group
			// echo $gender . "<br/>"; // -> display value
			$jobs = $_POST['jobs'];
			// echo $jobs . "<br/>";
			
			$str = "";
			foreach($_POST['favor'] as $value){
				$str .= $value . ", ";
			}
			$favor = substr_replace($str, " ", -2);
			// echo $favor . "<br/>";

			// step 2: writing sql
			$sql = "INSERT INTO thanhvien (tendangnhap, matkhau, hinhanh, gioitinh, nghenghiep, sothich) VALUES ('$username', '$password1', '$path' ,'$gender', '$jobs', '$favor')";
			
			// $sql = "SELECT * from thanhvien";
			// echo $sql;
			
			// step 3: executing query
			$result = $connection->query($sql);
			
			// upload file to server
			move_uploaded_file($fileContent, $path);
			
			// the last step: close connection
			$connection->close();
			header("location: LoginPage.html");
		?>
	</body>
</html>