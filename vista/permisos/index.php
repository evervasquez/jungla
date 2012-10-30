<h3>Permisos</h3>
<select class="combo" placeholder="Seleccione..." required name="perfil" id="perfil">
    <option></option>
    <?php for($i=0;$i<count($this->datos_perfiles);$i++){ ?>
        <option value="<?php echo $this->datos_perfiles[$i]['idperfil'] ?>"><?php echo $this->datos_perfiles[$i]['descripcion'] ?></option>
    <?php } ?>
</select>