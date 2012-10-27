<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <table width="50%" align="center">
        <caption><h3><?php echo $this->titulo ?></h3></caption>
        <tr>
            <td><label>Codigo:</label></td>
            <td>
                <input type="text" class="k-textbox" disabled="disabled" name="codigo" id="codigo"
                   value="<?php if(isset ($this->datos[0]['idempleado']))echo $this->datos[0]['idempleado']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>Nombre:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese nombres" required name="nombres"
                   id="" value="<?php if(isset ($this->datos[0]['nombres']))echo $this->datos[0]['nombres']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>Apellidos:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese apellidos" required onkeypress="return soloLetras(event)" name="apellidos"
                   id="" value="<?php if(isset ($this->datos[0]['apellidos']))echo $this->datos[0]['apellidos']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>DNI:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese Nro.de DNI" required onKeyPress="return soloNumeros(event);" maxlength="8"
                       name="dni" id="" value="<?php if(isset ($this->datos[0]['dni']))echo $this->datos[0]['dni']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>Telefono:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese Nro.Telefonico" required name="telefono"
                   id="" value="<?php if(isset ($this->datos[0]['telefono']))echo $this->datos[0]['telefono']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>Direccion:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese direccion" required name="direccion"
                   id="" value="<?php if(isset ($this->datos[0]['direccion']))echo $this->datos[0]['direccion']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>Ubigeo:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione..." required name="ubigeo">
                    <option value="0"></option>
                    <option value="1969">Tarapoto</option>
                    <?php for($i=0;$i<count($this->datos_ubigeos);$i++){ ?>
                        <?php if( $this->datos[0]['idubigeo'] == $this->datosAlmacen[$i]['idubigeo'] ){ ?>
                    <option value="<?php echo $this->datos_ubigeos[$i]['idubigeo'] ?>" selected="selected"><?php echo $this->datos_ubigeos[$i]['descripcion'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_ubigeos[$i]['idubigeo'] ?>"><?php echo $this->datos_ubigeo[$i]['descripcion'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Profesion:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione..." required name="profesion">
                    <option value="0"></option>
                    <?php for($i=0;$i<count($this->datos_profesiones);$i++){ ?>
                        <?php if( $this->datos[0]['idprofesion'] == $this->datos_profesiones[$i]['idprofesion'] ){ ?>
                    <option value="<?php echo $this->datos_profesiones[$i]['idprofesion'] ?>" selected="selected"><?php echo utf8_encode($this->datos_profesiones[$i]['descripcion']) ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_profesiones[$i]['idprofesion'] ?>"><?php echo utf8_encode($this->datos_profesiones[$i]['descripcion']) ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Fecha de Nacimiento:</label></td>
            <td>
                <input class="datepicker" readonly="readonly" value="" placeholder="Seleccione fecha" required name="fecha_nacimiento"
                   id="" value="<?php if(isset ($this->datos[0]['fecha_nacimiento']))echo $this->datos[0]['fecha_nacimiento']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>Fecha de Contratacion:</label></td>
            <td>
                <input class="datepicker" readonly="readonly" value="" placeholder="Seleccione fecha" required name="fecha_contratacion"
                   id="" value="<?php if(isset ($this->datos[0]['fecha_contratacion']))echo $this->datos[0]['fecha_contratacion']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>Perfil:</label></td>
            <td>
                <select class="combo" placeholder="Seleccione..." required name="perfil">
                    <option value="0"></option>
                    <?php for($i=0;$i<count($this->datos_perfiles);$i++){ ?>
                        <?php if( $this->datos[0]['idperfil'] == $this->datos_perfiles[$i]['idperfil'] ){ ?>
                    <option value="<?php echo $this->datos_perfiles[$i]['idperfil'] ?>" selected="selected"><?php echo $this->datos_perfiles[$i]['descripcion'] ?></option>
                        <?php } else { ?>
                    <option value="<?php echo $this->datos_perfiles[$i]['idperfil'] ?>"><?php echo $this->datos_perfiles[$i]['descripcion'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Usuario:</label></td>
            <td>
                <input type="text" class="k-textbox" placeholder="Ingrese usuario" required name="usuario"
                   id="" value="<?php if(isset ($this->datos[0]['usuario']))echo $this->datos[0]['usuario']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>Contraseña:</label></td>
            <td>
                <input type="password" class="k-textbox" placeholder="Ingrese clave" required name="clave"
                   id="" value="<?php if(isset ($this->datos[0]['clave']))echo $this->datos[0]['clave']?>"/>
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
            <td colspan="2" align="center">
                <p>
                    <button type="submit" class="k-button">Guardar</button>
                    <a href="<?php echo BASE_URL ?>empleados" class="k-button">Cancelar</a>
                </p>
            </td>
        </tr>
    </table>
</form>