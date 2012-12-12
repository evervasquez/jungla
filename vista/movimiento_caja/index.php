<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Movimientos de Caja</h3>
    <p>
        <select class="list" id="filtro">
            <option value="0">Concepto</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>movimiento_caja/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Concepto Movimiento</th>
            <th>Monto</th>
        </tr>
<?php for ($i = 0; $i < count($this->datos); $i++) { ?>
        <tr>
            <td><?php echo $this->datos[$i]['IDMOVIMIENTO_CAJA'] ?></td>
            <td><?php echo $this->datos[$i]['CONCEPTO'] ?></td>
            <td><?php echo $this->datos[$i]['MONTO'] ?></td>
        </tr>
<?php } ?>
    </table>
    </div>
    <?php } else { ?>
        <p>No hay movimiento de caja pendientes</p>
        <a href="<?php echo BASE_URL?>movimiento_caja/nuevo" class="k-button">Nuevo</a>
    <?php } ?>
<div id="vtna_ver_compra"></div>
<div id="fondooscuro"></div>