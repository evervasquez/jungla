$(document).ready(function(){
    $('select').kendoComboBox();
    
    $("#paises").change(function(){
        if(!$("#paises").val()){
//            $("#regiones").html('<option></option>');
        }else{
            $.post('/sisjungla/empleados/get_regiones','idpais='+$("#paises").val(),function(datos){
                $("#regiones").kendoComboBox({
                    placeholder: "Seleccione...",
                    dataTextField: "descripcion",
                    dataValueField: "idubigeo",
                    dataSource: datos
                });
//                $("#regiones").html('<option></option>');
//                $("#provincias").html('<option></option>');
//                $("#ciudades_proveedores").html('<option></option>');
//                for(var i=0;i<datos.length;i++){
//                    $("#regiones").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
//                }
//                $("#regiones").kendoComboBox();
//                $("#provincias").kendoComboBox();
//                $("#ciudades_proveedores").kendoComboBox();
            },'json');
        }
    });
    
    $("#regiones").change(function(){
        if(!$("#regiones").val()){
//            $("#provincias").html('<option></option>');
        }else{
            $.post('/sisjungla/empleados/get_provincias','idregion='+$("#regiones").val(),function(datos){
                $("#provincias").kendoComboBox({
                    placeholder: "Seleccione...",
                    dataTextField: "descripcion",
                    dataValueField: "idubigeo",
                    dataSource: datos
                });
//                $("#provincias").html('<option></option>');
//                $("#ciudades_proveedores").html('<option></option>')
//                for(var i=0;i<datos.length;i++){
//                    $("#provincias").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
//                }
//                $("#provincias").kendoComboBox();
//                $("#ciudades_proveedores").kendoComboBox();
            },'json');
        }
    });
    
    $("#provincias").change(function(){
        if(!$("#provincias").val()){
//            $("#ciudades_proveedores").html('<option></option>');
        }else{
            $.post('/sisjungla/empleados/get_ciudades','idprovincia='+$("#provincias").val(),function(datos){
                $("#ciudades_proveedores").kendoComboBox({
                    placeholder: "Seleccione...",
                    dataTextField: "descripcion",
                    dataValueField: "idubigeo",
                    dataSource: datos
                });
//                $("#ciudades_proveedores").html('<option></option>');
//                for(var i=0;i<datos.length;i++){
//                    $("#ciudades_proveedores").append('<option value="'+ datos[i].idubigeo + '">' + datos[i].descripcion+ '</option>');
//                }       
//                $("#ciudades_proveedores").kendoComboBox();
            },'json');
        }
    });
    
}); 