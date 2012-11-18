$(document).ready(function(){
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
    $("#tbl_detalle_compra").kendoGrid();
    $("#celda_credito").hide();
    $("#tipo_transaccion").prop("disabled",true);
    $("#tipo_transaccion").kendoComboBox();
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
    a=1;
    imp=0;
    $("#tbl_detalle_compra tr").each(function(){
        if(!isNaN(parseFloat($("#tbl_detalle_compra tr:eq("+a+") td:eq(5)").html()))){
            imp += parseFloat($("#tbl_detalle_compra tr:eq("+a+") td:eq(5)").html());
        }
        a++;
    });
    $("#importe").val(imp);
    tot= (1 + parseFloat($("#igv").val()) ) * parseFloat($("#importe").val())
    $("#total").val(tot);
    //ventana de busqueda de proveedores
    $("#btn_vtna_proveedores").click(function(){
            var pwd = $(this).next().html();
            $("#vtna_busca_proveedor").fadeIn(300);
            $("#fondooscuro").fadeIn(300);
            $("#txt_buscar_proveedor").focus();
    }); 
     $(".cancela_prov").click(function(){
        $("#vtna_busca_proveedor").fadeOut(300);
        $("#fondooscuro").fadeOut(300);
    });
        
    
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
                            '<th>Seleccionar</th>'+
                        '</tr>';
            for(var i=0;i<datos.length;i++){
                
                HTML = HTML + '<tr>';
                HTML = HTML + '<td>'+datos[i].idproducto+'</td>';
                HTML = HTML + '<td>'+datos[i].descripcion+'</td>';
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
    item = $("#tbl_detalle_compra tr:last td:eq(0)").html();
    importe = parseFloat($("#importe").val());
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
        }
        else{
            if(c == "" || c == 0){
                alert("Ingrese cantidad");
                $(".cantidad").focus();
            }
            else{
                if(pre == ""){
                    alert("Ingrese precio");
                    $(".precio").focus();
                }
                else{
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
                        html +='<td width="40px">'+item+'</td>';
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
                }
            }
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
       idc=$("#codigo").val();
       idp=$("#tbl_detalle_compra tr:eq("+i+") td:eq(1) .producto").val();
       $.post('/sisjungla/compras/eliminar_detalle_compra','idcompra='+idc+'&idprodutos='+idp);
       importe=importe-$("#tbl_detalle_compra tr:eq("+i+") td:eq(5)").html();
       $("#tbl_detalle_compra tr:eq("+i+")").remove();
       item=0;       
       x=1;
       $("#tbl_detalle_compra tr").each(function(){
           item++;
           $("#tbl_detalle_compra tr:eq("+x+") td:eq(0)").html(item);
           x++;
       });
       item--;
       $("#importe").val(importe);
       $("#igv").blur();
   });
   
});
function seleccionar(id,proveedor){
    $("#idproveedor").val(id);
    $("#proveedor").val(proveedor);
    $("#vtna_busca_proveedor").fadeOut(300);
    $("#fondooscuro").fadeOut(300);
}

function seleccionar_productos(id,producto,um){
    $("#idproducto").val(id);
    $("#producto").val(producto);
    $("#unidad_medida").val(um);
    $("#vtna_busca_productos").fadeOut(300);
    $("#fondooscuro").fadeOut(300);
}