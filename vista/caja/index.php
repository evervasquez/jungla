<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Administrar Caja</h3>
    <p>
        <select class="list" id="filtro">
            <option value="0">Empleado</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL.'caja/'.$this->action?>" class="k-button"><?php echo $this->lbl_boton ?></a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Empleado</th>
            <th>Fecha</th>
            <th>Saldo</th>
            <th>Estado</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['empleado_n'].' '.$this->datos[$i]['empleado_a'] ?></td>
                <td><?php echo $this->datos[$i]['fecha'] ?></td>
                <td><?php echo $this->datos[$i]['saldo'] ?></td>
                <td><?php if($this->datos[$i]['estado']==1){echo 'Aperturado';}else{echo 'Cerrado';}?></td>
            </tr>
        <?php } ?>
    </table>
    </div>
    <?php } else { ?>
        <p>No hay cajas</p>
        <a href="<?php echo BASE_URL?>caja/aperturar" class="k-button">Aperturar</a>
    <?php } ?>