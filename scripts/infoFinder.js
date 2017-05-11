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

function divSetter(){
	"use strict";
	var pageHeight = document.getElementById("top").clientHeight;
	var headerHeight = document.getElementById("head").clientHeight;
	//window.alert(window.screen.height + " " + window.screen.width);
	var percent = 1 - (headerHeight/pageHeight);
	var pixelHeight = pageHeight*percent;
	var sections = document.getElementsByClassName("section");
	for(var i = 0; i < sections.length; i++){
		sections.item(i).style.height = pixelHeight + "px";
	}
}

function iframeSetter(){
	"use strict";
	var pageHeight = document.getElementById("top").clientHeight;
	var headerHeight = document.getElementById("head").clientHeight;
	var percent = 1 - (headerHeight/pageHeight);
	var pixelHeight = pageHeight*percent;
	var iframe = document.getElementById("iframe");
	//iframe.style.height = pixelHeight + "px";
}
 
 //function zoomOut(){
	//"use strict";
	//var page = document.getElementById("top");
	//var paragraphs = document.getElementsByTagName("p");
	//window.alert(window.screen.availHeight + " " + window.screen.availWidth);
	//if(window.screen.height < 800){
			//page.style.zoom = 85 + "%";
			/*for(var i = 0; i < paragraphs.length; i++){
				paragraphs.item(i).style.fontSize = 15 + "px";	
			}*/
	//}
//}
