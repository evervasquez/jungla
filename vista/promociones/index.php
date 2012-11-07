<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Promociones</h3></p>
    <p>
        <select class="combo" id="filtro">
            <option value="0">Descripcion</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>promociones/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Descuento</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Finalizacion</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td class="tabtr"><?php echo $this->datos[$i]['idpromocion'] ?></td>
                <td><?php echo utf8_encode($this->datos[$i]['descripcion']) ?></td>
                <td><?php echo $this->datos[$i]['descuento'] ?></td>
                <td><?php echo $this->datos[$i]['fecha_inicio'] ?></td>
                <td><?php echo $this->datos[$i]['fecha_final'] ?></td>
                <td align="center" class="tabtr">
                <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>promociones/editar/<?php echo $this->datos[$i]['idpromocion'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/edit.png" class="imgfrm" /></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>promociones/eliminar/<?php echo $this->datos[$i]['idpromocion'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/delete.png" class="imgfrm" /></a></td>
            </tr>
        <?php } ?>
    </table>
    </div>
    <?php } else { ?>
        <p>No hay promociones</p>
        <a href="<?php echo BASE_URL?>promociones/nuevo" class="k-button">Nuevo</a>
    <?php } ?>