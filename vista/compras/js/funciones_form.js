$(document).ready(function(){
    $("#vtna_busca_proveedor").hide();
    $("#vtna_busca_productos").hide();
    
    //ventana de busqueda de proveedores
    $("#btn_vtna_proveedores").click(function(){
        $("#vtna_busca_proveedor").show();
        $("#txt_buscar_proveedor").focus();
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
            HTML = '<table border="1" class="tabgrilla" id="tbl_busca_proveedor">'+
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
                HTML = HTML + '<td><a href="#" onclick="seleccionar(\''+id+'\',\''+proveedor+'\')">[Seleccionar]</a></td>';
                HTML = HTML + '</tr>';
            }
            HTML += '</table>';
            $("#grilla_proveedores").html(HTML);
            $("#tbl_busca_proveedor").kendoGrid({
                    dataSource: {
                        pageSize: 5
                    },
                    pageable: true
                });
            
        },'json');        
    }
    //ventana de busqueda de productos
    $("#btn_vtna_productos").click(function(){
        $("#vtna_busca_productos").show();
        $("#txt_buscar_productos").focus();
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
                proveedor=datos[i].descripcion;
                HTML = HTML + '<td><a href="#" onclick="seleccionar_productos(\''+id+'\',\''+proveedor+'\')">[Seleccionar]</a></td>';
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
    
    item = 0;
    importe = 0;
    $("#asignar_producto").click(function(){
        idp=$("#idproducto").val();
        pro=$("#producto").val();
        idum=$("#unidad_medida").val();
        um=$("#unidad_medida option:selected").html();
        c=$("#cantidad").val();
        pre=$("#precio").val();
        igv = $("#igv").val();
        t=0;
        error=false;
        msg='';
        
        $("#tbl_detalle_compra tr").each(function(){
            id_p=$("#tbl_detalle_compra tr td:eq(1) :hidden").val();
            if(id_p==idp){
                error=true;
                msg='este producto ya fue seleccionado';
            }
        });
        
        if(error){
            alert(msg);
        }else{
            item++;
            html = '<tr>';
            html +='<td>'+item+'</td>';
            html +='<td><input type="hidden" value="'+idp+'" name="idprodutos[]"/>'+pro+'</td>';
            html +='<td><input type="hidden" value="'+idum+'" name="idums[]"/>'+um+'</td>';
            html +='<td>'+c+'</td>';
            html +='<td>'+pre+'</td>';
            st=pre*c;
            html +='<td>'+st+'</td>';
            html +='</tr>';
            
            importe += st;
            t = importe + igv * (importe);
            $("#importe").val(importe);
            $("#total").val(t);
            
            $("#tbl_detalle_compra").append(html);
            $("#unidad_medida option:eq(0)").attr('selected',true);
            $("#unidad_medida").kendoComboBox();
            $("#producto").val('');
            $("#cantidad").val('');
            $("#precio").val('');
        }
    });

    $("#igv").blur(function(){
        if($(this).val()==''){
            $("#igv").val('0');
        }
        igv=$("#igv").val();
        t = importe + igv * (importe);
        $("#total").val(t);
    });
});
function seleccionar(id,proveedor){
    $("#idproveedor").val(id);
    $("#proveedor").val(proveedor);
    $("#vtna_busca_proveedor").hide();
}

function seleccionar_productos(id,producto){
    $("#idproducto").val(id);
    $("#producto").val(producto);
    $("#vtna_busca_productos").hide();
}