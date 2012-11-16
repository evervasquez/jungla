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
            <th><label>Codigo</label></th>
            <th><label>Nro.de Habitacion</label></th>
            <th><label>Descripcion</label></th>
            <th><label>Ventilacion</label></th>
            <th><label>Estado</label></th>
            <th><label>Acciones</label></th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idhabitacion'] ?></td>
                <td><?php echo $this->datos[$i]['nro_habitacion'] ?></td>
                <td><?php echo $this->datos[$i]['descripcion'] ?></td>
                <?php if($this->datos[$i]['ventilacion']==1){ ?>
                <td>Ventilador</td>
                <?php }else{ ?>
                <td>Aire Acondicionado</td>
                <?php } ?>
                <?php if($this->datos[$i]['estado']==1){ ?>
                <td>Habilitado</td>
                <?php }else{ ?>
                <td>En Mantenimiento</td>
                <?php } ?>
                <td class="tabtr" align="center">
                <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>habitaciones/editar/<?php echo $this->datos[$i]['idhabitacion'] ?>')" class="imgedit"></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>habitaciones/eliminar/<?php echo $this->datos[$i]['idhabitacion'] ?>')" class="imgdelete"></a>
                <a href="javacript:void(0)" class="imgview ver"></a></td>
            </tr>
        <?php } ?>
    </table>
    </div>
    <?php } else { ?>
        <p>No hay habitaciones</p>
        <a href="<?php echo BASE_URL?>habitaciones/nuevo" class="k-button">Nuevo</a>
    <?php } ?>
        