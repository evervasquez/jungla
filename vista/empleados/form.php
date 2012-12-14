<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" class="tabForm" id="frm" onsubmit="return validarEmpleado();">
    <h3><?php echo $this->titulo ?></h3>
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <input type="hidden" name="codigo" id="codigo"
            value="<?php if(isset ($this->datos[0]['IDEMPLEADO']))echo $this->datos[0]['IDEMPLEADO']?>"/>
    <table align="center" class="tabFormComplejo">
        <tr valign="top">
            <td><label for="nombres">Nombres:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese nombres" required name="nombres" onkeypress="return soloLetras(event)"
                   id="nombre" value="<?php if(isset ($this->datos[0]['NOMBRES']))echo $this->datos[0]['NOMBRES']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="nombres"></div>
            </td>
            <td><label for="apellidos">Apellidos:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese apellidos" required onkeypress="return soloLetras(event)" name="apellidos"
                    id="apellidos" value="<?php if(isset ($this->datos[0]['APELLIDOS']))echo $this->datos[0]['APELLIDOS']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="apellidos"></div>
            </td>
            <td><label for="dni">DNI:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese Nro.de DNI" required onKeyPress="return soloNumeros(event);" maxlength="8"
                    id="dni" name="dni" value="<?php if(isset ($this->datos[0]['DNI']))echo $this->datos[0]['DNI']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="dni"></div>
            </td>
        </tr>
        <tr valign="top">
            <td><label for="telefono">Telefono:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese Nro.Telefonico" required name="telefono" onKeyPress="return numeroTelefonico(event);"
                   id="telefono" value="<?php if(isset ($this->datos[0]['TELEFONO']))echo $this->datos[0]['TELEFONO']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="telefono"></div>
            </td>
            <td><label for="provincias">Provincia:</label></td>
            <td>
                <select placeholder="Seleccione..." required name="provincias" id="provincias" class="combo">
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
            <td><label>Ciudad:</label></td>
            <td>
                <select placeholder="Seleccione..." name="ubigeo" id="ubigeo" required class="comboX">
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
        </tr>
        <tr valign="top">
            <td><label for="direccion">Direccion:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese direccion" name="direccion" required
                   id="direccion" value="<?php if(isset ($this->datos[0]['DIRECCION']))echo $this->datos[0]['DIRECCION']?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="direccion"></div>
            </td>
            <td><label for="profesion">Profesion:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione..." name="profesion" id="profesion" required>
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_profesiones);$i++){ ?>
                        <?php if( $this->datos[0]['IDPROFESION'] == $this->datos_profesiones[$i]['IDPROFESION'] ){ ?>
                    <option value="<?php echo $this->datos_profesiones[$i]['IDPROFESION'] ?>" selected="selected"><?php echo utf8_encode($this->datos_profesiones[$i]['DESCRIPCION']) ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_profesiones[$i]['IDPROFESION'] ?>"><?php echo utf8_encode($this->datos_profesiones[$i]['DESCRIPCION']) ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <br><div class="k-invalid-msg msgerror" data-for="profesion"></div>
            </td>
            <td><label for="fecha_nacimiento">Fecha de Nacimiento:</label></td>
            <td>
                <input readonly="readonly" placeholder="Seleccione fecha" name="fecha_nacimiento" required
                   id="fechanac" value="<?php echo $this->datos[0]['E_FECHA_NACIMIENTO'] ?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="fecha_nacimiento"></div>
            </td>
        </tr>
        <tr valign="top">
            <td><label for="fecha_contratacion">Fecha de Contratacion:</label></td>
            <td>
                <input readonly="readonly" placeholder="Seleccione fecha" name="fecha_contratacion" required
                   id="fechacon" value="<?php if(isset ($this->datos)){echo $this->datos[0]['E_FECHA_CONTRATACION'];} else {echo date("d-m-Y");} ?>"/>
                <br><div class="k-invalid-msg msgerror" data-for="fecha_contratacion"></div>
            </td>
            <td><label>Actividad:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione..." name="actividad" id="actividad" required>
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_actividades);$i++){ ?>
                        <?php if( $this->datos[0]['IDACTIVIDAD'] == $this->datos_actividades[$i]['IDACTIVIDAD'] ){ ?>
                    <option value="<?php echo $this->datos_actividades[$i]['IDACTIVIDAD'] ?>" selected="selected"><?php echo utf8_encode($this->datos_actividades[$i]['DESCRIPCION']) ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_actividades[$i]['IDACTIVIDAD'] ?>"><?php echo utf8_encode($this->datos_actividades[$i]['DESCRIPCION']) ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <br><div class="k-invalid-msg msgerror" data-for="actividad"></div>
            </td>
            <td><label>Tipo Empleado:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione..." name="tipo_empleado" id="tipo_empleado" required>
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_tipo_empleado);$i++){ ?>
                        <?php if( $this->datos[0]['IDTIPO_EMPLEADO'] == $this->datos_tipo_empleado[$i]['IDTIPO_EMPLEADO'] ){ ?>
                    <option value="<?php echo $this->datos_tipo_empleado[$i]['IDTIPO_EMPLEADO'] ?>" selected="selected"><?php echo $this->datos_tipo_empleado[$i]['DESCRIPCION'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_tipo_empleado[$i]['IDTIPO_EMPLEADO'] ?>"><?php echo $this->datos_tipo_empleado[$i]['DESCRIPCION'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <br><div class="k-invalid-msg msgerror" data-for="tipo_empleado"></div>
            </td>
        </tr>
        <tr valign="top">
            <td><label for="perfil">Perfil:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione..." name="perfil" id="perfil" required>
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_perfiles);$i++){ ?>
                        <?php if( $this->datos[0]['IDPERFIL'] == $this->datos_perfiles[$i]['IDPERFIL'] ){ ?>
                    <option value="<?php echo $this->datos_perfiles[$i]['IDPERFIL'] ?>" selected="selected"><?php echo $this->datos_perfiles[$i]['DESCRIPCION'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_perfiles[$i]['IDPERFIL'] ?>"><?php echo $this->datos_perfiles[$i]['DESCRIPCION'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <br><div class="k-invalid-msg msgerror" data-for="perfil"></div>
            </td>
            <td>
                <label for="usuario">Usuario:</label>
            </td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese usuario" name="usuario" required
                       <?php if(isset ($this->datos[0]['USUARIO'])) echo 'readonly="readonly"'?>
                   id="usuario" value="<?php if(isset ($this->datos[0]['USUARIO']))echo $this->datos[0]['USUARIO']?>"/>
                <span id="valida_usuario"></span>
                <br><div class="k-invalid-msg msgerror" data-for="usuario"></div>
            </td>
            <td><label for="clave">Contraseña:</label></td>
            <td>
                <input type="password" class="k-textbox" placeholder="Ingrese clave" name="clave" id="clave" required
                   value="<?php if(isset ($this->datos[0]['CLAVE']))echo $this->datos[0]['CLAVE']?>"/>                
                <br><div class="k-invalid-msg msgerror" data-for="clave"></div>
            </td>
        </tr>
        <tr valign="top">
            <td>
                <div class="msgerror"></div>
            </td>
            <td colspan="4" align="center">
                <p>
                    <button type="submit" class="k-button" id="saveform">Guardar</button>
                    <a href="<?php echo BASE_URL ?>empleados" class="k-button cancel">Cancelar</a>
                </p>
            </td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
    </table>
</form>
