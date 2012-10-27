<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Promociones</h3></p>
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Descuento</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Finalizacion</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td class="tabtr"><?php echo $this->datos[$i]['idpromocion'] ?></td>
                <td><?php echo utf8_encode($this->datos[$i]['descripcion']) ?></td>
                <td><?php echo $this->datos[$i]['descuento'] ?></td>
                <td><?php echo $this->datos[$i]['fecha_inicio'] ?></td>
                <td><?php echo $this->datos[$i]['fecha_final'] ?></td>
                <td align="center" class="tabtr"><a href="<?php echo BASE_URL?>promociones/editar/<?php echo $this->datos[$i]['idpromocion'] ?>">
                <img src="<?php echo BASE_URL?>lib/img/edit.png" class="imgfrm" /></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>promociones/eliminar/<?php echo $this->datos[$i]['idpromocion'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/delete.png" class="imgfrm" /></a></td>
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay promociones</p></td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>promociones/nuevo" class="k-button">Nuevo</a></p>