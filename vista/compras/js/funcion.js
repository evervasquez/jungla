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
            $.post('/sisjungla/compras/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
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
                    HTML = HTML + '<td>'+datos[i].idcompra+'</td>';
                    HTML = HTML + '<td>'+datos[i].nro_comprobante+'</td>';
                    HTML = HTML + '<td>'+datos[i].proveedor+'</td>';
                    HTML = HTML + '<td>'+datos[i].fecha_compra+'</td>';
                    HTML = HTML + '<td>'+datos[i].importe+'</td>';
                    HTML = HTML + '<td>'+datos[i].igv+'</td>';
                    HTML = HTML + '<td>'+(parseFloat(datos[i].igv)+1)*(datos[i].importe)+'</td>';
                    HTML = HTML + '<td>'+datos[i].tipo+'</td>';
                    var editar='/sisjungla/compras/editar/'+datos[i].idcompra; 
                    var eliminar='/sisjungla/compras/eliminar/'+datos[i].idcompra;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit" ></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="ver(\''+datos[i].idcompra+'\')" class="imgview"></a>';
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
           $.post('/sisjungla/compras/ver','idcompra='+id,function(datos){
                html= '<h3>Datos de la Compra N°: '+datos[0]['idcompra']+'</h3>';
                html+='<table>';
                html+= '<tr>';
                html+= '<td>Nro.Documento:</td>';
                html+= '<td>'+datos[0]['nro_comprobante']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Proveedor:</td>';
                html+= '<td>'+datos[0]['proveedor']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Fecha de Compra:</td>';
                html+= '<td>'+datos[0]['c_fecha_compra']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Tipo de Transacción:</td>';
                html+= '<td>'+datos[0]['tipo']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Importe:</td>';
                html+= '<td>'+datos[0]['importe']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>IGV:</td>';
                html+= '<td>'+datos[0]['igv']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Total:</td>';
                html+= '<td>'+(parseFloat(datos[0]['igv'])+1)*(datos[0]['importe'])+'</td>';
                html+= '</tr>';
               if(datos[0]['observaciones'] != null && datos[0]['observaciones'] != ' '){
                html+= '<tr>';
                html+= '<td>Observaciones:</td>';
                html+= '<td>'+datos[0]['observaciones']+'</td>';
                html+= '</tr>';
               }
                html+= '<tr>';
                html+= '<td>Estado:</td>';
                if(datos[0]['estado']==0){
                    html+= '<td>Inactivo</td>';
                }else{
                    html+= '<td>Activo</td>';
                }
                html+= '</tr>';
                html+= '</table>';
           },'json'),
           $.post('/sisjungla/compras/ver2','idcompra='+id,function(datos){
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
                    html+= '<td>'+datos[0]['producto']+'</td>';
                    html+= '<td>'+datos[0]['um']+'</td>';
                    html+= '<td>'+datos[0]['cantidad']+'</td>';
                    html+= '<td>'+datos[0]['precio']+'</td>';
                    html+= '<td>'+datos[0]['cantidad']*datos[0]['precio']+'</td>';
                    html+= '</tr>';
                }
                html+= '</table>';
                html+= '<p align="center"><input type="button" class="k-button" value="Aceptar" id="aceptar"/></p>';
                
                $("#vtna_ver_compra").html(html);
                $("#vtna_ver_compra").fadeIn(300);
                $("#fondooscuro").fadeIn(300);
           },'json');
       }
