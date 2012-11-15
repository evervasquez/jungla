<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" class="tabForm" id="frm">
    <h3><?php echo $this->titulo ?></h3>
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <input type="hidden" name="codigo" value="<?php if(isset ($this->datos[0]['idempleado']))echo $this->datos[0]['idempleado']?>"/>
    
    <table width="50%" align="center">
        <tr>
            <td><label for="nombre">Nombres:</label></td>
            <td colspan="2">
                <input type="text" class="k-textbox" placeholder="Ingrese nombres" required name="nombres" onkeypress="return soloLetras(event)"
                   id="nombre" value="<?php if(isset ($this->datos[0]['nombres']))echo $this->datos[0]['nombres']?>"/>
            </td>
            <td><label for="apellidos">Apellidos:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese apellidos" required onkeypress="return soloLetras(event)" name="apellidos"
                    id="apellidos" value="<?php if(isset ($this->datos[0]['apellidos']))echo $this->datos[0]['apellidos']?>"/>
            </td>
        </tr>
        <tr>
            <td><label for="dni">DNI:</label></td>
            <td colspan="2">
                <input type="text" class="k-textbox" placeholder="Ingrese Nro.de DNI" required onKeyPress="return soloNumeros(event);" maxlength="8"
                    id="dni" name="dni" value="<?php if(isset ($this->datos[0]['dni']))echo $this->datos[0]['dni']?>"/>
            </td>
            <td><label for="telefono">Telefono:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese Nro.Telefonico" required name="telefono"
                   id="telefono" value="<?php if(isset ($this->datos[0]['telefono']))echo $this->datos[0]['telefono']?>"/>
            </td>
        </tr>
        <tr>
            <td><label for="provincias">Provincia:</label></td>
            <td colspan="2">
                <select placeholder="Seleccione..." required name="provincias" id="provincias" class="combo">
                    <option></option>
                    <?php if(isset ($this->datos)){ ?>
                        <?php for($i=0;$i<count($this->datos_provincias);$i++){ ?>
                            <?php if( $this->datos[0]['idprovincia'] == $this->datos_provincias[$i]['idubigeo'] ){ ?>
                        <option value="<?php echo $this->datos_provincias[$i]['idubigeo'] ?>" selected="selected"><?php echo $this->datos_provincias[$i]['descripcion'] ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_provincias[$i]['idubigeo'] ?>"><?php echo $this->datos_provincias[$i]['descripcion'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    <?php }else{ ?>
                        <?php for($i=0;$i<count($this->datos_provincias);$i++){ ?>
                            <?php if( 1968 == $this->datos_provincias[$i]['idubigeo'] ){ ?>
                        <option value="<?php echo $this->datos_provincias[$i]['idubigeo'] ?>" selected="selected"><?php echo $this->datos_provincias[$i]['descripcion'] ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_provincias[$i]['idubigeo'] ?>"><?php echo $this->datos_provincias[$i]['descripcion'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
            <td><label for="ciudad">Ciudad:</label></td>
            <td>
                <select placeholder="Seleccione..." name="ubigeo" id="ubigeo" required>
                    <option value="0">Seleccione...</option>
                    <?php if(count($this->datos_ubigeos)){ ?>
                        <?php for($i=0;$i<count($this->datos_ubigeos);$i++){ ?>
                            <?php if( $this->datos[0]['idubigeo'] == $this->datos_ubigeos[$i]['idubigeo'] ){ ?>
                        <option value="<?php echo $this->datos_ubigeos[$i]['idubigeo'] ?>" selected="selected"><?php echo $this->datos_ubigeos[$i]['descripcion'] ?></option>
                            <?php } else { ?>
                        <option value="<?php echo $this->datos_ubigeos[$i]['idubigeo'] ?>"><?php echo $this->datos_ubigeos[$i]['descripcion'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="direccion">Direccion:</label></td>
            <td colspan="2">
                <input type="text" class="k-textbox" placeholder="Ingrese direccion" name="direccion" required
                   id="direccion" value="<?php if(isset ($this->datos[0]['direccion']))echo $this->datos[0]['direccion']?>"/>
            </td>
            <td><label for="profesion">Profesion:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione..." name="profesion" id="profesion" required>
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_profesiones);$i++){ ?>
                        <?php if( $this->datos[0]['idprofesion'] == $this->datos_profesiones[$i]['idprofesion'] ){ ?>
                    <option value="<?php echo $this->datos_profesiones[$i]['idprofesion'] ?>" selected="selected"><?php echo utf8_encode($this->datos_profesiones[$i]['descripcion']) ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_profesiones[$i]['idprofesion'] ?>"><?php echo utf8_encode($this->datos_profesiones[$i]['descripcion']) ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <span class="k-invalid-msg" data-for="profesion"></span>
            </td>
        </tr>
        <tr>
            <td><label for="fecha_nacimiento">Fecha de Nacimiento:</label></td>
            <td colspan="2">
                <input class="datepicker" readonly="readonly" placeholder="Seleccione fecha" name="fecha_nacimiento" required
                   id="fechanac" value="<?php if(isset ($this->datos[0]['fecha_nacimiento'])){
                           $fecha= $this->datos[0]['fecha_nacimiento'];
                           echo substr($fecha,8,2).'-'.substr($fecha,5,2).'-'.substr($fecha,0,4);}?>"/>
                <span class="k-invalid-msg" data-for="fecha_nacimiento"></span>
            </td>
            <td><label for="fecha_contratacion">Fecha de Contratacion:</label></td>
            <td>
                <input class="datepicker" readonly="readonly" placeholder="Seleccione fecha" name="fecha_contratacion" required
                   id="fechacon" value="<?php if(isset ($this->datos[0]['fecha_contratacion'])){
                           $fecha=$this->datos[0]['fecha_contratacion'];
                           echo substr($fecha,8,2).'-'.substr($fecha,5,2).'-'.substr($fecha,0,4);}?>"/>
                <span class="k-invalid-msg" data-for="fecha_contratacion"></span>
            </td>
        </tr>
        <tr>
            <td><label for="perfil">Perfil:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione..." name="perfil" id="perfil" required>
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_perfiles);$i++){ ?>
                        <?php if( $this->datos[0]['idperfil'] == $this->datos_perfiles[$i]['idperfil'] ){ ?>
                    <option value="<?php echo $this->datos_perfiles[$i]['idperfil'] ?>" selected="selected"><?php echo $this->datos_perfiles[$i]['descripcion'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_perfiles[$i]['idperfil'] ?>"><?php echo $this->datos_perfiles[$i]['descripcion'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <span class="k-invalid-msg" data-for="perfil">
            </td>
        </tr>
        <tr>
            <td><label for="usuario">Usuario:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese usuario" name="usuario" required
                   id="usuario" value="<?php if(isset ($this->datos[0]['usuario']))echo $this->datos[0]['usuario']?>"/>
            </td>
            <td>
                <span id="valida_usuario">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </td>
            <td><label for="clave">Contraseña:</label></td>
            <td>
                <input type="password" class="k-textbox" placeholder="Ingrese clave" name="clave" id="clave" required
                   value="<?php if(isset ($this->datos[0]['clave']))echo $this->datos[0]['clave']?>"/>                
            </td>
        </tr>
        <tr>
            <td><label for="actividad">Actividad:</label></td>
            <td colspan="2">
                <select class="combo" placeholder="Seleccione..." name="actividad" id="actividad" required>
                    <option value="0"></option>
                    <?php for($i=0;$i<count($this->datos_actividades);$i++){ ?>
                        <?php if( $this->datos[0]['idactividad'] == $this->datos_actividades[$i]['idactividad'] ){ ?>
                    <option value="<?php echo $this->datos_actividades[$i]['idactividad'] ?>" selected="selected"><?php echo utf8_encode($this->datos_actividades[$i]['descripcion']) ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_actividades[$i]['idactividad'] ?>"><?php echo utf8_encode($this->datos_actividades[$i]['descripcion']) ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
            <td><label for="tipo_empleado">Tipo Empleado:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione..." name="tipo_empleado" id="tipo_empleado" required>
                    <option value="0"></option>
                    <?php for($i=0;$i<count($this->datos_tipo_empleado);$i++){ ?>
                        <?php if( $this->datos[0]['idtipo_empleado'] == $this->datos_tipo_empleado[$i]['idtipo_empleado'] ){ ?>
                    <option value="<?php echo $this->datos_tipo_empleado[$i]['idtipo_empleado'] ?>" selected="selected"><?php echo $this->datos_tipo_empleado[$i]['descripcion'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_tipo_empleado[$i]['idtipo_empleado'] ?>"><?php echo $this->datos_tipo_empleado[$i]['descripcion'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Estado:</label></td>
            <td>
                <?php if (isset ($this->datos[0]['estado']) && $this->datos[0]['estado']==0) {?>
                <input type="radio" name="estado" value ="1" />Activo
                <input type="radio" name="estado" value="0" checked="checked"/>Inactivo
                <?php } else { ?>
                <input type="radio" name="estado" value ="1" checked="checked"/>Activo
                <input type="radio" name="estado" value="0" />Inactivo
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td colspan="5" align="center">
                <p>
                    <button type="submit" class="k-button" id="saveform">Guardar</button>
                    <a href="<?php echo BASE_URL ?>empleados" class="k-button cancel">Cancelar</a>
                </p>
            </td>
        </tr>
    </table>
</form>
