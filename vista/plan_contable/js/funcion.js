    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Codigo", width:8},
                {field:"NrodeCuenta", width:12},
                {field:"Descripcion", width:27},
                {field:"Nivel", width:8},
                {field:"AsientoPadre", width:27},
                {field:"Categoria", width:8},
                {field:"Acciones", width:8,attributes:{class:"acciones"}}]
        });
        $( "#buscar" ).focus();
        function buscar(){
            $.post('/sisjungla/plan_contable/buscador','filtro='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Nro.de Cuenta</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Nivel</th>'+
                            '<th>Asiento Padre</th>'+
                            '<th>Categoria</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].idcuenta+'</td>';
                    HTML = HTML + '<td>'+datos[i].nro_cuenta+'</td>';
                    HTML = HTML + '<td>'+datos[i].descripcion+'</td>';
                    HTML = HTML + '<td>'+datos[i].nivel+'</td>';
                    HTML = HTML + '<td>'+datos[i].cuenta_padre+'</td>';
                    HTML = HTML + '<td>'+datos[i].idcategoria+'</td>';
                    var editar='/sisjungla/plan_contable/editar/'+datos[i].idpaquete; 
                    var eliminar='/sisjungla/plan_contable/eliminar/'+datos[i].idpaquete;   
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
                        {field:"NrodeCuenta", width:12},
                        {field:"Descripcion", width:27},
                        {field:"Nivel", width:8},
                        {field:"AsientoPadre", width:27},
                        {field:"Categoria", width:8},
                        {field:"Acciones", width:8,attributes:{class:"acciones"}}]
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