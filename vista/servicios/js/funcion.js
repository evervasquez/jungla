    $(function(){
        $( "#buscar" ).focus();
        var obj= new estilos_vistas();
        obj.kendo_grilla();
        
        function buscar(){
            $.post('/sisjungla/servicios/buscador','descripcion='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].idservicio+'</td>';
                    HTML = HTML + '<td>'+datos[i].descripcion+'</td>';
                    var editar='/sisjungla/servicios/editar/'+datos[i].idservicio; 
                    var eliminar='/sisjungla/servicios/eliminar/'+datos[i].idservicio;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete"></a>';
                    HTML = HTML + '</td>';
                    HTML = HTML + '</tr>';
                }
                HTML = HTML + '</table>'
                $("#grilla").html(HTML);
                var obj= new estilos_vistas();
                obj.kendo_grilla();
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