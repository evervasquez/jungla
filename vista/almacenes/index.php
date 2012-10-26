<h3>Lista de Almacenes</h3>
<?php if (isset($this->datos) && count($this->datos)) { ?>
    <table border="1">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idalmacen'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><a href="<?php echo BASE_URL?>almacenes/editar/<?php echo $this->datos[$i]['idalmacen'] ?>">[Editar]</a>
                <a href="<?php echo BASE_URL?>almacenes/eliminar/<?php echo $this->datos[$i]['idalmacen'] ?>">[Eliminar]</a></td>
                
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td>No hay servicios</td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>almacenes/nuevo" class="k-button">Nuevo</a></p>