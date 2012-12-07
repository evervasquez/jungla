    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Codigo", width:8},
                {field:"Descripcion", width:15},
                {field:"TipoProducto", width:15},
                {field:"Stock", width:8},
                {field:"UnidadMedida", width:15},
                {field:"Ubicacion", width:10},
                {field:"Acciones", width:10,attributes:{class:"acciones"}}]
        });
        $( "#buscar" ).focus();
        
        function buscar(){
            $.post('/jungla/productos/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Tipo de Producto</th>'+
                            '<th>Stock</th>'+
                            '<th>Unidad de Medida</th>'+
                            '<th>Ubicacion</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].IDPRODUCTO+'</td>';
                    HTML = HTML + '<td>'+(datos[i].DESCRIPCION)+'</td>';
                    HTML = HTML + '<td>'+datos[i].TIPO+'</td>';
                    HTML = HTML + '<td>'+datos[i].STOCK+'</td>';
                    HTML = HTML + '<td>'+datos[i].UM+'</td>';
                    if(datos[i].UBICACION != null){
                    HTML = HTML + '<td>'+datos[i].UBICACION+'</td>';
                    }
                    else{
                    HTML = HTML + '<td></td>';    
                    }
                    var editar='/jungla/productos/editar/'+datos[i].IDPRODUCTO; 
                    var eliminar='/jungla/productos/eliminar/'+datos[i].IDPRODUCTO;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" class="imgview" onclick="ver(\''+datos[i].IDPRODUCTO+'\')"></a>';
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
                        {field:"Descripcion", width:15},
                        {field:"TipoProducto", width:15},
                        {field:"Stock", width:8},
                        {field:"UnidadMedida", width:15},
                        {field:"Ubicacion", width:10},
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
        //ver productos
        function salir(){
            $("#vtna_ver_producto").fadeOut(300);
            $("#fondooscuro").fadeOut(300);
        }
       $("#vtna_ver_producto").hide();
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
           $.post('/jungla/productos/ver','idproducto='+id,function(datos){
               html= '<h3>Datos del Producto "'+datos[0]['DESCRIPCION']+'"</h3>';
               html+='<table>';
               html+= '<tr>';
               html+= '<td>Descripcion:</td>';
               html+= '<td>'+datos[0]['DESCRIPCION']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Precio Unitario:</td>';
               html+= '<td>'+datos[0]['PRECIO_UNITARIO']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Observaciones:</td>';
               html+= '<td>'+datos[0]['OBSERVACIONES']+'</td>';
               html+= '</tr>';
               if(datos[0]['SERVICIO'] != null){
               html+= '<tr>';
               html+= '<td>Servicio:</td>';
               html+= '<td>'+datos[0]['SERVICIO']+'</td>';
               html+= '</tr>';
               }
               html+= '<tr>';
               html+= '<td>Tipo de Producto:</td>';
               html+= '<td>'+datos[0]['TIPO']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Unidad de Medida:</td>';
               html+= '<td>'+datos[0]['UM']+'</td>';
               html+= '</tr>';
               if(datos[0]['UBICACION'] != null){
               html+= '<tr>';
               html+= '<td>Ubicacion:</td>';
               html+= '<td>'+datos[0]['UBICACION']+'</td>';
               html+= '</tr>';
               }
               if(datos[0]['STOCK'] != null){
               html+= '<tr>';
               html+= '<td>Stock:</td>';
               html+= '<td>'+datos[0]['STOCK']+'</td>';
               html+= '</tr>';
               }
               if(datos[0]['PRECIO_COMPRA'] != null){
               html+= '<tr>';
               html+= '<td>Precio de Compra:</td>';
               html+= '<td>'+datos[0]['PRECIO_COMPRA']+'</td>';
               html+= '</tr>';
               }
               html+= '</table>';
               html+= '<p align="center"><input type="button" class="k-button" value="Aceptar" id="aceptar"/></p>';
               $("#vtna_ver_producto").html(html);
            $("#vtna_ver_producto").fadeIn(300);
            $("#fondooscuro").fadeIn(300);
           },'json');
       }