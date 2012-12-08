<script type="text/javascript">
    $(document).ready(function(){
        
        $(".tablaok").kendoGrid({
            columns: [{field:"Reportes", width:80},
                {field:"Generar", width:20,attributes:{class:"acciones"}}]
        });
        $(".tablaok2").kendoGrid({
            columns: [{field:"", width:80},
                {field:"", width:20,attributes:{}}]
        });
    });

function todo(Form)
{
    if(Form.chk_todo.checked){
        
        Form.idproducto.value = '*';
        Form.producto.value = '(TODOS)';
    } else{
        Form.idproducto.value = '';
        Form.producto.value = '';
        Form.producto.placeholder = 'Busque Producto';
    }
}
function todo2(Form)
{
    if(Form.chk_todo2.checked){
        
        Form.idproducto2.value = '*';
        Form.producto2.value = '(TODOS)';
    } else{
        Form.idproducto2.value = '';
        Form.producto2.value = '';
        Form.producto2.placeholder = 'Busque Producto';
    }
}
</SCRIPT>
</script>
<h3>Reportes Disponibles</h3>

<form method="post" action="<?php echo BASE_URL ?>reportes/estadistica_mensual" target="_blank">
    <table border="1" width="40%" class="tablaok">
        <td>Estadística Mensual de Turismo 20120 <br>PARA ESTABLECIMIENTOS DE HOSPEDAJE<br>* Seleccione el mes: 
            <select name="estadistica_mes" class="">
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
            <select name="estadistica_ano" class="">
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
<!-- -->
<table border="1" width="40%" class="">
<tr>
    <td width="85%">Stock Actual</td>
    <td width="15%" align="center">
        <input type="button" value="Generar" class="k-button" onclick="window.open('<?php echo BASE_URL ?>reportes/stock_actual')"/>
    </td>   
</tr>
<tr>
    <td width="85%">Detalle Estadía</td>
    <td width="15%" align="center">
        <input type="button" value="Generar" class="k-button" onclick="window.open('<?php echo BASE_URL ?>reportes/detalle_estadia')"/>
    </td>   
</tr>

<tr>
    <td width="85%">Stock Por Ubicación</td>
    <td width="15%" align="center">
        <input type="button" value="Generar" class="k-button" onclick="window.open('<?php echo BASE_URL ?>reportes/stock_actual_ubicac')"/>
    </td>   
</tr>
</table>

<form method="post" action="<?php echo BASE_URL ?>reportes/ventas_x_producto" target="_blank" id="form_ventas_x_producto">
    <table border="1" width="100%" class="tablaok2">
        <tr>
            <td>Reporte de Ventas por Producto<br>
                Producto: 
                
                <span class="">
                                <input type="hidden" id="idproducto" name="idproducto" value="<?php if(isset ($this->datos[0]['IDPRODUCTO']))echo $this->datos[0]['IDPRODUCTO']?>"/>
                                <input type="text" class="k-textbox" placeholder="Busque producto" readonly="readonly" 
                                   id="producto" value="<?php if(isset ($this->datos[0]['PRODUCTO']))echo $this->datos[0]['PRODUCTO']?>"/>
                            </span>
                            <span  class="">
                                <button type="button" class="k-button btn_vtna_productos" hidden="true"><span class="k-icon k-i-search"></span></button>
                            </span>
                
                <input type="checkbox" onclick="todo(this.form)"  id="chk_todo" />(Incluir todos los Productos)
                <br>
                Fecha Inicial: <input class="datepicker" placeholder="Seleccione..." name="fecha_inicio"/>
                Fecha Final: <input class="datepicker" placeholder="Seleccione..." name="fecha_fin"/>
            </td>
            <td width="15%" align="center">
                <input type="submit" value="Generar" class="k-button"/>
            </td>
        </tr>
    </table>
</form>

<form method="post" action="<?php echo BASE_URL ?>reportes/compras" target="_blank" id="form_compras_x_fecha">
    <table border="1" width="100%" class="tablaok2">
        <tr>
            <td>Reporte de Compras<br>
                
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
    <table border="1" width="100%" class="tablaok2">
        <tr>
            <td>Reporte de Compras por Producto<br>
                Producto: 
                
                <span class="">
                                <input type="hidden" id="idproducto2" name="idproducto" value="<?php if(isset ($this->datos[0]['IDPRODUCTO']))echo $this->datos[0]['IDPRODUCTO']?>"/>
                                <input type="text" class="k-textbox" placeholder="Busque producto" readonly="readonly" 
                                   id="producto2" value="<?php if(isset ($this->datos[0]['PRODUCTO']))echo $this->datos[0]['PRODUCTO']?>"/>
                            </span>
                            <span  class="">
                                <button type="button" class="k-button btn_vtna_productos2" hidden="true"><span class="k-icon k-i-search"></span></button>
                            </span>
                
                <input type="checkbox" onclick="todo2(this.form)"  id="chk_todo2" />(Incluir todos los Productos)
                <br>
                Fecha Inicial: <input class="datepicker" placeholder="Seleccione..." name="fecha_inicio"/>
                Fecha Final: <input class="datepicker" placeholder="Seleccione..." name="fecha_fin"/>
            </td>
            <td width="15%" align="center">
                <input type="submit" value="Generar" class="k-button"/>
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
<div id="fondooscuro">
</div>