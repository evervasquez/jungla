    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 5
            },
            pageable: true,
            columns: [{field:"Codigo", width:6},
                {field:"Nombre", width:10},
                {field:"Apellidos", width:10},
                {field:"Telefono", width:10},
                {field:"Direccion", width:10},
                {field:"Perfil", width:10},
                {field:"Acciones", width:8}]
        });
        $( "#buscar" ).focus();
        
        function buscar(){
            $.post('/sisjungla/empleados/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Nombre</th>'+
                            '<th>Apellidos</th>'+
                            '<th>Telefono</th>'+
                            '<th>Direccion</th>'+
                            '<th>Perfil</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].idempleado+'</td>';
                    HTML = HTML + '<td>'+datos[i].nombres+'</td>';
                    HTML = HTML + '<td>'+datos[i].apellidos+'</td>';
                    HTML = HTML + '<td>'+datos[i].telefono+'</td>';
                    HTML = HTML + '<td>'+datos[i].direccion+'</td>';
                    HTML = HTML + '<td>'+datos[i].perfil+'</td>';
                    var editar='/sisjungla/empleados/editar/'+datos[i].idempleado; 
                    var eliminar='/sisjungla/empleados/eliminar/'+datos[i].idempleado;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" class="imgview"></a>';
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
                    columns: [{field:"Codigo", width:6},
                        {field:"Nombre", width:10},
                        {field:"Apellidos", width:10},
                        {field:"Telefono", width:10},
                        {field:"Direccion", width:10},
                        {field:"Perfil", width:10},
                        {field:"Acciones", width:9}]
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
        
    $("#aceptaempleado").click(function(){
            $("#infoempleado").fadeOut(300);
            $("#fondooscuro").fadeOut(300);
            window.location = '/sisjungla/empleados/';
        });
        
    });
    function ver(id){
            href=id;
            window.location = href;
            $("#infoempleado").fadeIn(300);
            $("#fondooscuro").fadeIn(300);
        }