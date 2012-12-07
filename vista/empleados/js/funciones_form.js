var fecha = new Date();
$(document).ready(function(){
    $( "#nombre" ).focus(); 
    $("#fechanac").kendoDatePicker({
        start: "century",
        depth: "1990-1999",
        format: "dd-MM-yyyy"
    });
    $("#fechacon").kendoDatePicker({
        value: new Date(fecha.getFullYear(), fecha.getMonth(), fecha.getDate()),
        start: "year",
        depth: "month",
        format: "dd-MM-yyyy"
    });
    $("#provincias").change(function(){
        if(!$("#provincias").val()){
            $("#ubigeo").html('<option>Seleccione...</option>');
        }else{
            $("#ubigeo").html('<option>Seleccione...</option>');
            $.post('/jungla/empleados/get_ciudades','idprovincia='+$("#provincias").val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $("#ubigeo").append('<option value="'+ datos[i].IDUBIGEO + '">' + datos[i].DESCRIPCION+ '</option>');
                }       
            },'json');
        }
    });
    
    $("#usuario").blur(function(){
        if($("#usuario").val()!=''){
            $.ajax({
                type:"POST",
                url:'/jungla/empleados/valida_usuario',
                data:"usuarioz="+$("#usuario").val(),
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
function validarEmpleado(){
    des = $( "#val_usuario" ).val();
    if(des == 0){
        alert("Debes cambiar cuenta de usuario");
        return false;
    }
    else return true;
}
        