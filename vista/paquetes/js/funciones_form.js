$(document).ready(function(){
    $("#codigo").focus();
    $("#tbl_productos_paquete").kendoGrid();
    $("#tbl_busca_productos").kendoGrid({
                    dataSource: {
                        pageSize: 5
                    },
                    pageable: true
                });
    $("#vtna_busca_productos").hide();

    //ventana de busqueda de productos
    $("#btn_vtna_productos").click(function(){
            buscar_producto();
            var pwd = $(this).next().html();
            $("#vtna_busca_productos").fadeIn(300);
            $("#fondooscuro").fadeIn(300);
            $("#txt_buscar_productos").focus();
    });
    
     $(".cancela_prod").click(function(){
            $("#txt_buscar_productos").val('');
            $("#vtna_busca_productos").fadeOut(300);
            $("#fondooscuro").fadeOut(300);
        });
    
    $("#txt_buscar_productos").keypress(function(event){
       if(event.which == 13){
           buscar_producto();
       } 
    });
    
    $("#btn_buscar_producto").click(function(){
        buscar_producto();
        $("#txt_buscar_productos").focus();
    });
    
    function buscar_producto(){
        $.post('/sisjungla/productos/buscador','cadena='+$("#txt_buscar_productos").val()+'&filtro='+$("#filtro_productos").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla" id="tbl_busca_productos">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Unidad Medida</th>'+
                            '<th>Seleccionar</th>'+
                        '</tr>';
            for(var i=0;i<datos.length;i++){
                
                HTML = HTML + '<tr>';
                HTML = HTML + '<td>'+datos[i].idproducto+'</td>';
                HTML = HTML + '<td>'+datos[i].descripcion+'</td>';
                HTML = HTML + '<td>'+datos[i].um+'</td>';
                id=datos[i].idproducto;
                producto=datos[i].descripcion;
                um=datos[i].um;
                HTML = HTML + '<td><a href="javascript:void(0)" onclick="seleccionar_productos(\''+id+'\',\''+producto+'\',\''+um+'\')" class="imgselect"></a></td>';
                HTML = HTML + '</tr>';
            }            
            HTML = HTML + '</table>'
                $("#grilla_productos").html(HTML);
                $("#tbl_busca_productos").kendoGrid({
                    dataSource: {
                        pageSize: 5
                    },
                    pageable: true
                });
        },'json');        
    }
    
    //asignacion de productos al detalle
    $("#asignar_producto").click(function(){
        idp=$("#idproducto").val();
        pro=$("#producto").val();
        um=$("#unidad_medida").val();
        c=$("#cantidad").val();
        error=false;
        msg='';
        if(pro == ''){
           alert("Seleccione producto");
        }
        else{
            if(c == 0 || c == ''){
                alert("Ingrese cantidad");
                $(".cantidad").focus();
            }
            else{
                x=0;
                $("#tbl_productos_paquete tr").each(function(){
                    id_p=$("#tbl_productos_paquete tr:eq("+x+") td:eq(0) :input").val();
                    if(id_p==idp){
                        error=true;
                        msg='este producto ya fue seleccionado';
                    }
                    x++;
                });

                if(error){
                    alert(msg);
                }else{
                    html = '<tr>';
                    html +='<td><input type="hidden" value="'+idp+'" name="idproducto[]"/>'+pro+'</td>';
                    html +='<td>'+um+'</td>';
                    html +='<td><input type="hidden" value="'+c+'" name="cantidad[]"/>'+c+'</td>';
                    html +='<td><a href="javascript:void(0)" class="imgdelete eliminar"></a></td>';
                    html +='</tr>';

                    $("#tbl_productos_paquete").append(html);
                    $("#unidad_medida").val('');
                    $("#producto").val('');
                    $(".cantidad").val('');
                    $("#txt_buscar_productos").val('');
                }
            }
        }
    });
    
    $(".eliminar").live('click', function() {
       i = $(this).parent().parent().index();
       $("#tbl_productos_paquete tr:eq("+i+")").remove();
   });
});

function seleccionar_productos(id,producto,um){
    $("#idproducto").val(id);
    $("#producto").val(producto);
    $("#unidad_medida").val(um);
    $("#vtna_busca_productos").fadeOut(300);
    $("#fondooscuro").fadeOut(300);
}