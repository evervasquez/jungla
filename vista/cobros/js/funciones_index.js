    $(function(){
        $(".imgcobrar").attr('title','Cobrar');
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true
        });
        $( "#buscar" ).focus();
        function buscar(){
            $.post('/jungla/cobros/buscador_v','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Nro Documento</th>'+
                            '<th>Cliente</th>'+
                            '<th>Fecha Venta</th>'+
                            '<th>Total</th>'+
                            '<th>Monto Pagado</th>'+
                            '<th>Monto Restante</th>'+
                            '<th>Accion</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    if(datos[i].IDTIPO_TRANSACCION==1 && datos[i].ESTADO_PAGO==0){
                        HTML = HTML + '<tr>';
                        HTML = HTML + '<td>'+datos[i].NRO_DOCUMENTO+'</td>';
                        HTML = HTML + '<td>'+datos[i].CLIENTE+'</td>';
                        HTML = HTML + '<td>'+datos[i].FECHA_VENTA+'</td>';
                        HTML = HTML + '<td>'+(datos[i].IGV+1)*(datos[i].IMPORTE)-datos[i].DESCUENTO+'</td>';
                        HTML = HTML + '<td>0</td>';
                        HTML = HTML + '<td>'+(datos[i].IGV+1)*(datos[i].IMPORTE)-datos[i].MONTO_COBRADO-datos[i].DESCUENTO+'</td>';
                        HTML = HTML + '<td><a href="/jungla/cobros/cobrar/'+datos[i].IDVENTA+'/'+(datos[i].IMPORTE*(datos[i].IGV+1)-datos[i].DESCUENTO)+'/'+datos[i].TIPO_COMPROBANTE+'" class="imgcobrar"></a></td>';
                        HTML = HTML + '</tr>';
                    }
                }
            },'json'),
                
            $.post('/jungla/cobros/buscador_c','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                for(var i=0;i<datos.length;i++){
                        HTML = HTML + '<tr>';
                        HTML = HTML + '<td>'+datos[i].NRO_DOCUMENTO+'</td>';
                        HTML = HTML + '<td>'+datos[i].CLIENTE+'</td>';
                        HTML = HTML + '<td>'+datos[i].FECHA_VENTA+'</td>';
                        HTML = HTML + '<td>'+(datos[i].IGV+1)*(datos[i].IMPORTE)-datos[i].DESCUENTO+'</td>';
                        HTML = HTML + '<td>'+datos[i].MONTO_COBRADO+'</td>';
                        HTML = HTML + '<td>'+(datos[i].IGV+1)*(datos[i].IMPORTE)-datos[i].MONTO_COBRADO-datos[i].DESCUENTO+'</td>';
                        HTML = HTML + '<td><a href="/jungla/cobros/cronograma/'+datos[i].IDVENTA+'" class="">Cronograma</a>';
                        HTML = HTML + '<a href="/jungla/cobros/cronograma/'+datos[i].IDVENTA+'" class="">Amortizar</a></td>';
                        HTML = HTML + '</tr>';
                }
                HTML = HTML + '</table>'
                $("#grilla").html(HTML);
                $(".tabgrilla").kendoGrid({
                    dataSource: {
                        pageSize: 7
                    },
                    pageable: true
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