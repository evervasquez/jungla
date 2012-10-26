<p><h3>Lista de Tipos de Habitacion</h3></p>
<?php if (isset($this->datos) && count($this->datos)) { ?>
    <table border="1">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idtipo_habitacion'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><a href="<?php echo BASE_URL?>tipo_habitacion/editar/<?php echo $this->datos[$i]['idtipo_habitacion'] ?>">[Editar]</a>
                <a href="<?php echo BASE_URL?>tipo_habitacion/eliminar/<?php echo $this->datos[$i]['idtipo_habitacion'] ?>">[Eliminar]</a></td>
                
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td>No hay tipos de habitacion</td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>tipo_habitacion/nuevo" class="k-button">Nuevo</a></p>