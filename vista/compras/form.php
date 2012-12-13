<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm" onsubmit="return validarCompra();">
    <fieldset>
        <legend><?php echo $this->titulo ?></legend><br>
        <input type="hidden" name="guardar" id="guardar" value="1"/>
        <input type="hidden" name="codigo" id="codigo"
                   value="<?php if(isset ($this->datos[0]['IDCOMPRA']))echo $this->datos[0]['IDCOMPRA']?>"/>
        <table align="center" class="tabFormComplejo">
            <tr valign="top">
                <td><label for="nro_comprobante">Nro. Documento:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese Nro.de Comprobante" required name="nro_comprobante"
                       id="nro_comprobante" value="<?php if(isset ($this->datos[0]['NRO_COMPROBANTE']))echo $this->datos[0]['NRO_COMPROBANTE']?>"/>
                    <br><div class="k-invalid-msg msgerror" data-for="nro_comprobante"></div>
                </td>
                <td><label for="proveedor">Proveedor:</label></td>
                <td>
                    <input type="hidden" name="idproveedor" id="idproveedor" value="<?php if(isset ($this->datos[0]['IDPROVEEDOR']))echo $this->datos[0]['IDPROVEEDOR']?>"/>
                    <input type="text" class="k-textbox" placeholder="Busque proveedor" required  readonly="readonly" name="proveedor"
                       id="proveedor" value="<?php if(isset ($this->datos[0]['PROVEEDOR']))echo $this->datos[0]['PROVEEDOR']?>"/>
                    <br><div class="k-invalid-msg msgerror" data-for="proveedor"></div>
                </td>
                <td><button type="button" class="k-button" id="btn_vtna_proveedores"><span class="k-icon k-i-search"></span></button>
                </td>
            </tr>
            <tr valign="top">
                <td><label for="fecha_compra">Fecha de Compra:</label></td>
                <td>
                    <input class="datepicker" readonly="readonly" placeholder="Seleccione fecha" required name="fecha_compra"
                       id="fecha_compra" value="<?php if(isset ($this->datos[0]['C_FECHA_COMPRA']))echo $this->datos[0]['C_FECHA_COMPRA']?>"/>
                    <br><div class="k-invalid-msg msgerror" data-for="fecha_compra"></div>
                </td>
                <td><label for="tipo_transaccion">Tipo de Transaccion:</label></td>
                <td>
                    <select class="list" placeholder="Seleccione..." name="tipo_transaccion" id="tipo_transaccion" required>
                        <?php for($i=0;$i<count($this->datos_tipo_transaccion);$i++){ ?>
                            <?php if( $this->datos[0]['IDTIPO_TRANSACCION'] == $this->datos_tipo_transaccion[$i]['IDTIPO_TRANSACCION'] ){ ?>
                        <option value="<?php echo $this->datos_tipo_transaccion[$i]['IDTIPO_TRANSACCION'] ?>" selected="selected"><?php echo $this->datos_tipo_transaccion[$i]['DESCRIPCION'] ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_tipo_transaccion[$i]['IDTIPO_TRANSACCION'] ?>"><?php echo $this->datos_tipo_transaccion[$i]['DESCRIPCION'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                    <br><div class="k-invalid-msg msgerror" data-for="tipo_transaccion"></div>
                </td>
                <td></td>
            </tr>
            <tr id="celda_credito" valign="top">
                <td><label>Fecha Vencimiento:</label></td>
                <td>
                    <input class="datepicker" readonly="readonly" placeholder="Seleccione fecha" name="fecha_vencimiento"
                       id="fecha_vencimiento" value="<?php if(isset ($this->datos[0]['FECHA_VENCIMIENTO']))echo $this->datos[0]['FECHA_VENCIMIENTO']?>"/>
                </td>
                <td><label>Intervalo de dias:</label></td>
                <td>
                    <select class="list" placeholder="Seleccione..." name="intervalo_dias" id="intervalo_dias">
                        <option value="7">7</option>
                        <option value="14">14</option>
                    </select>
                </td>
                <td></td>
            </tr>
            <tr valign="top">
                <td><label for="observaciones">Observaciones:</label></td>
                <td colspan="3">
                    <textarea placeholder="Ingrese observacion" id="observaciones" name="observaciones" class="k-textbox textarea"><?php if(isset ($this->datos[0]['OBSERVACIONES']))echo utf8_encode($this->datos[0]['OBSERVACIONES'])?></textarea>
                </td>
                <td></td>
            </tr>
        </table>
    <fieldset>
        <legend>Detalle Compra:</legend>
        <div id="tbl_detalle">
        <table class="tabForm" align="center">
            <tr>
                <td><label>Producto:</label></td>
                <td>
                    <input type="hidden" id="idproducto" value="<?php if(isset ($this->datos[0]['IDPRODUCTO']))echo $this->datos[0]['IDPRODUCTO']?>"/>
                    <input type="text" class="k-textbox" placeholder="Busque producto" readonly="readonly"  
                       id="producto" value="<?php if(isset ($this->datos[0]['PRODUCTO']))echo $this->datos[0]['PRODUCTO']?>"/>
                </td>
                <td>
                    <button type="button" class="k-button" id="btn_vtna_productos"><span class="k-icon k-i-search"></span></button>
                </td>
                <td><label>Unidad de Medida:</label></td>
                <td>
                    <input type="text" class="k-textbox" id="unidad_medida" placeholder="Unidad Medida" readonly="readonly"/>
            	</td>
            </tr>
            <tr>
                <td><label>Cantidad:</label></td>
                <td colspan="2">
                    <input type="numeric" min="0" class="cantidad" placeholder="Ingrese cantidad" id="cantidad" />
                </td>
                <td><label>Precio Unitario:</label></td>
                <td>
                    <input type="text" class="precio" placeholder="Ingrese precio" id="precio" />
                </td>
            </tr>
            <tr align="center">
                <td colspan="5"><input type="button" class="k-button" value="Agregar" id="asignar_producto"/></td>
            </tr>
            <tr>
                <td colspan="5">
                    <div id="detalle_compra">
                    <table border="1" id="tbl_detalle_compra">
                        <tr>
                            <th>Item</th>
                            <th>Producto</th>
                            <th>Unidad de Medida</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                            <th>Accion</th>
                        </tr>
                        <?php if(isset ($this->datos_detalle_compra)){?>
                            <?php for($i=0;$i<count($this->datos_detalle_compra);$i++){ ?>
                        <tr>
                            <td>
                                <?php echo $i+1; ?>
                            </td>
                            <td>
                                <input type="hidden" class="producto" value="<?php echo $this->datos_detalle_compra[$i]['IDPRODUCTO']?>" />
                                <?php echo $this->datos_detalle_compra[$i]['PRODUCTO']?>
                            </td>
                            <td>
                                <?php echo $this->datos_detalle_compra[$i]['UM'] ?>
                            </td>
                            <td>
                                <?php echo $this->datos_detalle_compra[$i]['CANTIDAD'] ?>
                            </td>
                            <td>
                                <?php echo $this->datos_detalle_compra[$i]['PRECIO'] ?>
                            </td>
                            <td>
                                <?php echo $this->datos_detalle_compra[$i]['CANTIDAD'] * $this->datos_detalle_compra[$i]['PRECIO'] ?>
                            </td>
                            <td>
                                <a href="#" class="imgdelete eliminar"></a>
                            </td>
                        </tr>
                            <?php } ?>
                        <?php } ?>
                    </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
                <td><label>Importe:</label></td>
                <td>
                    <input type="text" class="k-textbox" required name="importe" id="importe" readonly="readonly"
                       value="<?php if(isset ($this->datos[0]['IMPORTE'])){echo $this->datos[0]['IMPORTE'];}else{echo '0';}?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
                <td><label>IGV:</label></td>
                <td>
                    <input type="text" class="descuento" placeholder="0" name="igv" id="igv" 
                       value="<?php if(isset ($this->datos[0]['IGV'])){echo $this->datos[0]['IGV'];}else{echo '0';}?>" />
                </td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
                <td><label>Total:</label></td>
                <td>
                    <input type="text" class="k-textbox" readonly="readonly" id="total" 
                           value='0' name="total"/>
                </td>
            </tr>
        </table>
    </div>
    </fieldset>
        <table>
            <tr>
               <td align="center">
                    <p>
                        <button type="submit" class="k-button">Guardar</button>
                        <a href="<?php echo BASE_URL ?>compras" class="k-button cancel">Cancelar</a>
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
        <input type="text" class="k-textbox" style="width: 40%" id="txt_buscar_proveedor">
        <button type="button" class="k-button" id="btn_buscar_proveedor"><span class="k-icon k-i-search"></span></button>
        <a class="k-button cancela_prov cancel">Cancelar</a>
    </p>
    <div id="grilla_proveedores">
    <table border="1" class="tabgrilla" id="tbl_busca_proveedor">
        <tr>
            <th>Codigo</th>
            <th>Razon Social</th>
            <th>Representante</th>
            <th>Seleccionar</th>
        </tr>
        <?php for ($i = 0; $i < count($this->datos_proveedores); $i++) { ?>
            <tr>
                <td><?php echo $this->datos_proveedores[$i]['IDPROVEEDOR'] ?></td>
                <td><?php echo $this->datos_proveedores[$i]['RAZON_SOCIAL'] ?></td>
                <td><?php echo $this->datos_proveedores[$i]['REPRESENTANTE'] ?></td>
                <td><a href="javascript:void(0)" onclick="seleccionar('<?php echo $this->datos_proveedores[$i]['IDPROVEEDOR'] ?>','<?php echo utf8_encode($this->datos_proveedores[$i]['RAZON_SOCIAL']) ?>')"class="imgselect" ></a></td>
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
            <th>Selecciona</th>
        </tr>
        <?php for ($i = 0; $i < count($this->datos_productos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos_productos[$i]['IDPRODUCTO'] ?></td>
                <td><?php echo $this->datos_productos[$i]['DESCRIPCION'] ?></td>
                <td><?php echo $this->datos_productos[$i]['UM'] ?></td>
                <td><a href="javascript:void(0)" onclick="seleccionar_productos('<?php echo $this->datos_productos[$i]['IDPRODUCTO'] ?>','<?php echo utf8_encode($this->datos_productos[$i]['DESCRIPCION']) ?>','<?php echo $this->datos_productos[0]['UM']?>')" class="imgselect"></a></td>
            </tr>
        <?php } ?>
    </table>
    </div>
</div>
<div id="fondooscuro"></div>