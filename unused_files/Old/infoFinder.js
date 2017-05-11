// JavaScript Document


function classToggle(a){
	"use strict";
	if(document.getElementById(a).className !== "flipped"){
		document.getElementById(a).className = "flipped";
	}else{
		document.getElementById(a).className -= "flipped";
	}
}

function divSetup(){
		"use strict";
		var div = document.getElementById("container");
		var h2 = document.getElementById("h2width");
		div.style.width = h2.clientWidth + "px";
		h2.style.width = h2.clientWidth + "px";

}

function zoomPreventor(){
	"use strict";
	var page = document.getElementById("page");
	var bod = document.getElementById("body");
	bod.style.minWidth = bod.clientWidth + "px";
	bod.style.minHeight = bod.clientHeight + "px";
	page.style.minHeight = page.clientHeight + "px";
	page.style.minWidth = page.clientWidth + "px";
}
