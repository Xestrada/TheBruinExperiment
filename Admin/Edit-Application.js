//AJAX call to update question in database
function UpdateQuestion(question, number){
	'use strict';
	var newQuestion;
	var type;
	var selections;
	var extraText;
	var extraTextPos;
	var url = "Update.php?";
	
	var start = 1;
	
	if(question === ""){
		
	}else{
		var xmlhttp = new XMLHttpRequest();
		type = document.getElementsByName("type" + (number + 1))[0].value;
		newQuestion = document.getElementsByName(question)[0].value;
		selections = document.getElementsByClassName("QT" + (number + 1) + "");
		extraText = document.getElementsByClassName("extratext").item(number).value;
		extraTextPos = document.getElementsByClassName("extraTextPos").item(number).value;
		
		
		for(var i = 0; i < 10; i++){
			if(i === 9){
				url = url + "selections_" + start + "= Other...&";
			}else{
				url = url + "selections_" + start + "= " + selections.item(i).value + "&";
			}
			start++;
		}
		xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                 window.alert("Question Updated");
             }
         };
		 xmlhttp.open("GET", url + "num=" + question + "&update=" + newQuestion + "&type=" + type + "&qNumber=" + (number + 1) + "&eqp=" + extraTextPos + "&eqt=" + extraText, true);
		 xmlhttp.send();
	}
	
}


//Shows or hides the selection
function SelectionDecider(num, show){
	'use strict';
	var section = document.getElementsByClassName("selectable").item(num);
	if(show === true){
		section.style.display = "block";
	}else{
		section.style.display = "none";
	}
}

function ExtraTextDecider(num, show){
	'use strict';
	var textarea = document.getElementsByClassName('extratext').item(num);
	if(show === true){
		textarea.style.display = "block";	
	}else{
		textarea.style.display = "none";	
	}
}


function AddQuestion(){
	'use strict';
	var url = "Create_New.php";
	//var start = 1;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
         if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
             window.alert("Question Added");
			 location.reload();
         }
     };
	 xmlhttp.open("GET", url, true);
	 xmlhttp.send();
	
}

function RemoveQuestion(questionNumber){
	'use strict';
	var url = "remove_question.php";
	//var start = 1;
	var xmlhttp = new XMLHttpRequest();
	var check;
	xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
			window.alert("Question " + questionNumber + " Removed");
			location.reload(true);
        }
     };
	 check = confirm("Are you sure you want to remove Question " + questionNumber + "?");
	 if(check === true){
		 xmlhttp.open("GET", url + "?qNum=" + questionNumber, true);
	 	xmlhttp.send();
	 }
	 
	
}

function UpdateHeader(){
	'use strict';
	var title = document.getElementById("title").value;
	var url = "Update-Header.php?title=" + title;
	var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
          	 if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
				 window.alert("Updated Title");
             }
         };
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
	
	
}

function UpdateFooter(){
	'use strict';
	alert("Ran");
	var footer = document.getElementById("footer").value;
	var url = "Update-Footer.php?footer=" + footer;
	var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
          	 if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
				 window.alert("Updated Footer");
             }
         };
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
	
	
}

