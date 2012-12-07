<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Datos de la Empresa</h3>
    <p>
        <a href="<?php echo BASE_URL?>datos_empresa/editar/1" class="k-button">Editar Datos</a>
    </p>
    <table class="tabForm">
        <tr>
            <td><label><strong>Razon Social:</strong></label></td>
            <td><?php echo $this->datos[0]['NOMBRE_COMERCIAL'] ?></td>
            <td><label><strong>RUC:</strong></label></td>
            <td><?php echo $this->datos[0]['RUC'] ?></td>
        </tr>
        <tr>
            <td><label><strong>Dirección:</strong></label></td>
            <td><?php echo $this->datos[0]['DIRECCION'] ?></td>
            <td><label><strong>Email:</strong></label></td>
            <td><?php echo $this->datos[0]['E_MAIL'] ?></td>
        </tr>
    </table>
    <?php } else { ?>
        <p>No hay datos de la empresa</p>
        <a href="<?php echo BASE_URL?>datos_empresa/nuevo" class="k-button">Nuevo</a>
    <?php } ?>