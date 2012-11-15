<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Planes Contables</h3>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Nro.de Cuenta</th>
            <th>Descripcion</th>
            <th>Nivel</th>
            <th>Nro.de Asiento Padre</th>
            <th>Categoria</th>
            <th>Accion</th>
        </tr>
        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td class="tabtr"><?php echo $this->datos[$i]['idcuenta'] ?></td>
                <td><?php echo $this->datos[$i]['nro_cuenta'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <td><?php echo $this->datos[$i]['nivel'] ?></td>
                <td><?php echo $this->datos[$i]['cuenta_padre'] ?></td>
                <td><?php echo $this->datos[$i]['idcategoria'] ?></td>
                <td class="tabtr" align="center">
                <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>plan_contable/editar/<?php echo $this->datos[$i]['idalmacen'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/edit.png" class="imgfrm" /></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>plan_contable/eliminar/<?php echo $this->datos[$i]['idalmacen'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/delete.png" class="imgfrm" /></a></td>
            </tr>
        <?php } ?>

    <?php } else { ?>
        <tr>
            <td><p>No hay cuentas</p></td>
        </tr>
    <?php } ?>
</table>
        </div>
<p><a href="<?php echo BASE_URL?>plan_contable/nuevo" class="k-button">Nuevo</a></p>