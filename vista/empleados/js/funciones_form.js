$(document).ready(function(){
    $( "#nombre" ).focus(); 
    $("#provincias").change(function(){
        if(!$("#provincias").val()){
            $("#ubigeo").html('<option>Seleccione...</option>');
        }else{
            $("#ubigeo").html('<option>Seleccione...</option>');
            $.post('/sisjungla/empleados/get_ciudades','idprovincia='+$("#provincias").val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $("#ubigeo").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }       
            },'json');
        }
    });
    
    $("#usuario").blur(function(){
        if($("#usuario").val()!=''){
            $.ajax({
                type:"POST",
                url:'/sisjungla/empleados/valida_usuario',
                data:"usuario="+$("#usuario").val(),
                beforeSend:function(){
                    $("#valida_usuario").html("cargando...");    
                },
                success:function(respuesta){
                    $("#valida_usuario").html(respuesta);
                }
            });
        }
    });
}); 
        