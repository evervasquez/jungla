<h3><?php echo $this->titulo?></h3>

<table border="1">
    <tr>
        <th>Nro Cuota</th>
        <th>Fecha de Pago</th>
        <th>Monto de Cuota</th>
        <th>Monto Pagado</th>
    </tr>
    <?php for($i=0;$i<count($this->datos);$i++){ ?>
    <tr>
        <td><?php echo $this->datos[$i]['nro_cuota']?></td>
        <td><?php echo $this->datos[$i]['fecha_pago']?></td>
        <td><?php echo $this->datos[$i]['monto_cuota']?></td>
        <td><?php echo $this->datos[$i]['monto_pagado']?></td>
    </tr>
    <?php } ?>
</table>