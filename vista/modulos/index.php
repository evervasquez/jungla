<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Modulos</h3></p>
    <table border="1">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Url</th>
            <th>Modulo Padre</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idmodulo'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><?php echo $this->datos[$i]['url'] ?></td>
                <td><?php echo $this->datos[$i]['modulo_padre'] ?></td>
                <td><a href="<?php echo BASE_URL?>modulos/editar/<?php echo $this->datos[$i]['idmodulo'] ?>">[Editar]</a>
                <a href="<?php echo BASE_URL?>modulos/eliminar/<?php echo $this->datos[$i]['idmodulo'] ?>">[Eliminar]</a></td>
                
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay modulos</p></td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>modulos/nuevo" class="k-button">Nuevo</a></p>