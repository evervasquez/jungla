<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%">
        	<caption><h3>Registrar Unidad de Medida</h3></caption>
            <tr>
            	<td>Codigo</td>
                <td><input type="text" disabled="disabled" /></td>
            </tr>
            <tr>
            	<td>Descripcion</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
            	<td align="center">
                	<button type="button" class="k-button">Guardar y  Seleccionar</button>
                    <a href="../productos/form.php" class="k-button">Volver</a>
                </td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>