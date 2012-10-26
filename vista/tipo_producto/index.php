<p><h3>Lista de Tipos de Producto</h3></p>
<?php if (isset($this->datos) && count($this->datos)) { ?>
    <table border="1">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idtipo_producto'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><a href="<?php echo BASE_URL?>tipo_producto/editar/<?php echo $this->datos[$i]['idtipo_producto'] ?>">[Editar]</a>
                <a href="<?php echo BASE_URL?>tipo_producto/eliminar/<?php echo $this->datos[$i]['idtipo_producto'] ?>">[Eliminar]</a></td>
                
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td>No hay tipos de servicio</td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>tipo_producto/nuevo" class="k-button">Nuevo</a></p>