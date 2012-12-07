$(document).ready(function(){
    $("#tbl_busca_productos").kendoGrid({
        dataSource: {
            pageSize: 7
        },
        pageable: true
    });
    $("#tbl_detalle_salida_producto").kendoGrid();
    //ventana de busqueda de proveedores
     function salir(){
        $("#vtna_busca_proveedor").fadeOut(300);
        $("#txt_buscar_productos").val('');
        $("#vtna_busca_productos").fadeOut(300);
        $("#fondooscuro").fadeOut(300);
    }
    
    //ventana de busqueda de productos
    $("#btn_vtna_productos").click(function(){
            buscar_producto();
            $("#vtna_busca_productos").fadeIn(300);
            $("#fondooscuro").fadeIn(300);
            $("#txt_buscar_productos").focus();
    });
    
     $(".cancela_prod").click(function(){
            salir();
        });
    document.onkeydown = function(evt) {
        evt = evt || window.event;
        if (evt.keyCode == 27) {
            salir();
        }
    };
    
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
        $.post('/jungla/productos/buscador','cadena='+$("#txt_buscar_productos").val()+'&filtro='+$("#filtro_productos").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla" id="tbl_busca_productos">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Unidad Medida</th>'+
                            '<th>Seleccionar</th>'+
                        '</tr>';
            for(var i=0;i<datos.length;i++){
                
                HTML = HTML + '<tr>';
                HTML = HTML + '<td>'+datos[i].IDPRODUCTO+'</td>';
                HTML = HTML + '<td>'+datos[i].DESCRIPCION+'</td>';
                HTML = HTML + '<td>'+datos[i].UM+'</td>';
                id=datos[i].IDPRODUCTO;
                producto=datos[i].DESCRIPCION;
                um=datos[i].UM;
                HTML = HTML + '<td><a href="javascript:void(0)" onclick="seleccionar_productos(\''+id+'\',\''+producto+'\',\''+um+'\')" class="imgselect"></a></td>';
                HTML = HTML + '</tr>';
            }            
            HTML = HTML + '</table>'
                $("#grilla_productos").html(HTML);
                $("#tbl_busca_productos").kendoGrid({
                    dataSource: {
                        pageSize: 7
                    },
                    pageable: true
                });
        },'json');        
    }
    
    //asignacion de productos al detalle
    item = 0;
    $("#asignar_producto").click(function(){
        idm=$("#motivo").val();
        m=$("#motivo :selected").html();
        idp=$("#idproducto").val();
        pro=$("#producto").val();
        um=$("#unidad_medida").val();
        c=$("#cantidad").val();
        error=false;
        msg='';
        x=0;
        if(pro == ""){
            alert("Seleccione un producto");
        }
        else{
            if(c == "" || c == 0){
                alert("Ingrese cantidad");
                $(".cantidad").focus();
            }
            else{
                $("#tbl_detalle_salida_producto tr").each(function(){
                    id_p=$("#tbl_detalle_salida_producto tr:eq("+x+") td:eq(2) :hidden").val();
                    if(id_p==idp){
                        error=true;
                        msg='este producto ya fue seleccionado';
                    }
                    x++;
                });

                if(error){
                    alert(msg);
                }else{
                    item++;
                    html = '<tr>';
                    html +='<td>'+item+'</td>';
                    html +='<td><input type="hidden" value="'+idm+'" name="idtipo_movimiento[]"/>'+m+'</td>';
                    html +='<td><input type="hidden" value="'+idp+'" name="idproducto[]"/>'+pro+'</td>';
                    html +='<td><input type="hidden" value="'+c+'" name="cantidad[]"/>'+c+'</td>';
                    html +='<td>'+um+'</td>';
                    html +='<td><a href="javascript:void(0)" class="imgdelete eliminar"></a></td>';
                    html +='</tr>';

                    $("#tbl_detalle_salida_producto").append(html);
                    $("#unidad_medida").val('');
                    $("#producto").val('');
                    $(".cantidad").val('');
                    $("#txt_buscar_productos").val('');
                    $("#movimiento option:eq(0)").attr('selected',true);
                    $("#movimiento").kendoComboBox();
                }
            }
        }
    });
    
    $(".eliminar").live('click', function() {
       i = $(this).parent().parent().index();
       $("#tbl_detalle_salida_producto tr:eq("+i+")").remove();
       item=0;       
       x=0;
       $("#tbl_detalle_salida_producto tr").each(function(){
           item++;
           $("#tbl_detalle_salida_producto tr:eq("+x+") td:eq(0)").html(item);
           x++;
       });
   });
});

function seleccionar_productos(id,producto,um){
    $("#idproducto").val(id);
    $("#producto").val(producto);
    $("#unidad_medida").val(um);
    $("#vtna_busca_productos").fadeOut(300);
    $("#fondooscuro").fadeOut(300);
}