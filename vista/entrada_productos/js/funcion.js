 $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true
        });
        $( "#buscar" ).focus();
        function buscar(){
            HTML ='';
            $.post('/jungla/entrada_productos/buscador_c','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML += '<table border="1" class="tabgrilla">'+
                            '<tr>'+
                            '<th>Nro.Comprobante</th>'+
                            '<th>Proveedor</th>'+
                            '<th>Fecha</th>'+
                            '<th>Accion</th>'+
                            '<th>Estado</th>'+
                        '</tr>';
                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].NRO_COMPROBANTE+'</td>';
                    HTML = HTML + '<td>'+datos[i].PROVEEDOR+'</td>';
                    HTML = HTML + '<td>'+datos[i].FECHA_COMPRA+'</td>';
                    HTML = HTML + '<td><a href="javascript:void(0)" onclick="ver(\''+datos[i].IDCOMPRA+'\')" class="imgview"></a>'
                    HTML = HTML + '<a href="/jungla/entrada_productos/confirmacion/'+datos[i].IDCOMPRA+'" class="imgconfirm"></a></td>';
                    HTML = HTML + '<td><label class="pendiente">Pendiente</label></td>';
                    HTML = HTML + '</td>';
                    HTML = HTML + '</tr>';
                }
            },'json'),
                
            $.post('/jungla/entrada_productos/buscador_m','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].COMPRA+'</td>';
                    HTML = HTML + '<td>'+datos[i].PROVEEDOR+'</td>';
                    HTML = HTML + '<td>'+datos[i].FECHA+'</td>';
                    HTML = HTML + '<td><a href="javascript:void(0)" onclick="ver(\''+datos[i].IDCOMPRA+'\')" class="imgview"></a></td>';
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
            $("#buscar").focus();
        }
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
           $.post('/jungla/compras/ver','idcompra='+id,function(datos){
                html= '<h3>Datos de la Compra:</h3>';
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
                html+= '<td>'+datos[0]['FECHA_COMPRA']+'</td>';
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
                
                $("#vtna_ver_entrada").html(html);
                $("#vtna_ver_entrada").fadeIn(300);
                $("#fondooscuro").fadeIn(300);
           },'json');
       }
    