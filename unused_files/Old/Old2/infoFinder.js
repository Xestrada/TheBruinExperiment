// JavaScript Document

function zoomPreventor(){
	"use strict";
	var page = document.getElementById("page");
	var bod = document.getElementById("body");
	bod.style.minWidth = bod.clientWidth + "px";
	bod.style.minHeight = bod.clientHeight + "px";
	page.style.minHeight = page.clientHeight + "px";
	page.style.minWidth = page.clientWidth + "px";
}

//function fitToPage(){
	//"use strict";
	//if(document.getElementById("page").clientWidth > 1000){
		//document.getElementById("page").width = document.getElementById("page").clientWidth;
	//}
//}
