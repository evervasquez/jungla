<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Clientes</h3>
    <p>
        <select class="list" id="filtro">
            <option value="0">Nombre</option>
            <option value="1">Razon Social</option>
            <option value="2">RUC / DNI</option>
            <option value="3">Tipo de Cliente</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>clientes/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Tipo</th>
            <th>Nombre / Razon Social</th>
            <th>DNI / RUC</th>
            <th>Direccion</th>
            <th>Acciones</th>
        </tr>
<?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idcliente'] ?></td>
                <td><?php echo $this->datos[$i]['tipo'] ?></td>
                <td><?php echo utf8_encode($this->datos[$i]['nombres'].' '.$this->datos[$i]['apellidos']) ?></td>
                <td><?php echo $this->datos[$i]['documento'] ?></td>
                <td><?php echo $this->datos[$i]['direccion'] ?></td>
                <td>
                    <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>clientes/editar/<?php echo $this->datos[$i]['idcliente'] ?>')" class="imgedit"></a>
                    <a href="javascript:void(0)" class="imgview" onclick="ver('<?php echo $this->datos[$i]['idcliente'] ?>')"></a>  
                </td>
            </tr>
        <?php } ?>
</table>
    </div>
    <?php } else { ?>
        <p>No hay clientes</p>
        <p><a href="<?php echo BASE_URL?>clientes/nuevo" class="k-button">Nuevo</a></p>
    <?php } ?>
    
<div id="vtna_ver_cliente"></div>
<div id="fondooscuro"></div>