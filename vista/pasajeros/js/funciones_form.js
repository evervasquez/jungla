$(document).ready(function(){
    $("#frm_natural").kendoValidator();
    $("#frm_juridico").kendoValidator();
    $("#tipo_cliente").focus();
    $("#pais").change(function(){
        if($(this).val()==193){
            $(".celda_region").show();
            if(!$(this).val()){
                $(".regiones").html('<option>Seleccione...</option>');
                $(".provincias").html('<option>Seleccione...</option>');
                $(".ciudades").html('<option value="0">Seleccione...</option>')
            }else{
                $(".regiones").html('<option>Seleccione...</option>');
                $(".provincias").html('<option>Seleccione...</option>');
                $(".ciudades").html('<option value="0">Seleccione...</option>')
                $.post('/sisjungla/pasajeros/get_regiones','idpais='+$(this).val(),function(datos){
                    for(var i=0;i<datos.length;i++){
                        $(".regiones").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                    }
                },'json');
            }
        }else{
            $(".regiones").html('<option>Seleccione...</option>');
            $(".provincias").html('<option>Seleccione...</option>');
            $(".ciudades").html('');
            $(".celda_region").hide();
            $(".celda_provincia").hide();
            $.post('/sisjungla/pasajeros/get_ciudades','idprovincia=0&idpais='+$(this).val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $(".ciudades").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }       
            },'json');
        }
        
    });

    $("#paises").change(function(){
        if($(this).val()==193){
            $(".celda_region").show();
            if(!$(this).val()){
                $(".regiones").html('<option>Seleccione...</option>');
                $(".provincias").html('<option>Seleccione...</option>');
                $(".ciudades").html('<option value="0">Seleccione...</option>')
            }else{
                $(".regiones").html('<option>Seleccione...</option>');
                $(".provincias").html('<option>Seleccione...</option>');
                $(".ciudades").html('<option value="0">Seleccione...</option>')
                $.post('/sisjungla/pasajeros/get_regiones','idpais='+$(this).val(),function(datos){
                    for(var i=0;i<datos.length;i++){
                        $(".regiones").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                    }
                },'json');
            }
        }else{
            $(".regiones").html('<option>Seleccione...</option>');
            $(".provincias").html('<option>Seleccione...</option>');
            $(".ciudades").html('');
            $(".celda_region").hide();
            $(".celda_provincia").hide();
            $.post('/sisjungla/pasajeros/get_ciudades','idprovincia=0&idpais='+$(this).val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $(".ciudades").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }       
            },'json');
        }
        
    });
    
    $(".regiones").change(function(){
        if($(this).val()==1392){
            $(".celda_provincia").show();
            $(".provincias").html('<option>Seleccione...</option>');
            $.post('/sisjungla/pasajeros/get_provincias','idregion='+$(this).val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $(".provincias").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }
            },'json');
        }else{
            $(".celda_provincia").hide();
        }
        if(!$(this).val()){
            $(".provincias").html('<option>Seleccione...</option>');
            $(".ciudades").html('<option value="0">Seleccione...</option>');
        }else{
            $(".provincias").html('');
            $(".ciudades").html('');
            $.post('/sisjungla/pasajeros/get_provincias','idregion='+$(this).val(),function(datos_provincias){
                $.post('/sisjungla/pasajeros/get_ciudades','idprovincia='+datos_provincias[0].idubigeo+'&idpais=0',function(datos){
                    for(var i=0;i<datos.length;i++){
                        $(".ciudades").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                    }       
                },'json');
            },'json');
        }
        
    });
    
    $(".provincias").change(function(){
        if(!$(this).val()){
            $(".ciudades").html('<option value="0">Seleccione...</option>');
        }else{
            $(".ciudades").html('');
            $.post('/sisjungla/pasajeros/get_ciudades','idprovincia='+$(this).val()+'&idpais=0',function(datos){
                for(var i=0;i<datos.length;i++){
                    $(".ciudades").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }       
            },'json');
        }
    });
    $("#frm_cliente_juridico").hide();
    $(".celda_region").hide();
    $(".celda_provincia").hide();
    $(".celda_ciudad").hide();
    $("#tipo_cliente").change(function(){
        $(".celda_region").hide();
        $(".celda_provincia").hide();
        $(".celda_ciudad").hide();
        if($(this).val()=='natural'){
            $("#frm_cliente_natural").show();
            $("#frm_cliente_juridico").hide();
        }else{
            $("#frm_cliente_natural").hide();
            $("#frm_cliente_juridico").show();
        }
    });
    
}); 