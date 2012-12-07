<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Productos</h3>
    <p>
        <select class="list" id="filtro">
            <option value="0">Descripcion</option>
            <option value="1">Tipo de Producto</option>
            <option value="2">Unidad de Medida</option>
            <option value="3">Ubicacion</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>productos/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla" id="tbl_producto">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Tipo de Producto</th>
            <th>Stock</th>
            <th>Unidad de medida</th>
            <th>Ubicacion</th>
            <th>Acciones</th>
        </tr>
        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['IDPRODUCTO'] ?></td>
                <td><?php echo $this->datos[$i]['DESCRIPCION'] ?></td>
                <td><?php echo $this->datos[$i]['TIPO'] ?></td>
                <td><?php echo $this->datos[$i]['STOCK'] ?></td>
                <td><?php echo $this->datos[$i]['UM'] ?></td>
                <td><?php echo $this->datos[$i]['UBICACION'] ?></td>
                <td>
                    <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>productos/editar/<?php echo $this->datos[$i]['IDPRODUCTO'] ?>')" class="imgedit"></a>
                    <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>productos/eliminar/<?php echo $this->datos[$i]['IDPRODUCTO'] ?>')" class="imgdelete"></a>
                    <a href="javascript:void(0)" onclick="ver('<?php echo $this->datos[$i]['IDPRODUCTO'] ?>')" class="imgview ver"></a>
                </td>
            </tr>
        <?php } ?>
</table>
</div>
    <?php } else { ?>
            <p>No hay productos</p>
            <a href="<?php echo BASE_URL?>productos/nuevo" class="k-button">Nuevo</a>
    <?php } ?>
            
<div id="vtna_ver_producto"></div>
<div id="fondooscuro"></div>