<h3>Reportes Disponibles</h3>

<form method="post" action="<?php echo BASE_URL ?>reportes/estadistica_mensual" target="_blank">
    <table width="70%"  class="tablaok">
        <caption>Estadística Mensual de Turismo 2012</caption>
        <td>PARA ESTABLECIMIENTOS DE HOSPEDAJE<br>* Seleccione el mes: 
            <select name="estadistica_mes" class="list">
                <option value="1">Enero</option> 
                <option value="2">Febrero</option> 
                <option value="3">Marzo</option> 
                <option value="4">Abril</option> 
                <option value="5">Mayo</option> 
                <option value="6">Junio</option> 
                <option value="7">Julio</option> 
                <option value="8">Agosto</option> 
                <option value="9">Setiembre</option> 
                <option value="10">Octubre</option> 
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option> 
            </select>
            <select name="estadistica_ano" class="list">
                <option value="2012">2012</option> 
                <option value="2013">2013</option> 
                <option value="2014">2014</option> 
                <option value="2015">2015</option> 
                <option value="2016">2016</option> 
                <option value="2017">2017</option> 
                <option value="2018">2018</option>
            </select>
        </td>
        <td width="15%" align="center">
            <input type="submit" value="Generar" class="k-button"/>
        </td>
    </table>
</form>

<form method="post" action="<?php echo BASE_URL ?>reportes/ventas_x_producto" target="_blank" id="form_ventas_x_producto">
    <table width="70%" class="tablaok">
        <caption>Reporte de Ventas por Producto</caption>
        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            Producto: 
                        </td>
                        <td>
                            <input type="hidden" id="idproducto" name="idproducto" value="<?php if(isset ($this->datos[0]['IDPRODUCTO']))echo $this->datos[0]['IDPRODUCTO']?>"/>
                                <input type="text" class="k-textbox" placeholder="Busque producto" readonly="readonly" 
                                   id="producto" value="<?php if(isset ($this->datos[0]['PRODUCTO']))echo $this->datos[0]['PRODUCTO']?>"/>
                        </td>
                        <td>
                             <button type="button" class="k-button btn_vtna_productos" hidden="true"><span class="k-icon k-i-search"></span></button>
                        </td>
                        <td colspan="2"><input type="checkbox" onclick="todo(this.form)"  id="chk_todo" />(Incluir todos los Productos)</td>
                    </tr>
                    <tr>
                        <td>
                            Fecha Inicial:
                        </td>
                        <td>
                            <input class="datepicker" placeholder="Seleccione..." name="fecha_inicio"/>
                        </td>
                        <td></td>
                        <td>
                            Fecha Final:
                        </td>
                        <td>
                            <input class="datepicker" placeholder="Seleccione..." name="fecha_fin"/>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="15%" align="center">
                <input type="submit" value="Generar" class="k-button"/>
            </td>
        </tr>
    </table>
</form>

<form method="post" action="<?php echo BASE_URL ?>reportes/compras" target="_blank" id="form_compras_x_fecha">
    <table width="70%" class="tablaok">
        <caption>Reporte de Compras</caption>
        <tr>
            <td>
                Fecha Inicial: <input class="datepicker" placeholder="Seleccione..." name="fecha_inicio"/>
                Fecha Final: <input class="datepicker" placeholder="Seleccione..." name="fecha_fin"/>
            </td>
            <td width="15%" align="center">
                <input type="submit" value="Generar" class="k-button"/>
            </td>
        </tr>
    </table>
</form>
<form method="post" action="<?php echo BASE_URL ?>reportes/compras_x_producto" target="_blank" id="form_compras_x_producto">
    <table width="70%" class="tablaok">
        <caption>Reporte de Compras por Producto</caption>
        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            Producto: 
                        </td>
                        <td>
                            <input type="hidden" id="idproducto2" name="idproducto" value="<?php if(isset ($this->datos[0]['IDPRODUCTO']))echo $this->datos[0]['IDPRODUCTO']?>"/>
                                <input type="text" class="k-textbox" placeholder="Busque producto" readonly="readonly" 
                                   id="producto2" value="<?php if(isset ($this->datos[0]['PRODUCTO']))echo $this->datos[0]['PRODUCTO']?>"/>
                        </td>
                        <td>
                             <button type="button" class="k-button btn_vtna_productos2" hidden="true"><span class="k-icon k-i-search"></span></button>
                        </td>
                        <td colspan="2"><input type="checkbox" onclick="todo2(this.form)"  id="chk_todo2" />(Incluir todos los Productos)</td>
                    </tr>
                    <tr>
                        <td>
                            Fecha Inicial:
                        </td>
                        <td>
                            <input class="datepicker" placeholder="Seleccione..." name="fecha_inicio"/>
                        </td>
                        <td></td>
                        <td>
                            Fecha Final:
                        </td>
                        <td>
                            <input class="datepicker" placeholder="Seleccione..." name="fecha_fin"/>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="15%" align="center">
                <input type="submit" value="Generar" class="k-button"/>
            </td>
        </tr>
    </table>
</form>
<table width="70%"  class="tablaok">
    <caption>Otros Reportes</caption>
<tr>
    <td width="85%">Stock Actual</td>
    <td width="15%" align="center">
        <input type="button" value="Generar" class="k-button" onclick="window.open('<?php echo BASE_URL ?>reportes/stock_actual')"/>
    </td>   
</tr>
<tr>
    <td width="85%">Stock Por Ubicación</td>
    <td width="15%" align="center">
        <input type="button" value="Generar" class="k-button" onclick="window.open('<?php echo BASE_URL ?>reportes/stock_actual_ubicac')"/>
    </td>   
</tr>
</table>

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