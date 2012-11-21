    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Codigo", width:8},
                {field:"Titulo", width:20},
                {field:"Descripion", width:60},
                {field:"Imagen", width:15},
                {field:"Acciones", width:10,attributes:{class:"acciones"}}]
        });
        $( "#buscar" ).focus();
        function buscar(){
            $.post('/sisjungla/articulos/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Titulo</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Imagen</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].idarticulo+'</td>';
                    HTML = HTML + '<td>'+datos[i].titulo+'</td>';
                    HTML = HTML + '<td>'+datos[i].descripcion+'</td>';
                    HTML = HTML + '<td>';
                    HTML = HTML + '<a href="/sisjungla/lib/img/articulos/'+datos[i].imagen+'">';
                    HTML = HTML + '<img src="/sisjungla/lib/img/articulos/thumb/thumb_'+datos[i].imagen+'" />';
                    HTML = HTML +'</a>';
                    HTML = HTML + '</td>';
                    var editar='/sisjungla/articulos/editar/'+datos[i].idarticulo; 
                    var eliminar='/sisjungla/articulos/eliminar/'+datos[i].idarticulo;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit" ></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete"></a>';
                    HTML = HTML + '</td>';
                    HTML = HTML + '</tr>';
                }
                HTML = HTML + '</table>'
                $("#grilla").html(HTML);
                $(".tabgrilla").kendoGrid({
                    dataSource: {
                        pageSize: 7
                    },
                    pageable: true,
                    columns: [{field:"Codigo", width:8},
                        {field:"Titulo", width:20},
                        {field:"Descripion", width:60},
                        {field:"Imagen", width:15},
                        {field:"Acciones", width:10,attributes:{class:"acciones"}}]
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