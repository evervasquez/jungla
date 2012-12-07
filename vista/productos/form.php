<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <h3><?php echo $this->titulo ?></h3>
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <input type="hidden" name="codigo" value="<?php if(isset ($this->datos[0]['IDPRODUCTO']))echo $this->datos[0]['IDPRODUCTO']?>"/>
    <table align="center" class="tabFormComplejo">
            <tr valign="top">
            	<td><label for="descripcion">Descripcion:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese descripcion" required name="descripcion" id="descripcion"
                           value="<?php if(isset ($this->datos[0]['DESCRIPCION']))echo $this->datos[0]['DESCRIPCION']?>"/>
                    <br><div class="k-invalid-msg msgerror" data-for="descripcion"></div>
                </td>
            	<td><label for="precio_unitario">Precio Unitario:</label></td>
                <td>
                    <input type="numeric" min="0" class="precio" placeholder="Ingrese precio" name="precio_unitario" id="precio_unitario"
                           value="<?php if(isset ($this->datos[0]['PRECIO_UNITARIO']))echo $this->datos[0]['PRECIO_UNITARIO']?>"/>
                    <br><div class="msgerror"></div>
                </td>
                <td></td>
            </tr>
            <tr valign="top">
            	<td><label for="tipo_producto">Tipo de Producto:</label></td>
                <td>
                    <select class="combo" required  placeholder="Seleccione..." name="tipo_producto" id="tipo_producto">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_tipo);$i++){ ?>
                        <?php if( $this->datos[0]['IDTIPO_PRODUCTO'] == $this->datos_tipo[$i]['IDTIPO_PRODUCTO'] ){ ?>
                    <option value="<?php echo $this->datos_tipo[$i]['IDTIPO_PRODUCTO'] ?>" selected="selected"><?php echo $this->datos_tipo[$i]['DESCRIPCION'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_tipo[$i]['IDTIPO_PRODUCTO'] ?>"><?php echo $this->datos_tipo[$i]['DESCRIPCION'] ?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
                    <br><div class="k-invalid-msg msgerror" data-for="tipo_producto"></div>
            	</td>
            	<td><label for="unidad_medida">Unidad de Medida:</label></td>
                <td>
                    <select placeholder="Seleccione..." class="combo" required name="unidad_medida" id="unidad_medida">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_um);$i++){ ?>
                        <?php if( $this->datos[0]['IDUNIDAD_MEDIDA'] == $this->datos_um[$i]['IDUNIDAD_MEDIDA'] ){ ?>
                    <option value="<?php echo $this->datos_um[$i]['IDUNIDAD_MEDIDA'] ?>" selected="selected"><?php echo $this->datos_um[$i]['DESCRIPCION'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_um[$i]['IDUNIDAD_MEDIDA'] ?>"><?php echo $this->datos_um[$i]['DESCRIPCION'] ?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
                    <br><div class="k-invalid-msg msgerror" data-for="unidad_medida"></div>
            	</td>
                   <td valign="center">
                    <a id="um" class="k-button btn_icn plus"><span class="k-icon k-i-plus"></span></a>
                    <br><br>&nbsp;</div>
                   </td>
            </tr>
            <tr valign="top">
                <td><label>Ubicacion:</label></td>
                <td>
                    <select class="combo"  placeholder="Seleccione..." name="ubicacion" id="ubicacion">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_ubicaciones);$i++){ ?>
                        <?php if( $this->datos[0]['IDUBICACION'] == $this->datos_ubicaciones[$i]['IDUBICACION'] ){ ?>
                    <option value="<?php echo $this->datos_ubicaciones[$i]['IDUBICACION'] ?>" selected="selected"><?php echo $this->datos_ubicaciones[$i]['DESCRIPCION'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_ubicaciones[$i]['IDUBICACION'] ?>"><?php echo $this->datos_ubicaciones[$i]['DESCRIPCION'] ?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
            	</td>
            	<td><label>Servicio:</label></td>
                <td>
                    <select class="combo"  placeholder="Seleccione..." name="servicio">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_servicios);$i++){ ?>
                        <?php if( $this->datos[0]['IDSERVICIO'] == $this->datos_servicios[$i]['IDSERVICIO'] ){ ?>
                    <option value="<?php echo $this->datos_servicios[$i]['IDSERVICIO'] ?>" selected="selected"><?php echo $this->datos_servicios[$i]['DESCRIPCION'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_servicios[$i]['IDSERVICIO'] ?>"><?php echo $this->datos_servicios[$i]['DESCRIPCION'] ?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
            	</td>
            </tr>
            <tr valign="top">
                <td><label>Observaciones:</label></td>
                <td colspan="3">
                    <textarea placeholder="Ingrese observacion" id="observaciones" name="observaciones" class="k-textbox textarea"><?php if(isset ($this->datos[0]['OBSERVACIONES']))echo utf8_encode($this->datos[0]['OBSERVACIONES'])?></textarea>
                </td>
            </tr>
            <tr valign="top">
            	<td colspan="4" align="center">
                    <p>
                        <button type="submit" class="k-button" id="saveform">Guardar</button>
                        <a href="<?php echo BASE_URL ?>productos" class="k-button cancel">Cancelar</a>
                    </p>
                </td>
            </tr>
        </table>
    </form>
    <div id="ventana_unidad_medida" align="center">
        <form method="post" action="">
            <table align="center">
                    <caption><h3>Registrar Unidad de Medida</h3></caption>
                <tr>
                    <td><label>Codigo:</label></td>
                    <td><input type="text" readonly="readonly" class="k-textbox" /></td>
                </tr>
                <tr>
                    <td><label for="des_um">Descripcion:</label></td>
                    <td><input type="text" class="k-textbox" name="des_um" placeholder="Ingrese unidad de medida" id="des_um" onkeypress="return soloLetras(event)"/></td>
                </tr>
                <tr>
                    <td><label for="abreviatura_um">Abreviatura:</label></td>
                    <td><input type="text" class="k-textbox" name="abreviatura_um" placeholder="Ingrese abreviatura" id="abreviatura_um"/></td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <p><button type="button" class="k-button" id="btn_um">Guardar y  Seleccionar</button>
                        <button type="button" class="k-button close cancel">Cancelar</button></p>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="fondooscuro"></div>
