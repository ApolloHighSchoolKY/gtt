<?php
	session_start();
	if(!isset($_SESSION['verified']) || $_SESSION['verified'] !== true) {
		header("Location: login.php");
		die();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Secure Site</title>
	<script src="script.js"></script>
</head>
<body>
	<h1>Secure</h1>

	<div class="btn" onclick="logout();">Logout</div>

<style>
.btn {
	background: #be03fc;
	padding: 12px 50px;
	border-radius: 3px;
	font-size: 1.4em;
	cursor: pointer;
	margin: 20px 0;
	color: white;
	font-weight: bold;
	user-select: none;
	display: inline-block;
	transition: background .3s;
}
.btn:hover {
	background: #a702de;
}
.btn:active {
	box-shadow: inset 0 0 3px 4px rgba(0,0,0,.2);
}
</style>
</body>
</html>
