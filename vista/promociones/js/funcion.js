    $(function(){
        $( "#buscar" ).focus();
        
        function buscar(){
            $.post('/sisjungla/promociones/buscador','descripcion='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Descuento</th>'+
                            '<th>Fecha de Inicio</th>'+
                            '<th>Fecha de Finalizacion</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].idpromocion+'</td>';
                    HTML = HTML + '<td>'+datos[i].descripcion+'</td>';
                    HTML = HTML + '<td>'+datos[i].descuento+'</td>';
                    HTML = HTML + '<td>'+datos[i].fecha_inicio+'</td>';
                    HTML = HTML + '<td>'+datos[i].fecha_final+'</td>';
                    var editar='/sisjungla/promociones/editar/'+datos[i].idpromocion; 
                    var eliminar='/sisjungla/promociones/eliminar/'+datos[i].idpromocion;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')"><img src="/sisjungla/lib/img/edit.png" class="imgfrm" /></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')"><img src="/sisjungla/lib/img/delete.png" class="imgfrm" /></a>';
                    HTML = HTML + '</td>';
                    HTML = HTML + '</tr>';
                }
                HTML = HTML + '</table>'
                $("#grilla").html(HTML);
                $(".tabgrilla").kendoGrid({
                    dataSource: {
                        pageSize: 5
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