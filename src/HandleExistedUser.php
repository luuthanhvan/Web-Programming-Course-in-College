<?php
	$username = $_GET['username'];
	// echo $username;
	require 'connect.php';
	$sql = "SELECT tendangnhap from thanhvien where (tendangnhap='$username')";
	
	$result = $connection->query($sql);
	
	$row = $result->fetch_assoc();

	if($result->num_rows > 0){
		echo "Tên đăng nhập đã tồn tại!0";
	}
	else{
		echo "OK!1";
	}
	
	$connection->close();
?>