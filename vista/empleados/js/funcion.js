    $(function(){
        $( "#buscar" ).focus();
        
        function buscar(){
            $.post('/sisjungla/empleados/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Nombre</th>'+
                            '<th>Apellidos</th>'+
                            '<th>Telefono</th>'+
                            '<th>Direccion</th>'+
                            '<th>Perfil</th>'+
                            '<th>Ubigeo</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].idempleado+'</td>';
                    HTML = HTML + '<td>'+datos[i].nombres+'</td>';
                    HTML = HTML + '<td>'+datos[i].apellidos+'</td>';
                    HTML = HTML + '<td>'+datos[i].telefono+'</td>';
                    HTML = HTML + '<td>'+datos[i].direccion+'</td>';
                    HTML = HTML + '<td>'+datos[i].perfil+'</td>';
                    HTML = HTML + '<td>'+datos[i].ubigeo+'</td>';
                    var editar='/sisjungla/empleados/editar/'+datos[i].idempleado; 
                    var eliminar='/sisjungla/empleados/eliminar/'+datos[i].idempleado;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete"></a>';
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