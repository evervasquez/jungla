$(document).ready(function(){
    $( "#nombre" ).focus(); 
    $( "#saveform" ).click(function(){
        bval = true;        
        bval = bval && $( "#nombre" ).required();   
        bval = bval && $( "#apellidos" ).required();
        bval = bval && $( "#dni" ).required(); 
        bval = bval && $( "#telefono" ).required(); 
        bval = bval && $( "#direccion" ).required(); 
        bval = bval && $( "#provincias" ).required();    
        bval = bval && $( "#profesion" ).required(); 
        bval = bval && $( "#fechanac" ).required(); 
        bval = bval && $( "#fechacon" ).required();   
        bval = bval && $( "#perfil" ).required(); 
        bval = bval && $( "#usuario" ).required(); 
        bval = bval && $( "#clave" ).required(); 
        bval = bval && $( "#actividad" ).required(); 
        bval = bval && $( "#tipo_emepleado" ).required(); 
        if ( bval && $( "#ubigeo" ).val()!=0) {
            $("#frm").submit();
        }
        return false;
    }); 
    
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
    //                $("#"+capa).html("<img src='/lp4/imagenes/loading.gif' alt='Cargando...'/>");    
    //                $("#"+capa).html("<img src='/lp4/imagenes/wait.gif' alt='Cargando...'/>");    
                },
                success:function(respuesta){
                    $("#valida_usuario").html(respuesta);
                }
            });
        }
    });
}); 
        