<?php require("../cabecera.php");?>
	<form method="post" action="#">
    	<table width="50%">
        	<caption><h3>Registrar Articulo</h3></caption>
            <tr>
            	<td><label>Codigo</label></td>
                <td><input type="text" class="k-textbox" readonly="readonly" /></td>
            </tr>
            <tr>
            	<td><label>Titulo</label></td>
                <td><input type="text" class="k-textbox" style="width:300px;" placeholder="Ingrese titulo" required/></td>
            </tr>
            <tr>
            	<td><label>Descripcion</label></td>
                <td><textarea class="k-textbox" style="width:300px; height:150px;"   placeholder="Escribe el contenido del articulo" required></textarea></td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><button type="submit" class="k-button">Guardar</button></td>
            </tr>
        </table>
    </form>
<?php require("../pie.php"); ?>