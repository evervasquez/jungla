<?php if (isset($this->datos) && count($this->datos)){ ?>
<h3>Entrada pendientes</h3>
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
            <th>Nro.Comprobante</th>
            <th>Prvoeedor</th>
            <th>Fecha de compra</th>
            <th>Accion</th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
        <tr>
            <td><?php echo $this->datos[$i]['nro_comprobante'] ?></td>
            <td><?php echo $this->datos[$i]['proveedor'] ?></td>
            <td><?php echo $this->datos[$i]['fecha_compra'] ?></td>
            <td class="tabtr" align="center">
                <a href="<?php echo BASE_URL ?>entrada_productos/confirmacion/<?php echo $this->datos[$i]['idcompra']?>">[Verificar]</a>
            </td>
        </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>entrada_productos" class="k-button cancelar">Aceptar</a></p>
</div>

<?php } else{ ?>
    <p>No hay entradas por confirmar</p>
    <a href="<?php echo BASE_URL?>entrada_productos" class="k-button cancelar">Aceptar</a>
<?php } ?>  
