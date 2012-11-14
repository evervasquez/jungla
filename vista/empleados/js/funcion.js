    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Codigo", width:6},
                {field:"Nombre", width:10},
                {field:"Apellidos", width:10},
                {field:"Telefono", width:10},
                {field:"Direccion", width:10},
                {field:"Perfil", width:10},
                {field:"Acciones", width:8,attributes:{class:"acciones"}}]
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
                    HTML = HTML + '<a href="javascript:void(0)" class="imgview" onclick="ver(\''+datos[i].idempleado+'\')"></a>';
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
                    columns: [{field:"Codigo", width:6},
                        {field:"Nombre", width:10},
                        {field:"Apellidos", width:10},
                        {field:"Telefono", width:10},
                        {field:"Direccion", width:10},
                        {field:"Perfil", width:10},
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
        
    //ver empleados
       $("#vtna_ver_empleado").hide();
       $("#aceptar").live('click',function(){
            $("#vtna_ver_empleado").fadeOut(300);
            $("#fondooscuro").fadeOut(300);
       });
       
    });
    function ver(id){
           $.post('/sisjungla/empleados/ver','idempleado='+id,function(datos){
               html= '<h3>Datos del Empleado: '+datos[0]['nombres']+' '+datos[0]['apellidos']+'</h3>';
               html+='<table>';
               html+= '<tr>';
               html+= '<td>Nombres:</td>';
               html+= '<td>'+datos[0]['nombres']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Apellidos:</td>';
               html+= '<td>'+datos[0]['apellidos']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Dni:</td>';
               html+= '<td>'+datos[0]['dni']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Telefono:</td>';
               html+= '<td>'+datos[0]['telefono']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<tr>';
               html+= '<td>Ciudad:</td>';
               html+= '<td>'+datos[0]['ubigeo']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Direccion:</td>';
               html+= '<td>'+datos[0]['direccion']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Fecha de Nacimiento:</td>';
               html+= '<td>'+datos[0]['fecha_nacimiento']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Fecha de Contratacion:</td>';
               html+= '<td>'+datos[0]['fecha_contratacion']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Profesion:</td>';
               html+= '<td>'+datos[0]['profesion']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Perfil:</td>';
               html+= '<td>'+datos[0]['perfil']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Usuario:</td>';
               html+= '<td>'+datos[0]['usuario']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Clave:</td>';
               html+= '<td>'+datos[0]['clave']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<tr>';
               html+= '<td>Actividad:</td>';
               html+= '<td>'+datos[0]['actividad']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Tipo de Empleado:</td>';
               html+= '<td>'+datos[0]['tipo_empleado']+'</td>';
               html+= '</tr>';
               html+= '</table>';
               html+= '<p align="center"><input type="button" class="k-button" value="Aceptar" id="aceptar"/></p>';
               $("#vtna_ver_empleado").html(html);
            $("#vtna_ver_empleado").fadeIn(300);
            $("#fondooscuro").fadeIn(300);
           },'json');
       }
