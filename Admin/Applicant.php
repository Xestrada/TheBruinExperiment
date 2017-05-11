<?php
	session_start();
	if(isset($_GET['num'])){
 		$_SESSION['num'] = $_GET['num'];
	}
?>
<!Doctype html>
<html>
   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Jorge Estrada, Marcos Herrera, Daniel Hiaem">
    <meta name = "description" content= "UCLA's TheBruinExperiment">
    <meta name = "keywords" content = "Science,fair,UCLA,TheBruinExperiment,Mukai, Hiaem">
    <title>TheBruinExperiment</title>
    <link rel="stylesheet" type="text/css" href="Applicant.css">
	<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch" rel="stylesheet" type="text/css">
    <script src="Applicant.js"></script>
    
   </head>
   <body>
    
    <section id = "top">
      <section id = "head">
    	      <nav>
              	<a href= "Database.php" class="everyOther">Applications</a>
           		<a href= "Edit_Application.php" class="everyOther">Edit Application</a>
           		<a href = "Change-Login.html"  class="everyOther">Change Login</a>		 			 
             </nav>
		<header> 		               	        
   			<h1>Applicant</h1>
  	    </header>
	  </section>
	</section>
    <section id = "center">
    <?php
		session_start();

		$connect = mysqli_connect($host, $username, $password,$servername, 3306);
		
		$sqlQuestions = "SELECT * FROM Questions";
		$questionResult = mysqli_query($connect, $sqlQuestions);
		$qRow = mysqli_fetch_assoc($questionResult);
		$qCount = count($qRow);
		
		$n = $_SESSION["num"];
		
		$sqlAnswers = "SELECT * FROM Applications WHERE app_num =" . $n;
		$row = mysqli_fetch_assoc(mysqli_query($connect, $sqlAnswers));
		$start = 1;
		
		for($x = 0; $x < $qCount; $x++){
			echo "<h1 class = 'question'>" . $start . ": " . $qRow['Q' . $start] . "</h1><br>";	
			echo "<h3 class = 'answer'>" . $row['answer_' . $start] . "</h3><br>";
			$start++;
		}
		
		

		echo "<input type = 'button' value = 'Delete Application' onClick = 'Delete(" . $_SESSION['num'] . ")'>";
		
		
?>
		
    </section>
	   <div class = "section fp-auto-height footer" id = "foot">
      	<a href  = "mailto:thebruinexperiment@gmail.com"><img src="../Images/mail.png" alt = "Mail" height="50" width="50" id = "space"></a>
        <a href= "https://www.facebook.com/thebruinexperiment/" target="_blank"><img src="../Images/Facebook.png" alt = "Facebook" height="50" width="50" class = "icons"></a>
        <a title = "1-310-999-1722" href="tel:13109991722"><img src="../Images/phone.png" alt = "Phone NUmber" height="50" width="50" class = "icons"></a>
       </div>
	   
	</body>
</html>