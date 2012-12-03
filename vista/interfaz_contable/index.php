<script type="text/javascript">
    $(document).ready(function(){
        
        $(".tablaok").kendoGrid({
            columns: [{field:"", width:80},
                {field:"", width:20,attributes:{class:"acciones"}}]
        });
    });

function todo(Form)
{
    if(Form.chk_todo.checked){
        Form.idproducto.value = '*';
        Form.idproducto.readOnly = 'readonly';
    } else{
        Form.idproducto.value = '';
        Form.idproducto.placeholder = 'Ingrese...';
        Form.idproducto.readOnly = '';
    }
    
}
</SCRIPT>
</script>
<h3>Reportes Disponibles para Uso Contable</h3>
<!--
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
<form method="post" action="<?php echo BASE_URL ?>interfaz_contable/prueba" target="_blank" id="form_libro_diario">
    <table border="1" width="40%" class="tablaok">
    <tr>
        <td width="85%">Registro de Libro Diario
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
<!--
<form method="post" action="<?php echo BASE_URL ?>reportes/ventas_x_producto" target="_blank" id="form_ventas_x_producto">
    <table border="1" width="100%" >
        <td>Reporte de Ventas por Producto<br>
            Producto: <input type="text" value="%" id="idproducto" name="idproducto"/>
            <input type="checkbox" onclick="todo(this.form)"  id="chk_todo" />(Todos)
            <br>
            Fecha Inicial: <input class="datepicker" placeholder="Seleccione..." name="fecha_inicio"/>
            Fecha Final: <input class="datepicker" placeholder="Seleccione..." name="fecha_fin"/>
        </td>
        <td width="15%" align="center">
            <input type="submit" value="Generar" class="k-button"/>
        </td>
    </table>
</form>
-->

