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
            <?php if($this->datos_ventas[$i]['idtipo_transaccion']==1 && $this->datos_ventas[$i]['estado_pago']==0){  ?>
            <tr>
                <td><?php echo $this->datos_ventas[$i]['idventa'] ?></td>
                <td><?php echo $this->datos_ventas[$i]['nro_documento'] ?></td>
                <td><?php echo $this->datos_ventas[$i]['cliente'] ?></td>
                <td><?php echo $this->datos_ventas[$i]['fecha_venta'] ?></td>
                <td><?php echo $this->datos_ventas[$i]['importe'] ?></td>
                <td><?php echo $this->datos_ventas[$i]['igv'] ?></td>
                <td><?php echo $this->datos_ventas[$i]['importe'] * ($this->datos_ventas[$i]['igv'] + 1) - $this->datos_ventas[$i]['descuento'] ?></td>
                <td><?php echo $this->datos_ventas[$i]['tipo'] ?></td>
                <td>
                    <a href="javascript:void(0)" onclick="ver('<?php echo $this->datos_ventas[$i]['idventa'] ?>')" class="imgview"></a>
                    <a href="<?php echo BASE_URL.'movimiento_caja/imprimir/'.$this->datos_ventas[$i]['idventa'].'/'.$this->datos_ventas[$i]['tipo_comprobante']?>" target="_blank">[Imprimir]</a>
        <?php if($this->datos_ventas[$i]['estado_pago']==0){?>
                    <a href="<?php echo BASE_URL.'movimiento_caja/cobrar/'.$this->datos_ventas[$i]['idventa'].'/'.($this->datos_ventas[$i]['importe'] * ($this->datos_ventas[$i]['igv'] + 1) - $this->datos_ventas[$i]['descuento']).'/'.$this->datos_ventas[$i]['tipo_comprobante']?>" target="_blank">[Cobrar]</a>
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