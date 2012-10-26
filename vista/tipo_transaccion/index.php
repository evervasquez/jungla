<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Tipos de Transaccion</h3></p>
    <table border="1">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idtipo_transaccion'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><a href="<?php echo BASE_URL?>tipo_transaccion/editar/<?php echo $this->datos[$i]['idtipo_transaccion'] ?>">[Editar]</a>
                <a href="<?php echo BASE_URL?>tipo_transaccion/eliminar/<?php echo $this->datos[$i]['idtipo_transaccion'] ?>">[Eliminar]</a></td>
                
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay tipos de transaccion</p></td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>tipo_transaccion/nuevo" class="k-button">Nuevo</a></p>