<?php if (isset($this->datos_ventas) && count($this->datos_ventas)) { ?>
<h3>Ventas pendientes de cobro</h3>
    <p>
        <select class="list" id="filtro">
            <option value="0">Nro.Comprobante</option>
            <option value="1">Empleado</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Nro.Comprobante</th>
            <th>cliente</th>
            <th>Fecha de venta</th>
            <th>Importe</th>
            <th>IGV</th>
            <th>Total</th>
            <th>Tipo de Transaccion</th>
            <th>Acciones</th>
        </tr>
<?php for ($i = 0; $i < count($this->datos_ventas); $i++) { ?>
            <?php if($this->datos_ventas[$i]['IDTIPO_TRANSACCION']==1 && $this->datos_ventas[$i]['ESTADO_PAGO']==0){  ?>
            <tr>

                <td><?php echo $this->datos_ventas[$i]['IDVENTA'] ?></td>
                <td><?php echo $this->datos_ventas[$i]['NRO_DOCUMENTO'] ?></td>
                <td><?php echo $this->datos_ventas[$i]['CLIENTE'] ?></td>
                <td><?php echo $this->datos_ventas[$i]['FECHA_VENTA'] ?></td>
                <td><?php echo $this->datos_ventas[$i]['IMPORTE'] ?></td>
                <td><?php echo $this->datos_ventas[$i]['IGV'] ?></td>
                <td><?php echo $this->datos_ventas[$i]['IMPORTE'] * ($this->datos_ventas[$i]['IGV'] + 1) - $this->datos_ventas[$i]['DESCUENTO'] ?></td>
                <td><?php echo $this->datos_ventas[$i]['TIPO'] ?></td>
                <td>
                    <a href="javascript:void(0)" onclick="ver('<?php echo $this->datos_ventas[$i]['IDVENTA'] ?>')" class="imgview"></a>
                    <a href="<?php echo BASE_URL.'movimiento_caja/imprimir/'.$this->datos_ventas[$i]['IDVENTA'].'/'.$this->datos_ventas[$i]['TIPO_COMPROBANTE']?>" target="_blank">[Imprimir]</a>
        <?php if($this->datos_ventas[$i]['ESTADO_PAGO']==0){?>
                    <a href="<?php echo BASE_URL.'movimiento_caja/cobrar/'.$this->datos_ventas[$i]['IDVENTA'].'/'.($this->datos_ventas[$i]['IMPORTE'] * ($this->datos_ventas[$i]['IGV'] + 1) - $this->datos_ventas[$i]['DESCUENTO']).'/'.$this->datos_ventas[$i]['TIPO_COMPROBANTE']?>" target="_blank">[Cobrar]</a>
        <?php } ?>
                    
                </td>
            </tr>
            <?php }  ?>
<?php } ?>
    </table>
    </div>
    <?php } else { ?>
        <p>No hay movimiento de caja pendientes</p>
        <a href="<?php echo BASE_URL?>compras/nuevo" class="k-button">Nuevo</a>
    <?php } ?>
<div id="vtna_ver_compra"></div>
<div id="fondooscuro"></div>