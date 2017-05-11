function Delete(number){
	'use strict';
	var url = "Delete_Application.php";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
       if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
           	window.location = "Database.php";
         }
     };
	 var check = confirm("Continue with deleting application?");
	 if(check === true){
	 	xmlhttp.open("GET", url + "?num=" + number);
	 	xmlhttp.send();
	 }else{
		 
	 }
}