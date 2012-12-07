<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <fieldset>
        <legend><?php echo $this->titulo ?></legend>
        <table>
            <tr>
                <td>Fecha entrada:</td>
                <td>
                    <input readonly="readonly" placeholder="Seleccione fecha" class="datepicker" name="fecha_entrada" required 
                   id="fecha_entrada" value="<?php echo date('d-m-Y') ?>"/>
                </td>
            </tr>
            <tr>
                <td>Fecha salida:</td>
                <td>
                    <input readonly="readonly" placeholder="Seleccione fecha" class="datepicker" name="fecha_salida" required
                   id="fecha_salida"  value="<?php //echo '02-12-2012' ?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="button" class="k-button" value="Buscar Habitaciones" id="btn_busca_habitaciones" />
                </td>
            </tr>
            <tr id="celda_detalle_estadia">
                <td colspan="2">
                    <fieldset>
                        <legend>Asignar pasajero:</legend>
                        <table>
                            <tr>
                                <td><label>Habitacion:</label></td>
                                <td>
                                    <select placeholder="Seleccione..." class="comboX" id="habitacion"></select>
                                </td>
                                <td><label>Tipo de Habitacion:</label></td>
                                <td>
                                    <select placeholder="Seleccione..." class="comboX" id="tipo_habitacion"></select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" align="center">
                                    <input type="button" class="k-button" value="Asignar Pasajero a Habitacion" id="btn_asignar_pasajeros_habitacion" />
                                    <input type="button" class="k-button cancel" value="Cancelar" id="btn_cancelar_asignacion_pasajeros" />
                                </td>
                            </tr>
                            <tr class="celda_asignar_pasajero">
                                <td><label>Pasajero:</label></td>
                                <td>
                                    <input type="hidden" id="idcliente"/>
                                    <input type="hidden" id="document"/>
                                    <input type="text" class="k-textbox" placeholder="Busque pasajero" readonly="readonly" id="cliente"/>
                                </td>
                                <td>
                                    <button type="button" class="k-button" id="btn_vtna_busca_pasajeros"><span class="k-icon k-i-search"></span></button>
                                    <button type="button" class="k-button" id="btn_vtna_agrega_pasajeros"><span class="k-icon k-i-plus"></span></button>
                                </td>
                            </tr>
                            <tr align="center" class="celda_asignar_pasajero">
                                <td colspan="5"><input type="button" class="k-button" value="Agregar" id="asignar_pasajero"/></td>
                            </tr>
                            <tr class="celda_asignar_pasajero">
                                <td colspan="5">
                                    <table border="1" align="center" id="detalle_estadia">
                                        <tr>
                                            <th>Habitacion</th>
                                            <th>Tipo</th>
                                            <th>Pasajero</th>
                                            <th>Doc. Ident.</th>
                                            <th>Procedencia</th>
                                            <th>Representante</th>
                                            <th>Accion</th>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>
        <p>
            <button type="button" class="k-button" id="btn_guardar">Guardar</button>
            <a href="<?php echo BASE_URL ?>index" class="k-button cancel">Cancelar</a>
        </p>
    </fieldset>
</form>



<div id="vtna_busca_pasajero">
    <h3>Lista de Pasajeros</h3>
    <p>
        <select class="combo" id="filtro_pasajeros">
            <option value="0">Nombre/Apellido</option>
            <option value="1">Razon Social</option>
            <option value="2">DNI</option>
            <option value="3">RUC</option>
        </select>
        <input type="text" class="k-textbox" style="width: 40%" id="txt_buscar_pasajeros">
        <button type="button" class="k-button" id="btn_buscar_pasajeros"><span class="k-icon k-i-search"></span></button>
        <a class="k-button cancelar cancel">Cancelar</a>
    </p>
    <div id="grilla_pasajeros"></div>
</div>


<div id="vtna_agrega_pasajero"></div>


