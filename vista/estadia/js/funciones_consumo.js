$(document).ready(function(){
    $("#tbl_busca_productos").kendoGrid({
        dataSource: {
            pageSize: 7
        },
        pageable: true
    });
    $("#tbl_detalle_venta").kendoGrid();
    $("#vtna_busca_productos").hide();

    //ventana de busqueda de productos
    function salir(){
        $("#txt_buscar_productos").val('');
        $("#vtna_busca_productos").fadeOut(300);
        $("#fondooscuro").fadeOut(300);
    }
    
    $("#btn_vtna_productos").click(function(){
            buscar_producto();
            $("#vtna_busca_productos").fadeIn(300);
//            $("#fondooscuro").fadeIn(300);
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
        $.post('/sisjungla/productos/buscador','cadena='+$("#txt_buscar_productos").val()+'&filtro='+$("#filtro_productos").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla" id="tbl_busca_productos">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Unidad Medida</th>'+
                            '<th>Precio Venta</th>'+
                            '<th>Seleccionar</th>'+
                        '</tr>';
            for(var i=0;i<datos.length;i++){
                HTML = HTML + '<tr>';
                HTML = HTML + '<td>'+datos[i].idproducto+'</td>';
                HTML = HTML + '<td>'+datos[i].descripcion+'</td>';
                HTML = HTML + '<td>'+datos[i].um+'</td>';
                HTML = HTML + '<td>'+datos[i].precio_unitario+'</td>';
                id=datos[i].idproducto;
                producto=datos[i].descripcion;
                um=datos[i].um;
                pu=datos[i].precio_unitario;
                HTML = HTML + '<td><a href="javascript:void(0)" onclick="seleccionar_productos(\''+id+'\',\''+producto+'\',\''+um+'\',\''+pu+'\')" class="imgselect"></a></td>';
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
    
    //asignacion de productos o paquetes al detalle
    item=0;
    $("#asignar_producto").click(function(){
        idpro=$("#idproducto").val();
        pro=$("#producto").val();
        idpaq=$("#idpaquete").val();
        paq=$("#paquete").val();
        um=$("#unidad_medida").val();
        c=$("#cantidad").val();
        pre=$("#precio").val();
        error=false;
        msg='';
        x=0;
        if(pro == ""){alert("Seleccione un producto");return 0}
        if(c == "" || c == 0){
            alert("Ingrese cantidad");
            $(".cantidad").focus();
            return 0;
        }
        if(pre == ""){
            alert("Ingrese precio");
            $("#precio").focus();
            return 0;
        }
        $("#tbl_detalle_venta tr").each(function(){
            id_pro=$("#tbl_detalle_venta tr:eq("+x+") td:eq(1) :hidden").val();
            if(id_pro==idpro){
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
            html +='<td><input type="hidden" class="idproducto" value="'+idpro+'" name="idproduto[]"/>'+pro+'</td>';
            html +='<td><input type="hidden" value="'+um+'" name="um[]"/>'+um+'</td>';
            html +='<td><input type="hidden" value="'+c+'" name="cantidad[]"/>'+c+'</td>';
            html +='<td><input type="hidden" value="'+pre+'" name="precio[]"/>'+pre+'</td>';
            html +='<td><a href="javascript:void(0)" class="imgdelete eliminar"></a></td>';
            html +='</tr>';

            $("#tbl_detalle_venta").append(html);
            $("#unidad_medida").val('');
            $("#producto").val('');
            $("#paquete").val('');
            $(".cantidad").val('');
            $("#precio").val('');
            $("#txt_buscar_productos").val('');
        }
    });
    
    $(".eliminar").live('click', function() {
       i = $(this).parent().parent().index();
       $("#tbl_detalle_venta tr:eq("+i+")").remove();
       item=0;       
       x=0;
       $("#tbl_detalle_venta tr").each(function(){
           item++;
           $("#tbl_detalle_venta tr:eq("+x+") td:eq(0)").html(item);
           x++;
       });
   });
});

function seleccionar_productos(id,producto,um,pu){
    $("#idproducto").val(id);
    $("#producto").val(producto);
    $("#unidad_medida").val(um);
    $("#precio").val(pu);
    $("#vtna_busca_productos").fadeOut(300);
    $("#fondooscuro").fadeOut(300);
}

function validarVenta(){
    des = $("#tipo_transaccion").val();
    fv = $("#fecha_vencimiento").val();
    id = $("#intervalo_dias").val();
    if(des == 2){
        if(fv == ""){
            alert("Seleccione fecha de vencimiento");
            return false;
        }
        else{
            if(id == ""){
                alert("Seleccione intervalo de dias");
                return false;
            }
            else return true;
        }
    }
    else return true;
}