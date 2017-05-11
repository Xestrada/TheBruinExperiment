<?php

		$host = "";
		$servername = "";
		$username = "";
		$password = "";
		$connect = mysqli_connect($host, $username, $password,$servername, 3306);
		
		$title = $_REQUEST['title'];
		
		$sql = "UPDATE `Application_Info` SET `Title` = '" . $title . "' WHERE `Application_Info`.`Num` = 0";
		
		mysqli_query($connect, $sql);
		
		


?>