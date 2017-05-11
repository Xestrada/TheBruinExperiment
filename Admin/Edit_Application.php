<?php
	session_start();

	$connect = mysqli_connect($host, $username, $password,$servername, 3306);
		
	$sqlCount = "SELECT * FROM Logins";
	$result = mysqli_query($connect, $sqlCount);
	$row = mysqli_fetch_assoc($result);
	$usermail = $row['email'];
	$pass = $row['password'];
	if($_SESSION['usermail'] !== $usermail && $_SESSION['password'] !== $pass){
 		header("location:Login.html");
	}

?>







<!Doctype html>
<html>
   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Jorge Estrada, Marcos Herrera, Daniel Hiaem">
    <meta name = "description" content= "UCLA's TheBruinExperiment">
    <meta name = "keywords" content = "Science,fair,UCLA,TheBruinExperiment,Mukai, Hiaem">
    <meta http-equiv="Cache-control" content="no-cache">
    <title>TheBruinExperiment</title>
    <link rel="stylesheet" type="text/css" href="Application.css">
	<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch" rel="stylesheet" type="text/css">
    <script src = "Edit-Application.js"></script>
    
   </head>
   <body>
    
    <section id = "top">
      <section id = "head">
    	      <nav>
           		<a href= "Database.php" class="everyOther">Applications</a>
           		<a href = "Change-Login.html"  class="everyOther">Change Login</a>
				 			 
             </nav>
		<header> 		               	        
   			<h1>Edit Application</h1>
  	    </header>
	  </section>
	</section>
    
	<section id = "Form_Page">
        <?php
			
			
			$host = "pdb6.biz.nf";
			$servername = "2025366_tbe";
			$username = "2025366_tbe";
			$password = "#BRUINS_DATA1";
			$connect = mysqli_connect($host, $username, $password,$servername, 3306);
		
			$sqlQuestions = "SELECT * FROM Questions";
			$questions = mysqli_query($connect, $sqlQuestions);
			$questionsRow = mysqli_fetch_assoc($questions);
			$questionLength = count($questionsRow);
			
			$sqlQuestionType = "SELECT * FROM Question_Type";
			$types = mysqli_query($connect, $sqlQuestionType);
			$typesRow =  mysqli_fetch_assoc($types);
			$select = 1;
                        
            $appSql = "SELECT * FROM Application_Info";
            $app_Info = mysqli_fetch_assoc(mysqli_query($connect, $appSql));
			
			$extraQD = "SELECT * FROM Question_ET_Pos";
			$extraQPos = mysqli_fetch_assoc(mysqli_query($connect, $extraQD));
			
			$extraQs = "SELECT * FROM Question_ExtraText";
			$extraTextValue = mysqli_fetch_assoc(mysqli_query($connect, $extraQs));
                        
			
			echo "<h3>Header<h3><textarea name = 'title' id = 'title'>" . $app_Info['Title'] . "</textarea><br>";
			echo "<input type = 'button' onClick = 'UpdateHeader()' value = 'Update Header' class = 'buttonTF'><br><hr>";
			
			
			
			
			//Creates Each Section of Editable Question
			for($i = 1; $i <= $questionLength; $i++){
				
				//Creates Editable Text
				//Make it so Name and Email can't be changed

				$format = "<div class = 'hold'><h3>Question " . $i . ":<h3><textarea name = 'Q" . $i . "'>" . $questionsRow["Q" . $i] . "</textarea>";
				
				//Builds Remove Button
				$removeButton = "<input class = 'removeButton' value = 'Remove Question' type='Button' onClick='RemoveQuestion(" . $i . ")'></input><br>";
				
				
				//Builds the Dropdown
				$type = "<select name = 'type" . $i . "'>";
				
				
				if($typesRow["Q" . $i] === "Short"){
					$type  = $type . "<option value = 'Short' onClick='SelectionDecider(". ($i - 1) . ", " . "false" . ")' selected>Short</option>";
				}else{
					$type  = $type . "<option value = 'Short' onClick='SelectionDecider(". ($i - 1) . ", " . "false" . ")'>Short</option>";
				}
				
				if($typesRow["Q" . $i] === "Long"){
					$type  = $type . "<option value = 'Long' onClick='SelectionDecider(". ($i - 1) . ", " . "false" . ")' selected>Long</option>";
				}else{
					$type  = $type . "<option value = 'Long' onClick='SelectionDecider(". ($i - 1) . ", " . "false" . ")'>Long</option>";
				}
				
				if($typesRow["Q" . $i] === "Select"){
					$type  = $type . "<option value = 'Select' onClick='SelectionDecider(". ($i - 1) . ", " . "true" . ")' selected>Select</option>";
					$selectInput = "<section class = 'selectable' style='display:block'>";
					
					
					//Gets the selections if possible
					$sqlSelections = "SELECT * FROM Selections WHERE selection_num = " . $i;
					$selectQuery = mysqli_query($connect, $sqlSelections);
					$selectionRow =  mysqli_fetch_assoc($selectQuery);
					$select++;
					
					
					
				}else{
					$type  = $type . "<option value = 'Select' onClick='SelectionDecider(". ($i - 1) . ", " . "true" . ")'>Select</option>";
					$selectInput = "<section class = 'selectable' style='display:none'>";
				}
				
				if($typesRow["Q" . $i] === "MC"){
					$type  = $type . "<option value = 'MC' onClick='SelectionDecider(". ($i - 1) . ", " . "true" . ")' selected>Multiple Choice</option>";
					$selectInput = "<section class = 'selectable' style='display:block'>";
					
					
					//Gets the selections if possible
					$sqlSelections = "SELECT * FROM Selections WHERE selection_num = " . $i;
					$selectQuery = mysqli_query($connect, $sqlSelections);
					$selectionRow =  mysqli_fetch_assoc($selectQuery);
					$select++;
					
					
					
				}else{
					$type  = $type . "<option value = 'MC' onClick='SelectionDecider(". ($i - 1) . ", " . "true" . ")'>Multiple Choice</option>";
				}
				
				//Takes into account the possibility of changing to select
				$start = 1;
				for($x = 0; $x < 10; $x++){
					if($start == 10){
						$selectInput = $selectInput . "<input type='text' class = 'selections QT" . $i . "' value = '" . $selectionRow["selection_" . $start] . "' readonly></input><br>";
					}else{
						$selectInput = $selectInput . "<input type='text' class = 'selections QT" . $i . "' value = '" . $selectionRow["selection_" . $start] . "'></input><br>";
					}
						
					$start++;
				}
				$selectInput = $selectInput . "</section>";
				
				
				//Finishes the type dropdown
				$type = $type . "</select><br>";
				
				//Creates Extra Text DropDown and TextArea
				$extraText = "<select class = 'extraTextPos' name = 'ExtraText" . $i . "'>";
				$extraTextArea = "";
				
				if($extraQPos["Q" . $i] === '0'){
					$extraText = $extraText . "<option value = 0 onClick='ExtraTextDecider(" . ($i - 1) . ", " . "false" . ")' selected>None</option>";
					$extraTextArea = "<textarea class = 'extratext' style='display:none'>" . $extraTextValue["Q" . $i] . "</textarea>";
				}else{
					$extraText = $extraText . "<option value = 0 onClick='ExtraTextDecider(" . ($i - 1) . ", " . "false" . ")'>None</option>";
					$extraTextArea = "<textarea class = 'extratext' style='display:block'>" . $extraTextValue["Q" . $i] . "</textarea>";
				}
				
				if($extraQPos["Q" . $i] === '1'){
					$extraText = $extraText . "<option value = 1 onClick='ExtraTextDecider(" . ($i - 1) . ", " . "true" . ")' selected>Above</option>";
					
				}else{
					$extraText = $extraText . "<option value = 1 onClick='ExtraTextDecider(" . ($i - 1) . ", " . "true" . ")'>Above</option>";
				}
				
				if($extraQPos["Q" . $i] === '2'){
					$extraText = $extraText . "<option value = 2 onClick='ExtraTextDecider(" . ($i - 1) . ", " . "true" . ")' selected>Below</option>";
				}else{
					$extraText = $extraText . "<option value = 2 onClick='ExtraTextDecider(" . ($i - 1) . ", " . "true" . ")'>Below</option>";
				}
				
				//Finishes Extra Text DropwDown
				$extraText = $extraText . "</select><br>";
				

				
				
				
				
				
				
				
				
				
				//Makes UpdateButton
				$updateButton = "<input type='button' name = 'submit' class = 'updateButton' value='Update Question' onClick = UpdateQuestion('Q" . $i . "'," . ($i - 1) . ")><br>";
				
				
				
				$finish = "<br></div><hr>";
				
				
				
				
				
				echo $format;

				
				echo "<p>Question Type:</p><br>" . $type;
				
				echo "<p>Extra Text:</p><br><br>" . $extraText  . "<br>";
				echo $selectInput;
				echo $updateButton . "<br>";
				echo $removeButton;
				
				echo $extraTextArea;
				
				
				echo $finish;
				
				
				
			}
			
			
			echo "<h3>Footer<h3><textarea id = 'footer'>" . $app_Info['Footer'] . "</textarea><br>";
			echo "<input type = 'button' onClick='UpdateFooter()' value = 'Update Footer' class = 'buttonTF'><br><hr>";
			
			
			
			

		?>
        
        <br>
        <input value="Add Question" onClick="AddQuestion()" type="button" class = 'bottomButton'></input>
	</section>
	
	   <div class = "section fp-auto-height footer" id = "foot">
      	<a href  = "mailto:thebruinexperiment@gmail.com"><img src="../Images/mail.png" alt = "Mail" height="50" width="50" id = "space"></a>
        <a href= "https://www.facebook.com/thebruinexperiment/" target="_blank"><img src="../Images/Facebook.png" alt = "Facebook" height="50" width="50" class = "icons"></a>
        <a title = "1-310-999-1722" href="tel:13109991722"><img src="../Images/phone.png" alt = "Phone NUmber" height="50" width="50" class = "icons"></a>
       </div>
	   
	</body>
</html>