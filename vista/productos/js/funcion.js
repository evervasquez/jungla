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
            $.post('/sisjungla/productos/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
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
                    HTML = HTML + '<td>'+datos[i].idproducto+'</td>';
                    HTML = HTML + '<td>'+(datos[i].descripcion)+'</td>';
                    HTML = HTML + '<td>'+datos[i].tipo+'</td>';
                    HTML = HTML + '<td>'+datos[i].stock+'</td>';
                    HTML = HTML + '<td>'+datos[i].um+'</td>';
                    HTML = HTML + '<td>'+datos[i].ubicacion+'</td>';
                    var editar='/sisjungla/productos/editar/'+datos[i].idproducto; 
                    var eliminar='/sisjungla/productos/eliminar/'+datos[i].idproducto;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" class="imgview" onclick="ver(\''+datos[i].idproducto+'\')"></a>';
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
        //ver empleados
       $("#vtna_ver_producto").hide();
       $("#aceptar").live('click',function(){
            $("#vtna_ver_producto").fadeOut(300);
            $("#fondooscuro").fadeOut(300);
       });
    });
       function ver(id){
           $.post('/sisjungla/productos/ver','idproducto='+id,function(datos){
               html= '<h3>Datos del Producto "'+datos[0]['descripcion']+'"</h3>';
               html+='<table>';
               html+= '<tr>';
               html+= '<td>Descripcion:</td>';
               html+= '<td>'+datos[0]['descripcion']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Precio Unitario:</td>';
               html+= '<td>'+datos[0]['precio_unitario']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Observaciones:</td>';
               html+= '<td>'+datos[0]['observaciones']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Servicio:</td>';
               html+= '<td>'+datos[0]['servicio']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Tipo de Producto:</td>';
               html+= '<td>'+datos[0]['tipo_producto']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Unidad de Medida:</td>';
               html+= '<td>'+datos[0]['unidad_medida']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Ubicacion:</td>';
               html+= '<td>'+datos[0]['ubicacion']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Promocion:</td>';
               html+= '<td>'+datos[0]['promocion']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Stock:</td>';
               html+= '<td>'+datos[0]['stock']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Estado:</td>';
               html+= '<td>'+datos[0]['estado']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Precio de Compra:</td>';
               html+= '<td>'+datos[0]['precio_compra']+'</td>';
               html+= '</tr>';
               html+= '</table>';
               html+= '<p align="center"><input type="button" class="k-button" value="Aceptar" id="aceptar"/></p>';
               $("#vtna_ver_producto").html(html);
            $("#vtna_ver_producto").fadeIn(300);
            $("#fondooscuro").fadeIn(300);
           },'json');
       }