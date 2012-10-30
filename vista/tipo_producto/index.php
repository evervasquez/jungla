<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Tipos de Producto</h3></p>
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td class="tabtr"><?php echo $this->datos[$i]['idtipo_producto'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td class="tabtr" align="center">
                <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>tipo_producto/editar/<?php echo $this->datos[$i]['idtipo_producto'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/edit.png" class="imgfrm" /></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>tipo_producto/eliminar/<?php echo $this->datos[$i]['idtipo_producto'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/delete.png" class="imgfrm" /></a></td>
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay tipos de producto</p></td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>tipo_producto/nuevo" class="k-button">Nuevo</a></p>