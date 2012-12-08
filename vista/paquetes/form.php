<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <fieldset>
        <legend><?php echo $this->titulo ?></legend><br>
        <input type="hidden" name="guardar" id="guardar" value="1"/>
        <input type="hidden" name="codigo" id="codigo"
               value="<?php if(isset ($this->datos[0]['IDAQUETE']))echo $this->datos[0]['IDPAQUETE']?>"/>
        <table align="center" class="tabFormComplejo">
            <tr valign="top">
                <td><label for="descripcion">Descripcion:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese descripcion" required name="descripcion" id="descripcion"
                           value="<?php if(isset ($this->datos[0]['DESCRIPCION']))echo $this->datos[0]['DESCRIPCION']?>"/>
                    <br><div class="k-invalid-msg msgerror" data-for="descripcion"></div>
                </td>
                <td><label for="costo">Costo:</label></td>
                <td>
                    <input type="numeric" class="precio" placeholder="Ingrese costo" required name="costo" 
                           value="<?php if(isset ($this->datos[0]['COSTO']))echo $this->datos[0]['COSTO']?>"/>
                    <br><div class="k-invalid-msg msgerror" data-for="costo"></div>
                </td>
            </tr>
        </table>
    <fieldset>
        <br><legend>Productos x Paquete:</legend>
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
                    <input type="text" class="k-textbox" id="unidad_medida" placeholder="Unidad Medida" readonly="readonly" />
            	</td>
            </tr>
            <tr>
                <td><label>Cantidad:</label></td>
                <td colspan="2">
                    <input type="text" class="cantidad" placeholder="Ingrese cantidad" id="cantidad" />
                </td>
            </tr>
            <tr align="center">
                <td colspan="5"><input type="button" class="k-button" value="Agregar" id="asignar_producto"/></td>
            </tr>
            <tr>
                <td colspan="5">
                    <table border="1" id="tbl_productos_paquete">
                        <tr>
                            <th>Producto</th>
                            <th>Unidad de Medida</th>
                            <th>Cantidad</th>
                            <th>Accion</th>
                        </tr>
                        <?php if(isset ($this->datos_producto_paquete)){?>
                            <?php for($i=0;$i<count($this->datos_producto_paquete);$i++){ ?>
                        <tr>
                            <td>
                                <input type="hidden" class="producto" value="<?php echo $this->datos_producto_paquete[$i]['IDPRODUCTO']?>" />
                                <?php echo $this->datos_producto_paquete[$i]['PRODUCTO']?>
                            </td>
                            <td>
                                <?php echo $this->datos_producto_paquete[$i]['UM'] ?>
                            </td>
                            <td>
                                <?php echo $this->datos_producto_paquete[$i]['CANTIDAD'] ?>
                            </td>
                            <td>
                                <a href="#" class="imgdelete eliminar"></a>
                            </td>
                        </tr>
                            <?php } ?>
                        <?php } ?>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    </fieldset>
        <table>
            <tr>
                   <td colspan="5" align="center">
                        <p>
                            <button type="submit" class="k-button">Guardar</button>
                            <a href="<?php echo BASE_URL ?>paquetes" class="k-button cancel">Cancelar</a>
                        </p>
                    </td>
                </tr>
        </table>
    </fieldset>
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
            <th>Seleccionar</th>
        </tr>
        <?php for ($i = 0; $i < count($this->datos_productos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos_productos[$i]['IDPRODUCTO'] ?></td>
                <td><?php echo utf8_encode($this->datos_productos[$i]['DESSCRIPCION']) ?></td>
                <td><?php echo $this->datos_productos[$i]['UM'] ?></td>
                <td><a href="javascript:void(0)" onclick="seleccionar_productos('<?php echo $this->datos_productos[$i]['IDPRODUCTO'] ?>','<?php echo utf8_encode($this->datos_productos[$i]['DESCRIPCION']) ?>','<?php echo $this->datos_productos[0]['UM']?>')" class="imgselect"></a></td>
            </tr>
        <?php } ?>
    </table>
    </div>
</div>
<div id="fondooscuro"></div>