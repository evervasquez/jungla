$(document).ready(function(){
    $("#detalle_estadia").kendoGrid();
    $("#vtna_busca_ciudades").hide();
    
    $(".btn_vtna_ciudades").click(function(){
        i = $(this).parent().parent().index();
        $("#index_tr").val(i);
        $("#vtna_busca_ciudades").show();
    });
    
    $("#btn_selecciona_ciudad").click(function(){
        i=$("#index_tr").val();
        idc=$("#ciudades").val();
        c=$("#ciudades option:selected").html();
        html = '<input type="hidden" value="'+idc+'" name="ciudad[]"/>'+c;
        $("#detalle_estadia tr:eq("+i+") td:eq(4)").html(html);
        $("#vtna_busca_ciudades").hide();
    });
    
    $("#btn_cancelar_ciudad").click(function(){
        $("#vtna_busca_ciudades").hide();
    });
    
    $("#paises").change(function(){
        $("#regiones").html('<option>Seleccione...</option>');
        $("#provincias").html('<option>Seleccione...</option>');
        $("#ciudades").html('<option value="0">Seleccione...</option>')
        if($(this).val()){
            $.post('/jungla/pasajeros/get_regiones','idpais='+$(this).val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $("#regiones").append('<option value="'+ datos[i].IDUBIGEO + '">' + datos[i].DESCRIPCION+ '</option>');
                }
            },'json');
        }
    });
    
    $("#regiones").change(function(){
        $("#provincias").html('<option>Seleccione...</option>');
        $("#ciudades").html('<option value="0">Seleccione...</option>')
        if($(this).val()){
            $.post('/jungla/pasajeros/get_provincias','idregion='+$(this).val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $("#provincias").append('<option value="'+ datos[i].IDUBIGEO + '">' + datos[i].DESCRIPCION+ '</option>');
                }
            },'json');
        }
    });
    
    $("#provincias").change(function(){
        $("#ciudades").html('<option value="0">Seleccione...</option>')
        if($(this).val()){
            $.post('/jungla/pasajeros/get_ciudades','idprovincia='+$(this).val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $("#ciudades").append('<option value="'+ datos[i].IDUBIGEO + '">' + datos[i].DESCRIPCION+ '</option>');
                }
            },'json');
        }
    });
    
    $("#btn_confirmar").click(function(){
        error=false;
        msg="";
        x=0;
        $("#detalle_estadia tr").each(function(){
            b = $("#detalle_estadia tr:eq("+x+") td:eq(4) :button").length;
            cabecera = $("#ciudad").html();
            if(b==1){
                error= true;
                if(cabecera=='Destino'){
                    msg = "Por favor seleccione la ciudad destino de todos los pasajeros";
                }else{
                    msg = "Por favor seleccione la ciudad de procedencia de todos los pasajeros";
                }
            }
            x++;
        });
        
        if(error){
            alert(msg);
            return 0;
        }
        tc=$('input:checkbox').length;
        cs=$('input:checkbox').filter(":checked").length;
        if(tc==cs){
            $("#frm").submit();
        }else{
            alert("Asegurese de confirmar los Doc. de Ident. de todos los pasajeros.\n"+
                "de lo contrario cancele la estadia");
        }
    });
});
