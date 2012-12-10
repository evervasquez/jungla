<?php if (isset($this->datos) && count($this->datos) || isset($this->datos_compras) && count($this->datos_compras)) { ?>
<p><h3>Lista de Deudas</h3></p>
    <p>
        <select class="list" id="filtro">
            <option value="0">Proveedor</option>
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
            <th>Monto Restante</th>
            <th>Accion</th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos_compras); $i++) { ?>
        <?php if($this->datos_compras[$i]['IDTIPO_TRANSACCION']==1 && $this->datos_compras[$i]['ESTADO_PAGO']==0 && $this->datos_compras[$i]['CONFIRMACION']==1) {?>
        <tr>
            <td><?php echo $this->datos_compras[$i]['NRO_COMPROBANTE'] ?></td>
            <td><?php echo $this->datos_compras[$i]['PROVEEDOR'] ?></td>
            <td><?php echo $this->datos_compras[$i]['C_FECHA_COMPRA'] ?></td>
            <td><?php echo ($this->datos_compras[$i]['IGV']+1)*$this->datos_compras[$i]['IMPORTE'] ?></td>
            <td><?php echo 0 ?></td>
            <td><?php echo ($this->datos_compras[$i]['IGV']+1)*$this->datos_compras[$i]['IMPORTE'] ?></td>
            <td class="tabtr" align="center">
                <a href="<?php echo BASE_URL ?>deudas/pagar/<?php echo $this->datos_compras[$i]['IDCOMPRA'].'/'.(($this->datos_compras[$i]['IGV']+1)*$this->datos_compras[$i]['IMPORTE'] - $this->datos_compras[$i]['MONTO_PAGADO'])?>"  class="imgcobrar"></a>
            </td>
        </tr>
        <?php } ?>
    <?php } ?>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
        <?php if($this->datos[$i]['CONFIRMACION']==1){ ?>
        <tr>
            <td><?php echo $this->datos[$i]['NRO_COMPROBANTE'] ?></td>
            <td><?php echo $this->datos[$i]['PROVEEDOR'] ?></td>
            <td><?php echo $this->datos[$i]['FECHA_COMPRA'] ?></td>
            <td><?php echo ($this->datos[$i]['IGV']+1)*$this->datos[$i]['IMPORTE'] ?></td>
            <td><?php echo $this->datos[$i]['MONTO_PAGADO'] ?></td>
            <td><?php echo ($this->datos[$i]['IGV']+1)*$this->datos[$i]['IMPORTE'] - $this->datos[$i]['MONTO_PAGADO'] ?></td>
            <td class="tabtr" align="center">

                <a href="<?php echo BASE_URL ?>deudas/cronograma/<?php echo $this->datos[$i]['IDCOMPRA'].'/'.(($this->datos[$i]['IGV']+1)*$this->datos[$i]['IMPORTE'] - $this->datos[$i]['MONTO_PAGADO'])?>" class="imgcronog"></a>
                <a href="<?php echo BASE_URL ?>deudas/amortizar/<?php echo $this->datos[$i]['IDCOMPRA'].'/'.(($this->datos[$i]['IGV']+1)*$this->datos[$i]['IMPORTE'] - $this->datos[$i]['MONTO_PAGADO'])?>" class="imgamort"></a>

            </td>
        </tr>
        <?php } ?>
    <?php } ?>
</table>
</div>

<?php } else{ ?>
    <p>No hay deudas</p>
<?php } ?>  