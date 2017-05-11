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
<!doctype html>
<html>
   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Jorge Estrada, Marcos Herrera, Daniel Hiaem">
    <meta name = "description" content= "UCLA's TheBruinExperiment">
    <meta name = "keywords" content = "Science,fair,UCLA,TheBruinExperiment,Mukai, Hiaem">
    <title>Applications</title>
    <link rel="stylesheet" type="text/css" href="Database.css">
	<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch" rel="stylesheet" type="text/css">
    <script src="Database.js"></script>
   </head>

   <body>
    <section id = "top">
      <section id = "head">
		<nav>
           <a href= "Edit_Application.php" class="everyOther">Edit Application</a>
           <a href = "Change-Login.html"  class="everyOther">Change Login</a>
				 			 
        </nav>
		<header> 		               	        
   			<h1>Applications</h1></a>
  	    </header>
	  </section>
	</section>
    <?php
		session_start();
		$host = "pdb6.biz.nf";
		$servername = "2025366_tbe";
		$username = "2025366_tbe";
		$password = "#BRUINS_DATA1";
		$connect = mysqli_connect($host, $username, $password,$servername, 3306);
		
		$questionSQL = "SELECT * FROM Questions";
		$qArray = mysqli_fetch_assoc(mysqli_query($connect, $questionSQL));
		$count = count($qArray);
		
		
		$sqlCount = "SELECT * FROM Applications";
		$result = mysqli_query($connect, $sqlCount);

		
		$selectQuestion = "<select id = 'qSelection' onChange='DatabaseQuestion()'>";
		
		for($i = 1; $i <= $count; $i++){
			if($i === 1){
				$selectQuestion = $selectQuestion . "<option value = '" . $i . "' selected>" . $qArray["Q" . $i] . "</option>";
			}else{
				$selectQuestion = $selectQuestion . "<option value = '" . $i . "'>" . $qArray["Q" . $i] . "</option>";	
			}
		}
		
		$selectQuestion = $selectQuestion . "</select>";
		
		echo $selectQuestion;
		
		echo "<section id = 'center'>";
		
		
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				echo  "<h1 class = 'applicant'><a href = 'Applicant.php?num=" . $row["app_num"] . "'>" . $row["app_num"] . ": " . $row["answer_1"] . " (" .$row["app_date"] . ")". "</a></h1>";	
			}
		}	
	?>
    </section>

	   <div class = "section fp-auto-height footer" id = "foot">
      	<a href  = "mailto:thebruinexperiment@gmail.com"><img src="../Images/mail.png" alt = "Mail" height="50" width="50" id = "space"></a>
        <a href= "https://www.facebook.com/thebruinexperiment/" target="_blank"><img src="../Images/Facebook.png" alt = "Facebook" height="50" width="50" class = "icons"></a>
        <a title = "1-310-999-1722" href="tel:13109991722"><img src="../Images/phone.png" alt = "Phone NUmber" height="50" width="50" class = "icons"></a>
       </div>
	</body>
</html>