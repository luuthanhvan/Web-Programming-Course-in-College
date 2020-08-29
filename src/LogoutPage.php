<?php
	session_start();
	unset($_SESSION['username']);
	header("location: LoginPage.html");
?>
<!-- <html>
	<head>
		<title> Logout page </title>
	</head>
	<body>
		<p> You logged out successfully </p>
		<a href="./LoginPage.html"> Back to Login page </a>
	</body>
</html> -->