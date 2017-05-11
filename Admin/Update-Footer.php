<?php
	
		$host = "";
		$servername = "";
		$username = "";
		$password = "";
		$connect = mysqli_connect($host, $username, $password,$servername, 3306);
		
		$footer = $_REQUEST['footer'];
		
		$sql = "UPDATE `Application_Info` SET `Footer` = '" . $footer . "' WHERE `Application_Info`.`Num` = 0";
		
		mysqli_query($connect, $sql);
	
	
?>