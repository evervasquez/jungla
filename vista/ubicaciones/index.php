<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Ubicaciones</h3></p>
    <table border="1">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Almacen</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idubicacion'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><?php echo $this->datos[$i]['almacen'] ?></td>
                <td><a href="<?php echo BASE_URL?>ubicaciones/editar/<?php echo $this->datos[$i]['idubicacion'] ?>">[Editar]</a>
                <a href="<?php echo BASE_URL?>ubicaciones/eliminar/<?php echo $this->datos[$i]['idubicacion'] ?>">[Eliminar]</a></td>
                
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay ubicaciones</p></td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>ubicaciones/nuevo" class="k-button">Nuevo</a></p>