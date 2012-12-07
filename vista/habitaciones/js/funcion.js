    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Codigo", width:7},
                {field:"NroHabitacion", width:20},
                {field:"Ventilacion", width:20},
                {field:"Estado", width:15},
                {field:"Acciones", width:9,attributes:{class:"acciones"}}]
        });
        $( "#buscar" ).focus();
        
        function buscar(){
            $.post('/jungla/habitaciones/buscador','descripcion='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Nro.de Habitacion</th>'+
                            '<th>Ventilacion</th>'+
                            '<th>Estado</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].IDHABITACION+'</td>';
                    HTML = HTML + '<td>'+datos[i].NRO_HABITACION+'</td>';
                    HTML = HTML + '<td>'+datos[i].DESCRIPCION+'</td>';
                    if(datos[i].VENTILACION==1){
                        HTML = HTML + '<td>Ventilador</td>';
                    }else{
                        HTML = HTML + '<td>Aire Acondicionado</td>';
                    }
                    if(datos[i].ESTADO==1){
                        HTML = HTML + '<td>Habilitado</td>';
                    }else{
                        HTML = HTML + '<td>En Mantenimiento</td>';
                    }
                    var editar='/jungla/habitaciones/editar/'+datos[i].IDHABITACION; 
                    var eliminar='/jungla/habitaciones/eliminar/'+datos[i].IDHABITACION;   
                    HTML = HTML + '<td><a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="ver(\''+datos[i].IDHABITACION+'\')" class="imgview"></a>';
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
                    columns: [{field:"Codigo", width:7},
                        {field:"NroHabitacion", width:20},
                        {field:"Ventilacion", width:20},
                        {field:"Estado", width:15},
                        {field:"Acciones", width:9,attributes:{class:"acciones"}}]
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
        
    function salir(){
            $("#vtna_ver_habitacion").fadeOut(300);
            $("#fondooscuro").fadeOut(300);
        }
       $("#vtna_ver_habitacion").hide();
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
           $.post('/jungla/habitaciones/ver','idhabitacion='+id,function(datos){
                html= '<h3>Datos de la Habitacion N°: '+datos[0]['NRO_HABITACION']+'</h3>';
                html+='<table>';
                html+= '<tr>';
                html+= '<td>Descripcion:</td>';
                html+= '<td>'+datos[0]['DESCRIPCION']+'</td>';
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Ventilacion:</td>';
                if(datos[0]['VENTILACION']==1){
                    html+= '<td>Ventilador</td>';
                }
                else{
                    html+= '<td>Aire Acondicionado</td>';
                }
                html+= '</tr>';
                html+= '<tr>';
                html+= '<td>Estado:</td>';
                if(datos[0]['ESTADO']==1){
                    html+= '<td>Habilitado</td>';
                }
                else{
                    html+= '<td>En Mantenimiento</td>';
                }
                html+= '</tr>';
                html+= '</table>';
           },'json'),
           $.post('/jungla/habitaciones/ver2','idhabitacion='+id,function(datos){
                html+= '<p>Costos de Habitacion</p>';
                html+= '<table border="1">';
                html+= '<tr>';
                html+= '<td>Tipo de Habitacion</td>';
                html+= '<td>Costo</td>';
                html+= '<td>Observacion</td>';
                html+= '</tr>';
                for(var i=0;i<datos.length;i++){
                    html+= '<tr>';
                    html+= '<td>'+datos[0]['TIPO_HABITACION']+'</td>';
                    html+= '<td>'+datos[0]['COSTO']+'</td>';
                    html+= '<td>'+datos[0]['OBSERVACIONES']+'</td>';
                    html+= '</tr>';
                }
                html+= '</table>';
                html+= '<p align="center"><input type="button" class="k-button" value="Aceptar" id="aceptar"/></p>';
                
                $("#vtna_ver_habitacion").html(html);
                $("#vtna_ver_habitacion").fadeIn(300);
                $("#fondooscuro").fadeIn(300);
           },'json');
       }
