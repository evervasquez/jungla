$(document).ready(function(){
    $("#tbl_detalle_compra").kendoGrid();
    $("#fecha_compra").kendoDatePicker({
       value:new Date(),
       format: "dd-MM-yyyy"
    });
    $("#nro_comprobante").focus();
    $("#tbl_busca_proveedor").kendoGrid({
        dataSource: {
            pageSize: 7
        },
        pageable: true
    });
    $("#tbl_busca_productos").kendoGrid({
        dataSource: {
            pageSize: 7
        },
        pageable: true
    });
    //ventana de busqueda de proveedores
    $("#btn_vtna_proveedores").click(function(){
        buscar_proveedor();
        $("#vtna_busca_proveedor").fadeIn(300);
        $("#fondooscuro").fadeIn(300);
        $("#txt_buscar_proveedor").focus();
    }); 
     function salir(){
        $("#vtna_busca_proveedor").fadeOut(300);
        $("#txt_buscar_productos").val('');
        $("#vtna_busca_productos").fadeOut(300);
        $("#fondooscuro").fadeOut(300);
    }
     $(".cancela_prov").click(function(){
         salir();
    });
    document.onkeydown = function(evt) {
        evt = evt || window.event;
        if (evt.keyCode == 27) {
            salir();
        }
    };        
    
    $("#txt_buscar_proveedor").keypress(function(event){
       if(event.which == 13){
           buscar_proveedor();
       } 
    });
    
    $("#btn_buscar_proveedor").click(function(){
        buscar_proveedor();
        $("#txt_buscar_proveedor").focus();
    });
    
    function buscar_proveedor(){
        $.post('/sisjungla/proveedores/buscador','cadena='+$("#txt_buscar_proveedor").val()+'&filtro='+$("#filtro_proveedor").val(),function(datos){
            HTML = '<table border="1" class="tabgrilla" id="tbl_busca_proveedor" width="500px">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Razon Social</th>'+
                            '<th>Representante</th>'+
                            '<th>Seleccionar</th>'+
                        '</tr>';
            for(var i=0;i<datos.length;i++){
                
                HTML = HTML + '<tr>';
                HTML = HTML + '<td>'+datos[i].idproveedor+'</td>';
                HTML = HTML + '<td>'+datos[i].razon_social+'</td>';
                HTML = HTML + '<td>'+datos[i].representante+'</td>';
                id=datos[i].idproveedor;
                proveedor=datos[i].razon_social;
                HTML = HTML + '<td><a href="javascript:void(0)" onclick="seleccionar(\''+id+'\',\''+proveedor+'\')" class="imgselect"></a></td>';
                HTML = HTML + '</tr>';
            }
            HTML += '</table>';
            $("#grilla_proveedores").html(HTML);
            $("#tbl_busca_proveedor").kendoGrid({
                    dataSource: {
                        pageSize: 7
                    },
                    pageable: true
                });
            
        },'json');        
    }
    //tipo_transaccion
    if($("#tipo_transaccion :selected").val()==2){
        $("#celda_credito").show();
    }else{
        $("#celda_credito").hide();
    }
    
    $("#tipo_transaccion").change(function(){
        if($(this).val()==2){
            $("#celda_credito").show();
        }else{
            $("#celda_credito").hide();
        }
    });
    
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
                        pageSize: 7
                    },
                    pageable: true
                });
        },'json');        
    }
    
    //asignacion de productos al detalle
    item = 0;
    importe = 0;
    $("#asignar_producto").click(function(){
        idp=$("#idproducto").val();
        pro=$("#producto").val();
        um=$("#unidad_medida").val();
        c=$("#cantidad").val();
        pre=$("#precio").val();
        igv = $("#igv").val();
        error=false;
        msg='';
        x=0;
        if(pro == ""){
            alert("Seleccione un producto");
            return 0;
        }
        if(c == "" || c == 0){
            alert("Ingrese cantidad");
            $(".cantidad").focus();
            return 0;
        }
        if(pre == ""){
            alert("Ingrese precio");
            $(".precio").focus();
            return 0;
        }
        $("#tbl_detalle_compra tr").each(function(){
            id_p=$("#tbl_detalle_compra tr:eq("+x+") td:eq(1) :hidden").val();
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
            html +='<td><input type="hidden" value="'+idp+'" name="idprodutos[]"/>'+pro+'</td>';
            html +='<td>'+um+'</td>';
            html +='<td><input type="hidden" value="'+c+'" name="cantidad[]"/>'+c+'</td>';
            html +='<td><input type="hidden" value="'+pre+'" name="precio[]"/>'+pre+'</td>';
            st=pre*c;
            html +='<td>'+st+'</td>';
            html +='<td><a href="javascript:void(0)" class="imgdelete eliminar"></a></td>';
            html +='</tr>';

            importe += st;
            t = importe + igv * (importe);
            $("#importe").val(importe);
            $("#total").val(t);

            $("#tbl_detalle_compra").append(html);
            $("#unidad_medida").val('');
            $("#producto").val('');
            $(".cantidad").val('');
            $(".precio").val('');
            $("#txt_buscar_productos").val('');
        }
    });

    $("#igv").blur(function(){
        if($(this).val()==''){
            igv=0;
        }else{
            igv=$("#igv").val();
        }
        t = importe + igv * (importe);
        $("#total").val(t);
    });
    
    $("#igv").keypress(function(event){
        if(event.which == 13){
            $("#igv").blur();
            event.preventDefault();
        }
    });
    
    $(".eliminar").live('click', function() {
       i = $(this).parent().parent().index();
       importe=importe-$("#tbl_detalle_compra tr:eq("+i+") td:eq(5)").html();
       $("#tbl_detalle_compra tr:eq("+i+")").remove();
       item=0;       
       x=0;
       $("#tbl_detalle_compra tr").each(function(){
           item++;
           $("#tbl_detalle_compra tr:eq("+x+") td:eq(0)").html(item);
           x++;
       });
       $("#importe").val(importe);
       $("#igv").blur();
   });
});
function seleccionar(id,proveedor){
    $("#idproveedor").val(id);
    $("#proveedor").val(proveedor);
    $("#vtna_busca_proveedor").fadeOut(300);
    $("#fondooscuro").fadeOut(300);
    $("#proveedor").focus();
}

function seleccionar_productos(id,producto,um){
    $("#idproducto").val(id);
    $("#producto").val(producto);
    $("#unidad_medida").val(um);
    $("#vtna_busca_productos").fadeOut(300);
    $("#fondooscuro").fadeOut(300);
}

function validarCompra(){
    des = $( "#tipo_transaccion" ).val();
    fv = $( "#fecha_vencimiento" ).val();
    id = $( "#intervalo_dias" ).val();
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