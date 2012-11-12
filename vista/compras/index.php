<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Compras</h3>
    <table border="1">
        <tr>
            <th><label>Codigo</label></th>
            <th><label>Nro.Comprobante</label></th>
            <th><label>Proveedor</label></th>
            <th><label>Fecha de Compra</label></th>
            <th><label>Importe</label></th>
            <th><label>IGV</label></th>
            <th><label>Total</label></th>
            <th><label>Tipo de Transaccion</label></th>
            <th><label>Accion</label></th>
        </tr>
<?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idcompra'] ?></td>
                <td><?php echo $this->datos[$i]['nro_comprobante'] ?></td>
                <td><?php echo $this->datos[$i]['proveedor'] ?></td>
                <td><?php echo $this->datos[$i]['fecha_compra'] ?></td>
                <td><?php echo $this->datos[$i]['importe'] ?></td>
                <td><?php echo $this->datos[$i]['igv'] ?></td>
                <td><?php ?></td>
                <td><?php echo $this->datos[$i]['tipo'] ?></td>
                <td>
                <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>compras/editar/<?php echo $this->datos[$i]['idcompra'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/edit.png" class="imgfrm" /></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>compras/eliminar/<?php echo $this->datos[$i]['idcompra'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/delete.png" class="imgfrm" /></a></td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td><p>No hay compras</p>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>compras/nuevo" class="k-button">Nuevo</a></p>
