$(document).ready(function(){
    $("#detalle_estadia").kendoGrid();
    
    $(".btn_vtna_ciudades").click(function(){
        i = $(this).parent().parent().index();
        $("#index_tr").val(i);
        $("#vtna_busca_ciudades").fadeIn(300);
        $("#fondooscuro").fadeIn(300);
    });
    
    function salir(){
        $("#vtna_busca_ciudades").fadeOut(300);
        $("#fondooscuro").fadeOut(300);
    }
    document.onkeydown = function(evt) {
            evt = evt || window.event;
            if (evt.keyCode == 27) {
                salir();
            }
        };
    $("#btn_selecciona_ciudad").click(function(){
        i=$("#index_tr").val();
        r=$("#regiones").val();
        idc=$("#ciudades").val();
        p=$("#provincias").val();
        if(idc=='' || r=='' || p==''){
            alert("Seleccione la procedencia");
            return 0;
        }
        c=$("#ciudades option:selected").html();
        html = '<input type="hidden" value="'+idc+'" name="ciudad[]"/>'+c;
        $("#detalle_estadia tr:eq("+i+") td:eq(4)").html(html);
        salir();
    });
    
    $("#btn_cancelar_ciudad").click(function(){
        salir();
    });
    
    $("#paises").change(function(){
        $("#regiones").html('<option></option>');
        $("#provincias").html('<option></option>');
        $("#ciudades").html('<option></option>')
        if($(this).val()){
            $.post('/jungla/pasajeros/get_regiones','idpais='+$(this).val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $("#regiones").append('<option value="'+ datos[i].IDUBIGEO + '">' + datos[i].DESCRIPCION+ '</option>');
                }
            },'json');
        }
    });
    
    $("#regiones").change(function(){
        $("#provincias").html('<option></option>');
        $("#ciudades").html('<option></option>')
        if($(this).val()){
            $.post('/jungla/pasajeros/get_provincias','idregion='+$(this).val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $("#provincias").append('<option value="'+ datos[i].IDUBIGEO + '">' + datos[i].DESCRIPCION+ '</option>');
                }
            },'json');
        }
    });
    
    $("#provincias").change(function(){
        $("#ciudades").html('<option></option>')
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
            setTimeout("window.location='/jungla/estadia'",1000);
            
            $("#frm").submit();
        }else{
            alert("Asegurese de confirmar los Doc. de Ident. de todos los pasajeros.\n"+
                "de lo contrario cancele la estadia");
        }
    });
});
    