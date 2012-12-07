<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Habitaciones</h3>
    <p>
        <select class="list" id="filtro">
            <option value="0">Nro.de Habitacion</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>habitaciones/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Nro.de Habitacion</th>
            <th>Ventilacion</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['IDHABITACION'] ?></td>
                <td><?php echo $this->datos[$i]['NRO_HABITACION'] ?></td>
                <?php if($this->datos[$i]['VENTILACION']==1){ ?>
                <td>Ventilador</td>
                <?php }else{ ?>
                <td>Aire Acondicionado</td>
                <?php } ?>
                <?php if($this->datos[$i]['ESTADO']==1){ ?>
                <td>Habilitado</td>
                <?php }else{ ?>
                <td>En Mantenimiento</td>
                <?php } ?>
                <td>
                    <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>habitaciones/editar/<?php echo $this->datos[$i]['IDHABITACION'] ?>')" class="imgedit"></a>
                    <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>habitaciones/eliminar/<?php echo $this->datos[$i]['IDHABITACION'] ?>')" class="imgdelete"></a>
                    <a href="javascript:void(0)" onclick="ver('<?php echo $this->datos[$i]['IDHABITACION'] ?>')" class="imgview"></a>
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>
    <?php } else { ?>
        <p>No hay habitaciones</p>
        <a href="<?php echo BASE_URL?>habitaciones/nuevo" class="k-button">Nuevo</a>
    <?php } ?>
<div id="vtna_ver_habitacion"></div>
<div id="fondooscuro"></div>        