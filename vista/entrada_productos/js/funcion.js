 $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true
        });
        $( "#buscar" ).focus();
        function buscar(){
            $.post('/sisjungla/entrada_productos/buscador_c','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Nro.Comprobante</th>'+
                            '<th>Proveedor</th>'+
                            '<th>Fecha</th>'+
                            '<th>Accion</th>'+
                            '<th>Estado</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].nro_comprobante+'</td>';
                    HTML = HTML + '<td>'+datos[i].proveedor+'</td>';
                    HTML = HTML + '<td>'+datos[i].fecha_compra+'</td>';
                    HTML = HTML + '<td><a href="javascript:void(0)" onclick="ver(\''+datos[i].idcompra+'\')" class="imgview"></a>'
                    HTML = HTML + '<a href="/sisjungla/entrada_productos/confirmacion/'+datos[i].idcompra+'" class="imgconfirm"></a></td>';
                    HTML = HTML + '<td><label class="pendiente">Pendiente</label></td>';
                    HTML = HTML + '</td>';
                    HTML = HTML + '</tr>';
                }
            },'json'),
                
            $.post('/sisjungla/entrada_productos/buscador_m','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].compra+'</td>';
                    HTML = HTML + '<td>'+datos[i].proveedor+'</td>';
                    HTML = HTML + '<td>'+datos[i].fecha+'</td>';
                    HTML = HTML + '<td><a href="javascript:void(0)" onclick="ver(\''+datos[i].idcompra+'\')" class="imgview"></a></td>';
                    HTML = HTML + '<td><label class="confirmado">Confirmado</label></td>';
                    HTML = HTML + '</td>';
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
        
    //ver entrada
        function salir(){
            $("#vtna_ver_entrada").fadeOut(300);
            $("#fondooscuro").fadeOut(300);
        }
       $("#vtna_ver_entrada").hide();
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
                html= '<h3>Datos de la Compra:</h3>';
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
                html+= '<td>'+datos[0]['fecha_compra']+'</td>';
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
                html+= '<tr>';
                html+= '<td>Observaciones:</td>';
                html+= '<td>'+datos[0]['observaciones']+'</td>';
                html+= '</tr>';
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
                
                $("#vtna_ver_entrada").html(html);
                $("#vtna_ver_entrada").fadeIn(300);
                $("#fondooscuro").fadeIn(300);
           },'json');
       }
    