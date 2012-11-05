<script type="text/javascript">
    $(function(){
        $( "#buscar" ).focus();
        
        $( "#btn_buscar" ).click(function(){
            $.post('/sisjungla/productos/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Tipo de Producto</th>'+
                            '<th>Stock</th>'+
                            '<th>Precio Unitario</th>'+
                            '<th>Precio de Venta</th>'+
                            '<th>Unidad de Medida</th>'+
                            '<th>Ubicacion</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].idproducto+'</td>';
                    HTML = HTML + '<td>'+datos[i].descripcion+'</td>';
                    HTML = HTML + '<td>'+datos[i].tipo+'</td>';
                    HTML = HTML + '<td>'+datos[i].stock+'</td>';
                    HTML = HTML + '<td>'+datos[i].precio_unitario+'</td>';
                    HTML = HTML + '<td>'+datos[i].precio_venta+'</td>';
                    HTML = HTML + '<td>'+datos[i].um+'</td>';
                    HTML = HTML + '<td>'+datos[i].ubicacion+'</td>';
                    var editar='/sisjungla/productos/editar/'+datos[i].idproducto; 
                    var eliminar='/sisjungla/productos/eliminar/'+datos[i].idproducto;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')"><img src="/sisjungla/lib/img/edit.png" class="imgfrm" /></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')"><img src="/sisjungla/lib/img/delete.png" class="imgfrm" /></a>';
                    HTML = HTML + '</td>';
                    HTML = HTML + '</tr>';
                }
                HTML = HTML + '</table>'
                $("#grilla").html(HTML);
                $(".tabgrilla").kendoGrid({
                    dataSource: {
                        pageSize: 5
                    },
                    pageable: true
                });
            },'json');
        });
        
    });
</script>
<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Productos</h3>
    <p>
        <select class="combo" id="filtro">
            <option value="0">Descripcion</option>
            <option value="1">Tipo de Producto</option>
            <option value="2">Unidad de Medida</option>
            <option value="3">Ubicacion</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar">Buscar</button>
        <a href="<?php echo BASE_URL?>productos/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Tipo de Producto</th>
            <th>Stock</th>
            <th>Precio Unitario</th>
            <th>Precio de Compra</th>
            <th>Unidad de medida</th>
            <th>Ubicacion</th>
            <th>Acciones</th>
        </tr>
        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idproducto'] ?></td>
                <td><?php echo utf8_encode($this->datos[$i]['descripcion']) ?></td>
                <td><?php echo $this->datos[$i]['tipo'] ?></td>
                <td><?php echo $this->datos[$i]['stock'] ?></td>
                <td><?php echo $this->datos[$i]['precio_unitario'] ?></td>
                <td><?php echo $this->datos[$i]['precio_compra'] ?></td>
                <td><?php echo $this->datos[$i]['um'] ?></td>
                <td><?php echo $this->datos[$i]['ubicacion'] ?></td>
                <td><a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>productos/editar/<?php echo $this->datos[$i]['idproducto'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/edit.png" class="imgfrm" /></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>productos/eliminar/<?php echo $this->datos[$i]['idproducto'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/delete.png" class="imgfrm" /></a></td>
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay productos</p>
            <a href="<?php echo BASE_URL?>productos/nuevo" class="k-button">Nuevo</a></td>
        </tr>
    <?php } ?>
</table>
</div>
