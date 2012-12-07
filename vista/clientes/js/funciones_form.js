$(document).ready(function(){
    $("#fechanac").kendoDatePicker({
        start: "century",
        depth: "1990-1999",
        format: "dd-MM-yyyy"
    });
    $("#frm_natural").kendoValidator();
    $("#frm_juridico").kendoValidator();
    $("#tipo_cliente").focus();
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
    
    //valida existencia de cliente
    $("#nrodoc").blur(function(){
        if($(this).val()!=''){
            $.post('/jungla/clientes/buscador','cadena='+$("#nrodoc").val()+'&filtro=2',function(datos){
                if(datos.length>0){
                    if(confirm('Ya existe un cliente con este Nro de DNI...\nDesea editar sus datos?')){
                        window.location = '/jungla/clientes/editar/'+datos[0].idcliente
                    }else{
                        window.location = '/jungla/clientes/';
                    }
                }   
            },'json');
        }
    });
    
    $("#ruc").blur(function(){
        if($(this).val()!=''){
            $.post('/jungla/clientes/buscador','cadena='+$("#ruc").val()+'&filtro=3',function(datos){
                if(datos.length>0){
                    if(confirm('Ya existe un cliente con este Nro de RUC...\nDesea editar sus datos?')){
                        window.location = '/jungla/clientes/editar/'+datos[0].idcliente
                    }else{
                        window.location = '/jungla/clientes/';
                    }
                }   
            },'json');
        }
    });
    
}); 
        
