<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Proveedores</h3>
    <p>
        <select class="list" id="filtro">
            <option value="0">Razon Social</option>
            <option value="1">Representante</option>
            <option value="2">RUC</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>proveedores/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla" id="tbl_proveedores">
        <tr>
            <th>Codigo</th>
            <th>Razon Social</th>
            <th>Representante</th>
            <th>RUC</th>
            <th>Direccion</th>
            <th>Acciones</th>
        </tr>
        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['IDPROVEEDOR'] ?></td>
                <td><?php echo $this->datos[$i]['RAZON_SOCIAL'] ?></td>
                <td><?php echo $this->datos[$i]['REPRESENTANTE'] ?></td>
                <td><?php echo $this->datos[$i]['RUC'] ?></td>
                <td><?php echo $this->datos[$i]['DIRECCION'] ?></td>
                <td>
                    <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>proveedores/editar/<?php echo $this->datos[$i]['IDPROVEEDOR'] ?>')" class="imgedit"></a>
                    <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>proveedores/eliminar/<?php echo $this->datos[$i]['IDPROVEEDOR'] ?>')" class="imgdelete"></a>
                    <a href="javascript:void(0)" class="imgview" onclick="ver('<?php echo $this->datos[$i]['IDPROVEEDOR'] ?>')"></a>
                </td>
            </tr>
        <?php } ?>
</table>
</div>
<?php } else { ?>
            <p>No hay proveedores</p>
            <a href="<?php echo BASE_URL?>proveedores/nuevo" class="k-button">Nuevo</a>
    <?php } ?>

            
            <div id="vtna_ver_proveedor"></div>
            <div id="fondooscuro"></div>