<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Unidades de Medida</h3></p>
    <p>
        <select class="list" id="filtro">
            <option value="0">Descripcion</option>
            <option value="1">Abreviatura</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>unidad_medida/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Abreviatura</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idunidad_medida'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><?php echo $this->datos[$i]['abreviatura'] ?></td>
                <td>
                    <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>unidad_medida/editar/<?php echo $this->datos[$i]['idunidad_medida'] ?>')" class="imgedit"></a>
                    <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>unidad_medida/eliminar/<?php echo $this->datos[$i]['idunidad_medida'] ?>')" class="imgdelete"></a>
                </td>
            </tr>
        <?php } ?>
</table>
</div>
    <?php } else { ?>
            <p>No hay unidad de medida</p>
            <a href="<?php echo BASE_URL?>unidad_medida/nuevo" class="k-button">Nuevo</a>
    <?php } ?>