<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Perfiles</h3></p>
    <table border="1">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idperfil'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><a href="<?php echo BASE_URL?>perfiles/editar/<?php echo $this->datos[$i]['idperfil'] ?>">[Editar]</a>
                <a href="<?php echo BASE_URL?>perfiles/eliminar/<?php echo $this->datos[$i]['idperfil'] ?>">[Eliminar]</a></td>
                
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay perfiles</p></td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>perfiles/nuevo" class="k-button">Nuevo</a></p>