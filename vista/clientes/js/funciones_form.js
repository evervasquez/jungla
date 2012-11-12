$(document).ready(function(){
    
    $( "#saveformnatural" ).click(function(){
        bval = true;        
        bval = bval && $( "#nombre" ).required();   
        bval = bval && $( "#apellidos" ).required();
        bval = bval && $( "#nrodoc" ).required(); 
        bval = bval && $( "#telefono" ).required(); 
        bval = bval && $( "#direccion" ).required(); 
        if ( bval ) {
            $("#frm_natural").submit();
        }
        return false;
    }); 
    
    $( "#saveformjuridico" ).click(function(){
        bval = true;        
        bval = bval && $( "#razonsocial" ).required();   
        bval = bval && $( "#ruc" ).required(); 
        bval = bval && $( "#direccionrs" ).required(); 
        if ( bval ) {
            $("#frm_juridico").submit();
        }
        return false;
    }); 
    
    $("#region").change(function(){
        if(!$(this).val()){
            $(".provincias").html('<option value="0">Seleccione...</option>');
            $(".ciudades").html('<option value="0">Seleccione...</option>')
        }else{
            $(".provincias").html('<option value="0">Seleccione...</option>');
            $(".ciudades").html('<option value="0">Seleccione...</option>')
            $.post('/sisjungla/clientes/get_provincias','idregion='+$(this).val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $(".provincias").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }
            },'json');
        }
    });
    
    $("#regiones").change(function(){
        if(!$(this).val()){
            $(".provincias").html('<option value="0">Seleccione...</option>');
            $(".ciudades").html('<option value="0">Seleccione...</option>')
        }else{
            $(".provincias").html('<option value="0">Seleccione...</option>');
            $(".ciudades").html('<option value="0">Seleccione...</option>')
            $.post('/sisjungla/clientes/get_provincias','idregion='+$(this).val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $(".provincias").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }
            },'json');
        }
    });
    
    $(".provincias").change(function(){
        if(!$(this).val()){
            $(".ciudades").html('<option value="0">Seleccione...</option>');
        }else{
            $(".ciudades").html('<option value="0">Seleccione...</option>');
            $.post('/sisjungla/clientes/get_ciudades','idprovincia='+$(this).val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $(".ciudades").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }       
            },'json');
        }
    });
    $("#frm_cliente_juridico").hide();
    $("#tipo_cliente").change(function(){
        if($(this).val()=='natural'){
            $("#frm_cliente_natural").show();
            $("#frm_cliente_juridico").hide();
        }else{
            $("#frm_cliente_natural").hide();
            $("#frm_cliente_juridico").show();
        }
    });
    
}); 
        
