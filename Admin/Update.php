<?php
	$host = "";
	$servername = "";
	$username = "";
	$password = "";
	$connect = mysqli_connect($host, $username, $password,$servername, 3306);
	
	$sqlQuestions = "SELECT * FROM Questions";
	$questionResult = mysqli_query($connect, $sqlQuestions);
	$qRow = mysqli_fetch_assoc($questionResult);
	$qCount = count($qRow);
	
	$question = $_REQUEST["update"];
	$questionNum = $_REQUEST["num"];
	$questionType = $_REQUEST["type"];
	$qNumber = $_REQUEST["qNumber"];
	
	$extraQuestionPos = $_REQUEST['eqp'];
	$extraQuestionText = $_REQUEST['eqt'];
	
	$selection_1 = $_REQUEST["selections_1"];
	$selection_2 = $_REQUEST["selections_2"];
	$selection_3 = $_REQUEST["selections_3"];
	$selection_4 = $_REQUEST["selections_4"];
	$selection_5 = $_REQUEST["selections_5"];
	$selection_6 = $_REQUEST["selections_6"];
	$selection_7 = $_REQUEST["selections_7"];
	$selection_8 = $_REQUEST["selections_8"];
	$selection_9 = $_REQUEST["selections_9"];
	$selection_10 = $_REQUEST["selections_10"];
	
	
	
	
	
	
	$updateQ = "UPDATE `Questions` SET `" . $questionNum . "` = '" . $question . "' WHERE `Questions`.`Q1` = 'Name:'";
	$updateT = "UPDATE `Question_Type` SET `" . $questionNum . "` = '" . $questionType . "' WHERE `Question_Type`.`Q1` = 'Short'";
	
	$updateEQP = "UPDATE `Question_ET_Pos` SET `" . $questionNum . "` = '" . $extraQuestionPos . "'";
	$updateEQT = "UPDATE `Question_ExtraText` SET `" . $questionNum . "` = '" . $extraQuestionText . "'";
	
	$updateS = "UPDATE `Selections` SET ";
	for($i = 1; $i <= 10; $i++){
		if($i === 10){
			$updateS = $updateS . "`selection_" . $i . "` = '" . $_REQUEST["selections_" . $i] . "' ";
		}else{
			$updateS = $updateS . "`selection_" . $i . "` = '" . $_REQUEST["selections_" . $i] . "', ";
		}
	}
	$updateS = $updateS . "WHERE `Selections` . `selection_num` = " . $qNumber;
	
	mysqli_query($connect, $updateQ);
	mysqli_query($connect, $updateT);
	mysqli_query($connect, $updateS);
	mysqli_query($connect, $updateEQP);
	mysqli_query($connect, $updateEQT);
	
	echo $updateS;
	




?>