<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%" align="center">
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
                    <a href="../productos/form.php" class="k-button">Volver</a>
                </td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>