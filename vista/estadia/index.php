<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de Estadias</h3></p>
    <p>
        <select class="list" id="filtro">
            <option value="0">Representante</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>estadia/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla" id="tbl_empleado">
        <tr>
            <th>Representante</th>
            <th>Fecha Entrada</th>
            <th>Fecha Salida</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['cliente'] ?></td>
                <td><?php echo $this->datos[$i]['fecha_ingreso'] ?></td>
                <td><?php echo $this->datos[$i]['fecha_salida'] ?></td>
                <td>
                <?php if($this->datos[$i]['estado_estadia']==0)echo 'Reserva'?>
                <?php if($this->datos[$i]['estado_estadia']==1)echo 'Estadia'?>
                </td>
                <td>
                    <a href="<?php echo BASE_URL?>estadia/confirmar/<?php echo $this->datos[$i]['idventa']?>">[Confirmar]</a>
                    <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>estadia/eliminar/<?php echo $this->datos[$i]['idventa'] ?>')" class="imgdelete"></a>
                    <a href="javascript:void(0)" class="imgview" onclick="ver('<?php echo $this->datos[$i]['idempleado'] ?>')"></a>
                </td>
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