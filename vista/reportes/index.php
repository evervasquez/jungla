<!--<script type="text/javascript">
    $(document).ready(function(){
        $("#tablaok").kendoGrid({
            columns: [{field:"Reportes", width:80},
                {field:"Generar", width:20,attributes:{class:"acciones"}}]
        });
    });
</script>-->
<h3>Reportes Disponibles</h3>
<table border="1" width="40%" id="tablaok">
    <tr>
        <th><label>Reportes</label></th>
        <th><label>Generar</label></th>
    </tr>
    <tr>
        <td width="85%">Listado de Promociones</td>
        <td width="15%" align="center">
            <input type="button" value="Generar" class="k-button" onclick="window.open('<?php echo BASE_URL ?>reportes/promociones_todo')"/>
        </td>   
    </tr>
    <tr>

    <form method="post" action="<?php echo BASE_URL ?>reportes/estadistica_mensual" target="_blank">
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
    </form>
</tr>
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
<tr>
    <td width="85%">Comprobante de Venta Ticket Simple</td>
    <td width="15%" align="center">
        <input type="button" value="Generar" class="k-button" onclick="window.open('<?php echo BASE_URL ?>reportes/ticket_boleta_venta')"/>
    </td>   
</tr>
<tr>
    <td width="85%">Comprobante de Venta Ticket Factura</td>
    <td width="15%" align="center">
        <input type="button" value="Generar" class="k-button" onclick="window.open('<?php echo BASE_URL ?>reportes/ticket_factura_venta/2')"/>
    </td>   
</tr>
</table>
