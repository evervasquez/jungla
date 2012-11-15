<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <table width="50%" align="center" class="tabForm">
        <caption><h3><?php echo $this->titulo ?></h3></caption>
        <tr>
            <td><label>Codigo:</label></td>
            <td><input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                       value="<?php if(isset ($this->datos[0]['idcuenta']))echo $this->datos[0]['idcuenta']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>Descripcion:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese almacen" required name="descripcion"
                       id="descripcion" value="<?php if(isset ($this->datos[0]['descripcion']))echo $this->datos[0]['descripcion']?>"/></td>
        </tr>
        <tr>
            <td><label>Nro.de Cuenta:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese Nro.de Cuenta" required name="nro_cuenta"
                       id="descripcion" value="<?php if(isset ($this->datos[0]['nro_cuenta']))echo $this->datos[0]['nro_cuenta']?>"/></td>
        </tr>
<!--        <tr>
            <td><label>Nivel:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese nivel" name="nivel"
                       id="descripcion" value="<?//php if(isset ($this->datos[0]['nivel']))echo $this->datos[0]['nivel']?>"/></td>
        </tr>-->
        <tr>
            <td><label>Nro.Cuenta Padre:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione...">
                    <option></option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Categoria:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione..." name="categoria">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_categorias);$i++){ ?>
                        <?php if( $this->datos[0]['idcategoria'] == $this->datos_perfiles[$i]['idcategoria'] ){ ?>
                    <option value="<?php echo $this->datos_categorias[$i]['idcategoria'] ?>" selected="selected"><?php echo $this->datos_categorias[$i]['descripcion'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_categorias[$i]['idcategoria'] ?>"><?php echo $this->datos_categorias[$i]['descripcion'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p><button type="submit" class="k-button" id="saveform">Guardar</button>
                <a href="<?php echo BASE_URL ?>plan_contable" class="k-button">Cancelar</a></p>
            </td>
        </tr>
    </table>
</form>
