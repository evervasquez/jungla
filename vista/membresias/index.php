<h3>Lista de Membresias</h3>
<?php if (isset($this->datos) && count($this->datos)) { ?>
    <table border="1">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idmembresia'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><a href="<?php echo BASE_URL?>membresias/editar/<?php echo $this->datos[$i]['idmembresia'] ?>">[Editar]</a>
                <a href="<?php echo BASE_URL?>membresias/eliminar/<?php echo $this->datos[$i]['idservicio'] ?>">[Eliminar]</a></td>
                
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td>No hay Membresias</td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>membresias/nuevo" class="k-button">Nuevo</a></p>
