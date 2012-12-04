<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Datos de la Empresa</h3>
    <p>
        <a href="<?php echo BASE_URL?>datos_empresa/editar/1" class="k-button">Editar Datos</a>
    </p>
    <table class="tabForm" width="60%">
        <tr>
            <td><label><strong>Telefono:</strong></label></td>
            <td><?php echo $this->datos[0]['telefono'] ?></td>
            <td><label><strong>Movistar:</strong></label></td>
            <td><?php echo $this->datos[0]['movistar'] ?></td>
        </tr>
        <tr>
            <td><label><strong>RPM:</strong></label></td>
            <td><?php echo $this->datos[0]['rpm'] ?></td>
            <td><label><strong>RPC:</strong></label></td>
            <td><?php echo $this->datos[0]['rpc'] ?></td>
        </tr>
        <tr>
            <td><label><strong>Dirección:</strong></label></td>
            <td><?php echo $this->datos[0]['direccion'] ?></td>
            <td><label><strong>Email:</strong></label></td>
            <td><?php echo $this->datos[0]['e_mail'] ?></td>
        </tr>
        <tr>
            <td><label><strong>Presentación:</strong></label></td>
            <td colspan="3"><?php echo $this->datos[0]['presentacion'] ?></td>
        </tr>
        <tr>
            <td><label><strong>Misión:</strong></label></td>
            <td colspan="3"><?php echo $this->datos[0]['mision'] ?></td>
        </tr>
        <tr>
            <td><label><strong>Visión:</strong></label></td>
            <td colspan="3"><?php echo $this->datos[0]['vision'] ?></td>
        </tr>
    </table>
    <?php } else { ?>
        <p>No hay datos de la empresa</p>
        <a href="<?php echo BASE_URL?>datos_empresa/nuevo" class="k-button">Nuevo</a>
    <?php } ?>