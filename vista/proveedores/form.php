<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm" onsubmit="return validarProveedor();">
    <h3><?php echo $this->titulo ?></h3>
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <input type="hidden" name="codigo" id="codigo"
           value="<?php if(isset ($this->datos[0]['IDPROVEEDOR']))echo $this->datos[0]['IDPROVEEDOR']?>"/>
    <table align="center" class="tabFormComplejo">
        <tr valign="top">
            <td><label>Razon Social:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese razon social" required name="razon_social"
                   id="razon_social" value="<?php if(isset ($this->datos[0]['RAZON_SOCIAL']))echo $this->datos[0]['RAZON_SOCIAL']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="razon_social"></div>
            </td>
            <td><label>RUC:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese razon social" required name="ruc" onKeyPress="return soloNumeros(event);"
                   maxlength="11" id="ruc" value="<?php if(isset ($this->datos[0]['RUC']))echo $this->datos[0]['RUC']?>"/>
                <span id="valida_ruc"></span>
                <br><div class="k-invalid-msg msgerror" data-for="ruc"></div>
            </td>
        </tr>
         <tr valign="top">
            <td><label>Region:</label></td>
            <td>
                <select placeholder="Seleccione..." required id="regiones" name="regiones" class="combo">
                    <option></option>
                    <?php if(isset ($this->datos)){ ?>
                        <?php for($i=0;$i<count($this->datos_regiones);$i++){ ?>
                            <?php if( $this->datos[0]['IDREGION'] == $this->datos_regiones[$i]['IDUBIGEO'] ){ ?>
                        <option value="<?php echo $this->datos_regiones[$i]['IDUBIGEO'] ?>" selected="selected"><?php echo $this->datos_regiones[$i]['DESCRIPCION'] ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_regiones[$i]['IDUBIGEO'] ?>"><?php echo $this->datos_regiones[$i]['DESCRIPCION'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    <?php }else{ ?>
                        <?php for($i=0;$i<count($this->datos_regiones);$i++){ ?>
                            <?php if( 1901 == $this->datos_regiones[$i]['IDUBIGEO'] ){ ?>
                        <option value="<?php echo $this->datos_regiones[$i]['IDUBIGEO'] ?>" selected="selected"><?php echo $this->datos_regiones[$i]['DESCRIPCION'] ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_regiones[$i]['IDUBIGEO'] ?>"><?php echo $this->datos_regiones[$i]['DESCRIPCION'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </select>
                <br><div class="k-invalid-msg msgerror" data-for="regiones"></div>
            </td>
            <td><label>Provincia:</label></td>
            <td>
                <select placeholder="Seleccione..." required id="provincias" name="provincias" class="comboX">
                    <option></option>
                    <?php if(isset ($this->datos)){ ?>
                        <?php for($i=0;$i<count($this->datos_provincias);$i++){ ?>
                            <?php if( $this->datos[0]['IDPROVINCIA'] == $this->datos_provincias[$i]['IDUBIGEO'] ){ ?>
                        <option value="<?php echo $this->datos_provincias[$i]['IDUBIGEO'] ?>" selected="selected"><?php echo $this->datos_provincias[$i]['DESCRIPCION'] ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_provincias[$i]['IDUBIGEO'] ?>"><?php echo $this->datos_provincias[$i]['DESCRIPCION'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    <?php }else{ ?>
                        <?php for($i=0;$i<count($this->datos_provincias);$i++){ ?>
                            <?php if( 1968 == $this->datos_provincias[$i]['IDUBIGEO'] ){ ?>
                        <option value="<?php echo $this->datos_provincias[$i]['IDUBIGEO'] ?>" selected="selected"><?php echo $this->datos_provincias[$i]['DESCRIPCION'] ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_provincias[$i]['IDUBIGEO'] ?>"><?php echo $this->datos_provincias[$i]['DESCRIPCION'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </select>
                <br><div class="k-invalid-msg msgerror" data-for="provincias"></div>
            </td>
        </tr>
        <tr valign="top">
            <td><label>Ciudad:</label></td>
            <td>
                <select placeholder="Seleccione..." required name="ubigeo" id="ciudades_proveedores" class="comboX">
                    <option></option>
                    <?php if(count($this->datos_ubigeos)){ ?>
                        <?php for($i=0;$i<count($this->datos_ubigeos);$i++){ ?>
                            <?php if( $this->datos[0]['IDUBIGEO'] == $this->datos_ubigeos[$i]['IDUBIGEO'] ){ ?>
                        <option value="<?php echo $this->datos_ubigeos[$i]['IDUBIGEO'] ?>" selected="selected"><?php echo $this->datos_ubigeos[$i]['DESCRIPCION'] ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_ubigeos[$i]['IDUBIGEO'] ?>"><?php echo $this->datos_ubigeos[$i]['DESCRIPCION'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </select>
                <br><div class="k-invalid-msg msgerror" data-for="ubigeo"></div>
            </td>
            <td><label>Direccion:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese direccion" required name="direccion"
                   id="direccion" value="<?php if(isset ($this->datos[0]['DIRECCION']))echo $this->datos[0]['DIRECCION']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="direccion"></div>
            </td>
        </tr>
        <tr valign="top">
            <td><label>Representante:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese nombre representante" name="representante"
                   id="representante" value="<?php if(isset ($this->datos[0]['REPRESENTANTE']))echo $this->datos[0]['REPRESENTANTE']?>"/>
            </td>
            <td><label>Telefono:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese numero telefonico" name="telefono" onKeyPress="return numeroTelefonico(event);"
                   id="" value="<?php if(isset ($this->datos[0]['TELEFONO']))echo $this->datos[0]['TELEFONO']?>"/>
            </td>
        </tr>
        <tr valign="top">
            <td><label>Email:</label></td>
            <td><input type="email" class="k-textbox" placeholder="Ingrese email" name="email"
                   id="" value="<?php if(isset ($this->datos[0]['EMAIL']))echo $this->datos[0]['EMAIL']?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="4" align="center">
                <p>
                    <button type="submit" class="k-button" id="saveform">Guardar</button>
                    <a href="<?php echo BASE_URL ?>proveedores" class="k-button cancel">Cancelar</a>
                </p>
            </td>
        </tr>
    </table>
</form>
