<?php if (isset($this->datos) && count($this->datos) || isset($this->datos_ventas) && count($this->datos_ventas)) { ?>
<p><h3>Lista de Cobros</h3></p>
    <p>
        <select class="list" id="filtro">
            <option value="0">Cliente</option>
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
    <?php for ($i = 0; $i < count($this->datos_ventas); $i++) { ?>
        <?php if($this->datos_ventas[$i]['IDTIPO_TRANSACCION']==1 && $this->datos_ventas[$i]['ESTADO_PAGO']==0) {?>
        <tr>
            <td><?php echo $this->datos_ventas[$i]['NRO_DOCUMENTO'] ?></td>
            <td><?php echo $this->datos_ventas[$i]['CLIENTE'] ?></td>
            <td><?php echo $this->datos_ventas[$i]['FECHA_VENTA'] ?></td>
            <td><?php echo ($this->datos_ventas[$i]['IGV']+1)*$this->datos_ventas[$i]['IMPORTE']-$this->datos_ventas[$i]['DESCUENTO'] ?></td>
            <td><?php echo 0 ?></td>
            <td><?php echo ($this->datos_ventas[$i]['IGV']+1)*$this->datos_ventas[$i]['IMPORTE']-$this->datos_ventas[$i]['DESCUENTO'] ?></td>
            <td class="tabtr" align="center">
                <input type="hidden" id="bot<?php echo $i ?>" value="<?php echo BASE_URL ?>cobros/cobrar/<?php echo $this->datos_ventas[$i]['IDVENTA'].'/'.($this->datos_ventas[$i]['IMPORTE'] * ($this->datos_ventas[$i]['IGV'] + 1) - $this->datos_ventas[$i]['DESCUENTO']).'/'.$this->datos_ventas[$i]['TIPO_COMPROBANTE']?>" />
                <a href="" class="imgcobrar" onclick="botcobrar(<?php echo $i; ?>)" target="_blank"></a>
            </td>
        </tr>
        <?php } ?>
    <?php } ?>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
        <tr>
            <td><?php echo $this->datos[$i]['NRO_DOCUMENTO'] ?></td>
            <td><?php echo $this->datos[$i]['CLIENTE'] ?></td>
            <td><?php echo $this->datos[$i]['FECHA_VENTA'] ?></td>
            <td><?php echo ($this->datos[$i]['IGV']+1)*$this->datos[$i]['IMPORTE']-$this->datos[$i]['DESCUENTO'] ?></td>
            <td><?php echo $this->datos[$i]['MONTO_COBRADO'] ?></td>
            <td><?php echo ($this->datos[$i]['IGV']+1)*$this->datos[$i]['IMPORTE'] - $this->datos[$i]['MONTO_COBRADO']-$this->datos[$i]['DESCUENTO'] ?></td>
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