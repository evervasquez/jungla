<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Pasajeros</h3>
    <p>
        <select class="list" id="filtro">
            <option value="0">Nombre/Apellido</option>
            <option value="1">Razon Social</option>
            <option value="2">DNI</option>
            <option value="3">RUC</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>pasajeros/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Tipo</th>
            <th>Nombre / Razon Social</th>
            <th>DNI / RUC</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Pais</th>
            <th>Acciones</th>
        </tr>
<?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['IDCLIENTE'] ?></td>
                <td><?php echo $this->datos[$i]['TIPO'] ?></td>
                <td><?php echo $this->datos[$i]['NOMBRES'].' '.$this->datos[$i]['APELLIDOS'] ?></td>
                <td><?php echo $this->datos[$i]['DOCUMENTO'] ?></td>
                <td><?php echo $this->datos[$i]['TELEFONO'] ?></td>
                <td><?php echo $this->datos[$i]['EMAIL'] ?></td>
                <td><?php echo $this->datos[$i]['XPAIS'] ?></td>
                <td>
                    <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>pasajeros/editar/<?php echo $this->datos[$i]['IDCLIENTE'] ?>')" class="imgedit"></a>
                    <a href="javascript:void(0)" class="imgview" onclick="ver('<?php echo $this->datos[$i]['IDCLIENTE'] ?>')"></a>  
                </td>
            </tr>
        <?php } ?>
</table>
    </div>
    <?php } else { ?>
        <p>No hay pasajeros</p>
        <p><a href="<?php echo BASE_URL?>pasajeros/nuevo" class="k-button">Nuevo</a></p>
    <?php } ?>
    
<div id="vtna_ver_pasajero"></div>
<div id="fondooscuro"></div>