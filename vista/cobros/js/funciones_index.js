    $(document).ready(function(){
        $(".imgcobrar").attr('title','Cobrar');
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true
        });
        $( "#buscar" ).focus();
        
        
        function buscar(){
            HTML = '';
            $.post('/jungla/cobros/buscador_v','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML += '<table border="1" class="tabgrilla">'+
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
                        HTML = HTML + '<td>'+((parseFloat(datos[i].IGV)+1)*parseFloat(datos[i].IMPORTE)-parseFloat(datos[i].DESCUENTO))+'</td>';
                        HTML = HTML + '<td>0</td>';
                        HTML = HTML + '<td>'+((parseFloat(datos[i].IGV)+1)*parseFloat(datos[i].IMPORTE)-parseFloat(datos[i].DESCUENTO))+'</td>';
                        HTML = HTML + '<td><a href="/jungla/cobros/cobrar/'+datos[i].IDVENTA+'/'+((parseFloat(datos[i].IGV)+1)*parseFloat(datos[i].IMPORTE)-parseFloat(datos[i].DESCUENTO))+'/'+datos[i].XTIPO_COMPROBANTE+'" class="imgcobrar"></a></td>';
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
                        HTML = HTML + '<td>'+(((parseFloat(datos[i].IGV)+1)*parseFloat(datos[i].IMPORTE))-parseFloat(datos[i].DESCUENTO))+'</td>';
                        HTML = HTML + '<td>'+datos[i].MONTO_COBRADO+'</td>';
                        HTML = HTML + '<td>'+((parseFloat(datos[i].IGV)+1)*(parseFloat(datos[i].IMPORTE)-parseFloat(datos[i].MONTO_COBRADO)-parseFloat(datos[i].DESCUENTO)))+'</td>';
                        HTML = HTML + '<td><a href="/jungla/cobros/cronograma/'+datos[i].IDVENTA+'/'+((parseFloat(datos[i].IGV)+1)*(parseFloat(datos[i].IMPORTE)-parseFloat(datos[i].MONTO_COBRADO)-parseFloat(datos[i].DESCUENTO)))+'" class="imgcronog"></a>';
                        HTML = HTML + '<a href="/jungla/cobros/amortizar/'+datos[i].IDVENTA+'/'+((parseFloat(datos[i].IGV)+1)*(parseFloat(datos[i].IMPORTE)-parseFloat(datos[i].MONTO_COBRADO)-parseFloat(datos[i].DESCUENTO)))+'" class="imgamort"></a></td>';
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
                $(".imgcronog").attr("title","Cronograma");
                $(".imgamort").attr("title","Amortizar");
                $(".imgcobrar").attr("title","Cobrar");
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
    
     function botcobrar(i){
            setTimeout("window.location='/jungla/cobros'",500);
            
            window.location = $("#bot"+i).val();
        }
