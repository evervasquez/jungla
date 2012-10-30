<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Ubicaciones</h3></p>
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Almacen</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td class="tabtr"><?php echo $this->datos[$i]['idubicacion'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><?php echo $this->datos[$i]['almacen'] ?></td>
                <td class="tabtr" align="center">
                <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>ubicaciones/editar/<?php echo $this->datos[$i]['idubicacion'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/edit.png" class="imgfrm" /></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>ubicaciones/eliminar/<?php echo $this->datos[$i]['idubicacion'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/delete.png" class="imgfrm" /></a></td>
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay ubicaciones</p></td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>ubicaciones/nuevo" class="k-button">Nuevo</a></p>