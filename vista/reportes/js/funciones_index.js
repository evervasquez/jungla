$(document).ready(function(){
    $("#tbl_busca_productos").kendoGrid({
        dataSource: {
            pageSize: 7
        },
        pageable: true
    });
    
    //ventana de busqueda de productos
    function salir(){
        $("#txt_buscar_productos").val('');
        $("#vtna_busca_productos").fadeOut(300);
        $("#fondooscuro").fadeOut(300);
    }
    
    $(".btn_vtna_productos").click(function(){
            buscar_producto();
            
            $("#vtna_busca_productos").fadeIn(300);
            $("#fondooscuro").fadeIn(300);
            $("#txt_buscar_productos").focus();
    });
    $(".btn_vtna_productos2").click(function(){
            buscar_producto2();
            
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
                            '<th>Precio Venta</th>'+
                            '<th>Seleccionar</th>'+
                        '</tr>';
            for(var i=0;i<datos.length;i++){
                HTML = HTML + '<tr>';
                HTML = HTML + '<td>'+datos[i].IDPRODUCTO+'</td>';
                HTML = HTML + '<td>'+datos[i].DESCRIPCION+'</td>';
                HTML = HTML + '<td>'+datos[i].UM+'</td>';
                HTML = HTML + '<td>'+datos[i].PRECIO_UNITARIO+'</td>';
                id=datos[i].IDPRODUCTO;
                producto=datos[i].DESCRIPCION;
                um=datos[i].UM;
                pu=datos[i].PRECIO_UNITARIO;
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
    function buscar_producto2(){
        $.post('/jungla/productos/buscador','cadena='+$("#txt_buscar_productos").val()+'&filtro='+$("#filtro_productos").val(),function(datos){
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
                HTML = HTML + '<td>'+datos[i].IDPRODUCTO+'</td>';
                HTML = HTML + '<td>'+datos[i].DESCRIPCION+'</td>';
                HTML = HTML + '<td>'+datos[i].UM+'</td>';
                HTML = HTML + '<td>'+datos[i].PRECIO_UNITARIO+'</td>';
                id=datos[i].IDPRODUCTO;
                producto=datos[i].DESCRIPCION;
                um=datos[i].UM;
                pu=datos[i].PRECIO_UNITARIO;
                HTML = HTML + '<td><a href="javascript:void(0)" onclick="seleccionar_productos2(\''+id+'\',\''+producto+'\',\''+um+'\',\''+pu+'\')" class="imgselect"></a></td>';
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
    item = 0;
    importe = 0;
    $("#asignar_producto").click(function(){
        idpro=$("#idproducto").val();
        pro=$("#producto").val();
        idpaq=$("#idpaquete").val();
        paq=$("#paquete").val();
        um=$("#unidad_medida").val();
        c=$("#cantidad").val();
        pre=$("#precio").val();
        igv = $("#igv").val();
        error=false;
        msg='';
        x=0;
        if($("#cambia_form").val()==0){
            if(pro == ""){alert("Seleccione un producto");return 0}
        }else{
            if(paq == ""){alert("Seleccione un paquete");return 0}
        }
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
            if($("#cambia_form").val()==0){
                id_pro=$("#tbl_detalle_venta tr:eq("+x+") td:eq(1) :hidden").val();
                if(id_pro==idpro && $("#tbl_detalle_venta tr:eq("+x+") td:eq(1) :hidden").attr('class')=='idproducto'){
                    error=true;
                    msg='este producto ya fue seleccionado';
                }
                x++;
            }else{
                id_paq=$("#tbl_detalle_venta tr:eq("+x+") td:eq(1) :hidden").val();
                if(id_paq==idpaq && $("#tbl_detalle_venta tr:eq("+x+") td:eq(1) :hidden").attr('class')=='idpaquete'){
                    error=true;
                    msg='este paquete ya fue seleccionado';
                }
                x++;
            }
        });

        if(error){
            alert(msg);
        }else{
            item++;
            html = '<tr>';
            html +='<td>'+item+'</td>';
            if($("#cambia_form").val()==0){
                html +='<td><input type="hidden" class="idproducto" value="'+idpro+'" name="idproduto[]"/>'+pro+'</td>';
            }else{
                html +='<td><input type="hidden" class="idpaquete" value="'+idpaq+'" name="idpaquete[]"/>'+paq+'</td>';
            }
            html +='<td><input type="hidden" value="'+um+'" name="um[]"/>'+um+'</td>';
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

            $("#tbl_detalle_venta").append(html);
            $("#unidad_medida").val('');
            $("#producto").val('');
            $("#paquete").val('');
            $(".cantidad").val('');
            $("#precio").val('');
            $("#txt_buscar_productos").val('');
            $("#txt_buscar_paquetes").val('');
            $("#txt_buscar_clientes").val('');
        }
    });    
});
    
function seleccionar_productos(id,producto,um,pu){
    $("#idproducto").val(id);
    $("#producto").val(producto);
    $("#unidad_medida").val(um);
    $("#precio").val(pu);
    $("#vtna_busca_productos").fadeOut(300);
    $("#fondooscuro").fadeOut(300);
    $("#chk_todo").attr("checked", false);
}
function seleccionar_productos2(id,producto,um,pu){
    $("#idproducto2").val(id);
    $("#producto2").val(producto);
    $("#unidad_medida").val(um);
    $("#precio").val(pu);
    $("#vtna_busca_productos").fadeOut(300);
    $("#fondooscuro").fadeOut(300);
    $("#chk_todo2").attr("checked", false);
}
function todo(Form)
{
    if(Form.chk_todo.checked){
        
        Form.idproducto.value = '*';
        Form.producto.value = '(TODOS)';
    } else{
        Form.idproducto.value = '';
        Form.producto.value = '';
        Form.producto.placeholder = 'Busque Producto';
    }
}
function todo2(Form)
{
    if(Form.chk_todo2.checked){
        
        Form.idproducto2.value = '*';
        Form.producto2.value = '(TODOS)';
    } else{
        Form.idproducto2.value = '';
        Form.producto2.value = '';
        Form.producto2.placeholder = 'Busque Producto';
    }
}