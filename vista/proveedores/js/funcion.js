    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Codigo", width:6},
                {field:"RazonSocial", width:15},
                {field:"Representante", width:15},
                {field:"RUC", width:15},
                {field:"Direccion", width:15},
                {field:"Acciones", width:8,attributes:{class:"acciones"}}]
        });
        $( "#buscar" ).focus();
        
        function buscar(){
            $.post('/jungla/proveedores/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Razon Social</th>'+
                            '<th>Representante</th>'+
                            '<th>RUC</th>'+
                            '<th>Direccion</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].IDPROVEEDOR+'</td>';
                    HTML = HTML + '<td>'+datos[i].RAZON_SOCIAL+'</td>';
                    HTML = HTML + '<td>'+datos[i].REPRESENTANTE+'</td>';
                    HTML = HTML + '<td>'+datos[i].RUC+'</td>';
                    HTML = HTML + '<td>'+datos[i].DIRECCION+'</td>';
                    var editar='/jungla/proveedores/editar/'+datos[i].IDPROVEEDOR; 
                    var eliminar='/jungla/proveedores/eliminar/'+datos[i].IDPROVEEDOR;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" class="imgview" onclick="ver(\''+datos[i].IDPROVEEDOR+'\')"></a>';
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
                        {field:"RazonSocial", width:15},
                        {field:"Representante", width:15},
                        {field:"RUC", width:15},
                        {field:"Direccion", width:15},
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
       
       //ver proveedores
       function salir(){
            $("#vtna_ver_proveedor").fadeOut(300);
            $("#fondooscuro").fadeOut(300);
       }
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
           $.post('/jungla/proveedores/ver','idproveedor='+id,function(datos){
               html= '<h3>Datos del Proveedor "'+datos[0]['RAZON_SOCIAL']+'"</h3>';
               html+='<table>';
               html+= '<tr>';
               html+= '<td>Razon Social:</td>';
               html+= '<td>'+datos[0]['RAZON_SOCIAL']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Representante:</td>';
               html+= '<td>'+datos[0]['REPRESENTANTE']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Ruc:</td>';
               html+= '<td>'+datos[0]['RUC']+'</td>';
               html+= '</tr>';
               if(datos[0]['TELEFONO'] != null && datos[0]['TELEFONO'] != ' '){
               html+= '<tr>';
               html+= '<td>Telefono:</td>';
               html+= '<td>'+datos[0]['TELEFONO']+'</td>';
               html+= '</tr>';
               }
               html+= '<tr>';
               html+= '<tr>';
               html+= '<td>Ciudad:</td>';
               html+= '<td>'+datos[0]['UBIGEO']+'</td>';
               html+= '</tr>';
               html+= '<td>Direccion:</td>';
               html+= '<td>'+datos[0]['DIRECCION']+'</td>';
               html+= '</tr>';
               if(datos[0]['EMAIL'] != null && datos[0]['EMAIL'] != ' '){
               html+= '<tr>';
               html+= '<td>Email:</td>';
               html+= '<td>'+datos[0]['EMAIL']+'</td>';
               html+= '</tr>';
               }
               html+= '</table>';
               html+= '<p align="center"><input type="button" class="k-button" value="Aceptar" id="aceptar"/></p>';
               $("#vtna_ver_proveedor").html(html);
            $("#vtna_ver_proveedor").fadeIn(300);
            $("#fondooscuro").fadeIn(300);
           },'json');
       }