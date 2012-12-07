<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm" enctype="multipart/form-data">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <h3><?php echo $this->titulo ?></h3>
    <div id="tabla">
    	<table align="center" class="tabForm">
            <tr>
            	<td><label>Codigo</label></td>
                <td><input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                       value="<?php if(isset ($this->datos[0]['IDARTICULO']))echo $this->datos[0]['IDARTICULO']?>"/>
                <td>
                    <span class="msgerror"></span>
                </td>
                <td>
                    <div class="msgerror"></div>
                </td>
            </tr>
            <tr>
            	<td><label>Titulo</label></td>
                <td colspan="2"><input type="text" class="k-textbox textarea" placeholder="Ingrese titulo" required name="titulo"
                                       id="titulo" value="<?php if(isset ($this->datos[0]['TITULO']))echo $this->datos[0]['TITULO']?>"/></td>
                <td>
                    <div class="k-invalid-msg msgerror" data-for="titulo"></div>
                </td>
            </tr>
            <tr>
            	<td><label>Descripcion</label></td>
                <td colspan="2"><textarea class="k-textbox textarea" style="height: 100px" placeholder="Escribe el contenido del articulo" required name="descripcion"
                       id="descripcion"><?php if(isset ($this->datos[0]['DESCRIPCION']))echo $this->datos[0]['DESCRIPCION']?></textarea></td>
                <td>
                    <div class="k-invalid-msg msgerror" data-for="descripcion"></div>
                </td>
            </tr>
            <tr>
            	<td><label>Adjuntar Imagen</label></td>
                <td colspan="2"><input type="file" name="imagen" id="imagen" /></td>
                <td>
                    <div class="msgerror"></div>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <p><button type="submit" class="k-button" id="saveform">Guardar</button>
                    <a href="<?php echo BASE_URL ?>articulos" class="k-button cancel">Cancelar</a></p>
                </td>
                <td>
                    <div class="msgerror"></div>
                </td>
            </tr>
        </table>
    </div>
</form>