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

/*function validar(obj){
	usuario=obj.usuario.value;
	clave=obj.clave.value;
	if(usuario==""){alert("Debe ingresar el usuario"); obj.usuario.focus(); return 0;}
	if(clave==""){alert("Debe ingresar el contrasena"); obj.contrasena.focus(); return 0;}
}*/
