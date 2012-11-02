<script type="text/javascript">
    $(function(){
        $( "#buscar" ).focus();
    });
</script>
<form method="post" action="<?php echo BASE_URL ?>servicios/">
<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Servicios</h3></p>
    <p>
        <select class="combo">
            <option value="0">Descripcion</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="submit" class="k-button">Buscar</button>
        <a href="<?php echo BASE_URL?>servicios/nuevo" class="k-button">Nuevo</a>
    </p>
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td class="tabtr"><?php echo $this->datos[$i]['idservicio'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td align="center" class="tabtr"><a href="javascript:void(0)" 
                   onclick="editar('<?php echo BASE_URL?>servicios/editar/<?php echo $this->datos[$i]['idservicio'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/edit.png" class="imgfrm" /></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>servicios/eliminar/<?php echo $this->datos[$i]['idservicio'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/delete.png" class="imgfrm" /></a></td>
                
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay servicios</p>
        <a href="<?php echo BASE_URL?>servicios/nuevo" class="k-button">Nuevo</a></td>
        </tr>
    <?php } ?>
</table>
</form>