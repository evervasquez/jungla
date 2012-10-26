<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Unidades de Medida</h3></p>
    <table border="1">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Abreviatura</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idunidad_medida'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><?php echo $this->datos[$i]['abreviatura'] ?></td>
                <td><a href="<?php echo BASE_URL?>unidad_medida/editar/<?php echo $this->datos[$i]['idunidad_medida'] ?>">[Editar]</a>
                <a href="<?php echo BASE_URL?>unidad_medida/eliminar/<?php echo $this->datos[$i]['idunidad_medida'] ?>">[Eliminar]</a></td>
                
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay unidad de medida</p></td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>unidad_medida/nuevo" class="k-button">Nuevo</a></p>