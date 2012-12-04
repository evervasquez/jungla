<?php if (isset($this->datos) && count($this->datos) || isset($this->datos_compras) && count($this->datos_compras)){ ?>
<h3>Entrada de productos</h3>
    <p>
        <select class="list" id="filtro">
            <option value="0">Nro Comprobante</option>
            <option value="1">Proveedor</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla" id="tbl_empleado">
        <tr>
            <th>Nro.Comprobante</th>
            <th>Proveedor</th>
            <th>Fecha</th>
            <th>Accion</th>
            <th>Estado</th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos_compras); $i++) { ?>
        <tr>
            <td><?php echo $this->datos_compras[$i]['nro_comprobante'] ?></td>
            <td><?php echo $this->datos_compras[$i]['proveedor'] ?></td>
            <td><?php echo $this->datos_compras[$i]['fecha_compra'] ?></td>
            <td class="tabtr" align="center">
                <a href="javascript:void(0)" onclick="ver('<?php echo $this->datos_compras[$i]['idcompra']?>')" class="imgview"></a>
                <a href="<?php echo BASE_URL ?>entrada_productos/confirmacion/<?php echo $this->datos_compras[$i]['idcompra']?>" class="imgconfirm"></a>
            </td>
            <td><label class="pendiente">Pendiente</label></td>
        </tr>
    <?php } ?>
        
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
        <tr>
            <td><?php echo $this->datos[$i]['compra'] ?></td>
            <td><?php echo $this->datos[$i]['proveedor'] ?></td>
            <td><?php echo $this->datos[$i]['fecha'] ?></td>
            <td class="tabtr" align="center">
                <a href="javascript:void(0)" onclick="ver('<?php echo $this->datos[$i]['idcompra']?>')" class="imgview"></a>
            </td>
            <td><label class="confirmado">Confirmado</label></td>
        </tr>
    <?php } ?>
</table>
</div>

<?php } else{ ?>
    <p>No hay entrada de productos</p>
<?php } ?>  
<div id="vtna_ver_entrada"></div>
<div id="fondooscuro"></div>
