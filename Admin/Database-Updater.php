    <?php

		$connect = mysqli_connect($host, $username, $password,$servername, 3306);
		
		$q = $_REQUEST['question'];
		
		$sqlCount = "SELECT * FROM Applications";
		$result = mysqli_query($connect, $sqlCount);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				echo  "<h1 class = 'applicant'><a href = 'Applicant.php?num=" . $row["app_num"] . "'>" . $row["app_num"] . ": " . $row["answer_" . $q] . " (" .$row["app_date"] . ")". "</a></h1>";	
			}
		}	
	?>