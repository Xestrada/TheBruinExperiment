<?php
$host = "pdb6.biz.nf";
$servername = "2025366_tbe";
$username = "2025366_tbe";
$password = "#BRUINS_DATA1";
$connect = mysqli_connect($host, $username, $password,$servername, 3306);

    if(!$connect){
	  die("Connection failed: " . mysqli_connect_error());
	}
	
	$sqlQuestions = "SELECT * FROM Questions";
	$questions = mysqli_query($connect, $sqlQuestions);
	$questionsRow = mysqli_fetch_assoc($questions);
	$questionLength = count($questionsRow);
	$potsLength;
	
	$start = 1;
	
	$nOther = 0;
	
	
	$selections;
	$selections_array;
	for($x = 0; $x < $questionLength; $x++){
		if(preg_match('/selection_[0-9]/',$_POST["Q" . $start])){
			$sqlSelection = "SELECT * FROM Selections WHERE selection_num = " . $start;
			$selections = mysqli_query($connect, $sqlSelection);
			$selections_array = mysqli_fetch_assoc($selections);
			$posts[$x] = $selections_array[$_POST["Q" . $start]];
			$start++;
		}else if($_POST["Q" . $start] === "other"){
			$posts[$x] = $_POST["nOther" . $nOther];
			$nOther++;
			$start++;
		}else{
			$posts[$x] = $_POST["Q" . $start];
			$start++;
		}
		if(empty($posts[$x])){
			header("location: Application.php");	
		}
	}
	$postsLength = count($posts);

$apptime = date('Y-m-d');
$sqlInsert = "INSERT INTO Applications(`app_date`, ";
for($y = 0; $y < $postsLength; $y++){
	if($y === $postsLength - 1){
		$sqlInsert = $sqlInsert . "`answer_" . ($y + 1) . "`, `Old`, `Checked`) VALUES('" . $apptime . "', ";
	}else{
		$sqlInsert = $sqlInsert . "`answer_" . ($y + 1) . "`, ";	
	}
}
for($x = 0; $x < $postsLength; $x++){
	if($x === $postsLength - 1){	
		$sqlInsert = $sqlInsert . "'" . $posts[$x] ."', '0', '0')";
	}else{
		$sqlInsert = $sqlInsert . "'" . $posts[$x] ."', ";		
	}
}


mysqli_query($connect, $sqlInsert);

mysqli_close($connect);

?>

<!Doctype html>
<html>
   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Jorge Estrada, Marcos Herrera, Daniel Hiaem">
    <meta name = "description" content= "UCLA's TheBruinExperiment">
    <meta name = "keywords" content = "Science,fair,UCLA,TheBruinExperiment,Mukai, Hiaem">
     <title>TheBruinExperiment</title>
     <link rel="stylesheet" type="text/css" href="Success.css">
	 <link href="https://fonts.googleapis.com/css?family=Cabin+Sketch" rel="stylesheet" type="text/css">
     
     
   </head>

    <body id = "top">
    <section id = "head">
    	      <nav>
                 <a href="Team/the_team.html" class = "left">The Team</a>
                 <a href= "Past_Projects/past_projects.html" class="everyOther">Past Projects</a>
             </nav>
	 
  	<header> 		               	        
   			<h1>TheBruinExperiment</h1>
  	</header>
    </section>

      <div id="fullpage">
      
      <div class = "section active" id = "section0">
			<h1 class = "intro" id = "start">Application Submitted<!--<br/>You can now safely close the window--></h1>
      </div>
      
      	   <div class = "section fp-auto-height footer" id = "foot">
      	<a href  = "mailto:thebruinexperiment@gmail.com"><img src="../Images/mail.png" alt = "Mail" height="50" width="50" id = "space"></a>
        <a href= "https://www.facebook.com/thebruinexperiment/" target="_blank"><img src="../Images/Facebook.png" alt = "Facebook" height="50" width="50" class = "icons"></a>
        <a title = "1-310-999-1722" href="tel:13109991722"><img src="../Images/phone.png" alt = "Phone NUmber" height="50" width="50" class = "icons"></a>
       </div>

   
  </div>
</body>
</html>