$(document).ready(function(){
    $("#tbl_busca_productos").kendoGrid({
        dataSource: {
            pageSize: 7
        },
        pageable: true
    });
    $("#tbl_detalle_venta").kendoGrid();
    $("#vtna_busca_clientes").hide();
    $("#vtna_busca_clientes_juridicos").hide();
    $("#agrega_cliente_juridico").hide();
    
    //ventana inserta pasajero juridico
    $("#btn_vtna_agrega_pasajeros").click(function(){
        if($("#tipo_comprobante").val()==56){
            $("#agrega_cliente_juridico").show();
            $("#ruc").focus();
        }
    });
    
    $("#btn_inserta_cliente_juridico").click(function(){
        $.post('/jungla/estadia/inserta_cliente_juridico','nombres='+$("#razonsocial").val()+'&documento='+$("#ruc").val()+
            '&direccion='+$("#direccionrs").val(),
        function(datos){
            $("#idcliente").val(datos[0].IDCLIENTE);
            $("#cliente").val($("#razonsocial").val());
        },'json');
        $("#agrega_cliente_juridico").hide();
        $("#ruc").val('');
        $("#razonsocial").val('');
        $("#direccionrs").val('');
    });
    
    //verificar nro de ruc
    $("#ruc").blur(function(){
        if($(this).val()!='' && $(this).val().length==11){
            $.post('/jungla/pasajeros/buscador','cadena='+$("#ruc").val()+'&filtro=3',function(datos){
                if(datos.length>0){
                    alert('Ya esta registrado un pasajero con este Nro de RUC...');
                    $("#ruc").val('');
                }   
            },'json');
        }
    });

    $("#btn_cancelar_cliente_juridico").click(function(){
        $("#ruc").val('');
        $("#razonsocial").val('');
        $("#direccionrs").val('');
        $("#agrega_cliente_juridico").hide();
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
    importe = parseFloat($("#importe").val());
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
});

function seleccionar_cliente(id,cliente){
    $("#idcliente").val(id);
    $("#cliente").val(cliente);
    $("#vtna_busca_clientes").fadeOut(300);
    $("#txt_buscar_clientes").val('');
    $("#txt_buscar_clientes_juridicos").val('');
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