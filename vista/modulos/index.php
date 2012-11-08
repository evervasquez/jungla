<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Modulos</h3></p>
    <p>
        <select class="combo" id="filtro">
            <option value="0">Descripcion</option>
            <option value="1">Modulo Padre</option>
        </select>
        <input type="text" class="k-textbox" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>modulos/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Url</th>
            <th>Modulo Padre</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idmodulo'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><?php echo $this->datos[$i]['url'] ?></td>
                <td><?php echo $this->datos[$i]['modulo_padre'] ?></td>
                <td align="center">
                <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>modulos/editar/<?php echo $this->datos[$i]['idmodulo'] ?>')" class="imgedit"></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>modulos/eliminar/<?php echo $this->datos[$i]['idmodulo'] ?>')" class="imgdelete"></a>
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>
    <?php } else { ?>
        <p>No hay modulos</p>
        <a href="<?php echo BASE_URL?>modulos/nuevo" class="k-button">Nuevo</a>
    <?php } ?>