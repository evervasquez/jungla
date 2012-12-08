    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Codigo", width:8},
                {field:"NroComprobante", width:15},
                {field:"Proveedor", width:15},
                {field:"FechaCompra", width:15},
                {field:"Importe", width:8},
                {field:"IGV", width:8},
                {field:"Total", width:8},
                {field:"TipoTransaccion", width:15},
                {field:"Acciones", width:10,attributes:{class:"acciones"}}]
        });
        $( "#buscar" ).focus();
        function buscar(){
            $.post('/jungla/compras/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Nro.Comprobante</th>'+
                            '<th>Proveedor</th>'+
                            '<th>Fecha de Compra</th>'+
                            '<th>Importe</th>'+
                            '<th>IGV</th>'+
                            '<th>Total</th>'+
                            '<th>Tipo de Transaccion</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].IDCOMPRA+'</td>';
                    HTML = HTML + '<td>'+datos[i].NRO_COMPROBANTE+'</td>';
                    HTML = HTML + '<td>'+datos[i].PROVEEDOR+'</td>';
                    HTML = HTML + '<td>'+datos[i].FECHA_COMPRA+'</td>';
                    HTML = HTML + '<td>'+datos[i].IMPORTE+'</td>';
                    HTML = HTML + '<td>'+datos[i].IGV+'</td>';
                    HTML = HTML + '<td>'+(parseFloat(datos[i].IGV)+1)*(datos[i].IMPORTE)+'</td>';
                    HTML = HTML + '<td>'+datos[i].tipo+'</td>';
                    var editar='/jungla/compras/editar/'+datos[i].IDCOMPRA; 
                    var eliminar='/jungla/compras/eliminar/'+datos[i].IDCOMPRA;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit" ></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="ver(\''+datos[i].IDCOMPRA+'\')" class="imgview"></a>';
                    HTML = HTML + '</td>';
                    HTML = HTML + '</tr>';
                }
                HTML = HTML + '</table>'
                $("#grilla").html(HTML);
                $(".tabgrilla").kendoGrid({
                    dataSource: {
                        pageSize: 7
                    },
                    pageable: true,
                    columns: [{field:"Codigo", width:8},
                        {field:"NroComprobante", width:15},
                        {field:"Proveedor", width:15},
                        {field:"FechaCompra", width:15},
                        {field:"Importe", width:8},
                        {field:"IGV", width:8},
                        {field:"Total", width:8},
                        {field:"TipoTransaccion", width:15},
                        {field:"Acciones", width:10,attributes:{class:"acciones"}}]
                });
            },'json');
        }
        $("#buscar").keypress(function(event){
           if(event.which == 13){
               buscar();
           } 
        });
        
        $("#btn_buscar").click(function(){
            buscar();
            $("#buscar").focus();
        });
        
    function salir(){
            $("#vtna_ver_compra").fadeOut(300);
            $("#fondooscuro").fadeOut(300);
        }
       $("#vtna_ver_compra").hide();
       $("#aceptar").live('click',function(){
           salir();
            $("#buscar").focus();
       });
        document.onkeydown = function(evt) {
            evt = evt || window.event;
            if (evt.keyCode == 27) {
                salir();
                $("#buscar").focus();
            }
        };
       
    });
    function ver(id){
           $.post('/jungla/compras/ver','idcompra='+id,function(datos){
                html= '<h3>Datos de la Compra N°: '+datos[0]['IDCOMPRA']+'</h3>';
                html+='<table>';
                html+= '<tr>';
                html+= '<td>Nro.Documento:</td>';
                html+= '<td>'+datos[0]['NRO_COMPROBANTE']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Proveedor:</td>';
                html+= '<td>'+datos[0]['PROVEEDOR']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Fecha de Compra:</td>';
                html+= '<td>'+datos[0]['C_FECHA_COMPRA']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Tipo de Transacción:</td>';
                html+= '<td>'+datos[0]['TIPO']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Importe:</td>';
                html+= '<td>'+datos[0]['IMPORTE']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>IGV:</td>';
                html+= '<td>'+datos[0]['IGV']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Total:</td>';
                html+= '<td>'+(parseFloat(datos[0]['IGV'])+1)*(datos[0]['IMPORTE'])+'</td>';
                html+= '</tr>';
               if(datos[0]['OBSERVACIONES'] != null && datos[0]['OBSERVACIONES'] != ' '){
                html+= '<tr>';
                html+= '<td>Observaciones:</td>';
                html+= '<td>'+datos[0]['OBSERVACIONES']+'</td>';
                html+= '</tr>';
               }
                html+= '<tr>';
                html+= '<td>Estado:</td>';
                if(datos[0]['ESTADO']==0){
                    html+= '<td>Inactivo</td>';
                }else{
                    html+= '<td>Activo</td>';
                }
                html+= '</tr>';
                html+= '</table>';
           },'json'),
           $.post('/jungla/compras/ver2','idcompra='+id,function(datos){
                html+= '<p>Detalle Compra</p>';
                html+= '<table border="1">';
                html+= '<tr>';
                html+= '<td>Item</td>';
                html+= '<td>Producto</td>';
                html+= '<td>Unidad Medida</td>';
                html+= '<td>Cantidad</td>';
                html+= '<td>Precio</td>';
                html+= '<td>Subtotal</td>';
                html+= '</tr>';
                for(var i=0;i<datos.length;i++){
                    html+= '<tr>';
                    html+= '<td>'+(i+1)+'</td>';
                    html+= '<td>'+datos[i]['PRODUCTO']+'</td>';
                    html+= '<td>'+datos[i]['UM']+'</td>';
                    html+= '<td>'+datos[i]['CANTIDAD']+'</td>';
                    html+= '<td>'+datos[i]['PRECIO']+'</td>';
                    html+= '<td>'+datos[i]['CANTIDAD']*datos[i]['PRECIO']+'</td>';
                    html+= '</tr>';
                }
                html+= '</table>';
                html+= '<p align="center"><input type="button" class="k-button" value="Aceptar" id="aceptar"/></p>';
                
                $("#vtna_ver_compra").html(html);
                $("#vtna_ver_compra").fadeIn(300);
                $("#fondooscuro").fadeIn(300);
           },'json');
       }
