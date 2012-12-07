    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Codigo", width:8},
                {field:"NrodeCuenta", width:12},
                {field:"Descripcion", width:27},
                {field:"CuentaPadre", width:27},
                {field:"Categoria", width:8},
                {field:"Acciones", width:8,attributes:{class:"acciones"}}]
        });
        $( "#buscar" ).focus();
        function buscar(){
            $.post('/jungla/plan_contable/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Nro.de Cuenta</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Cuenta Padre</th>'+
                            '<th>Categoria</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].IDCUENTA+'</td>';
                    HTML = HTML + '<td>'+datos[i].NRO_CUENTA+'</td>';
                    HTML = HTML + '<td>'+datos[i].DESCRIPCION+'</td>';
                    HTML = HTML + '<td>'+datos[i].CUENTA_PADRE+'</td>';
                    HTML = HTML + '<td>'+datos[i].IDCATEGORIA+'</td>';
                    var editar='/jungla/plan_contable/editar/'+datos[i].IDCUENTA; 
                    var eliminar='/jungla/plan_contable/eliminar/'+datos[i].IDCUENTA;   
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
                        {field:"CuentaPadre", width:27},
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