<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Membresias</h3></p>
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
                <td><a href="<?php echo BASE_URL?>membresia/editar/<?php echo $this->datos[$i]['idmembresia'] ?>">[Editar]</a>
                <a href="javascript:eliminar('<?php echo BASE_URL?>membresia','<?php echo $this->datos[$i]['idmembresia'] ?>')">[Eliminar]</a></td>
                
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay Membresias</p></td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>membresia/nuevo" class="k-button">Nuevo</a></p>
