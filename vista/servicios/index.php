<p><h3>Lista de Servicios</h3></p>
<?php if (isset($this->datos) && count($this->datos)) { ?>
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
                <a href="<?php echo BASE_URL?>servicios/eliminar/<?php echo $this->datos[$i]['idservicio'] ?>">[Eliminar]</a></td>
                
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td>No hay servicios</td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>servicios/nuevo" class="k-button">Nuevo</a></p>