
<h3>Lista de Servicios</h3>
<?php if (isset($this->datos) && count($this->datos)) { ?>
    <table border="1">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
<<<<<<< HEAD

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idservicio'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><a href="/sisjungla/servicios/editar/<?php echo $this->datos[$i]['idservicio'] ?>">[Editar]</a>
                <a href="/sisjungla/servicios/eliminar/<?php echo $this->datos[$i]['idservicio'] ?>">[Eliminar]</a></td>
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td>No hay servicios</td>
        </tr>
    <?php } ?>
</table>
<p><a href="/sisjungla/servicios/nuevo" class="k-button">Nuevo</a></p>
=======
    </table>
    <a href="index.php?controller=servicios&accion=nuevo" class="k-button">Nuevo</a>
>>>>>>> e1a4c02b120237b6528e59af93906cc57f498c04
