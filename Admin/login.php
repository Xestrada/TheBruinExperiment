<?php
	
	ob_start();
	session_start();
	
	$usermail = $_POST['usermail'];
	$login_password = $_POST['password'];
	

	$host = "";
	$servername = "";
	$username = "";
	$password = "";
	$connect = mysqli_connect($host, $username, $password,$servername, 3306);
	$select = mysqli_select_db($connect, "$servername");

    if(!$connect){
	  die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql="SELECT * FROM Logins WHERE email='$usermail' and password='$login_password'";
	$result = mysqli_query($connect, $sql);
	$count=mysqli_num_rows($result);
	if($count == 1){
		$_SESSION['usermail'] = $usermail;
		$_SESSION['password'] = $login_password;
		header("location: Database.php");	
	}else{
		header("location: Login.html");	
	}
	ob_end_flush();
?>
	