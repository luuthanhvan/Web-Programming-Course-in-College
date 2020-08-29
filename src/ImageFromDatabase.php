<!DOCTYPE html>
<?php 
	session_start();
?>
<html>
	<head>
		<title> Image From Database </title>
		<meta charset="utf8">
		<style>
			.myImages { 
				display: none;
			}
			.content { 
				display: none;
			}
		</style>
	</head>
	<body>
		<?php 
			if(!isset($_SESSION['username']))
				header("location: LoginPage.html");
			// header("location: ImageFromDatabase.php");
			$username = $_SESSION['username'];
			// echo $username;

			require 'connect.php';
			
			$sql = "SELECT id FROM thanhvien WHERE tendangnhap='$username'";
			$result = $connection->query($sql);
			$row = $result->fetch_assoc();
			// echo $row['id'];
			$userID = $row['id'];

			$sql = "SELECT * from sanpham where idtv=$userID";
			$result = $connection->query($sql);
			while($row = $result->fetch_assoc()){
				echo "<img class='myImages' src=".$row['hinhanhsp']." width='400px' height='500px'>";
				echo "<div class='content'>";
					echo "<h2>".$row['tensp']."</h2>";
					echo "<p> Giá: ".$row['giasp']." VNĐ</p>";
					echo "<p> Chi tiết sản phẩm: ".$row['chitietsp']."</p>";
				echo "</div>";
			}
			$connection->close();
		?>
		<div id="vertical-center"> 
			<button type="button" onclick="changeSlide(-1)"> Previous </button>
			<button type="button" onclick="changeSlide(1)"> Next </button>
		</div>
		<script>
			slideIndex = 1;
			showSlide(slideIndex);
			
			function changeSlide(n){
				slideIndex += n;
				showSlide(slideIndex);
			}
			
			function showSlide(n){
				var images = document.getElementsByClassName("myImages");
				var imgContent = document.getElementsByClassName("content");
				if(n > images.length) 
					slideIndex = 1;
				if(n < 1)
					slideIndex = images.length;
				
				for(var i = 0; i < images.length; i++){
					images[i].style.display = "none";
					imgContent[i].style.display = "none";				
				}
				images[slideIndex - 1].style.display = "block";
				imgContent[slideIndex - 1].style.display = "block";		
			}
		</script>
	</body>
</html>
