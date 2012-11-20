$(document).ready(function(){
    $("#compra").change(function(){
        if($("#compra").val()!=''){
            $.ajax({
                type:"POST",
                url:'/sisjungla/entrada_productos/get_detalle_compra',
                data:"idcompra="+$("#compra").val(),
                dataType: "json",
                beforeSend:function(){
                    $("#infocompra").html("cargando...");    
                },
                success:function(datos){
                    html = '<table border="1">';
                    html += '<tr>';
                    html += '<th>Producto</th>';
                    html += '<th>UM</th>';
                    html += '<th>Cantidad</th>';
                    html += '<th>Confirmar</th>';
                    html += '</tr>';
                    for(var i=0;i<datos.length;i++){
                        html += '<tr>';
                        html += '<td>'+datos[i].producto+'</td>';
                        html += '<td>'+datos[i].um+'</td>';
                        html += '<td>'+datos[i].cantidad+'</td>';
                        html += '<td><input type="checkbox" /></td>';
                        html += '</tr>';
                    }
                    html += '</table>';
                    html += '<td colspan="4"><p><button type="button" class="k-button" id="confirma_entrada" >Confirmar</button>';
                    html += '<a href="/sisjungla/entrada_productos/" class="k-button cancel" >Cancelar</a></p></td>';
                    $("#infocompra").html(html);
                }
            });
        }else{
            $("#infocompra").html('');
        }
    });
    
    $("#confirma_entrada").live('click', function(){
        tc=$('input:checkbox').length;
        cs=$('input:checkbox').filter(":checked").length;
        if(tc==cs){
            $.post("/sisjungla/entrada_productos/inserta","idcompra="+$("#compra").val(),function(datos){
                alert("productos ingresador al almacen");
                window.location = '/sisjungla/entrada_productos/';
            },'json');
        }else{
            alert("Asegurese de confirmar la entrada de todos los productos de la compra.\n"+
                "de lo contrario cancele la entrada y comuniquelo al administrador");
        }
    });
});