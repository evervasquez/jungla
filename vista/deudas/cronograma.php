<h3><?php echo $this->titulo?></h3>

<table border="1">
    <tr>
        <th>Nro Cuota</th>
        <th>Fecha de Pago</th>
        <th>Monto de Cuota</th>
        <th>Monto Pagado</th>
        <th>Estado</th>
    </tr>
    <?php for($i=0;$i<count($this->datos);$i++){ ?>
    <tr>
        <td><?php echo $this->datos[$i]['nro_cuota']?></td>
        <td><?php echo $this->datos[$i]['fecha_pago']?></td>
        <td><?php echo $this->datos[$i]['monto_cuota']?></td>
        <td><?php echo $this->datos[$i]['monto_pagado']?></td>
        <td>
            <?php 
            if($this->datos[$i]['monto_cuota'] ==$this->datos[$i]['monto_pagado']){
                echo 'cancelado';
            }else{
                if(new DateTime($this->datos[$i]['fecha_pago'])>new DateTime(date("M d Y")) && $this->datos[$i]['monto_cuota'] > $this->datos[$i]['monto_pagado']){
                    echo 'normal';
                }else{
                    echo 'vencido';
                }
            }
            ?>
        </td>
    </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>deudas" class="k-button">Aceptar</a></p>

