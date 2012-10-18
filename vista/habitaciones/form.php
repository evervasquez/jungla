<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<div align="center">
            <h3>Registrar Habitacion</h3>
            <div>Codigo<input type="text" disabled="disabled" /></div>
            <div>Nro.de Habitacion<input type="text" /></div>
            <div>Descripcion<input type="text" /></div>
            <button type="button" class="k-button">Asignar Tipo de Habitacion</button>
            <table border="1">
                <tr>
                    <td>Tipo de Habitacion</td><td>Costo</td>
                </tr>
            </table>
            <button type="button" class="k-button">Guardar</button>
    	</div>
    </form>
<?php require("../pie.php"); ?>