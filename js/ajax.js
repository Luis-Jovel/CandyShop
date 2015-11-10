function cargarHTTP(){
	var XMLHTTP;
	if(window.XMLHttpRequest){
		XMLHTTP = new XMLHttpRequest();
	}
	else{
		XMLHTTP = new ActiveXObject("Microsoft.XMLHTTP");
	}
	return XMLHTTP;
}

function cargarPags(div,seleccion,pagina){
	//alert(seleccion);
	ajax = cargarHTTP();//primer div
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4 && ajax.status==200){
			document.getElementById(div).innerHTML=ajax.responseText;
		}
	}
	
	ajax.open("POST",pagina,true);
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("seleccion="+seleccion);								
}