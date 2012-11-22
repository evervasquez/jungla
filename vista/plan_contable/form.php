<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
     <h3><?php echo $this->titulo ?></h3>
    <div id="tabla">
    <table align="center" class="tabForm">
        <tr>
            <td><label>Codigo:</label></td>
            <td><input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                       value="<?php if(isset ($this->datos[0]['idcuenta']))echo $this->datos[0]['idcuenta']?>"/>
            </td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
        <tr>
            <td><label>Descripcion:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese almacen" required name="descripcion"
                       id="descripcion" value="<?php if(isset ($this->datos[0]['descripcion']))echo utf8_encode ($this->datos[0]['descripcion'])?>"/></td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="descripcion"></div>
            </td>
        </tr>
        <tr>
            <td><label>Nro.de Cuenta:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese Nro.de Cuenta" required name="nro_cuenta"
                       id="descripcion" value="<?php if(isset ($this->datos[0]['nro_cuenta']))echo utf8_encode($this->datos[0]['nro_cuenta'])?>"/></td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="nro_cuenta"></div>
            </td>
        </tr>
          <tr>
            <td><label>Cuenta Padre:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione..." name="cuenta_padre">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_cuentas);$i++){ ?>
                        <?php if( $this->datos[0]['idcuenta_padre'] == $this->datos_cuentas[$i]['idcuenta'] ){ ?>
                    <option value="<?php echo $this->datos_cuentas[$i]['idcuenta'] ?>" selected="selected"><?php echo $this->datos_cuentas[$i]['nro_cuenta'].':'.$this->datos_cuentas[$i]['descripcion'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_cuentas[$i]['idcuenta'] ?>"><?php echo $this->datos_cuentas[$i]['nro_cuenta'].':'.$this->datos_cuentas[$i]['descripcion'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Categoria:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione..." name="categoria">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_categorias);$i++){ ?>
                        <?php if( $this->datos[0]['idcategoria'] == $this->datos_categorias[$i]['idcategoria'] ){ ?>
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
                <a href="<?php echo BASE_URL ?>plan_contable" class="k-button cancel">Cancelar</a></p>
            </td>
        </tr>
    </table>
    </div>
</form>
