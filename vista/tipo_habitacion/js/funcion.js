    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 5
            },
            pageable: true,
            columns: [{field:"Codigo", width:8},
                {field:"Descripcion", width:80},
                {field:"Acciones", width:10}]
        });
        $( "#buscar" ).focus();
        
        function buscar(){
            $.post('/sisjungla/tipo_habitacion/buscador','descripcion='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].idtipo_habitacion+'</td>';
                    HTML = HTML + '<td>'+datos[i].descripcion+'</td>';
                    var editar='/sisjungla/tipo_habitacion/editar/'+datos[i].idtipo_habitacion; 
                    var eliminar='/sisjungla/tipo_habitacion/eliminar/'+datos[i].idtipo_habitacion;   
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
                    pageable: true,
                    columns: [{field:"Codigo", width:8},
                        {field:"Descripcion", width:80},
                        {field:"Acciones", width:10}]
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