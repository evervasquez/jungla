<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Asientos Contables</h3>
<div id="grilla">
<table border="1" class="tabgrilla">
    <tr>
        <th>Fecha Operacion</th>
        <th>Glosa</th>
        <th>Codigo Libro</th>
        <th>Correlativo</th>
        <th>N°Documento</th>
        <th>N°Cuenta</th>
        <th>Denominación</th>
        <th>Debe</th>
        <th>Haber</th>
    </tr>
<?php for ($i = 0; $i < count($this->datos); $i++) { ?>
        <tr>
            <td><?php echo $this->datos[$i]['A_FECHA'] ?></td>
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