<table>
<?php $con=13;
    for($a = 0; $a < 4; $a++){ ?>    
    <tr>
<?php for ($i = $a*5; $i < (count($this->datos) - $con); $i++) { 
      if (isset($this->datos[$i]['nro_habitacion']) && $this->datos[$i]['nro_habitacion'] != '') { 
          if($this->datos[$i]['ventilacion']==1){$ven = "Ventilacion: Ventilador, ";}
          else{$ven = "Ventilacion: Aire Acondicionado, ";}
          if($this->datos[$i]['estado']==1){
              $est = "Estado: Habilitado";?>
        <td>
            <div  class="hab_dis k-button" title="<?php echo $ven.$est ?>">
                <div class="imagen"><label><?php echo $this->datos[$i]['nro_habitacion'] ?></label></div>
            </div>
        </td>
              <?php }
          else{$est = "Estado: En Mantenimiento";?>
        <td>
            <div class="hab_dis k-button rojo" title="<?php echo $ven.$est ?>">
                <div class="imagen"><label><?php echo $this->datos[$i]['nro_habitacion'] ?></label></div>
            </div>
        </td>
            <?php }?>
<?php }} $con-=5; ?>
    </tr>
<?php } ?>
</table>