<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Empleados</h3></p>

    <table border="1" class="tabgrilla">
        <tr>
            <th><label>Codigo</label></th>
            <th><label>Nombre</label></th>
            <th><label>Apellidos</label></th>
            <th><label>DNI</label></th>
            <th><label>Telefono</label></th>
            <th><label>Direccion</label></th>
            <th><label>Perfil</label></th>
            <th><label>Ubigeo</label></th>
            <th><label>Profesion</label></th>
            <th><label>Accion</label></th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idempleado'] ?></td>
                <td><?php echo $this->datos[$i]['nombres'] ?></td>
                <td><?php echo $this->datos[$i]['apellidos'] ?></td>
                <td><?php echo $this->datos[$i]['dni'] ?></td>
                <td><?php echo $this->datos[$i]['telefono'] ?></td>
                <td><?php echo $this->datos[$i]['direccion'] ?></td>
                <td><?php echo $this->datos[$i]['perfil'] ?></td>
                <td><?php echo $this->datos[$i]['ubigeo'] ?></td>
                <td><?php echo $this->datos[$i]['profesion'] ?></td>
                <td><a href="<?php echo BASE_URL?>empleados/editar/<?php echo $this->datos[$i]['idempleado'] ?>">[Editar]</a>
                <a href="<?php echo BASE_URL?>empleados/eliminar/<?php echo $this->datos[$i]['idempleado'] ?>">[Eliminar]</a></td>
                
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay empleados</p></td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>empleados/nuevo" class="k-button">Nuevo</a></p>