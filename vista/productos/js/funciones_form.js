$(document).ready(function(){
    $("#descripcion").focus(); 
    function get_um(unidad){
        $.post('/sisjungla/productos/get_um','id=0',function(datos){
            $("#unidad_medida").html('<option></option>');
            for(var i=0;i<datos.length;i++){
                if(datos[i].descripcion==unidad){
                    $("#unidad_medida").append('<option selected="selected" value="'+ datos[i].idunidad_medida + '">' + datos[i].descripcion+ '</option>');
                }else{
                    $("#unidad_medida").append('<option value="'+ datos[i].idunidad_medida + '">' + datos[i].descripcion+ '</option>');
                }
            }
            $("#unidad_medida").kendoComboBox();
        },'json');
    }
    
    $("#um").click(function(){
            var pwd = $(this).next().html();
            $("#ventana_unidad_medida").fadeIn(300);
            $("#fondooscuro").fadeIn(300);
    }); 
    $("#btn_um").click(function(){
        um = $("#des_um").val();
        ab = $("#abreviatura_um").val();
        if (um =="") {
            alert("Ingrese descripcion");
            $("#des_um").focus();
        }
        else{
            if(ab == ""){
                alert("Ingrese abreviatura");
                $("#abreviatura_um").focus();
            }
            else{
                $.post('/sisjungla/productos/inserta_um','descripcion='+$("#des_um").val()+"&abreviatura="+$("#abreviatura_um").val())
                $("#ventana_unidad_medida").fadeOut(300);
                $("#fondooscuro").fadeOut(300); 
                get_um($("#des_um").val());
                $("#des_um").val(''); 
                $("#abreviatura_um").val(''); 
            }
        }      
    });
    $(".close").click(function(){
            $("#ventana_unidad_medida").fadeOut(300);
            $("#fondooscuro").fadeOut(300);
            $("#des_um").css('border','solid 1px #000');
            $("#abreviatura_um").css('border','solid 1px #000');
    });
    
}); 