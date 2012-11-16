<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Deudas</h3></p>
    <p>
        <select class="combo" id="filtro">
            <option value="0">Nro Comprobante</option>
            <option value="1">Proveedor</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla" id="tbl_empleado">
        <tr>
            <th>Nro Comprobante</th>
            <th>Proveedor</th>
            <th>Fecha Compra</th>
            <th>Total</th>
            <th>Monto Pagado</th>
            <th>Accion</th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['nro_comprobante'] ?></td>
                <td><?php echo $this->datos[$i]['proveedor'] ?></td>
                <td><?php echo $this->datos[$i]['fecha_compra'] ?></td>
                <td><?php echo ($this->datos[$i]['igv']+1)*$this->datos[$i]['importe'] ?></td>
                <td><?php echo $this->datos[$i]['monto_pagado'] ?></td>
                <td class="tabtr" align="center">
                    <a href="<?php echo BASE_URL ?>deudas/cronograma/<?php echo $this->datos[0]['idcompra']?>">[Cronograma]</a>
                </td>
            </tr>
        <?php } ?>
</table>
</div>

<?php } else{ ?>
            <p>No hay deudas</p>
    <?php } ?>  