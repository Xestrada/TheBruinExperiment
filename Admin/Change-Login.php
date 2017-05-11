<?php
	
	ob_start();
	session_start();
	
	$usermail = $_POST['usermail'];
	$login_password = $_POST['password'];
	
	
	$host = "pdb6.biz.nf";
	$servername = "2025366_tbe";
	$username = "2025366_tbe";
	$password = "#BRUINS_DATA1";
	$connect = mysqli_connect($host, $username, $password,$servername, 3306);
	$select = mysqli_select_db($connect, "$servername");

    if(!$connect){
	  die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql= "UPDATE `Logins` SET `email` = '" . $usermail . "', `password` = '" . $login_password . "' WHERE `num` = '0'";
	$result = mysqli_query($connect, $sql);
	
	header("location: Database.php");
	
	ob_end_flush();
?>
	