 $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true
        });
        $(".imgcheckin").attr("title","CheckIn");
        $(".imgconsumo").attr("title","Consumo");
        $(".imgcheckout").attr("title","CheckOut");
        $( "#buscar" ).focus();
        function buscar(){
            $.post('/jungla/estadia/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Representante</th>'+
                            '<th>Fecha Entrada</th>'+
                            '<th>Fecha Salida</th>'+
                            '<th>Estado</th>'+
                            '<th>Accion</th>'+
                        '</tr>';
                
                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].CLIENTE+'</td>';
                    HTML = HTML + '<td>'+datos[i].FECHA_INGRESO+'</td>';
                    HTML = HTML + '<td>'+datos[i].FECHA_SALIDA+'</td>';
                    var eliminar='/jungla/estadia/eliminar/'+datos[i].IDVENTA;  
                    if(datos[i].ESTADO_ESTADIA==0){
                        HTML = HTML + '<td><label class="reserva">Reserva</label></td>';
                        HTML = HTML + '<td><a href="/jungla/estadia/confirmar/'+datos[i].IDVENTA+'" class="imgcheckin">';
                        HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete" ></a>';
                    }
                    if(datos[i].ESTADO_ESTADIA==1){
                        HTML = HTML + '<td><label class="estadia">Estadia</label></td>';
                        HTML = HTML + '<td><a href="/jungla/estadia/consumo/'+datos[i].IDVENTA+'" class="imgconsumo">';
                        HTML = HTML + '<a href="/jungla/estadia/check_out/'+datos[i].IDVENTA+'" class="imgcheckout">';
                    }
                    HTML = HTML + '<a href="javascript:void(0)" onclick="ver(\''+datos[i].IDVENTA+'\')" class="imgview" ></a></td>';
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
            $("#vtna_ver_estadia").fadeOut(300);
            $("#fondooscuro").fadeOut(300);
        }
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
           $.post('/jungla/estadia/ver','idventa='+id,function(datos){
               if(datos[0]['ESTADO_ESTADIA']==0){
                html= '<h3>Datos de la Reserva:</h3>';
               }
               else{
                html= '<h3>Datos de la Estadia:</h3>';
               }
                html+='<table>';
                html+= '<tr>';
                html+= '<td>Representante:</td>';
                html+= '<td>'+datos[0]['CLIENTE']+'</td>';
                html+= '</tr>';
                if(datos[0]['FECHA_RESERVA']!=null){
                html+= '<tr>';
                html+= '<td>Fecha de Reserva:</td>';
                html+= '<td>'+datos[0]['FECHA_RESERVA']+'</td>';
                html+= '</tr>';
                }
                html+= '<tr>';
                html+= '<td>Fecha de Ingreso:</td>';
                html+= '<td>'+datos[0]['FECHA_INGRESO']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Fecha de Salida:</td>';
                html+= '<td>'+datos[0]['FECHA_SALIDA']+'</td>';
                html+= '</tr>';
                if(datos[0]['ESTADO_ESTADIA']==1){
                html+= '<tr>';
                html+= '<td>Hora de Ingreso:</td>';
                html+= '<td>'+datos[0]['DE_HORA_INGRESO']+'</td>';
                html+= '</tr>';
                }
                html+= '<tr>';
                html+= '<td>Empleado Encargado:</td>';
                html+= '<td>'+datos[0]['EMPLEADO']+'</td>';
                html+= '</tr>';
                html+= '</table>';
                html+= '</table>';
                html+= '<p align="center"><input type="button" class="k-button" value="Aceptar" id="aceptar"/></p>';
                
                $("#vtna_ver_estadia").html(html);
                $("#vtna_ver_estadia").fadeIn(300);
                $("#fondooscuro").fadeIn(300);
           },'json');
       }
    