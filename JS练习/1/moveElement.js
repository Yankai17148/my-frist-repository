function moveElement( elementID, final_x, final_y, interval) {
	var elem = document.getElementById( elementID);
	if( elem.movement ){
		clearTimeout( elem.movement );
	}
	var xpos = parseInt( elem.style.left );
	var ypos = parseInt( elem.style.top );
	if( xpos == final_x && ypos == final_y ) {
		return true;
	}
	if( xpos < final_x ) {
		dist = Math.ceil( (final_x - xpos)/10 );
		xpos = xpos + dist;
	}
	if( xpos > final_x ) {
		dist = Math.ceil( (xpos - final_x)/10 );
		xpos = xpos - dist;
	}
	if( ypos < final_y) {
		dist = Math.ceil( (final_y - ypos)/10 );
		ypos = ypos + dist;
	}
	if( ypos > final_y ) {
		dist = Math.ceil( (ypos - final_y)/10 );
		ypos = ypos - dist;
	}

	elem.style.left = xpos + "px";
	elem.style.top = ypos + "px";
	var repeat = "moveElement('"+elementID+"' , "+final_x+" , "+final_y+" , "+interval+")";
	elem.movement = setTimeout( repeat , interval );
}

// function positionMessage() {
// 	var elem = document.getElementById("message");
// 	elem.style.position = "absolute";
// 	elem.style.left = "50px";
// 	elem.style.top = "100px";
// 	moveElement("message" , 200 , 100 , 2);
// }

// var btn = document.getElementById("btn");
// btn.onclick = function () {
// 	positionMessage();
// }


function prepareSlideshow() {
	//if( !document.getElementByTagName ) return false;
	var preview = document.getElementById( "preview" );
	preview.style.position = "absolute";
	preview.style.left = "0px";
	preview.style.top = "0px";
	var list = document.getElementById( "linklist" );
	var links = list.getElementsByTagName("a");

	links[0].onmouseover = function () {
		moveElement( "preview" , -100 , 0 , 10 );
	}
	links[1].onmouseover = function () {
		moveElement( "preview" , -200 , 0 , 10 );
	}
	links[2].onmouseover = function () {
		moveElement( "preview" , -300 , 0 , 10 );
	}
}
window.onLoad = prepareSlideshow();