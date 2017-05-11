<?php

	$host = "";
	$servername = "";
	$username = "";
	$password = "";
	$connect = mysqli_connect($host, $username, $password,$servername, 3306);
	
	$qNum = $_REQUEST["qNum"];
	
	
	//Remove Selection Row
	$removeSelectionRow = "DELETE FROM `Selections` WHERE `selection_num` = " . $qNum;
	mysqli_query($connect, $removeSelectionRow);
	
	
	
	//Fix so it deletes specific question and fixes the rest of the columns
	$removeAnswer = "ALTER TABLE Applications DROP COLUMN `answer_" . ($qNum) . "`";
	$removeQuestion = "ALTER TABLE Questions DROP COLUMN `Q" . ($qNum) . "`";
	$removeQuestionType = "ALTER TABLE Question_Type DROP COLUMN `Q" . ($qNum) . "`";
	mysqli_query($connect, $removeAnswer);
	mysqli_query($connect, $removeQuestion);
	mysqli_query($connect, $removeQuestionType);
	
	
	//Gets the new number of q's
	$sqlQuestions = "SELECT * FROM Questions";
	$questionResult = mysqli_query($connect, $sqlQuestions);
	$qRow = mysqli_fetch_assoc($questionResult);
	$qCount = count($qRow);
	
	
	
	//Changing Question and Question Type and Anwser
	for($x = ($qNum); $x <= $qCount; $x++){
		$changeQ = "ALTER TABLE `Questions` CHANGE `Q" . ($x + 1) .   "` `Q" . $x . "`  TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL";
		$changeQType = "ALTER TABLE `Question_Type` CHANGE `Q" . ($x + 1) .   "` `Q" . $x . "`  TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL";
		$changeAnswer = "ALTER TABLE `Applications` CHANGE `answer_" . ($x + 1) .   "` `answer_" . $x . "`  TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL";
		$changeSelections = "UPDATE `Selections` SET selection_num = " . $x . " WHERE selection_num = " . ($x + 1);
		
		mysqli_query($connect, $changeQ);
		mysqli_query($connect, $changeQType);
		mysqli_query($connect, $changeAnswer);
		mysqli_query($connect, $changeSelections);
	}
	
	
	mysqli_close($connect);


?>