<div id="vtna_inserta_pasajero">
    <form method="post" action="" id="frm_natural">
        <table class="tabFormComplejo" align="center">
            <tr valign="top">
                <td><label>Doc. de Identidad:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nro.de documento" required name="documento" onKeyPress="return soloNumeros(event);"
                       id="nrodoc" value=""/>
                    <br><div class="k-invalid-msg msgerror" data-for="documento"></div>
                </td>
                <td><label>Nombre:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nombre" required name="nombres" onkeypress="return soloLetras(event)"
                       id="nombres" value=""/>
                    <br><div class="k-invalid-msg msgerror" data-for="nombres"></div>
                </td>
                <td><label>Apellidos:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese apellidos" required name="apellidos" onkeypress="return soloLetras(event)"
                       id="apellidos" value=""/>
                    <br><div class="k-invalid-msg msgerror" data-for="apellidos"></div>
                </td>
            </tr>
            <tr valign="top">
                <td><label>Direccion:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese direccion" required name="direccion"
                       id="direccion" value=""/>
                    <br><div class="k-invalid-msg msgerror" data-for="direccion"></div>
                </td>
                <td><label>Fecha de Nacimiento:</label></td>
                <td>
                    <input class="datepicker" readonly="readonly" placeholder="Seleccione fecha" name="fecha_nacimiento"
                       id="fecha_nacimiento" required value=""/>
                    <br><div class="k-invalid-msg msgerror" data-for="fecha_nacimiento"></div>
                </td>
                <td><label>Telefono:</label></td>
                <td>
                    <input type="text" class="k-textbox" placeholder="Ingrese nro.telefonico" name="telefono" onKeyPress="return numeroTelefonico(event);"
                       id="telefono" required value=""/>
                    <br><div class="k-invalid-msg msgerror" data-for="telefono"></div>
                </td>
            </tr>
            <tr valign="top">
                <td><label>Email:</label></td>
                <td>
                    <input type="email" class="k-textbox" placeholder="Ingrese email" name="email" required
                       id="email" value=""/>
                    <br><div class="k-invalid-msg msgerror" data-for="email"></div>
                </td>
                <td><label>Profesion:</label></td>
                <td>
                   <select class="combo" placeholder="Seleccione..." name="profesion" required id="profesion">
                        <option value="67"></option>
                        <?php for($i=0;$i<count($this->datos_profesiones);$i++){ ?>
                        <option value="<?php echo $this->datos_profesiones[$i]['IDPROFESION'] ?>"><?php echo utf8_encode($this->datos_profesiones[$i]['DESCRIPCION']) ?></option>
                        <?php } ?>
                    </select>
                    <br><div class="k-invalid-msg msgerror" data-for="profesion"></div>
                </td>
                <td><label>Estado Civil:</label></td>
                <td>
                    <select class="combo" placeholder="Seleccione..." name="estado_civil" required id="estado_civil">
                        <option></option>
                        <option value="Soltero(a)">Soltero(a)</option>
                        <option value="Casado(a)">Casado(a)</option>
                        <option value="Viudo(a)">Viudo(a)</option>
                        <option value="Divorciado(a)">Divorciado(a)</option>
                    </select>
                    <br><div class="k-invalid-msg msgerror" data-for="estado_civil"></div>
                </td>
            </tr>
            <tr class="celda_pais" valign="top">
                <td><label>Pais:</label></td>
                <td>
                    <select placeholder="Seleccione..." class="combo" id="paises" required name="pais">
                        <option></option>
                        <?php for($i=0;$i<count($this->datos_paises);$i++){ ?>
                        <option value="<?php echo $this->datos_paises[$i]['IDPAIS'] ?>"><?php echo $this->datos_paises[$i]['DESCRIPCION'] ?></option>
                        <?php } ?>
                    </select>
                    <br><div class="k-invalid-msg msgerror" data-for="pais"></div>
               </td>
                <td class="celda_region"><label>Region:</label></td>
                <td class="celda_region">
                    <select placeholder="Seleccione..." class="regiones comboX">
                        <option>Seleccione...</option>
                            <?php for($i=0;$i<count($this->datos_regiones);$i++){ ?>
                            <option value="<?php echo $this->datos_regiones[$i]['IDUBIGEO'] ?>"><?php echo $this->datos_regiones[$i]['DESCRIPCION'] ?></option>
                            <?php } ?>
                    </select>
               </td>
                <td class="celda_provincia"><label>Provincia:</label></td>
                <td class="celda_provincia">
                    <select placeholder="Seleccione..." class="provincias comboX">
                        <option>Seleccione...</option>
                            <?php for($i=0;$i<count($this->datos_provincias);$i++){ ?>
                            <option value="<?php echo $this->datos_provincias[$i]['IDUBIGEO'] ?>"><?php echo $this->datos_provincias[$i]['DESCRIPCION'] ?></option>
                            <?php } ?>
                    </select>
                </td>
            </tr>
            <tr class="celda_ciudad">
                <td><label>Ciudad:</label></td>
                <td>
                    <select placeholder="Seleccione..." name="ubigeo" class="ciudades" id="ubigeo">
                        <?php for($i=0;$i<count($this->datos_ubigeos);$i++){ ?>
                        <option value="<?php echo $this->datos_ubigeos[$i]['IDUBIGEO'] ?>"><?php echo $this->datos_ubigeos[$i]['DESCRIPCION'] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr valign="top">
                <td><label>Membresia:</label></td>
                <td>
                    <select class="combo" placeholder="Seleccione..." name="membresia" id="membresia">
                        <option></option>
                        <?php for($i=0;$i<count($this->datos_membresias);$i++){ ?>
                        <option value="<?php echo $this->datos_membresias[$i]['IDMEMBRESIA'] ?>"><?php echo utf8_encode($this->datos_membresias[$i]['DESCRIPCION']) ?></option>
                        <?php } ?>
                    </select>
                    <br><div class="k-invalid-msg msgerror" data-for="membresia"></div>
                </td>
                <td><label>Sexo:</label></td>
                <td>
                    <input type="radio" name="sexo" value="1" checked="checked" id="sexo_m" />M
                    <input type="radio" name="sexo" value="0" id="sexo_f"/>F
                </td>
            </tr>
            <tr>
                <td colspan="6" align="center">
                    <p>
                        <button type="button" class="k-button" id="btn_inserta_pasajero">Guardar</button>
                        <button class="k-button cancel">Cancelar</button>
                    </p>
                </td>
            </tr>
        </table>
    </form>
</div>

<div id="vtna_busca_ciudades">
    <h3>Procedencia</h3>
    <input type="hidden" id="index_tr" />
    <table>
        <tr>
            <td><label>Pais:</label></td>
            <td>
                <select placeholder="Seleccione..." class="combo" id="pais" required name="paises">
                    <option></option>
                    <?php for($i=0;$i<count($this->datos_paises);$i++){ ?>
                    <option value="<?php echo $this->datos_paises[$i]['IDPAIS'] ?>"><?php echo $this->datos_paises[$i]['DESCRIPCION'] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Region:</label></td>
            <td>
                <select placeholder="Seleccione..." class="comboX" id="regiones" required name="regiones">
                    <option>Seleccione...</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Provincia:</label></td>
            <td>
                <select placeholder="Seleccione..." class="comboX" id="provincias" required name="provincias">
                    <option>Seleccione...</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Ciudad:</label></td>
            <td>
                <select placeholder="Seleccione..." class="comboX" id="ciudades" required name="ciudades">
                    <option>Seleccione...</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p>
                    <button type="button" class="k-button" id="btn_selecciona_ciudad">Seleccionar</button>
                    <button type="button" class="k-button cancel" id="btn_cancelar_ciudad">Cancelar</button>
                </p>
            </td>
        </tr>
    </table>
</div>

<div id="fondooscuro"></div>
