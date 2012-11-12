<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Empleados</h3></p>
    <p>
        <select class="combo" id="filtro">
            <option value="0">Nombre</option>
            <option value="1">Apellidos</option>
            <option value="2">Perfil</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>empleados/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Perfil</th>
            <th>Accion</th>
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
                <a href="javascript:void(0)" onclick="ver('<?php echo BASE_URL?>empleados/ver/<?php echo $this->datos[$i]['idempleado'] ?>')" class="imgview"></a></td>
            </tr>
        <?php } ?>
</table>
</div>

    <?php } else { ?>
    <?php if(isset($this->ver) && count($this->ver)){?>
<div id="infoempleado">
    <table>
        <tr>
            <th colspan="2"><h3>Informacion del Empleado</h3></th>
        </tr>
        <tr>
            <td><label>Nombre:</label></td>
            <td><?php if(isset ($this->ver[0]['nombres']))echo $this->ver[0]['nombres']?></td>
        </tr>
        <tr>
            <td><label>Apellidos:</label></td>
            <td><?php if(isset ($this->ver[0]['apellidos']))echo $this->ver[0]['apellidos']?></td>
        </tr>
        <tr>
            <td><label>DNI:</label></td>
            <td><?php if(isset ($this->ver[0]['dni']))echo $this->ver[0]['dni']?></td>
        </tr>
        <tr>
            <td><label>Telefono:</label></td>
            <td><?php if(isset ($this->ver[0]['telefono']))echo $this->ver[0]['telefono']?></td>
        </tr>
        <tr>
            <td><label>Direccion:</label></td>
            <td><?php if(isset ($this->ver[0]['direccion']))echo $this->ver[0]['direccion']?></td>
        </tr>
        <tr>
            <td><label>Fecha de Nacimiento:</label></td>
            <td><?php if(isset ($this->ver[0]['fecha_nacimiento']))echo $this->ver[0]['fecha_nacimiento']?></td>
        </tr>
        <tr>
            <td><label>Fecha de Contratacion:</label></td>
            <td><?php if(isset ($this->ver[0]['fecha_contratacion']))echo $this->ver[0]['fecha_contratacion']?></td>
        </tr>
        <tr>
            <td><label>Ubigeo:</label></td>
            <td><?php if(isset ($this->ver[0]['ubigeo']))echo $this->ver[0]['ubigeo']?></td>
        </tr>
        <tr>
            <td><label>Perfil:</label></td>
            <td><?php if(isset ($this->ver[0]['perfil']))echo $this->ver[0]['perfil']?></td>
        </tr>
        <tr>
            <td><label>Profesion:</label></td>
            <td><?php if(isset ($this->ver[0]['profesion']))echo $this->ver[0]['profesion']?></td>
        </tr>
        <tr>
            <td><label>Usuario:</label></td>
            <td><?php if(isset ($this->ver[0]['usuario']))echo $this->ver[0]['usuario']?></td>
        </tr>
        <tr>
            <td><label>Clave:</label></td>
            <td><?php if(isset ($this->ver[0]['clave']))echo $this->ver[0]['clave']?></td>
        </tr>
        <tr>
            <td><label>Estado:</label></td>
            <td><?php if(isset ($this->ver[0]['estado']))echo $this->ver[0]['estado']?></td>
        </tr>
        <tr>
            <td><label>Actividad:</label></td>
            <td></td>
        </tr>
        <tr>
            <td><label>Tipo de Empleado:</label></td>
            <td></td>
        </tr>
        <tr align="center">
            <td colspan="2"><button class="k-button" id="aceptaempleado">Aceptar</button></td>
        </tr>
    </table>
</div>
<div id="fondooscuro"></div>
<?php } else{ ?>
            <p>No hay empleados</p>
            <a href="<?php echo BASE_URL?>empleados/nuevo" class="k-button">Nuevo</a>
    <?php }} ?>
