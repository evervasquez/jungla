// JavaScript Document

var x=$(document);
x.ready(inicio);

function inicio(){
	var x=$("#cuerpoLogin");
	x.hide();
	var x=$("#titleLogin");
	x.click(mostrar);
	var x=$(".boton");
	x.button();	
	var x=$("#acordeon");
	x.accordion();
}

function mostrar(){
	var x=$("#cuerpoLogin");
	x.toggle("fast");	
}

function validar(obj){
	user="admin";
	pass="123456";
	usuario=obj.usuario.value;
	clave=obj.clave.value;
	if(usuario==user && clave==pass){alert("Ingresaste");}
	else {alert("Usuario o clave incorrecta");}	
}