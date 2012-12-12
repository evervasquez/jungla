<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm" onsubmit="return validarVenta();">
<fieldset>
    <legend><?php echo $this->titulo ?></legend>
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <input type="hidden" name="codigo" id="codigo"
            value="<?php if(isset ($this->datos[0]['IDVENTA']))echo $this->datos[0]['IDVENTA']?>"/>
    <table align="center" class="tabFormComplejo">
            <tr valign="top">
                <td>Fecha de Venta:</td>
                <td>
                    <input readonly="readonly" placeholder="Seleccione fecha" name="fecha_venta" required class="datepicker"
                       value="<?php if(isset ($this->datos[0]['FECHA_VENTA'])){echo $this->datos[0]['FECHA_VENTA'];} else {echo date("d-m-Y");} ?>"/>
                    <br><div class="msgerror"></div>
                </td>
                <td></td>
                <td>Tipo de Comprobante:</td>
                <td>
                    <select class="list" placeholder="Seleccione..." name="tipo_comprobante" id="tipo_comprobante" required>
                        <?php for($i=0;$i<count($this->datos_tipo_comprobante);$i++){ ?>
                            <?php if( $this->datos[0]['IDTIPO_COMPROBANTE'] == $this->datos_tipo_comprobante[$i]['IDTIPO_COMPROBANTE'] ){ ?>
                        <option value="<?php echo $this->datos_tipo_comprobante[$i]['IDTIPO_COMPROBANTE'] ?>" selected="selected"><?php echo utf8_encode($this->datos_tipo_comprobante[$i]['DESCRIPCION']) ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_tipo_comprobante[$i]['IDTIPO_COMPROBANTE'] ?>"><?php echo utf8_encode($this->datos_tipo_comprobante[$i]['DESCRIPCION']) ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr valign="top">
                <td><label>Cliente:</label></td>
                <td>
                    <input type="hidden" name="idcliente" id="idcliente"
                           value="<?php if(isset ($this->datos[0]['IDCLIENTE']))echo $this->datos[0]['IDCLIENTE']?>"/>
                    <input type="text" class="k-textbox" placeholder="Busque cliente" required  readonly="readonly" name="cliente"
                           id="cliente" value="<?php if(isset ($this->datos[0]['CLIENTE']))echo $this->datos[0]['CLIENTE']?>"/>
                    <br><div class="k-invalid-msg msgerror" data-for="cliente"></div>
                </td>
                <td>
                    <button type="button" class="k-button" id="btn_vtna_clientes"><span class="k-icon k-i-search"></span></button>
                </td>
                <td><label for="tipo_transaccion">Tipo de Transaccion:</label></td>
                <td>
                    <select class="list" placeholder="Seleccione..." name="tipo_transaccion" id="tipo_transaccion" required>
                        <?php for($i=0;$i<count($this->datos_tipo_transaccion);$i++){ ?>
                            <?php if( $this->datos[0]['IDTIPO_TRANSACCION'] == $this->datos_tipo_transaccion[$i]['IDTIPO_TRANSACCION'] ){ ?>
                        <option value="<?php echo $this->datos_tipo_transaccion[$i]['IDTIPO_TRANSACCION'] ?>" selected="selected"><?php echo utf8_encode($this->datos_tipo_transaccion[$i]['DESCRIPCION']) ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_tipo_transaccion[$i]['IDTIPO_TRANSACCION'] ?>"><?php echo utf8_encode($this->datos_tipo_transaccion[$i]['DESCRIPCION']) ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr id="celda_credito" valign="top">
                <td><label>Fecha Vencimiento:</label></td>
                <td>
                    <input class="datepicker" readonly="readonly" placeholder="Seleccione fecha" name="fecha_vencimiento"
                       id="fecha_vencimiento" value="<?php echo $this->datos[0]['fecha_vencimiento'] ?>"/>
                </td>
                <td></td>
                <td><label>Intervalo de dias:</label></td>
                <td>
                    <select class="list" placeholder="Seleccione..." name="intervalo_dias" id="intervalo_dias">
                        <option value="7">7</option>
                        <option value="14">14</option>
                    </select>
                </td>
            </tr>
        </table>
                <fieldset>
                    <legend>Detalle Venta:</legend>
                    <div id="tbl_detalle">
                    <table class="tabForm" align="center">
                        <tr>
                            <td colspan="5" align="center">
                                <label>Seleccionar:</label>
                                <select class="list" id="cambia_form" placeholder="Seleccione..." >
                                    <option value="0">Productos</option>
                                    <option value="1">Paquetes</option>
                                </select>
                            </td>
                        </tr>
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
                            <td class="celda_paquete"><label>Paquete:</label></td>
                            <td class="celda_paquete">
                                <input type="hidden" id="idpaquete" value="<?php if(isset ($this->datos[0]['IDPAQUETE']))echo $this->datos[0]['IDPAQUETE']?>"/>
                                <input type="text" class="k-textbox" placeholder="Busque paquete" readonly="readonly"  
                                   id="paquete" value="<?php if(isset ($this->datos[0]['PAQUETE']))echo $this->datos[0]['PAQUETE']?>"/>
                            </td>
                            <td class="celda_paquete">
                                <button type="button" class="k-button" id="btn_vtna_paquetes"><span class="k-icon k-i-search"></span></button>
                            </td>
                            <td><label>Unidad de Medida:</label></td>
                            <td>
                                <input type="text" class="k-textbox" id="unidad_medida" placeholder="Unidad Medida" readonly="readonly"/>
                            </td>
                        </tr>
                        <tr>
                            <td><label id="lbl_precio">Precio de Venta:</label></td>
                            <td colspan="2">
                                <input type="input" class="k-textbox" placeholder="Precio Venta" id="precio" readonly="readonly"/>
                            </td>
                            <td><label id="lbl_cantidad">Cantidad:</label></td>
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
                                        <th>Item</th><th>Descripcion</th><th>Unidad de Medida</th><th>Cantidad</th><th>Precio</th><th>Subtotal</th><th>Accion</th>
                                    </tr>
                                    <?php if(isset ($this->datos_detalle_venta)){?>
                                        <?php for($i=0;$i<count($this->datos_detalle_venta);$i++){ ?>
                                    <tr>
                                        <td>
                                            <?php echo $i+1; ?>
                                        </td>
                                        <td>
                                            <input type="hidden" class="producto" value="<?php echo $this->datos_detalle_venta[$i]['IDPRODUCTO']?>" />
                                            <?php echo $this->datos_detalle_venta[$i]['PRODUCTO']?>
                                        </td>
                                        <td>
                                            <?php echo $this->datos_detalle_venta[$i]['UM'] ?>
                                        </td>
                                        <td>
                                            <?php echo $this->datos_detalle_venta[$i]['CANTIDAD'] ?>
                                        </td>
                                        <td>
                                            <?php echo $this->datos_detalle_venta[$i]['PRECIO'] ?>
                                        </td>
                                        <td>
                                            <?php echo $this->datos_detalle_venta[$i]['CANTIDAD'] * $this->datos_detalle_venta[$i]['PRECIO'] ?>
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
                            <td><label>Descuento:</label></td>
                            <td>
                                <input type="text" class="k-textbox" placeholder="0" id="descuento" 
                                       value='0' name="descuento"/>
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
                    <a href="<?php echo BASE_URL ?>ventas" class="k-button cancel">Cancelar</a>
                </p>
            </td>
        </tr>
        </table>
    </fieldset>
</form>



<div id="vtna_busca_clientes">
    <h3>Lista de Clientes</h3>
    <p>
        <select class="combo" id="filtro_clientes">
            <option value="0">Nombre/Apellido</option>
            <option value="1">Razon Social</option>
            <option value="2">DNI</option>
            <option value="3">RUC</option>
        </select>
        <input type="text" class="k-textbox" style="width: 40%" id="txt_buscar_clientes">
        <button type="button" class="k-button" id="btn_buscar_cliente"><span class="k-icon k-i-search"></span></button>
        <a class="k-button cancela_cli cancel">Cancelar</a>
    </p>
    <div id="grilla_clientes"></div>
</div>

<div id="vtna_busca_clientes_juridicos">
    <h3>Lista de Clientes</h3>
    <p>
        <select class="combo" id="filtro_clientes_juridicos">
            <option value="1">Razon Social</option>
            <option value="3">RUC</option>
        </select>
        <input type="text" class="k-textbox" style="width: 40%" id="txt_buscar_clientes_juridicos">
        <button type="button" class="k-button" id="btn_buscar_cliente_juridico"><span class="k-icon k-i-search"></span></button>
        <a class="k-button cancela_cli cancel">Cancelar</a>
    </p>
    <div id="grilla_clientes_juridicos"></div>
</div>



<div id="vtna_busca_paquetes">
    <h3>Lista de Paquetes</h3>
    <p>
        <select class="combo" id="filtro_paquetes">
            <option value="0">Descripcion</option>
        </select>
        <input type="text" class="k-textbox" style="width: 40%" id="txt_buscar_paquetes">
        <button type="button" class="k-button" id="btn_buscar_cliente"><span class="k-icon k-i-search"></span></button>
        <a class="k-button cancela_cli cancel">Cancelar</a>
    </p>
    <div id="grilla_paquetes">
        <table border="1" class="tabgrilla" id="tbl_busca_paquetes">
            <tr>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Costo</th>
                <th>Seleccionar</th>
            </tr>
            <?php for ($i = 0; $i < count($this->datos_paquetes); $i++) { ?>
            <tr>
                <td><?php echo $this->datos_paquetes[$i]['IDPAQUETE'] ?></td>
                <td><?php echo $this->datos_paquetes[$i]['DESCRIPCION'] ?></td>
                <td><?php echo $this->datos_paquetes[$i]['COSTO'] ?></td>
                <td><a href="javascript:void(0)" onclick="seleccionar_paquetes('<?php echo $this->datos_paquetes[$i]['IDPAQUETE'] ?>',
                    '<?php echo utf8_encode($this->datos_paquetes[$i]['DESCRIPCION']) ?>',
                        <?php echo $this->datos_paquetes[$i]['COSTO'] ?>)" class="imgselect"></a></td>
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