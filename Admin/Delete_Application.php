<?php
		session_start();

		$connect = mysqli_connect($host, $username, $password,$servername, 3306);
	
		$num = $_REQUEST['num'];
		
		if(!empty($num)){
			$sql = "DELETE FROM `Applications` WHERE `app_num` = " . $num;
			
			mysqli_query($connect, $sql);	
		}
		
		



?>