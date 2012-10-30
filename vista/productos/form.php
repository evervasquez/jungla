<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <table width="50%" align="center">
            <caption><h3><?php echo $this->titulo ?></h3></caption>
            <tr>
            	<td><label>Codigo:</label></td>
            <td>
                <input type="text" class="k-textbox" readonly="readonly" name="codigo"
                       value="<?php if(isset ($this->datos[0]['idproducto']))echo $this->datos[0]['idproducto']?>"/>
            </td>
            </tr>
            <tr>
            	<td><label>Descripcion:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese descripcion" required name="descripcion" 
                           value="<?php if(isset ($this->datos[0]['idproducto']))echo $this->datos[0]['idproducto']?>"/>
                </td>
            </tr>
            <tr>
                <td><label>Observaciones:</label></td>
                <td>
                    <textarea placeholder="Ingrese observacion" required name="observaciones"></textarea>
                </td>
            </tr>
            <tr>
            	<td><label>Stock</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese stock" required name="stock" 
                           value="<?php if(isset ($this->datos[0]['idproducto']))echo $this->datos[0]['idproducto']?>"/>
                </td>
            </tr>
            <tr>
            	<td><label>Precio Unitario</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese precio" required name="precio_unitario" 
                           value="<?php if(isset ($this->datos[0]['idproducto']))echo $this->datos[0]['idproducto']?>"/>
                </td>
            </tr>
            <tr>
            	<td><label>Precio de Compra</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese precio" required name="precio_compra" 
                           value="<?php if(isset ($this->datos[0]['idproducto']))echo $this->datos[0]['idproducto']?>"/>
                </td>
            </tr>
            <tr>
            	<td><label>Tipo de Producto</label></td>
                <td>
                    <select class="combo"  placeholder="Seleccione..." required name="tipo_producto">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_tipo);$i++){ ?>
                        <?php if( $this->datos[0]['idtipo_producto'] == $this->datos_tipo[$i]['idtipo_producto'] ){ ?>
                    <option value="<?php echo $this->datos_tipo[$i]['idtipo_producto'] ?>" selected="selected"><?php echo $this->datos_tipo[$i]['descripcion'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_tipo[$i]['idtipo_producto'] ?>"><?php echo $this->datos_tipo[$i]['descripcion'] ?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Ubicacion</label></td>
                <td>
                    <select class="combo"  placeholder="Seleccione..." required name="ubicacion">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_ubicaciones);$i++){ ?>
                        <?php if( $this->datos[0]['idubicacion'] == $this->datos_ubicaciones[$i]['idubicacion'] ){ ?>
                    <option value="<?php echo $this->datos_ubicaciones[$i]['idubicacion'] ?>" selected="selected"><?php echo $this->datos_ubicaciones[$i]['descripcion'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_ubicaciones[$i]['idubicacion'] ?>"><?php echo $this->datos_ubicaciones[$i]['descripcion'] ?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Unidad de Medida</label></td>
                <td>
                    <select class="combo"  placeholder="Seleccione..." required name="unidad_medida">
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
            	<td><label>Servicio</label></td>
                <td>
                    <select class="combo"  placeholder="Seleccione..." required name="servicio">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_servicios);$i++){ ?>
                        <?php if( $this->datos[0]['idservicio'] == $this->datos_servicios[$i]['idservicio'] ){ ?>
                    <option value="<?php echo $this->datos_servicios[$i]['idservicio'] ?>" selected="selected"><?php echo $this->datos_servicios[$i]['descripcion'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_servicios[$i]['idservicio'] ?>"><?php echo $this->datos_servicios[$i]['descripcion'] ?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Promocion</label></td>
                <td>
                    <select class="combo"  placeholder="Seleccione..." required name="promocion">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_promociones);$i++){ ?>
                        <?php if( $this->datos[0]['idpromocion'] == $this->datos_promociones[$i]['idpromocion'] ){ ?>
                    <option value="<?php echo $this->datos_promociones[$i]['idpromocion'] ?>" selected="selected"><?php echo utf8_encode($this->datos_promociones[$i]['descripcion']) ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_promociones[$i]['idpromocion'] ?>"><?php echo utf8_encode($this->datos_promociones[$i]['descripcion']) ?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
            	</td>
            </tr>
            <tr>
            	<td><label>Estado</label></td>
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
            <tr>
            	<td colspan="2" align="center">
                    <p>
                        <button type="submit" class="k-button">Guardar</button>
                        <a href="<?php echo BASE_URL ?>productos" class="k-button">Cancelar</a>
                    </p>
                </td>
            </tr>
        </table>
    </form>
    <div id="ventana" align="center">
    <span class="close"><img src="<?php echo BASE_URL ?>lib/img/close.gif" /></span>
        <form method="post" action="#">
            <table align="center">
                    <caption><h3>Registrar Unidad de Medida</h3></caption>
                <tr>
                    <td><label>Codigo</label></td>
                    <td><input type="text" readonly="readonly" class="k-textbox" /></td>
                </tr>
                <tr>
                    <td><label>Descripcion</label></td>
                    <td><input type="text" class="k-textbox" placeholder="Ingrese unidad de medida" required /></td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <button type="submit" class="k-button">Guardar y  Seleccionar</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="fondooscuro"></div>
