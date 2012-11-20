<h3>Entradas pendientes:</h3>
<label>Compra:</label>
<select class="list" placeholder="Seleccione..." id="compra">
    <option></option>
    <?php for($i=0;$i<count($this->datos);$i++){ ?>
        <?php if($this->datos[$i]['confirmacion'] == 0){ ?>
        <option value="<?php echo $this->datos[$i]['idcompra'] ?>"><?php echo $this->datos[$i]['nro_comprobante'] ?></option>
        <?php } ?>
    <?php } ?>
</select>
<p><div id="infocompra"></div></p>