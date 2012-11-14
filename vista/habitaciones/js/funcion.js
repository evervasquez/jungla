    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Codigo", width:8},
                {field:"NroHabitacion", width:10},
                {field:"Descripcion", width:30},
                {field:"Ventilacion", width:15},
                {field:"Estado", width:15},
                {field:"Acciones", width:10,attributes:{class:"acciones"}}]
        });
        $( "#buscar" ).focus();
        
        function buscar(){
            $.post('/sisjungla/habitaciones/buscador','descripcion='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Nro.de Habitacion</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Ventilacion</th>'+
                            '<th>Estado</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].idhabitacion+'</td>';
                    HTML = HTML + '<td>'+datos[i].nro_habitacion+'</td>';
                    HTML = HTML + '<td>'+datos[i].descripcion+'</td>';
                    if(datos[i].ventilacion==1){
                        HTML = HTML + '<td>Ventilador</td>';
                    }else{
                        HTML = HTML + '<td>Aire Acondicionado</td>';
                    }
                    if(datos[i].estado==1){
                        HTML = HTML + '<td>Habilitado</td>';
                    }else{
                        HTML = HTML + '<td>En Mantenimiento</td>';
                    }
                    var editar='/sisjungla/habitaciones/editar/'+datos[i].idempleado; 
                    var eliminar='/sisjungla/habitaciones/eliminar/'+datos[i].idempleado;   
                    HTML = HTML + '<td><a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" class="imgview"></a>';
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
                        {field:"NroHabitacion", width:10},
                        {field:"Descripcion", width:30},
                        {field:"Ventilacion", width:15},
                        {field:"Estado", width:15},
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