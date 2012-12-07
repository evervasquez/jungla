<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Cobros</h3></p>
    <p>
        <select class="combo" id="filtro">
            <option value="0">Nro Documento</option>
            <option value="1">Cliente</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla" id="tbl_empleado">
        <tr>
            <th>Nro Documento</th>
            <th>Cliente</th>
            <th>Fecha Venta</th>
            <th>Total</th>
            <th>Monto Pagado</th>
            <th>Monto Restante</th>
            <th>Accion</th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['NRO_DOCUMENTO'] ?></td>
                <td><?php echo $this->datos[$i]['CLIENTE'] ?></td>
                <td><?php echo $this->datos[$i]['FECHA_VENTA'] ?></td>
                <td><?php echo ($this->datos[$i]['IGV']+1)*$this->datos[$i]['IMPORTE'] ?></td>
                <td><?php echo $this->datos[$i]['MONTO_COBRADO'] ?></td>
                <td><?php echo ($this->datos[$i]['IGV']+1)*$this->datos[$i]['IMPORTE'] - $this->datos[$i]['MONTO_PAGADO'] ?></td>
                <td class="tabtr" align="center">
                    <a href="<?php echo BASE_URL ?>cobros/cronograma/<?php echo $this->datos[$i]['IDVENTA']?>">[Cronograma]</a>
                    <a href="<?php echo BASE_URL ?>cobros/cronograma/<?php echo $this->datos[$i]['IDVENTA']?>">[Amortizar]</a>
                </td>
            </tr>
        <?php } ?>
</table>
</div>

<?php } else{ ?>
    <p>No hay cobros</p>
<?php } ?>  