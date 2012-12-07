    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Codigo", width:8},
                {field:"Descripcion", width:15},
                {field:"Cuenta", width:25},
                {field:"ConceptoMovimiento", width:20},
                {field:"DebeHaber", width:10},
                {field:"Acciones", width:8,attributes:{class:"acciones"}}]
        });
        $( "#buscar" ).focus();
        function buscar(){
            $.post('/jungla/plantilla_movimiento/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Cuenta</th>'+
                            '<th>Concepto Movimiento</th>'+
                            '<th>Debe/Haber</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].IDPLANTILLA_MOVIMIENTO+'</td>';
                    HTML = HTML + '<td>'+datos[i].DESCRIPCION+'</td>';
                    HTML = HTML + '<td>'+datos[i].IDCUENTA+'</td>';
                    HTML = HTML + '<td>'+datos[i].CONCEPTO+'</td>';
                    HTML = HTML + '<td>'+datos[i].DEBE_HABER+'</td>';
                    var editar='/jungla/plantilla_movimiento/editar/'+datos[i].IDPLANTILLA_MOVIMIENTO; 
                    var eliminar='/jungla/plantilla_movimiento/eliminar/'+datos[i].IDPLANTILLA_MOVIMIENTO;   
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
                        {field:"Descripcion", width:15},
                        {field:"Cuenta", width:25},
                        {field:"ConceptoMovimiento", width:20},
                        {field:"DebeHaber", width:10},
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