// JavaScript Document

var x=$(document);
x.ready(inicio);

function inicio(){
	var x=$("#login");
	x.hide();
	var x=$("#titleLogin");
	x.click(mostrar);
}

function mostrar(){
	var x=$("#login");
	x.toggle("fast");	
}
