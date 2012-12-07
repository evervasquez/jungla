<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm" onsubmit="return validarVenta();">
    <legend><?php echo $this->titulo ?></legend>
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <input type="hidden" name="codigo" id="codigo" value="<?php if(isset ($this->datos[0]['IDVENTA']))echo $this->datos[0]['IDVENTA']?>"/>
        <div id="tbl_detalle">
        <table class="tabForm" align="center">
            <tr id="celda_producto">
                <td class="celda_producto"><label>Producto:</label></td>
                <td class="celda_producto">
                    <input type="hidden" id="idproducto" value="<?php if(isset ($this->datos[0]['IDPRODUCTO']))echo $this->datos[0]['IDPRODUCTO']?>"/>
                    <input type="text" class="k-textbox" placeholder="Busque producto" readonly="readonly"  
                       id="producto" value="<?php if(isset ($this->datos[0]['PRODUCTO']))echo $this->datos[0]['PRODUCTO']?>"/>
                </td>
                <td  class="celda_producto">
                    <button type="button" class="k-button" id="btn_vtna_productos"><span class="k-icon k-i-search"></span></button>
                </td>
                <td><label>Unidad de Medida:</label></td>
                <td>
                    <input type="text" class="k-textbox" id="unidad_medida" placeholder="Unidad Medida" readonly="readonly"/>
                </td>
            </tr>
            <tr>
                <td><label>Precio de Venta:</label></td>
                <td colspan="2">
                    <input type="input" class="k-textbox" placeholder="Precio Venta" id="precio" readonly="readonly"/>
                </td>
                <td><label>Cantidad:</label></td>
                <td>
                    <input type="text" class="cantidad" placeholder="Ingrese cantidad" id="cantidad" />
                </td>
            </tr>
            <tr align="center">
                <td colspan="5"><input type="button" class="k-button" value="Agregar" id="asignar_producto"/></td>
            </tr>
            <tr>
                <td colspan="5">
                    <div id="detalle_venta">
                    <table border="1" id="tbl_detalle_venta">
                        <tr>
                            <th>Item</th>
                            <th>Descripcion</th>
                            <th>Unidad de Medida</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Accion</th>
                        </tr>
                    </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <table>
    <tr>
       <td align="center">
            <p>
                <button type="submit" class="k-button">Guardar</button>
                <a href="<?php echo BASE_URL ?>estadia" class="k-button cancel">Cancelar</a>
            </p>
        </td>
    </tr>
    </table>
</form>

<div id="vtna_busca_productos">
    <h3>Lista de Productos</h3>
    <p>
        <select class="combo" id="filtro_productos">
            <option value="0">Descripcion</option>
        </select>
        <input type="text" class="k-textbox" style="width: 40%" id="txt_buscar_productos">
        <button type="button" class="k-button" id="btn_buscar_producto"><span class="k-icon k-i-search"></span></button>
        <a class="k-button cancela_prod cancel">Cancelar</a>
    </p>
    <div id="grilla_productos">
    <table border="1" class="tabgrilla" id="tbl_busca_productos">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Unidad Medida</th>
            <th>Precio Venta</th>
            <th>Selecciona</th>
        </tr>
        <?php for ($i = 0; $i < count($this->datos_productos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos_productos[$i]['IDPRODUCTO'] ?></td>
                <td><?php echo $this->datos_productos[$i]['DESCRIPCION'] ?></td>
                <td><?php echo $this->datos_productos[$i]['UM'] ?></td>
                <td><?php echo $this->datos_productos[$i]['PRECIO_UNITARIO'] ?></td>
                <td><a href="javascript:void(0)" onclick="seleccionar_productos('<?php echo $this->datos_productos[$i]['IDPRODUCTO'] ?>',
                    '<?php echo utf8_encode($this->datos_productos[$i]['DESCRIPCION']) ?>','<?php echo $this->datos_productos[0]['UM']?>',
                        <?php echo $this->datos_productos[$i]['PRECIO_UNITARIO'] ?>)" class="imgselect"></a></td>
            </tr>
        <?php } ?>
    </table>
    </div>
</div>
<div id="fondooscuro"></div>