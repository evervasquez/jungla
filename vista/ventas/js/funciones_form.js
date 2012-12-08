$(document).ready(function(){
    $("#tbl_busca_productos").kendoGrid({
        dataSource: {
            pageSize: 7
        },
        pageable: true
    });
    $("#tbl_detalle_venta").kendoGrid();
    $("#vtna_busca_clientes").hide();
    $("#vtna_busca_paquetes").hide();
    $("#vtna_busca_clientes_juridicos").hide();
    
    //cambiar formularios
    if($("#cambia_form :selected").val()==0){
        $(".celda_paquete").hide();
        $(".celda_producto").show();
    }else{
        $(".celda_paquete").show();
        $(".celda_producto").hide();
    }
    
    $("#cambia_form").change(function(){
        if($(this).val()==0){
            $(".celda_paquete").hide();
            $(".celda_producto").show();
        }else{
            $(".celda_paquete").show();
            $(".celda_producto").hide();
        }
    });
    
    //ventana de busqueda de clientes
    $("#btn_vtna_clientes").click(function(){
        buscar_cliente();
        if($("#tipo_comprobante").val()==55){
            $("#vtna_busca_clientes").fadeIn(300);
            $("#txt_buscar_clientes").focus();
        }else{
            $("#vtna_busca_clientes_juridicos").fadeIn(300);
            $("#txt_buscar_clientes_juridicos").focus();
        }
        $("#fondooscuro").fadeIn(300);
    });
    
     $(".cancela_cli").click(function(){
        salir();
    });
    
    $("#txt_buscar_clientes").keypress(function(event){
       if(event.which == 13){
           buscar_cliente();
       } 
    });
    
    $("#btn_buscar_cliente").click(function(){
        buscar_cliente();
        $("#txt_buscar_clientes").focus();
    });
    
    function buscar_cliente(){
        if($("#tipo_comprobante").val()==55){
            $.post('/jungla/clientes/buscador','cadena='+$("#txt_buscar_clientes").val()+'&filtro='+$("#filtro_clientes").val(),function(datos){
                    HTML = '<table border="1" class="tabgrilla" id="tbl_busca_clientes">'+
                            '<tr>'+
                                '<th>Codigo</th>'+
                                '<th>Nombre/Razon Social</th>'+
                                '<th>DNI/RUC</th>'+
                                '<th>Direccion</th>'+
                                '<th>Seleccionar</th>'+
                            '</tr>';
                for(var i=0;i<datos.length;i++){
                    id=datos[i].IDCLIENTE;
                    if(datos[i].APELLIDOS != null){
                        cliente=datos[i].NOMBRES+' '+datos[i].APELLIDOS;
                    }else{
                        cliente=datos[i].NOMBRES;
                    }
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+id+'</td>';
                    HTML = HTML + '<td>'+cliente+'</td>';
                    HTML = HTML + '<td>'+datos[i].DOCUMENTO+'</td>';
                    HTML = HTML + '<td>'+datos[i].DIRECCION+'</td>';
                    HTML = HTML + '<td><a href="javascript:void(0)" onclick="seleccionar_cliente(\''+id+'\',\''+cliente+'\')" class="imgselect"></a></td>';
                    HTML = HTML + '</tr>';
                }            
                HTML = HTML + '</table>'
                    $("#grilla_clientes").html(HTML);
                    $("#tbl_busca_clientes").kendoGrid({
                        dataSource: {
                            pageSize: 7
                        },
                        pageable: true
                    });
            },'json');        
        }else{
            $.post('/jungla/clientes/buscador','cadena='+$("#txt_buscar_clientes_juridicos").val()+'&filtro='+$("#filtro_clientes_juridicos").val(),function(datos){
                    HTML = '<table border="1" class="tabgrilla" id="tbl_busca_clientes_juridicos">'+
                            '<tr>'+
                                '<th>Codigo</th>'+
                                '<th>Razon Social</th>'+
                                '<th>RUC</th>'+
                                '<th>Direccion</th>'+
                                '<th>Seleccionar</th>'+
                            '</tr>';
                for(var i=0;i<datos.length;i++){
                    id=datos[i].IDCLIENTE;
                    cliente=datos[i].NOMBRES;
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+id+'</td>';
                    HTML = HTML + '<td>'+cliente+'</td>';
                    HTML = HTML + '<td>'+datos[i].DOCUMENTO+'</td>';
                    HTML = HTML + '<td>'+datos[i].DIRECCION+'</td>';
                    HTML = HTML + '<td><a href="javascript:void(0)" onclick="seleccionar_cliente(\''+id+'\',\''+cliente+'\')" class="imgselect"></a></td>';
                    HTML = HTML + '</tr>';
                }            
                HTML = HTML + '</table>'
                    $("#grilla_clientes_juridicos").html(HTML);
                    $("#tbl_busca_clientes_juridicos").kendoGrid({
                        dataSource: {
                            pageSize: 7
                        },
                        pageable: true
                    });
            },'json');
        }
    }
    
    //ventana de busqueda de paquetes
    $("#btn_vtna_paquetes").click(function(){
            buscar_paquetes();
            $("#vtna_busca_paquetes").fadeIn(300);
            $("#txt_buscar_paquetes").focus();
    });
    
     $(".cancela_cli").click(function(){
        salir();
    });
    
    $("#txt_buscar_paquetes").keypress(function(event){
       if(event.which == 13){
           buscar_paquetes();
       } 
    });
    
    $("#btn_vtna_paquetes").click(function(){
        buscar_producto();
        $("#txt_buscar_paquetes").focus();
            $("#fondooscuro").fadeIn(300);
    });
    
    function buscar_paquetes(){
        $.post('/jungla/paquetes/buscador','descripcion='+$("#txt_buscar_paquetes").val()+'&filtro='+$("#filtro_paquetes").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla" id="tbl_busca_paquetes">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Costo</th>'+
                            '<th>Seleccionar</th>'+
                        '</tr>';
            for(var i=0;i<datos.length;i++){
                HTML = HTML + '<tr>';
                HTML = HTML + '<td>'+datos[i].IDPAQUETE+'</td>';
                HTML = HTML + '<td>'+datos[i].DESCRIPCION+'</td>';
                HTML = HTML + '<td>'+datos[i].COSTO+'</td>';
                id=datos[i].IDPAQUETE;
                paquete=datos[i].DESCRIPCION;
                c=datos[i].COSTO;
                HTML = HTML + '<td><a href="javascript:void(0)" onclick="seleccionar_paquetes(\''+id+'\',\''+paquete+'\',\''+c+'\')" class="imgselect"></a></td>';
                HTML = HTML + '</tr>';
            }            
            HTML = HTML + '</table>'
                $("#grilla_paquetes").html(HTML);
                $("#tbl_busca_paquetes").kendoGrid({
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
    function salir(){
        $("#txt_buscar_productos").val('');
        $("#vtna_busca_productos").fadeOut(300);
        $("#txt_buscar_paquetes").val('');
        $("#vtna_busca_paquetes").fadeOut(300);
        $("#txt_buscar_clientes").val('');
        $("#vtna_busca_clientes").fadeOut(300);
        $("#txt_buscar_clientes_juridicos").val('');
        $("#vtna_busca_clientes_juridicos").fadeOut(300);
        $("#fondooscuro").fadeOut(300);
    }
    
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
        desc= $("#descuento").val();
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
            t = importe + igv * (importe) - desc;
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
    
    $("#descuento").blur(function(){
        $("#igv").blur();
    });
    
    $("#descuento").keypress(function(event){
        if(event.which == 13){
            $("#igv").blur();
            event.preventDefault();
        }
    });
    
    $("#igv").blur(function(){
        if($(this).val()==''){
            igv=0;
        }else{
            igv=$("#igv").val();
        }
        if($("#descuento").val()==''){
            desc=0;
        }else{
            desc= $("#descuento").val();
        }
        t = importe + igv * (importe) - desc;
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
       importe=importe-$("#tbl_detalle_venta tr:eq("+i+") td:eq(5)").html();
       $("#tbl_detalle_venta tr:eq("+i+")").remove();
       item=0;       
       x=0;
       $("#tbl_detalle_venta tr").each(function(){
           item++;
           $("#tbl_detalle_venta tr:eq("+x+") td:eq(0)").html(item);
           x++;
       });
       $("#importe").val(importe);
       $("#igv").blur();
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

function seleccionar_paquetes(id,paquete,pu){
    $("#idpaquete").val(id);
    $("#paquete").val(paquete);
    $("#unidad_medida").val('paquetes');
    $("#precio").val(pu);
    $("#vtna_busca_paquetes").fadeOut(300);
    $("#fondooscuro").fadeOut(300);
}

function seleccionar_cliente(id,cliente){
    $("#idcliente").val(id);
    $("#cliente").val(cliente);
    $("#vtna_busca_clientes").fadeOut(300);
    $("#vtna_busca_clientes_juridicos").fadeOut(300);
    $("#fondooscuro").fadeOut(300);
    
}

function validarVenta(){
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