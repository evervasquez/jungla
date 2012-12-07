    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Codigo", width:8},
                {field:"Descripcion", width:20},
                {field:"Url", width:20},
                {field:"ModuloPadre", width:20},
                {field:"Acciones", width:10,attributes:{class:"acciones"}}]
        });
        $("#buscar").focus();
        function buscar(){
            $.post('/jungla/modulos/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Url</th>'+ 
                            '<th>Modulo Padre</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].IDMODDULO+'</td>';
                    HTML = HTML + '<td>'+datos[i].DESCRIPCION+'</td>';
                    HTML = HTML + '<td>'+datos[i].URL+'</td>';
                    if(datos[i].MODULO_PADRE != null){
                        HTML = HTML + '<td>'+datos[i].MODULO_PADRE+'</td>';
                    }else{
                        HTML = HTML + '<td>&nbsp;</td>';
                    }
                    var editar='/jungla/modulos/editar/'+datos[i].IDMODULO; 
                    var eliminar='/jungla/modulos/eliminar/'+datos[i].IDMODULO;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit"></a>';
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
                        {field:"Descripcion", width:20},
                        {field:"Url", width:20},
                        {field:"ModuloPadre", width:20},
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