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
                {field:"Acciones", width:8,attributes:{class:"acciones"}}]
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
                    HTML = HTML + '<td></td>';
                    HTML = HTML + '<td>'+datos[i].tipo+'</td>';
                    var editar='/sisjungla/compras/editar/'+datos[i].idcompra; 
                    var eliminar='/sisjungla/compras/eliminar/'+datos[i].idcompra;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit" ></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete"></a>';
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
        
    });


