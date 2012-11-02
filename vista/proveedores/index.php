<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Proveedores</h3>
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Razon Social</th>
            <th>Representante</th>
            <th>RUC</th>
            <th>Ubigeo</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Acciones</th>
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
                <td><a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>proveedores/editar/<?php echo $this->datos[$i]['idproveedor'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/edit.png" class="imgfrm" /></a>
                <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>proveedores/eliminar/<?php echo $this->datos[$i]['idproveedor'] ?>')">
                <img src="<?php echo BASE_URL?>lib/img/delete.png" class="imgfrm" /></a></td>
            </tr>
        <?php } ?>

<?php } else { ?>
    <tr>
        <td><p>No hay proveedores</p></td>
    </tr>
<?php } ?>
    </table>
<p><a href="<?php echo BASE_URL?>proveedores/nuevo" class="k-button">Nuevo</a></p>