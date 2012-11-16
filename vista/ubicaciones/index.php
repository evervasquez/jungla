<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Ubicaciones</h3></p>
    <p>
        <select class="list" id="filtro">
            <option value="0">Descripcion</option>
            <option value="1">Almacen</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>ubicaciones/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Almacen</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td class="tabtr"><?php echo $this->datos[$i]['idubicacion'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><?php echo $this->datos[$i]['almacen'] ?></td>
                <td class="tabtr" align="center">
                <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>ubicaciones/editar/<?php echo $this->datos[$i]['idubicacion'] ?>')" class="imgedit"></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>ubicaciones/eliminar/<?php echo $this->datos[$i]['idubicacion'] ?>')" class="imgdelete"></a>
                </td>
            </tr>
        <?php } ?>
</table>
</div>
    <?php } else { ?>
            <p>No hay ubicaciones</p>
            <a href="<?php echo BASE_URL?>ubicaciones/nuevo" class="k-button">Nuevo</a>
    <?php } ?>