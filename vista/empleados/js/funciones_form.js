$(document).ready(function(){
    $( "#nombre" ).focus(); 
    $( "#saveform" ).click(function(){
        bval = true;        
        bval = bval && $( "#nombre" ).required();   
        bval = bval && $( "#apellidos" ).required();
        bval = bval && $( "#dni" ).required(); 
        bval = bval && $( "#telefono" ).required(); 
        bval = bval && $( "#direccion" ).required(); 
        bval = bval && $( "#paises" ).required(); 
        bval = bval && $( "#regiones" ).required(); 
        bval = bval && $( "#provincias" ).required(); 
        bval = bval && $( "#ubigeo" ).required();   
        bval = bval && $( "#profesion" ).required(); 
        bval = bval && $( "#fechanac" ).required(); 
        bval = bval && $( "#fechacon" ).required();   
        bval = bval && $( "#perfil" ).required(); 
        bval = bval && $( "#usuario" ).required(); 
        bval = bval && $( "#clave" ).required(); 
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    }); 
//    $('select').kendoComboBox();
    
    $("#paises").change(function(){
        if(!$("#paises").val()){
            $("#regiones").html('<option></option>');
        }else{
            $.post('/sisjungla/empleados/get_regiones','idpais='+$("#paises").val(),function(datos){
//                $("#regiones").kendoComboBox({
//                    placeholder: "Seleccione...",
//                    dataTextField: "descripcion",
//                    dataValueField: "idubigeo",
//                    dataSource: datos
//                });
                $("#regiones").html('<option></option>');
                $("#provincias").html('<option></option>');
                $("#ubigeo").html('<option></option>');
                for(var i=0;i<datos.length;i++){
                    $("#regiones").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }
//                $("#regiones").kendoComboBox();
//                $("#provincias").kendoComboBox();
//                $("#ubigeo").kendoComboBox();
            },'json');
        }
    });
    
    $("#regiones").change(function(){
        if(!$("#regiones").val()){
            $("#provincias").html('<option></option>');
        }else{
            $.post('/sisjungla/empleados/get_provincias','idregion='+$("#regiones").val(),function(datos){
//                $("#provincias").kendoComboBox({
//                    placeholder: "Seleccione...",
//                    dataTextField: "descripcion",
//                    dataValueField: "idubigeo",
//                    dataSource: datos
//                });
                $("#provincias").html('<option></option>');
                $("#ubigeo").html('<option></option>')
                for(var i=0;i<datos.length;i++){
                    $("#provincias").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }
//                $("#provincias").kendoComboBox();
//                $("#ubigeo").kendoComboBox();
            },'json');
        }
    });
    
    $("#provincias").change(function(){
        if(!$("#provincias").val()){
            $("#ciudades").html('<option></option>');
        }else{
            $.post('/sisjungla/empleados/get_ciudades','idprovincia='+$("#provincias").val(),function(datos){
//                $("#ubigeo").kendoComboBox({
//                    placeholder: "Seleccione...",
//                    dataTextField: "descripcion",
//                    dataValueField: "idubigeo",
//                    dataSource: datos
//                });
                $("#ubigeo").html('<option></option>');
                for(var i=0;i<datos.length;i++){
                    $("#ubigeo").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }       
//                $("#ubigeo").kendoComboBox();
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
        