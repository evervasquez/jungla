$(document).ready(function(){
    $( "#nro_habitacion" ).focus();
    $("#tbl_habitacion_especifica").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            columns: [{field:"TipodeHabitacion", width:25},
                {field:"Costo", width:20},
                {field:"Observaciones", width:40},
                {field:"Acciones", width:15,attributes:{class:"acciones"}}]
        });
    $("#asignar_costo").click(function(){
       idth=$("#tipo_habitacion").val();
       th=$("#tipo_habitacion option:selected").html(); 
       c=$("#costo").val();
       o=$("#observacion").val();
       error= false;
       msg='';
       if(idth == 0){
           alert("Seleccione o cambie Tipo de Habitacion");
           $("#tipo_habitacion").focus();
       }
       else{
           if(c == ''){
               alert("Ingrese costo");
               $(".precio").focus();
           }
           else{
             $("#tbl_habitacion_especifica tr").each(function(){
                id_th = $("#tbl_habitacion_especifica tr td:eq(0) :input").val();
                if(idth==id_th){
                    error= true;
                    msg = "Este tipo de habitacion ya fue asignado";
                }
            });

            if(error){
                alert(msg);
            }else{
                html="<tr>";
                html=html+"<td width='60px'><input type='hidden' name='tipo_habitacion[]' value='"+idth+"'/>"+th+"</td>";
                html=html+"<td><input type='hidden' name='costo[]' value='"+c+"'/>S/. "+c+"</td>";
                html=html+"<td><input type='hidden' name='observacion[]' value='"+o+"'/>"+o+"</td>";
                html=html+'<td><a class="delete imgdelete" title="Eliminar item" href="javascript:"></a></td>';
                html=html+"</tr>";

                $("#tbl_habitacion_especifica").append(html);
                $("#tipo_habitacion option:eq(0)").attr('selected',true);
                $("#tipo_habitacion").kendoComboBox();
                $(".precio").val('');
                $("#observacion").val('');
            }  
            }
       }
       
   });
   
   $(".delete").live('click', function() {
       i = $(this).parent().parent().index();
       $("#tbl_habitacion_especifica tr:eq("+i+")").remove();
   });
   
   //editar
   $("#agrega_he").click(function(){
       idh=$("#codigo").val();
       idth=$("#tipo_habitacion").val();
       th=$("#tipo_habitacion option:selected").html(); 
       c=$("#costo").val();
       o=$("#observacion").val();
       error= false;
       msg='';
       
       $("#tbl_habitacion_especifica tr").each(function(){
           id_th = $("#tbl_habitacion_especifica tr td:eq(0) :input").val();
           if(idth==id_th){
               error= true;
               msg = "Este tipo de habitacion ya fue asignado";
           }
       });
       
       if(error){
           alert(msg);
       }else{
           $.post('/sisjungla/habitaciones/insertar_habitacion_especifica','idhabitacion='+idh+'&idtipo_habitacion='+idth+'&costo='+c+'&observaciones='+o);
           
           html="<tr>";
           html=html+"<td><input type='hidden' class='tipo_habitacion' value='"+idth+"'/>"+th+"</td>";
           html=html+"<td><input type='hidden' />"+c+"</td>";
           html=html+"<td><input type='hidden' />"+o+"</td>";
           html=html+'<td><a href="#" class="eliminar imgdelete"></a></td>';
           html=html+"</tr>";
           $("#tbl_habitacion_especifica").append(html);
           $("#tipo_habitacion option:eq(0)").attr('selected',true);
           $("#tipo_habitacion").kendoComboBox();
           $("#tipo_habitacion").focus();
           $("#costo").val('');
           $("#observacion").val('');
       }
   });
   
   $(".eliminar").live('click', function() {
       i = $(this).parent().parent().index();
       idh=$("#codigo").val();
       idth=$("#tbl_habitacion_especifica tr:eq("+i+") td:eq(0) .tipo_habitacion").val();
       $.post('/sisjungla/habitaciones/eliminar_habitacion_especifica','idhabitacion='+idh+'&idtipo_habitacion='+idth);
       $("#tbl_habitacion_especifica tr:eq("+i+")").remove();
   });
});