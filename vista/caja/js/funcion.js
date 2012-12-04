    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Empleado", width:20},
                {field:"Fecha", width:20},
                {field:"Saldo", width:20},
                {title:"Estado", width:20}]
        });
        $( "#buscar" ).focus();
        
        function buscar(){
            $.post('/sisjungla/caja/buscador','descripcion='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Empleado</th>'+
                            '<th>Fecha</th>'+
                            '<th>Saldo</th>'+
                            '<th>Estado</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].empleado_n+' '+datos[i].empleado_a+'</td>';
                    HTML = HTML + '<td>'+datos[i].c_fecha+'</td>';
                    HTML = HTML + '<td>'+datos[i].saldo+'</td>';
                    if(datos[i].estado == 1){
                        HTML = HTML + '<td>Aperturado</td>';
                    }
                    else{
                        HTML = HTML + '<td>Cerrado</td>';
                    }
                    HTML = HTML + '</tr>';
                }
                HTML = HTML + '</table>'
                $("#grilla").html(HTML);
                $(".tabgrilla").kendoGrid({
                    dataSource: {
                        pageSize: 7
                    },
                    pageable: true,
                    columns: [{field:"Empleado", width:20},
                        {field:"Fecha", width:20},
                        {field:"Saldo", width:20},
                        {title:"Estado", width:20}]
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