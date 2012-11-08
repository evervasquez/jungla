$(document).ready(function(){
    $("#descripcion").focus(); 
    $("#saveform").click(function(){
        bval = true;        
        bval = bval && $( "#descripcion" ).required();  
        bval = bval && $( "#stock" ).required();
        bval = bval && $( "#precio_unitario" ).required();
        bval = bval && $( "#precio_compra" ).required();  
        bval = bval && $( "#tipo_producto" ).required(); 
        bval = bval && $( "#unidad_medida" ).required();  
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    }); 
    $("#unidad_medida").kendoComboBox();
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
            bval = true;        
            bval = bval && $( "#des_um" ).required();    
            bval = bval && $( "#abreviatura_um" ).required();
            if ( bval ) {
                $.post('/sisjungla/productos/inserta_um',
            'descripcion='+$("#des_um").val()+"&abreviatura="+$("#abreviatura_um").val())
            $("#ventana_unidad_medida").fadeOut(300);
            $("#fondooscuro").fadeOut(300); 
            get_um($("#des_um").val());
            $("#des_um").val(''); 
            $("#abreviatura_um").val(''); 
            }
            return false;
    });
    $(".close").click(function(){
            $("#ventana_unidad_medida").fadeOut(300);
            $("#fondooscuro").fadeOut(300);
            $("#des_um").css('border','solid 1px #000');
            $("#abreviatura_um").css('border','solid 1px #000');
    });
            
}); 