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
            $.post('/jungla/clientes/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Tipo</th>'+
                            '<th>Nombre / Razon Social</th>'+
                            '<th>DNI / RUC</th>'+
                            '<th>Direccion</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';

                    HTML = HTML + '<td>'+datos[i].IDCLIENTE+'</td>';
                    HTML = HTML + '<td>'+datos[i].TIPO+'</td>';
                    HTML = HTML + '<td>'+datos[i].NOMBRES+' '+datos[i].APELLIDOS+'</td>';

                    HTML = HTML + '<td>'+datos[i].DOCUMENTO+'</td>';
                    HTML = HTML + '<td>'+datos[i].DIRECCION+'</td>';
                    var editar='/jungla/clientes/editar/'+datos[i].IDCLIENTE; 
                    var eliminar='/jungla/clientes/eliminar/'+datos[i].IDCLIENTE;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" class="imgview" onclick="ver(\''+datos[i].IDCLIENTE+'\')"></a>';
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
           $.post('/jungla/clientes/ver','idcliente='+id,function(datos){
               if(datos[0]['TIPO']=="natural"){
                    html= '<h3>Datos del Cliente: '+datos[0]['NOMBRES']+' '+datos[0]['APELLIDOS']+'</h3>';
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
                    html+= '<td>Nro.de Documento:</td>';
                    html+= '<td>'+datos[0]['DOCUMENTO']+'</td>';
                    html+= '</tr>';
                    html+= '<tr>';
                    html+= '<td>Direccion:</td>';
                    html+= '<td>'+datos[0]['DIRECCION']+'</td>';
                    html+= '</tr>';
                    html+= '<tr>';
                    html+= '<td>Sexo:</td>';
                    if(datos[0]['SEXO']==0){
                        html+= '<td>Femenino</td>';
                    }
                    else{
                        html+= '<td>Masculino</td>';
                    }
                    html+= '</tr>'
                    if(datos[0]['TELEFONO'] != null && datos[0]['TELEFONO'] != ''){
                    html+= '<tr>';
                    html+= '<td>Telefono:</td>';
                    html+= '<td>'+datos[0]['TELEFONO']+'</td>';
                    html+= '</tr>';
                    }
                    if(datos[0]['EMAIL'] != null && datos[0]['EMAIL'] != ' '){
                    html+= '<tr>';
                    html+= '<td>Email:</td>';
                    html+= '<td>'+datos[0]['EMAIL']+'</td>';
                    html+= '</tr>';
                    }
                    if(datos[0]['FECHA_NACIMIENTO'] != null && datos[0]['FECHA_NACIMIENTO'] != ' '){
                    html+= '<tr>';
                    html+= '<td>Fecha de Nacimiento:</td>';
                    html+= '<td>'+datos[0]['FECHA_NACIMIENTO']+'</td>';
                    html+= '</tr>';
                    }
                    if(datos[0]['PROFESION'] != null && datos[0]['PROFESION'] != ' '){
                    html+= '<tr>';
                    html+= '<td>Profesion:</td>';
                    html+= '<td>'+datos[0]['PROFESION']+'</td>';
                    html+= '</tr>';
                    }
                    if(datos[0]['ESTADO_CIVIL'] != null && datos[0]['ESTADO_CIVIL'] != ' '){
                    html+= '<tr>';
                    html+= '<td>Estado Civil:</td>';
                    html+= '<td>'+datos[0]['ESTADO_CIVIL']+'</td>';
                    html+= '</tr>';
                    }
                    if(datos[0]['XPAIS'] != null && datos[0]['XPAIS'] != ' '){
                    html+= '<tr>';
                    html+= '<td>Pais:</td>';
                    html+= '<td>'+datos[0]['XPAIS']+'</td>';
                    html+= '</tr>';
                    }
                    if(datos[0]['XMEMBRESIA'] != "Desconocido"){
                    html+= '<tr>';
                    html+= '<td>Membresia:</td>';
                    html+= '<td>'+datos[0]['XMEMBRESIA']+'</td>';
                    html+= '</tr>';
                    }
               }
               else{
                    html= '<h3>Datos del Cliente: '+datos[0]['NOMBRES']+'</h3>';
                    html+='<table>';
                    html+= '<tr>';
                    html+= '<td>Razon Social:</td>';
                    html+= '<td>'+datos[0]['NOMBRES']+'</td>';
                    html+= '</tr>';
                    html+= '<tr>';
                    html+= '<td>RUC:</td>';
                    html+= '<td>'+datos[0]['DOCUMENTO']+'</td>';
                    html+= '</tr>';
                    html+= '<tr>';
                    html+= '<td>Direccion:</td>';
                    html+= '<td>'+datos[0]['DIRECCION']+'</td>';
                    html+= '</tr>';
                    if(datos[0]['TELEFONO'] != null && datos[0]['TELEFONO'] != ' '){
                    html+= '<tr>';
                    html+= '<td>Telefono:</td>';
                    html+= '<td>'+datos[0]['TELEFONO']+'</td>';
                    html+= '</tr>';
                    }
                    if(datos[0]['EMAIL'] != null && datos[0]['EMAIL'] != ' '){
                    html+= '<tr>';
                    html+= '<td>Email:</td>';
                    html+= '<td>'+datos[0]['EMAIL']+'</td>';
                    html+= '</tr>';
                    }
                    if(datos[0]['UBIGEO'] != null && datos[0]['UBIGEO'] != ' '){
                    html+= '<tr>';
                    html+= '<td>Ciudad:</td>';
                    html+= '<td>'+datos[0]['UBIGEO']+'</td>';
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
