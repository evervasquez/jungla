    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Codigo", width:8},
                {field:"TipoTransaccion", width:15},
                {field:"NroComprobante", width:15},
                {field:"Cliente", width:25},
                {field:"FechaVenta", width:10},
                {field:"Empleado", width:10},
                {field:"Acciones", width:8,attributes:{class:"acciones"}}]
        });
        $( "#buscar" ).focus();
        function buscar(){
            $.post('/jungla/ventas/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Tipo de Transaccion</th>'+
                            '<th>Nro.Comprobante</th>'+
                            '<th>Cliente</th>'+
                            '<th>Fecha de Venta</th>'+
                            '<th>Empleado</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].IDVENTA+'</td>';
                    HTML = HTML + '<td>'+datos[i].TIPO+'</td>';
                    HTML = HTML + '<td>'+datos[i].NRO_DOCUMENTO+'</td>';
                    HTML = HTML + '<td>'+datos[i].CLIENTE+'</td>';
                    HTML = HTML + '<td>'+datos[i].FECHA_VENTA+'</td>';
                    HTML = HTML + '<td>'+datos[i].EMPLEADO+'</td>';
                    var eliminar='/jungla/ventas/eliminar/'+datos[i].IDVENTA;  
                    HTML = HTML + '<td><a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="ver(\''+datos[i].IDVENTA+'\')" class="imgview"></a>';
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
                        {field:"TipoTransaccion", width:15},
                        {field:"NroComprobante", width:15},
                        {field:"Cliente", width:25},
                        {field:"FechaVenta", width:10},
                        {field:"Empleado", width:10},
                        {field:"Acciones", width:8,attributes:{class:"acciones"}}]
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
            $("#vtna_ver_venta").fadeOut(300);
            $("#fondooscuro").fadeOut(300);
            $("#buscar").focus();
        }
       $("#vtna_ver_venta").hide();
       $("#aceptar").live('click',function(){
           salir();
       });
        document.onkeydown = function(evt) {
            evt = evt || window.event;
            if (evt.keyCode == 27) {
                salir();
            }
        };
       
    });
    function ver(id){
           $.post('/jungla/ventas/ver','idventa='+id,function(datos){
                html= '<h3>Datos de la Venta N°: '+datos[0]['NRO_DOCUMENTO']+'</h3>';
                html+='<table>';
                html+= '<tr>';
                html+= '<td>Nro.Documento:</td>';
                html+= '<td>'+datos[0]['NRO_DOCUMENTO']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Fecha de Venta:</td>';
                html+= '<td>'+datos[0]['FECHA_VENTA']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Tipo de Transacción:</td>';
                html+= '<td>'+datos[0]['TIPO']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Importe:</td>';
                html+= '<td>S/. '+datos[0]['IMPORTE']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>IGV:</td>';
                html+= '<td>S/. '+datos[0]['IGV']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Descuento:</td>';
                html+= '<td>S/. '+datos[0]['DESCUENTO']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Total:</td>';
                html+= '<td>S/. '+(parseFloat(datos[0]['IGV'])+1)*(datos[0]['IMPORTE']-datos[0]['DESCUENTO'])+'</td>';
                html+= '</tr>';
                html+= '</table>';
           },'json'),
           $.post('/jungla/ventas/ver2','idventa='+id,function(datos){
                html+= '<p>Detalle Venta</p>';
                html+= '<table border="1">';
                html+= '<tr>';
                html+= '<td>Item</td>';
                html+= '<td>Descripcion</td>';
                html+= '<td>Unidad Medida</td>';
                html+= '<td>Cantidad</td>';
                html+= '<td>Precio</td>';
                html+= '<td>Subtotal</td>';
                html+= '</tr>';
                for(var i=0;i<datos.length;i++){
                    html+= '<tr>';
                    html+= '<td>'+(i+1)+'</td>';
                    if(datos[i]['PRODUCTO'] == 'vacio'){
                        html+= '<td>'+datos[i]['PAQUETE']+'</td>';
                    }
                    else{
                        html+= '<td>'+datos[i]['PRODUCTO']+'</td>';
                    }
                    if(datos[i]['UM'] == null){
                        html+= '<td>paquetes</td>';
                    }
                    else{
                        html+= '<td>'+datos[i]['UM']+'</td>';
                    }
                    html+= '<td>'+datos[i]['CANTIDAD']+'</td>';
                    html+= '<td>'+datos[i]['PRECIO_VENTA']+'</td>';
                    html+= '<td>'+datos[i]['CANTIDAD']*datos[i]['PRECIO_VENTA']+'</td>';
                    html+= '</tr>';
                }
                html+= '</table>';
                html+= '<p align="center"><input type="button" class="k-button" value="Aceptar" id="aceptar"/></p>';
                
                $("#vtna_ver_venta").html(html);
                $("#vtna_ver_venta").fadeIn(300);
                $("#fondooscuro").fadeIn(300);
           },'json');
       }
