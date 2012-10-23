// JavaScript Document

var x=$(document);
x.ready(inicio);

function inicio(){
	var x=$("#login");
	x.hide();
	var x=$("#titleLogin");
	x.click(mostrar);
	$("h1,h2,h3,h4,h5,#login h1#titleLogin,#titServicios").textShadow();
}

function mostrar(){
	var x=$("#login");
	x.toggle("fast");	
}
