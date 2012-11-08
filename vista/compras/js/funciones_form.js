$(document).ready(function(){
    $("#vtna_busca_proveedor").hide();
    $("#vtna_busca_productos").hide();
    $("#btn_vtna_proveedores").click(function(){
        $("#vtna_busca_proveedor").show();
        $("#txt_buscar_proveedor").focus();
    });
    
    $("#txt_buscar_proveedor").keypress(function(event){
       if(event.which == 13){
           buscar_proveedor();
       } 
    });
    
    $("#btn_buscar_proveedor").click(function(){
        buscar_proveedor();
        $("#txt_buscar_proveedor").focus();
    });
    
    function buscar_proveedor(){
        $.post('/sisjungla/proveedores/buscador','cadena='+$("#txt_buscar_proveedor").val()+'&filtro='+$("#filtro_proveedor").val(),function(datos){
            HTML = '<table border="1" class="tabgrilla" id="tbl_busca_proveedor">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Razon Social</th>'+
                            '<th>Representante</th>'+
                            '<th>Seleccionar</th>'+
                        '</tr>';
            for(var i=0;i<datos.length;i++){
                
                HTML = HTML + '<tr>';
                HTML = HTML + '<td>'+datos[i].idproveedor+'</td>';
                HTML = HTML + '<td>'+datos[i].razon_social+'</td>';
                HTML = HTML + '<td>'+datos[i].representante+'</td>';
                id=datos[i].idproveedor;
                proveedor=datos[i].razon_social;
                HTML = HTML + '<td><a href="#" onclick="seleccionar(\''+id+'\',\''+proveedor+'\')">[Seleccionar]</a></td>';
                HTML = HTML + '</tr>';
            }
            HTML += '</table>';
            $("#grilla_proveedores").html(HTML);
            $("#tbl_busca_proveedor").kendoGrid({
                    dataSource: {
                        pageSize: 5
                    },
                    pageable: true
                });
            
        },'json');        
    }
    
    $("#btn_vtna_productos").click(function(){
        $("#vtna_busca_productos").show();
        $("#txt_buscar_productos").focus();
    });
    
});
function seleccionar(id,proveedor){
    $("#idproveedor").val(id);
    $("#proveedor").val(proveedor);
    $("#vtna_busca_proveedor").hide();
}

function seleccionar_productos(id,producto){
    $("#idproducto").val(id);
    $("#producto").val(producto);
    $("#vtna_busca_productos").hide();
}