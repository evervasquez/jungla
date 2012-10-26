<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Promociones</h3></p>
    <table border="1">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <td>Descuento</td>
            <td>Fecha de Inicio</td>
            <td>Fecha de Finalizacion</td>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idpromocion'] ?></td>
                <td><?php echo utf8_encode($this->datos[$i]['descripcion']) ?></td>
                <td><?php echo $this->datos[$i]['descuento'] ?></td>
                <td><?php echo $this->datos[$i]['fecha_inicio'] ?></td>
                <td><?php echo $this->datos[$i]['fecha_final'] ?></td>
                <td><a href="<?php echo BASE_URL?>promociones/editar/<?php echo $this->datos[$i]['idpromocion'] ?>">[Editar]</a>
                <a href="<?php echo BASE_URL?>promociones/eliminar/<?php echo $this->datos[$i]['idpromocion'] ?>">[Eliminar]</a></td>
                
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay promociones</p></td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>promociones/nuevo" class="k-button">Nuevo</a></p>