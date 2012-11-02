<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Habitaciones</h3>
    <table border="1" class="tabgrilla">
        <tr>
            <th><label>Codigo</label></th>
            <th><label>Nro.de Habitacion</label></th>
            <th><label>Descripcion</label></th>
            <th><label>Ventilacion</label></th>
            <th><label>Acciones</label></th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idhabitacion'] ?></td>
                <td><?php echo $this->datos[$i]['nro_habitacion'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <?php if($this->datos[$i]['ventilacion']==1){ ?>
                <td>Ventilacion</td>
                <?php }else{ ?>
                <td>Aire Acondicionado</td>
                <?php } ?>
                <td class="tabtr" align="center">
                <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>habitaciones/editar/<?php echo $this->datos[$i]['idhabitacion'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/edit.png" class="imgfrm" /></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>habitaciones/eliminar/<?php echo $this->datos[$i]['idhabitacion'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/delete.png" class="imgfrm" /></a></td>
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay habitaciones</p></td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>habitaciones/nuevo" class="k-button">Nuevo</a></p>
        