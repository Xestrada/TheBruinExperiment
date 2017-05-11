<?php

	$connect = mysqli_connect($host, $username, $password,$servername, 3306);
	
	$sqlQuestions = "SELECT * FROM Questions";
	$questionResult = mysqli_query($connect, $sqlQuestions);
	$qRow = mysqli_fetch_assoc($questionResult);
	$qCount = count($qRow);
	
	//Adds Answer, Question, QuestionType, and Selection Row
	$addAnswer = "ALTER TABLE Applications ADD `answer_" . ($qCount + 1) . "` text AFTER `answer_" . ($qCount) . "`";
	$addQuestion = "ALTER TABLE Questions ADD `Q" . ($qCount + 1) . "` text";
	$addQuestionType = "ALTER TABLE Question_Type ADD `Q" . ($qCount + 1) . "` text";
	$addSelectionRow = "INSERT INTO `Selections` (`selection_num`) VALUES(" . ($qCount + 1) . ")";
	
	mysqli_query($connect, $addAnswer);
	mysqli_query($connect, $addQuestion);
	mysqli_query($connect, $addQuestionType);
	mysqli_query($connect, $addSelectionRow);
	
	mysqli_close($connect);
	
	
	
	


?>