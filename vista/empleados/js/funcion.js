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
            $.post('/jungla/empleados/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
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
                    HTML = HTML + '<td>'+datos[i].IDEMPLEADO+'</td>';
                    HTML = HTML + '<td>'+datos[i].NOMBRES+'</td>';
                    HTML = HTML + '<td>'+datos[i].APELLIDOS+'</td>';
                    HTML = HTML + '<td>'+datos[i].TELEFONO+'</td>';
                    HTML = HTML + '<td>'+datos[i].DIRECCION+'</td>';
                    HTML = HTML + '<td>'+datos[i].PERFIL+'</td>';
                    var editar='/jungla/empleados/editar/'+datos[i].IDEMPLEADO; 
                    var eliminar='/jungla/empleados/eliminar/'+datos[i].IDEMPLEADO;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="ver(\''+datos[i].IDEMPLEADO+'\')" class="imgview"></a>';
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
        function salir(){
            $("#vtna_ver_empleado").fadeOut(300);
            $("#fondooscuro").fadeOut(300);
        }
       $("#vtna_ver_empleado").hide();
       $("#aceptar").live('click',function(){
            salir();
            $("#buscar").focus();
       });
        document.onkeydown = function(evt) {
            evt = evt || window.event;
            if (evt.keyCode == 27) {
                salir();
                $("#buscar").focus();
            }
        };
       
    });
    function ver(id){
           $.post('/jungla/empleados/ver','idempleado='+id,function(datos){
               html= '<h3>Datos del Empleado: '+datos[0]['NOMBRES']+' '+datos[0]['APELLIDOS']+'</h3>';
               html+='<table>';
               html+= '<tr>';
               html+= '<td>Nombres:</td>';
               html+= '<td>'+datos[0]['NOMBRES']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Apellidos:</td>';
               html+= '<td>'+datos[0]['APELLIDOS']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Dni:</td>';
               html+= '<td>'+datos[0]['DNI']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Telefono:</td>';
               html+= '<td>'+datos[0]['TELEFONO']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<tr>';
               html+= '<td>Ciudad:</td>';
               html+= '<td>'+datos[0]['UBIGEO']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Direccion:</td>';
               html+= '<td>'+datos[0]['DIRECCION']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Fecha de Nacimiento:</td>';
               html+= '<td>'+datos[0]['E_FECHA_NACIMIENTO']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Fecha de Contratacion:</td>';
               html+= '<td>'+datos[0]['E_FECHA_CONTRATACION']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Profesion:</td>';
               html+= '<td>'+datos[0]['PROFESION']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Perfil:</td>';
               html+= '<td>'+datos[0]['PERFIL']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Usuario:</td>';
               html+= '<td>'+datos[0]['USUARIO']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Actividad:</td>';
               html+= '<td>'+datos[0]['ACTIVIDAD']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Tipo de Empleado:</td>';
               html+= '<td>'+datos[0]['TIPO_EMPLEADO']+'</td>';
               html+= '</tr>';
               html+= '</table>';
               html+= '<p align="center"><input type="button" class="k-button" value="Aceptar" id="aceptar"/></p>';
               $("#vtna_ver_empleado").html(html);
            $("#vtna_ver_empleado").fadeIn(300);
            $("#fondooscuro").fadeIn(300);
           },'json');
       }
       