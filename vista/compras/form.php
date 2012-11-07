<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>">
    <fieldset>
        <legend><?php echo $this->titulo ?></legend>
        <input type="hidden" name="guardar" id="guardar" value="1"/>
        <table width="50%" align="center" class="tabForm">
            <tr>
                <td><label>Codigo:</label></td>
                <td><input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                           value="<?php if(isset ($this->datos[0]['idalmacen']))echo $this->datos[0]['idalmacen']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Nro. Documento:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese Nro.de Comprobante" required name="nro_comprobante" onkeypress="return soloLetras(event)"
                       id="nombre" value="<?php if(isset ($this->datos[0]['nro_comprobante']))echo $this->datos[0]['nro_comprobante']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Proveedor:</label></td>
                <td>
                    <input type="hidden" name="idproveedor" id="idproveedor" value="<?php if(isset ($this->datos[0]['idproveedor']))echo $this->datos[0]['idproveedor']?>"/>
                    <input type="text" class="k-textbox" placeholder="Busque proveedor" required  readonly="readonly"  name="proveedor" 
                       id="proveedor" value="<?php if(isset ($this->datos[0]['proveedor']))echo $this->datos[0]['proveedor']?>"/>
                    <input type="button" class="k-button" id="btn_vtna_proveedores" value="..."/>
                </td>
            </tr>
            <tr>
                <td><label>Tipo de Transaccion:</label></td>
                <td>
                    <select class="combo" placeholder="Seleccione..." name="profesion" id="profesion">
                        <option></option>
                        <?php for($i=0;$i<count($this->datos_tipo_transaccion);$i++){ ?>
                            <?php if( $this->datos[0]['idtipo_transaccion'] == $this->datos_tipo_transaccion[$i]['idtipo_transaccion'] ){ ?>
                        <option value="<?php echo $this->datos_tipo_transaccion[$i]['idtipo_transaccion'] ?>" selected="selected"><?php echo utf8_encode($this->datos_tipo_transaccion[$i]['descripcion']) ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_tipo_transaccion[$i]['idtipo_transaccion'] ?>"><?php echo utf8_encode($this->datos_tipo_transaccion[$i]['descripcion']) ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Fecha de Compra:</label></td>
                <td>
                    <input class="datepicker" readonly="readonly" placeholder="Seleccione fecha" required name="fecha_compra"
                       id="fechanac" value="<?php if(isset ($this->datos[0]['fecha_compra'])){
                               $fecha=$this->datos[0]['fecha_compra'];
                               echo substr($fecha,8,2).'-'.substr($fecha,5,2).'-'.substr($fecha,0,4);}?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Observaciones:</label></td>
                <td colspan="3">
                    <textarea placeholder="Ingrese observacion" required id="observaciones" name="observaciones" class="k-editable-area"><?php if(isset ($this->datos[0]['observaciones']))echo utf8_encode($this->datos[0]['observaciones'])?></textarea>
                </td>
            </tr>
            <tr>
                <td><label>Estado:</label></td>
                <td>
                    <?php if (isset ($this->datos[0]['estado']) && $this->datos[0]['estado']==0) {?>
                    <input type="radio" name="estado" value ="1" />Activo
                    <input type="radio" name="estado" value="0" checked="checked"/>Inactivo
                    <?php } else { ?>
                    <input type="radio" name="estado" value ="1" checked="checked"/>Activo
                    <input type="radio" name="estado" value="0" />Inactivo
                    <?php } ?>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Detalle Comppra:</legend>
        <table>
            <tr>
                <td><label>Producto:</label></td>
                <td>
                    <input type="hidden" name="idproducto" id="idproducto" value="<?php if(isset ($this->datos[0]['idproducto']))echo $this->datos[0]['idproducto']?>"/>
                    <input type="text" class="k-textbox" placeholder="Busque producto" required  readonly="readonly"  name="producto"
                       id="producto" value="<?php if(isset ($this->datos[0]['producto']))echo $this->datos[0]['producto']?>"/>
                    <input type="button" class="k-button" id="btn_vtna_productos" value="..."/>
                </td>
                <td><label>Unidad de Medida:</label></td>
                <td>
                    <select placeholder="Seleccione..." class="combo" name="unidad_medida" id="unidad_medida">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_um);$i++){ ?>
                        <?php if( $this->datos[0]['idunidad_medida'] == $this->datos_um[$i]['idunidad_medida'] ){ ?>
                    <option value="<?php echo $this->datos_um[$i]['idunidad_medida'] ?>" selected="selected"><?php echo $this->datos_um[$i]['descripcion'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_um[$i]['idunidad_medida'] ?>"><?php echo $this->datos_um[$i]['descripcion'] ?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
                    <a id="um" class="k-button">Nuevo</a>
            	</td>
            </tr>
            <tr>
                <td><label>Precio de Compra:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese precio" id="precio" />
                </td>
                <td><label>Cantidad:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese cantidad" id="cantidad" />
                </td>
                <td>
                    <div id="asignar_costo" class="ui-state-default ui-corner-all" title="Asginar producto">
                        <span class="ui-icon ui-icon-plusthick"></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <table border="1" id="" class="tabgrilla">
                        <tr>
                            <th>Item</th><th>Descripcion</th><th>Precio</th><th>Cantidad</th><th>Unidad de Medida</th><th>Subtotal</th>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td><label>Importe:</label></td>
                <td>
                    <input type="text" class="k-textbox" required name="importe" readonly="readonly"
                       id="nombre" value="<?php if(isset ($this->datos[0]['importe']))echo $this->datos[0]['importe']?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td><label>IGV:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese igv" required name="igv"
                       id="nombre" value="<?php if(isset ($this->datos[0]['igv']))echo $this->datos[0]['igv']?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td><label>Total:</label></td>
                <td>
                    <input type="text" class="k-textbox" readonly="readonly" id="precio" />
                </td>
            </tr>
            <tr>
               <td colspan="4" align="center">
                    <p>
                        <button type="submit" class="k-button">Guardar</button>
                        <a href="<?php echo BASE_URL ?>compras" class="k-button">Cancelar</a>
                    </p>
                </td>
            </tr>
        </table>
    </fieldset>
</form>


<div id="vtna_busca_proveedor">
    <h3>Lista de Proveedores</h3>
    <p>
        <select class="combo" id="filtro_proveedor">
            <option value="0">Razon Social</option>
            <option value="1">Representante</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="txt_buscar_proveedor">
        <button type="button" class="k-button" id="btn_buscar_proveedor">Buscar</button>
    </p>
    <div id="grilla_proveedores">
    <table border="1" class="tabgrilla" id="tbl_busca_proveedor">
        <tr>
            <th>Codigo</th>
            <th>Razon Social</th>
            <th>Representante</th>
            <th>Selecciona</th>
        </tr>
        <?php for ($i = 0; $i < count($this->datos_proveedores); $i++) { ?>
            <tr>
                <td><?php echo $this->datos_proveedores[$i]['idproveedor'] ?></td>
                <td><?php echo utf8_encode($this->datos_proveedores[$i]['razon_social']) ?></td>
                <td><?php echo $this->datos_proveedores[$i]['representante'] ?></td>
                <td><a href="#" onclick="seleccionar('<?php echo $this->datos_proveedores[$i]['idproveedor'] ?>','<?php echo utf8_encode($this->datos_proveedores[$i]['razon_social']) ?>')">[Seleccionar]</a></td>
            </tr>
        <?php } ?>
    </table>
    </div>
</div>

<div id="vtna_busca_productos">
    <h3>Lista de Productos</h3>
    <p>
        <select class="combo" id="filtro_productos">
            <option value="0">Descripcion</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="txt_buscar_producto">
        <button type="button" class="k-button" id="btn_buscar_producto">Buscar</button>
    </p>
    <div id="grilla_productos">
    <table border="1" class="tabgrilla" id="tbl_busca_productos">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Selecciona</th>
        </tr>
        <?php for ($i = 0; $i < count($this->datos_productos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos_productos[$i]['idproducto'] ?></td>
                <td><?php echo utf8_encode($this->datos_productos[$i]['descripcion']) ?></td>
                <td><a href="#" onclick="seleccionar_productos('<?php echo $this->datos_productos[$i]['idproducto'] ?>','<?php echo utf8_encode($this->datos_productos[$i]['descripcion']) ?>')">[Seleccionar]</a></td>
            </tr>
        <?php } ?>
    </table>
    </div>
</div>