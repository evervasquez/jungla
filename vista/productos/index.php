<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Productos</h3>
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
            <td><p>No hay productos</p></td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>productos/nuevo" class="k-button">Nuevo</a></p>
