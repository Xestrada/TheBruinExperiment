<?php
	session_start();
	$host = "";
	$servername = "";
	$username = "";
	$password = "";
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
    <title>Emails</title>
    <link rel="stylesheet" type="text/css" href="Database.css">
	<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch" rel="stylesheet" type="text/css">
   </head>

   <body>
    <section id = "top">
      <section id = "head">
		<nav>
           <a href="Database.php" class = "left">View Applicants</a>
           <a href= "" class="everyOther">Edit Application</a>
           <a href = ""  class="everyOther">New Application</a>
           <a href = ""  class="everyOther">Change Login</a>
				 			 
        </nav>
		<header> 		               	        
   			<h1>Emails</h1></a>
  	    </header>
	  </section>
	</section>
    <section id = "center">
    <?php
		$host = "";
		$servername = "";
		$username = "";
		$password = "";
		$connect = mysqli_connect($host, $username, $password,$servername, 3306);
		
		$sqlCount = "SELECT answer_2 FROM Applications";
		$result = mysqli_query($connect, $sqlCount);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				echo  "<h1 class = 'applicant'>" . $row["answer_2"] . "</h1>";
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