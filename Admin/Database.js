function DatabaseQuestion(){
	'use strict';
	var section = document.getElementById("center");
	var qSelection = document.getElementById("qSelection").value;
	var xmlhttp = new XMLHttpRequest();
	var url = "Database-Updater.php?question=";
	xmlhttp.onreadystatechange = function() {
       if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
           	section.innerHTML = xmlhttp.responseText;
         }
    };
	
	xmlhttp.open("GET", url + qSelection, true);
	xmlhttp.send();
}