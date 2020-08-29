<?php
	$productID = $_GET['productID'];
	// echo $productID;
	require 'connect.php';
	$sql = "SELECT hinhanhsp from sanpham where (idsp='$productID')";
	
	$result = $connection->query($sql);

	$row = $result->fetch_assoc();

	if($result->num_rows > 0){
		echo $row['hinhanhsp'];
	}
	else{
		echo "No product";
	}
	
	$connection->close();
?>