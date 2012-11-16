<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Planes Contables</h3>
    <p>
        <select class="list" id="filtro">
            <option value="0">Nro.de Cuenta</option>
            <option value="1">Descripcion</option>
            <option value="2">Nivel</option>
            <option value="3">Asiento Padre</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button search" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>plan_contable/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Nro.de Cuenta</th>
            <th>Descripcion</th>
            <th>Nivel</th>
            <th>Asiento Padre</th>
            <th>Categoria</th>
            <th>Accion</th>
        </tr>
        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td class="tabtr"><?php echo $this->datos[$i]['idcuenta'] ?></td>
                <td><?php echo $this->datos[$i]['nro_cuenta'] ?></td>
                <td><?php echo utf8_encode($this->datos[$i]['descripcion']) ?></td>
                <td><?php echo $this->datos[$i]['nivel'] ?></td>
                <td><?php echo utf8_encode($this->datos[$i]['cuenta_padre']) ?></td>
                <td><?php echo $this->datos[$i]['idcategoria'] ?></td>
                <td class="tabtr" align="center">
                <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>plan_contable/editar/<?php echo $this->datos[$i]['idalmacen'] ?>')" class="imgedit"></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>plan_contable/eliminar/<?php echo $this->datos[$i]['idalmacen'] ?>')" class="imgdelete"></a></td>
            </tr>
        <?php } ?>
    </table>
    </div>
    <?php } else { ?>
        <p>No hay plan contable</p>
        <a href="<?php echo BASE_URL?>plan_contable/nuevo" class="k-button">Nuevo</a>
    <?php } ?>