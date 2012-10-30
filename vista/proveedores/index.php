<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Proveedores</h3>
    <table border="1">
        <tr>
            <td>Codigo</td>
            <td>Razon Social</td>
            <td>Representante</td>
            <td>RUC</td>
            <td>Ubigeo</td>
            <td>Direccion</td>
            <td>Telefono</td>
            <td>Email</td>
            <td>Acciones</td>
        </tr>
        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idproveedor'] ?></td>
                <td><?php echo utf8_encode($this->datos[$i]['razon_social']) ?></td>
                <td><?php echo $this->datos[$i]['representante'] ?></td>
                <td><?php echo $this->datos[$i]['ruc'] ?></td>
                <td><?php echo utf8_encode($this->datos[$i]['ubigeo']) ?></td>
                <td><?php echo $this->datos[$i]['direccion'] ?></td>
                <td><?php echo $this->datos[$i]['telefono'] ?></td>
                <td><?php echo $this->datos[$i]['email'] ?></td>
                <td><a href="<?php echo BASE_URL?>proveedores/editar/<?php echo $this->datos[$i]['idproveedor'] ?>">[Editar]</a>
                <a href="<?php echo BASE_URL?>proveedores/eliminar/<?php echo $this->datos[$i]['idproveedor'] ?>">[Eliminar]</a></td>
                
            </tr>
        <?php } ?>

<?php } else { ?>
    <tr>
        <td><p>No hay proveedores</p></td>
    </tr>
<?php } ?>
    </table>
<p><a href="<?php echo BASE_URL?>proveedores/nuevo" class="k-button">Nuevo</a></p>