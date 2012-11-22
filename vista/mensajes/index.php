<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Mensajes</h3>
    <p>
        <select class="list" id="filtro">
            <option value="0">Nombre</option>
            <option value="1">Email</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idmensaje'] ?></td>
                <td><?php echo $this->datos[$i]['nombre'] ?></td>
                <td><?php echo $this->datos[$i]['email'] ?></td>
                <td><?php echo $this->datos[$i]['fecha'] ?></td>
                <?php if($this->datos[$i]['estado'] == 0) echo"<td><label class='noleido'>No Leido</label></td>"; 
                else echo "<td><label class='leido'>Leido</label></td>"; ?>
                <td>
                    <a href="javascript:void(0)" onclick="ver('<?php echo $this->datos[$i]['idmensaje'] ?>')" class="imgview ver" ></a>
                    <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>mensajes/eliminar/<?php echo $this->datos[$i]['idmensaje'] ?>')" class="imgdelete"></a>
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>
    <?php } else { ?>
        <p>No hay mensajes</p>
    <?php } ?>
<div id="vtna_ver_mensaje"></div>
<div id="fondooscuro"></div>