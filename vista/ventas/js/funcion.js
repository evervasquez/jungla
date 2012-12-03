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
            $.post('/sisjungla/ventas/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
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
                    HTML = HTML + '<td>'+datos[i].idventa+'</td>';
                    HTML = HTML + '<td>'+datos[i].tipo+'</td>';
                    HTML = HTML + '<td>'+datos[i].nro_documento+'</td>';
                    HTML = HTML + '<td>'+datos[i].cliente+'</td>';
                    HTML = HTML + '<td>'+datos[i].fecha_venta+'</td>';
                    HTML = HTML + '<td>'+datos[i].empleado+'</td>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="ver(\''+datos[i].idventa+'\')" class="imgview"></a>';
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
           $.post('/sisjungla/ventas/ver','idventa='+id,function(datos){
                html= '<h3>Datos de la Venta N°: '+datos[0]['nro_documento']+'</h3>';
                html+='<table>';
                html+= '<tr>';
                html+= '<td>Nro.Documento:</td>';
                html+= '<td>'+datos[0]['nro_documento']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Fecha de Venta:</td>';
                html+= '<td>'+datos[0]['fecha_venta']+'</td>';
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
                html+= '</table>';
           },'json'),
           $.post('/sisjungla/ventas/ver2','idventa='+id,function(datos){
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
                    if(datos[0]['producto'] == 'vacio'){
                        html+= '<td>'+datos[0]['paquete']+'</td>';
                    }
                    else{
                        html+= '<td>'+datos[0]['producto']+'</td>';
                    }
                    if(datos[0]['um'] == null){
                        html+= '<td></td>';
                    }
                    else{
                        html+= '<td>'+datos[0]['um']+'</td>';
                    }
                    html+= '<td>'+datos[0]['cantidad']+'</td>';
                    html+= '<td>'+datos[0]['precio_venta']+'</td>';
                    html+= '<td>'+datos[0]['cantidad']*datos[0]['precio_venta']+'</td>';
                    html+= '</tr>';
                }
                html+= '</table>';
                html+= '<p align="center"><input type="button" class="k-button" value="Aceptar" id="aceptar"/></p>';
                
                $("#vtna_ver_venta").html(html);
                $("#vtna_ver_venta").fadeIn(300);
                $("#fondooscuro").fadeIn(300);
           },'json');
       }
