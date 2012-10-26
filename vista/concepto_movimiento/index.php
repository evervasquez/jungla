<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Conceptos de Movimiento</h3></p>
    <table border="1">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idconcepto_movimiento'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><a href="<?php echo BASE_URL?>concepto_movimiento/editar/<?php echo $this->datos[$i]['idconcepto_movimiento'] ?>">[Editar]</a>
                <a href="<?php echo BASE_URL?>concepto_movimiento/eliminar/<?php echo $this->datos[$i]['idconcepto_movimiento'] ?>">[Eliminar]</a></td>
                
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay conceptos de movimiento</p></td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>concepto_movimiento/nuevo" class="k-button">Nuevo</a></p>