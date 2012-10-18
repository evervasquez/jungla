// JavaScript Document

var x=$(document);
x.ready(inicio);

$(document).ready(function() {
                // create DatePicker from input HTML element
                $("#datepicker").kendoDatePicker();
});

function inicio(){
	var x=$("#cuerpoLogin");
	x.hide();
	var x=$("#background");
	x.hide();
	var x=$("#calendar");
	x.hide();
	var x=$("#calendario");
	x.focus(mostrarCalendar);
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

function mostrarCalendar(){
	var x=$("#background");
	x.toggle("fast");
	var x=$("#calendar").kendoCalendar();
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