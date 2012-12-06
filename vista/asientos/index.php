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
            <td><?php echo $this->datos[$i]['nro_operacion'] ?></td>
            <td><?php echo $this->datos[$i]['fecha'] ?></td>
            <td><?php echo $this->datos[$i]['concepto_movimiento'] ?></td>
            <td><?php echo $this->datos[$i]['registro'] ?></td>
            <td><?php echo $this->datos[$i]['nro_correlativo'] ?></td>
            <td><?php echo $this->datos[$i]['nro_documento'] ?></td>
            <td><?php echo $this->datos[$i]['nro_cuenta'] ?></td>
            <td><?php echo $this->datos[$i]['cuenta'] ?></td>
            <td><?php echo $this->datos[$i]['debe'] ?></td>
            <td><?php echo $this->datos[$i]['haber'] ?></td>
        </tr>
    <?php } ?>
    </table>
</div>
<?php } else { ?>
        <p>No hay aientos</p>
    <?php } ?>