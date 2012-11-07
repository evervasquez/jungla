<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Categorias</h3>
    <p>
        <select class="combo" id="filtro">
            <option value="0">Descripcion</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>categorias/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
<table border="1" class="tabgrilla">
    <tr>
        <th><label>Codigo</label></th>
        <th><label>Descripcion</label></th>
        <th><label>Nro.de Elemento</label></th>
        <th><label>Acciones</label></th>
    </tr>
<?php for ($i = 0; $i < count($this->datos); $i++) { ?>
        <tr>
            <td class="tabtr"><?php echo $this->datos[$i]['idcategoria'] ?></td>
            <td><?php echo $this->datos[$i]['descripcion'] ?></td>
            <td><?php echo $this->datos[$i]['nro_elemento'] ?></td>
            <td class="tabtr" align="center">
            <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>categorias/editar/<?php echo $this->datos[$i]['idcategoria'] ?>')">
            <img src="<?php echo BASE_URL?>lib/img/edit.png" class="imgfrm" /></a>
            <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>categorias/eliminar/<?php echo $this->datos[$i]['idcategoria'] ?>')">
            <img src="<?php echo BASE_URL?>lib/img/delete.png" class="imgfrm" /></a></td>
        </tr>
    <?php } ?>
    </table>
    </div>
<?php } else { ?>
        <p>No hay categorias</p>
        <a href="<?php echo BASE_URL?>categorias/nuevo" class="k-button">Nuevo</a>
    <?php } ?>