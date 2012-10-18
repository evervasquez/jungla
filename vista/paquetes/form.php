<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<div align="center">
            <h3>Registrar Paquete</h3>
            <div>Codigo<input type="text" disabled="disabled" /></div>
            <div>Descripcion<input type="text" /></div>
            <button type="button" class="k-button">Agregar Productos</button>
            <table border="1">
                <tr>
                    <td>Item</td><td>Descripcion</td><td>Cantidad</td><td>Precio</td><td>Unidad de Medida</td><td>SubTotal</td>
                </tr>
            </table>
            <div>Total<input type="text" /></div>
            <div>Descuento<input type="text" /></div>
            <div>Costo<input type="text" /></div>
            <button type="button" class="k-button">Guardar</button>
    	</div>
    </form>
<?php require("../pie.php"); ?>