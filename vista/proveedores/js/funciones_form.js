$(document).ready(function(){
    $( "#razon_social" ).focus(); 
    $( "#saveform" ).click(function(){
        bval = true;        
        bval = bval && $( "#razon_social" ).required();
        bval = bval && $( "#ruc" ).required();      
        bval = bval && $( "#paises" ).required();
        bval = bval && $( "#regiones" ).required();
        bval = bval && $( "#provincias" ).required();
        bval = bval && $( "#ciudades_proveedores" ).required();
        bval = bval && $( "#direccion" ).required();
        bval = bval && $( "#representante" ).required();
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   

    $("#regiones").change(function(){
        if(!$("#regiones").val()){
            $("#provincias").html('<option>Seleccione...</option>');
            $("#ciudades_proveedores").html('<option>Seleccione...</option>');
        }else{
            $("#provincias").html('<option>Seleccione...</option>');
            $("#ciudades_proveedores").html('<option>Seleccione...</option>');
            $.post('/sisjungla/proveedores/get_provincias','idregion='+$("#regiones").val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $("#provincias").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }
            },'json');
        }
    });
    
    $("#provincias").change(function(){
        if(!$("#provincias").val()){
            $("#ciudades_proveedores").html('<option>Seleccione...</option>');
        }else{
            $("#ciudades_proveedores").html('<option>Seleccione...</option>');
            $.post('/sisjungla/proveedores/get_ciudades','idprovincia='+$("#provincias").val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $("#ciudades_proveedores").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
                }       
            },'json');
        }
    });
    
}); 