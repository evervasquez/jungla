<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Clientes</h3>
    <p>
        <select class="combo" id="filtro">
            <option value="0">Nombre</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>clientes/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1">
        <tr>
            <th><label>Codigo</label></th>
            <th><label>Nombre</label></th>
            <th><label>Apellidos</label></th>
            <th><label>Nro.Documento</label></th>
            <th><label>Fecha de Nacimiento</label></th>
            <th><label>Telefono</label></th>
            <th><label>Email</label></th>
            <th><label>Estado Civil</label></th>
            <th><label>Profesion</label></th>
            <th><label>Ubigeo</label></th>
            <th><label>Membresia</label></th>
            <th><label>Acciones</label></th>
        </tr>
<?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idcliente'] ?></td>
                <td><?php echo $this->datos[$i]['nombres'] ?></td>
                <td><?php echo $this->datos[$i]['apellidos'] ?></td>
                <td><?php echo $this->datos[$i]['documento'] ?></td>
                <td><?php echo $this->datos[$i]['fecha_nacimiento'] ?></td>
                <td><?php echo $this->datos[$i]['telefono'] ?></td>
                <td><?php echo $this->datos[$i]['email'] ?></td>
                <td><?php echo $this->datos[$i]['estado_civil'] ?></td>
                <td><?php echo $this->datos[$i]['profesion'] ?></td>
                <td><?php echo $this->datos[$i]['ubigeo'] ?></td>
                <td><?php echo $this->datos[$i]['membresia'] ?></td>
                <td class="tabtr" align="center">
                <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>clientes/editar/<?php echo $this->datos[$i]['idcliente'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/edit.png" class="imgfrm" /></a>
                </td>
            </tr>
        <?php } ?>
</table>
    </div>
    <?php } else { ?>
        <p>No hay clientes</p>
        <p><a href="<?php echo BASE_URL?>clientes/nuevo" class="k-button">Nuevo</a></p>
    <?php } ?>