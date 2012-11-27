    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Codigo", width:10},
                {field:"Nombre", width:20},
                {field:"Email", width:20},
                {field:"Fecha", width:20},
                {field:"Estado", width:20},
                {field:"Acciones", width:10,attributes:{class:"acciones"}}]
        });
        $( "#buscar" ).focus();
        function buscar(){
            $.post('/sisjungla/mensajes/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Nombre</th>'+
                            '<th>Email</th>'+
                            '<th>Fecha</th>'+
                            '<th>Estado</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].idmensaje+'</td>';
                    HTML = HTML + '<td>'+datos[i].nombre+'</td>';
                    HTML = HTML + '<td>'+datos[i].email+'</td>';
                    HTML = HTML + '<td>'+datos[i].fecha+'</td>';
                    HTML = HTML + '<td>';
                    if(datos[i].estado == 0){
                        HTML = HTML + '<label class="noleido">Mensaje No Leido</label>';
                    }
                    else{
                        HTML = HTML + '<label class="leido">Mensaje Leido</label>';
                    }
                    HTML = HTML + '</td>';
                    var eliminar='/sisjungla/mensajes/eliminar/'+datos[i].idmensaje;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="ver(\''+datos[i].idmensaje+'\')" class="imgview" ></a>';
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
                    columns: [{field:"Codigo", width:10},
                        {field:"Nombre", width:20},
                        {field:"Email", width:20},
                        {field:"Telefono", width:20},
                        {field:"Estado", width:20},
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
        
    //ver mensajes
        function salir(){
            $("#vtna_ver_mensaje").fadeOut(300);
            $("#fondooscuro").fadeOut(300);
            buscar();
        }
       $("#vtna_ver_mensaje").hide();
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
           $.post('/sisjungla/mensajes/ver','idmensaje='+id,function(datos){
               html= '<h3>Mensaje Recibido N°'+datos[0]['idmensaje']+'</h3>';
               html+='<table>';
               html+= '<tr>';
               html+= '<td>Nombre:</td>';
               html+= '<td>'+datos[0]['nombre']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Email:</td>';
               html+= '<td>'+datos[0]['email']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Telefono:</td>';
               html+= '<td>'+datos[0]['telefono']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Mensaje:</td>';
               html+= '<td>'+datos[0]['mensaje']+'</td>';
               html+= '</tr>';
               html+= '</table>';
               html+= '<p align="center"><input type="button" class="k-button" value="Aceptar" id="aceptar"/></p>';
               $("#vtna_ver_mensaje").html(html);
            $("#vtna_ver_mensaje").fadeIn(300);
            $("#fondooscuro").fadeIn(300);
           }
           ,'json'),
           $.post('/sisjungla/mensajes/elimina_alerta','idmensaje='+id,function(datos){
           })
       }