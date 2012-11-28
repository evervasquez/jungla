    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Codigo", width:6},
                {field:"Tipo", width:10},
                {field:"NombreRazonSocial", width:20},
                {field:"Documento", width:15},
                {field:"Direccion", width:15},
                {field:"Acciones", width:6,attributes:{class:"acciones"}}]
        });
        $( "#buscar" ).focus();
        
        function buscar(){
            $.post('/sisjungla/clientes/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Tipo</th>'+
                            '<th>Nombre / Razon Social</th>'+
                            '<th>DNI / RUC</th>'+
                            '<th>Telefono</th>'+
                            '<th>Email</th>'+
                            '<th>Ubigeo</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].idcliente+'</td>';
                    HTML = HTML + '<td>'+datos[i].tipo+'</td>';
                    if(datos[i].apellidos != null){
                    HTML = HTML + '<td>'+datos[i].nombres+' '+datos[i].apellidos+'</td>';
                    }
                    else{
                    HTML = HTML + '<td>'+datos[i].nombres+'</td>';
                    }
                    HTML = HTML + '<td>'+datos[i].documento+'</td>';
                    HTML = HTML + '<td>'+datos[i].direccion+'</td>';
                    var editar='/sisjungla/clientes/editar/'+datos[i].idcliente; 
                    var eliminar='/sisjungla/clientes/eliminar/'+datos[i].idcliente;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" class="imgview" onclick="ver(\''+datos[i].idcliente+'\')"></a>';
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
                        {field:"Tipo", width:10},
                        {field:"NombreRazonSocial", width:20},
                        {field:"Documento", width:15},
                        {field:"Direccion", width:15},
                        {field:"Acciones", width:6,attributes:{class:"acciones"}}]
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
        
    //ver clientes
        function salir(){
            $("#vtna_ver_cliente").fadeOut(300);
            $("#fondooscuro").fadeOut(300);
        }
       $("#vtna_ver_cliente").hide();
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
           $.post('/sisjungla/clientes/ver','idcliente='+id,function(datos){
               if(datos[0]['tipo']=="natural"){
                    html= '<h3>Datos del Cliente: '+datos[0]['nombres']+' '+datos[0]['apellidos']+'</h3>';
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
                    html+= '<td>Nro.de Documento:</td>';
                    html+= '<td>'+datos[0]['documento']+'</td>';
                    html+= '</tr>';
                    html+= '<tr>';
                    html+= '<td>Direccion:</td>';
                    html+= '<td>'+datos[0]['direccion']+'</td>';
                    html+= '</tr>';
                    html+= '<tr>';
                    html+= '<td>Sexo:</td>';
                    if(datos[0]['sexo']==0){
                        html+= '<td>Femenino</td>';
                    }
                    else{
                        html+= '<td>Masculino</td>';
                    }
                    html+= '</tr>'
                    if(datos[0]['telefono'] != null && datos[0]['telefono'] != ' '){
                    html+= '<tr>';
                    html+= '<td>Telefono:</td>';
                    html+= '<td>'+datos[0]['telefono']+'</td>';
                    html+= '</tr>';
                    }
                    if(datos[0]['email'] != null && datos[0]['email'] != ' '){
                    html+= '<tr>';
                    html+= '<td>Email:</td>';
                    html+= '<td>'+datos[0]['email']+'</td>';
                    html+= '</tr>';
                    }
                    if(datos[0]['fecha_nacimiento'] != null && datos[0]['fecha_nacimiento'] != ' '){
                    html+= '<tr>';
                    html+= '<td>Fecha de Nacimiento:</td>';
                    html+= '<td>'+datos[0]['fecha_nacimiento']+'</td>';
                    html+= '</tr>';
                    }
                    if(datos[0]['profesion'] != null && datos[0]['profesion'] != ' '){
                    html+= '<tr>';
                    html+= '<td>Profesion:</td>';
                    html+= '<td>'+datos[0]['profesion']+'</td>';
                    html+= '</tr>';
                    }
                    if(datos[0]['estado_civil'] != null && datos[0]['estado_civil'] != ' '){
                    html+= '<tr>';
                    html+= '<td>Estado Civil:</td>';
                    html+= '<td>'+datos[0]['estado_civil']+'</td>';
                    html+= '</tr>';
                    }
                    if(datos[0]['ubigeo'] != null && datos[0]['ubigeo'] != ' '){
                    html+= '<tr>';
                    html+= '<td>Ciudad:</td>';
                    html+= '<td>'+datos[0]['ubigeo']+'</td>';
                    html+= '</tr>';
                    }
                    if(datos[0]['membresia'] != "Desconocido"){
                    html+= '<tr>';
                    html+= '<td>Membresia:</td>';
                    html+= '<td>'+datos[0]['membresia']+'</td>';
                    html+= '</tr>';
                    }
               }
               else{
                    html= '<h3>Datos del Cliente: '+datos[0]['nombres']+'</h3>';
                    html+='<table>';
                    html+= '<tr>';
                    html+= '<td>Razon Social:</td>';
                    html+= '<td>'+datos[0]['nombres']+'</td>';
                    html+= '</tr>';
                    html+= '<tr>';
                    html+= '<td>RUC:</td>';
                    html+= '<td>'+datos[0]['documento']+'</td>';
                    html+= '</tr>';
                    html+= '<tr>';
                    html+= '<td>Direccion:</td>';
                    html+= '<td>'+datos[0]['direccion']+'</td>';
                    html+= '</tr>';
                    if(datos[0]['telefono'] != null && datos[0]['telefono'] != ' '){
                    html+= '<tr>';
                    html+= '<td>Telefono:</td>';
                    html+= '<td>'+datos[0]['telefono']+'</td>';
                    html+= '</tr>';
                    }
                    if(datos[0]['email'] != null && datos[0]['email'] != ' '){
                    html+= '<tr>';
                    html+= '<td>Email:</td>';
                    html+= '<td>'+datos[0]['email']+'</td>';
                    html+= '</tr>';
                    }
                    if(datos[0]['ubigeo'] != null && datos[0]['ubigeo'] != ' '){
                    html+= '<tr>';
                    html+= '<td>Ciudad:</td>';
                    html+= '<td>'+datos[0]['ubigeo']+'</td>';
                    html+= '</tr>';
                    }
               }
               html+= '</table>';
               html+= '<p align="center"><input type="button" class="k-button" value="Aceptar" id="aceptar"/></p>';
               $("#vtna_ver_cliente").html(html);
            $("#vtna_ver_cliente").fadeIn(300);
            $("#fondooscuro").fadeIn(300);
           },'json');
       }
