<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Servicios</h3></p>
    <table border="1">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idservicio'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><a href="<?php echo BASE_URL?>servicios/editar/<?php echo $this->datos[$i]['idservicio'] ?>">[Editar]</a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>servicios/eliminar/<?php echo $this->datos[$i]['idservicio'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/delete.png" class="imgfrm" /></a></td>
                
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay servicios</p></td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>servicios/nuevo" class="k-button">Nuevo</a></p>