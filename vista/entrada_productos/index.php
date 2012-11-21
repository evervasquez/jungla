<?php if (isset($this->datos) && count($this->datos) ){ ?>
<h3>Entrada de productos</h3>
    <p>
        <select class="combo" id="filtro">
            <option value="0">Nro Comprobante</option>
            <option value="1">Proveedor</option>
            <option value="2">Empleado</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>entrada_productos/entradas_pendientes" class="k-button">Ver Entradas Pendientes</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla" id="tbl_empleado">
        <tr>
            <th>Empleado</th>
            <th>Nro.Comprobante</th>
            <th>Prvoeedor</th>
            <th>Fecha</th>
            <th>Accion</th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
        <?php if($this->datos[$i]['idtipo_movimiento']==1){ ?>
        <tr>
            <td><?php echo $this->datos[$i]['empleados_n'].' '.$this->datos[$i]['empleados_a'] ?></td>
            <td><?php echo $this->datos[$i]['compra'] ?></td>
            <td><?php echo $this->datos[$i]['proveedor'] ?></td>
            <td><?php echo $this->datos[$i]['fecha'] ?></td>
            <td class="tabtr" align="center">
                <a href="<?php echo BASE_URL ?>compras/ver/<?php echo $this->datos[$i]['idcompra']?>">[Ver]</a>
            </td>
        </tr>
        <?php } ?>
    <?php } ?>
</table>
</div>

<?php } else{ ?>
    <p>No hay entrada de productos</p>
    <a href="<?php echo BASE_URL?>entrada_productos/confirmacion" class="k-button">Ver Entradas Pendientes</a>
<?php } ?>  
