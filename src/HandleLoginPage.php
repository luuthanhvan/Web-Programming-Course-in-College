<!DOCTYPE html>
<?php 
	// setcookie('username', $username, time() + 3600); // set cookies
	session_start(); // set session
?>
<html>
	<head>
		<title> Handle Login Page </title>
	</head>
	<body>
		<?php
			$username = $_POST['username'];
			// echo $username . "<br/>";
			$password = md5($_POST['password']);
			// echo $password;

			// step 1: create a connection to database
			// $connection = new mysqli("localhost", "root", "", "buoi3");
			// $connection->set_charset("utf8");
			require 'connect.php';

			// step 2: write sql
			$sql = "SELECT * from thanhvien WHERE tendangnhap='$username' and matkhau='$password'";
			
			// step 3: execute query
			$result = $connection->query($sql);
			
			// echo gettype($result) ."<br/>";
			
			// get number of lines selected in database
			$count = $result->num_rows; // Object-Oriented style
			// $count = mysqli_num_rows($result); // Procedure style

			// checking user authentication
			if($count == 0){
				echo "Invalid username or password" . "<br/>";
				header("location: LoginPage.html"); // redirect
			}
			else{
				// echo "You are successfully authenticated!" . "<br/>";
				// $_COOKIE['username'] = $_POST['username'];
				$_SESSION['username'] = $username; // write a session to tracing user login process
				header("location: ProfilePage.php");
			}

			// the last step: close the connection
			$connection->close();
		?>
	</body>
</html>