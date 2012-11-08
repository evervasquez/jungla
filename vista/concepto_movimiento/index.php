<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Conceptos de Movimiento</h3></p>
    <p>
        <select class="combo" id="filtro">
            <option value="0">Descripcion</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>concepto_movimiento/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td class="tabtr"><?php echo $this->datos[$i]['idconcepto_movimiento'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td class="tabtr" align="center">
                <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>concepto_movimiento/editar/<?php echo $this->datos[$i]['idconcepto_movimiento'] ?>')" class="imgedit"></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>concepto_movimiento/eliminar/<?php echo $this->datos[$i]['idconcepto_movimiento'] ?>')" class="imgdelete"></a>
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>
    <?php } else { ?>
        <p>No hay conceptos de movimiento</p>
        <a href="<?php echo BASE_URL?>concepto_movimiento/nuevo" class="k-button">Nuevo</a>
    <?php } ?>