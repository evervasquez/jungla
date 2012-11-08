    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 5
            },
            pageable: true,
            columns: [{field:"Codigo", width:8},
                {field:"Descripcion", width:20},
                {field:"Abreviatura", width:20},
                {field:"Acciones", width:10}]
        });
        $( "#buscar" ).focus();
        
        function buscar(){
            $.post('/sisjungla/unidad_medida/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Abreviatura</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].idunidad_medida+'</td>';
                    HTML = HTML + '<td>'+datos[i].descripcion+'</td>';
                    HTML = HTML + '<td>'+datos[i].abreviatura+'</td>';
                    var editar='/sisjungla/unidad_medida/editar/'+datos[i].idunidad_medida; 
                    var eliminar='/sisjungla/unidad_medida/eliminar/'+datos[i].idunidad_medida;   
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
                        {field:"Descripcion", width:20},
                        {field:"Abreviatura", width:20},
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