<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Habitaciones</h3>
    <table border="1">
        <tr>
            <th><label>Codigo</label></th>
            <th><label>Nro.de Habitacion</label></th>
            <th><label>Descripcion</label></th>
            <th><label>Tipo de Habitacion</label></th>
            <th><label>Costo</label></th>
            <th><label>Acciones</label></th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idempleado'] ?></td>
                <td><?php echo $this->datos[$i]['nombres'] ?></td>
                <td><?php echo $this->datos[$i]['apellidos'] ?></td>
                <td><?php echo $this->datos[$i]['telefono'] ?></td>
                <td><?php echo $this->datos[$i]['direccion'] ?></td>
                <td><?php echo $this->datos[$i]['perfil'] ?></td>
                <td><?php echo $this->datos[$i]['ubigeo'] ?></td>
                <td class="tabtr" align="center">
                <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>empleados/editar/<?php echo $this->datos[$i]['idempleado'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/edit.png" class="imgfrm" /></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>empleados/eliminar/<?php echo $this->datos[$i]['idempleado'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/delete.png" class="imgfrm" /></a></td>
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay empleados</p></td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>empleados/nuevo" class="k-button">Nuevo</a></p>
        