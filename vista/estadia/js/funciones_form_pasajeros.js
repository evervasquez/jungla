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
                $.post('/jungla/pasajeros/get_regiones','idpais='+$(this).val(),function(datos){
                    for(var i=0;i<datos.length;i++){
                        $(".regiones").append('<option value="'+ datos[i].IDUBIGEO + '">' + datos[i].DESCRIPCION+ '</option>');
                    }
                },'json');
            }
        }else{
            $(".regiones").html('<option>Seleccione...</option>');
            $(".provincias").html('<option>Seleccione...</option>');
            $(".ciudades").html('');
            $(".celda_region").hide();
            $(".celda_provincia").hide();
            $.post('/jungla/pasajeros/get_ciudades','idprovincia=0&idpais='+$(this).val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $(".ciudades").append('<option value="'+ datos[i].IDUBIGEO + '">' + datos[i].DESCRIPCION+ '</option>');
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
                $.post('/jungla/pasajeros/get_regiones','idpais='+$(this).val(),function(datos){
                    for(var i=0;i<datos.length;i++){
                        $(".regiones").append('<option value="'+ datos[i].IDUBIGEO + '">' + datos[i].DESCRIPCION+ '</option>');
                    }
                },'json');
            }
        }else{
            $(".regiones").html('<option>Seleccione...</option>');
            $(".provincias").html('<option>Seleccione...</option>');
            $(".ciudades").html('');
            $(".celda_region").hide();
            $(".celda_provincia").hide();
            $.post('/jungla/pasajeros/get_ciudades','idprovincia=0&idpais='+$(this).val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $(".ciudades").append('<option value="'+ datos[i].IDUBIGEO + '">' + datos[i].DESCRIPCION+ '</option>');
                }       
            },'json');
        }
        
    });
    
    $(".regiones").change(function(){
        if($(this).val()==1392){
            $(".celda_provincia").show();
            $(".provincias").html('<option>Seleccione...</option>');
            $.post('/jungla/pasajeros/get_provincias','idregion='+$(this).val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $(".provincias").append('<option value="'+ datos[i].IDUBIGEO + '">' + datos[i].DESCRIPCION+ '</option>');
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
            $.post('/jungla/pasajeros/get_provincias','idregion='+$(this).val(),function(datos_provincias){
                $.post('/jungla/pasajeros/get_ciudades','idprovincia='+datos_provincias[0].IDUBIGEO+'&idpais=0',function(datos){
                    for(var i=0;i<datos.length;i++){
                        $(".ciudades").append('<option value="'+ datos[i].IDUBIGEO + '">' + datos[i].DESCRIPCION+ '</option>');
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
            $.post('/jungla/pasajeros/get_ciudades','idprovincia='+$(this).val()+'&idpais=0',function(datos){
                for(var i=0;i<datos.length;i++){
                    $(".ciudades").append('<option value="'+ datos[i].IDUBIGEO + '">' + datos[i].DESCRIPCION+ '</option>');
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
    
    //valida existencia de pasajeros
    $("#nrodoc").blur(function(){
        if($(this).val()!='' && $(this).val().length==8){
            $.post('/jungla/pasajeros/buscador','cadena='+$("#nrodoc").val()+'&filtro=2',function(datos){
                if(datos.length>0){
                    alert('Ya esta registrado un pasajero con este Nro de DNI...');
                    $("#nrodoc").val('');
                }   
            },'json');
        }
    });
    
    $("#ruc").blur(function(){
        if($(this).val()!=''){
            $.post('/jungla/pasajeros/buscador','cadena='+$("#ruc").val()+'&filtro=3',function(datos){
                if(datos.length>0){
                    if(confirm('Ya existe un pasajero con este Nro de RUC...\nDesea editar sus datos?')){
                        window.location = '/jungla/pasajeros/editar/'+datos[0].IDCLIENTE
                    }else{
                        window.location = '/jungla/pasajeros/';
                    }
                }   
            },'json');
        }
    });
    
}); 