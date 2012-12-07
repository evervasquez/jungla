<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Asientos Contables</h3>
<div id="grilla">
<table border="1" class="tabgrilla">
    <tr>
        <th>Nro Operacion</th>
        <th>Fecha Operacion</th>
        <th>Glosa</th>
        <th>Codigo Libro</th>
        <th>Nro Correlativo</th>
        <th>Nro del Documento</th>
        <th>Nro Cuenta</th>
        <th>Denominación</th>
        <th>Debe</th>
        <th>Haber</th>
    </tr>
<?php for ($i = 0; $i < count($this->datos); $i++) { ?>
        <tr>
            <td><?php echo $this->datos[$i]['NRO_OPERACION'] ?></td>
            <td><?php echo $this->datos[$i]['FECHA'] ?></td>
            <td><?php echo $this->datos[$i]['CONCEPTO_MOVIMIENTO'] ?></td>
            <td><?php echo $this->datos[$i]['REGISTRO'] ?></td>
            <td><?php echo $this->datos[$i]['NRO_CORRELATIVO'] ?></td>
            <td><?php echo $this->datos[$i]['NRO_DOCUMENTO'] ?></td>
            <td><?php echo $this->datos[$i]['NRO_CUENTA'] ?></td>
            <td><?php echo $this->datos[$i]['CUENTA'] ?></td>
            <td><?php echo $this->datos[$i]['DEBE'] ?></td>
            <td><?php echo $this->datos[$i]['HABER'] ?></td>
        </tr>
    <?php } ?>
    </table>
</div>
<?php } else { ?>
        <p>No hay aientos</p>
    <?php } ?>