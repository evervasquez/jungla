$(document).ready(function(){
    $( "#razon_social" ).focus(); 
    
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