<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Compras</h3>
    <p>
        <select class="list" id="filtro">
            <option value="0">Nro.Comprobante</option>
            <option value="1">Proveedor</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>compras/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th><label>Codigo</label></th>
            <th><label>Nro.Comprobante</label></th>
            <th><label>Proveedor</label></th>
            <th><label>Fecha de Compra</label></th>
            <th><label>Importe</label></th>
            <th><label>IGV</label></th>
            <th><label>Total</label></th>
            <th><label>Tipo de Transaccion</label></th>
            <th><label>Acciones</label></th>
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
                <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>compras/editar/<?php echo $this->datos[$i]['idcompra'] ?>')" class="imgedit"></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>compras/eliminar/<?php echo $this->datos[$i]['idcompra'] ?>')" class="imgdelete"></a></td>
            </tr>
        <?php } ?>
    </table>
    </div>
    <?php } else { ?>
        <p>No hay compras</p>
        <a href="<?php echo BASE_URL?>compras/nuevo" class="k-button">Nuevo</a>
    <?php } ?>
