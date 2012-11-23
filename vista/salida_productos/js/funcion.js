$(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true
        });
        $( "#buscar" ).focus();
        
        function buscar(){
            $.post('/sisjungla/salida_productos/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Empleado</th>'+
                            '<th>Producto</th>'+
                            '<th>Cantidad</th>'+
                            '<th>Fecha</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    if(datos[i].idtipo_movimiento !=1){
                        HTML = HTML + '<tr>';
                        HTML = HTML + '<td>'+datos[i].empleados_n+''+datos[i].empleados_a+'</td>';
                        HTML = HTML + '<td>'+datos[i].producto+'</td>';
                        HTML = HTML + '<td>'+datos[i].cantidad+'</td>';
                        HTML = HTML + '<td>'+datos[i].fecha+'</td>';
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