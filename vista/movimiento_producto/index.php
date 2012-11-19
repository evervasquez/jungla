<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Movimiento de productos</h3>
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
            <th>Tipo Movimiento</th>
            <th>Empleado</th>
            <th>Fecha</th>
            <th>Compra</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Accion</th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['tipo'] ?></td>
                <td><?php echo $this->datos[$i]['empleados_n'].' '.$this->datos[$i]['empleados_a'] ?></td>
                <td><?php echo $this->datos[$i]['fecha'] ?></td>
                <td><?php echo $this->datos[$i]['compra'] ?></td>
                <td><?php echo $this->datos[$i]['producto'] ?></td>
                <td><?php echo $this->datos[$i]['cantidad'] ?></td>
                <td class="tabtr" align="center">
                    <a href="<?php echo BASE_URL ?>compra/ver/<?php echo $this->datos[$i]['idcompra']?>">[Cronograma]</a>
                </td>
            </tr>
        <?php } ?>
</table>
</div>

<?php } else{ ?>
            <p>No hay movimientos de productos</p>
            <a class="k-button">Registrar Entrada</a>
            <a class="k-button">Registrar Salida</a>
            <a class="k-button">Registrar Perdida</a>
    <?php } ?>  
