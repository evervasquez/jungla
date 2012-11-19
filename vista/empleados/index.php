<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Empleados</h3></p>
    <p>
        <select class="list" id="filtro">
            <option value="0">Nombre</option>
            <option value="1">Apellidos</option>
            <option value="2">Perfil</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>empleados/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla" id="tbl_empleado">
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Perfil</th>
            <th>Acciones</th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idempleado'] ?></td>
                <td><?php echo $this->datos[$i]['nombres'] ?></td>
                <td><?php echo $this->datos[$i]['apellidos'] ?></td>
                <td><?php echo $this->datos[$i]['telefono'] ?></td>
                <td><?php echo $this->datos[$i]['direccion'] ?></td>
                <td><?php echo $this->datos[$i]['perfil'] ?></td>
                <td class="tabtr" align="center">
                <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>empleados/editar/<?php echo $this->datos[$i]['idempleado'] ?>')" class="imgedit"></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>empleados/eliminar/<?php echo $this->datos[$i]['idempleado'] ?>')" class="imgdelete"></a>
                <a href="javascript:void(0)" class="imgview" onclick="ver('<?php echo $this->datos[$i]['idempleado'] ?>')"></a></td>
            </tr>
        <?php } ?>
</table>
</div>

<?php } else{ ?>
            <p>No hay empleados</p>
            <a href="<?php echo BASE_URL?>empleados/nuevo" class="k-button">Nuevo</a>
    <?php } ?>
            
<div id="vtna_ver_empleado"></div>
<div id="fondooscuro"></div>