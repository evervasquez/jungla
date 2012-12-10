    $(document).ready(function(){
        $(".imgcobrar").attr('title','Pagar');
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true
        });
        $( "#buscar" ).focus();
        function buscar(){
            $.post('/jungla/deudas/buscador_c','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                    '<tr>'+
                        '<th>Nro Comprobante</th>'+
                        '<th>Proveedor</th>'+
                        '<th>Fecha Compra</th>'+
                        '<th>Total</th>'+
                        '<th>Monto Pagado</th>'+
                        '<th>Monto Restante</th>'+
                        '<th>Accion</th>'+
                    '</tr>';
                for(var i=0;i<datos.length;i++){
                    if(datos[i].IDTIPO_TRANSACCION==1 && datos[i].ESTADO_PAGO==0 && datos[i].CONFIRMACION==1){
                        HTML = HTML + '<tr>';
                        HTML = HTML + '<td>'+datos[i].NRO_COMPROBANTE+'</td>';
                        HTML = HTML + '<td>'+datos[i].PROVEEDOR+'</td>';
                        HTML = HTML + '<td>'+datos[i].C_FECHA_COMPRA+'</td>';
                        HTML = HTML + '<td>'+(parseFloat(datos[i].IGV)+1)*(parseFloat(datos[i].IMPORTE))+'</td>';
                        HTML = HTML + '<td>0</td>';
                        HTML = HTML + '<td>'+(parseFloat(datos[i].IGV)+1)*(parseFloat(datos[i].IMPORTE))+'</td>';
                        HTML = HTML + '<td><a href="/jungla/deudas/pagar/'+datos[i].IDCOMPRA+'/'+((parseFloat(datos[i].IGV)+1)*parseFloat(datos[i].IMPORTE)-parseFloat(datos[i].MONTO_PAGADO))+'" class="imgcobrar"></a></td>';
                        HTML = HTML + '</tr>';
                    }
                }
            },'json'),
                
            $.post('/jungla/deudas/buscador_d','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    if(datos[i].CONFIRMACION==1){
                        HTML = HTML + '<tr>';
                        HTML = HTML + '<td>'+datos[i].NRO_DOCUMENTO+'</td>';
                        HTML = HTML + '<td>'+datos[i].PROVEEDOR+'</td>';
                        HTML = HTML + '<td>'+datos[i].FECHA_COMPRA+'</td>';
                        HTML = HTML + '<td>'+((parseFloat(datos[i].IGV)+1)*parseFloat(datos[i].IMPORTE))+'</td>';
                        HTML = HTML + '<td>'+datos[i].MONTO_PAGADO+'</td>';
                        HTML = HTML + '<td>'+(parseFloat(datos[i].IGV)+1)*(parseFloat(datos[i].IMPORTE)-parseFloat(datos[i].MONTO_PAGADO))+'</td>';
                        HTML = HTML + '<td><a href="/jungla/deudas/cronograma/'+datos[i].IDCOMPRA+'/'+(parseFloat(datos[i].IGV)+1)*(parseFloat(datos[i].IMPORTE)-parseFloat(datos[i].MONTO_PAGADO))+'" class="">Cronograma</a>';
                        HTML = HTML + '<a href="/jungla/deudas/amortizar/'+datos[i].IDCOMPRA+'/'+(parseFloat(datos[i].IGV)+1)*(parseFloat(datos[i].IMPORTE)-parseFloat(datos[i].MONTO_PAGADO))+'" class="">Amortizar</a></td>';
                        HTML = HTML + '</tr>';
                    }
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