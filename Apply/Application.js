function display(){
	'use strict';
	var sectionPart = document.getElementsByClassName("section");
	var section = document.getElementsByClassName("other");
	var hold;
	for(var i = 0; i < section.length; i++){
        if(section[i].selected === true){
			hold = document.createElement("input");
			hold.setAttribute('class', "nOther");
			hold.type = "text";
			hold.name = "nOther" + i + "";
			sectionPart[i].appendChild(hold);
		} else if(hold !== null){
			hold = document.getElementsByClassName("nOther");
			hold[i].parentNode.removeChild(hold[i]);
		}
	}
}