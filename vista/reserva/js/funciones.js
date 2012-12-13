$(document).ready(function(){
    $("#detalle_estadia").kendoGrid();
    
    $("#celda_detalle_estadia").hide();
    $(".celda_asignar_pasajero").hide();
    
    $("#btn_busca_habitaciones").click(function(){
        if($("#fecha_entrada").val()==''){alert('Ingrese fecha de entrada');return 0;}
        if($("#fecha_salida").val()==''){alert('Ingrese fecha de salida');return 0;}
        $.post('/jungla/reserva/buscar_habitaciones_disponibles','fecha_entrada='+$("#fecha_entrada").val()+
            '&fecha_salida='+$("#fecha_salida").val(),function(datos){
            $("#habitacion").html('<option value="">Seleccione...</option>');
            for(var i=0;i<datos.length;i++){
                if(datos[i].IDHABITACION!=0){
                    $("#habitacion").append('<option value="'+ datos[i].IDHABITACION + '">' + datos[i].NRO_HABITACION+ '</option>');
                }
            }
        },'json');
        $("#habitacion").focus();
        $("#celda_detalle_estadia").show();
    });
    
        document.onkeydown = function(evt) {
            evt = evt || window.event;
            if (evt.keyCode == 27) {
                salir();
                $("#buscar").focus();
            }
        };
    
    $("#habitacion").change(function(){
        if($(this).val()!=''){
            $.post('/jungla/reserva/busca_tipo_habitacionxhabitacion','idhabitacion='+$(this).val(),function(datos){
                $("#tipo_habitacion").html('<option value="">Seleccione...</option>');
                for(var i=0;i<datos.length;i++){
                    $("#tipo_habitacion").append('<option value="'+ datos[i].IDTIPO_HABITACION + '">' + datos[i].TIPO+ '</option>');
                }
            },'json');
            $("#tipo_habitacion").focus();
        }else{
            $("#tipo_habitacion").html('<option value="">Seleccione...</option>');
        }
    });
    
    //Asignar pasajero a habitacion
    var idhe;
    $("#btn_asignar_pasajeros_habitacion").click(function(){
        if($("#habitacion").val()==''){alert('Seleccione habitacion');return 0;}
        if($("#tipo_habitacion").val()==''){alert('Seleccione tipo de habitacion');return 0;}
        
        error=false;
        msg='';
        idh=$("#habitacion").val();
        idth=$("#tipo_habitacion").val();
        x=0;
        $("#detalle_estadia tr").each(function(){
            id_h = $("#detalle_estadia tr:eq("+x+") td:eq(0) :input").val();
            if(idh==id_h){
                error= true;
                msg = "Este habitacion ya tiene pasajeros";
            }
            x++;
        });
        
        if(error){alert(msg);nueva_asignacion();return 0;}
        
        $.post('/jungla/reserva/get_habitacion_especifica','idhabitacion='+idh+'&idtipo_habitacion='+idth,function(datos){
            idhe=datos[0].IDHABITACION_ESPECIFICA;
        },'json');
        
        $(".celda_asignar_pasajero").show();
        $("#habitacion").attr("disabled",true);
        $("#tipo_habitacion").attr("disabled",true);
        $("#asignar_pasajero").attr("disabled",false);
    });
    function nueva_asignacion(){
        $("#asignar_pasajero").attr("disabled",true);
        $("#habitacion option:eq(0)").attr('selected',true);
        $("#habitacion").attr("disabled",false);
        $("#tipo_habitacion").html('<option value="">Seleccione...</option>');
        $("#tipo_habitacion").attr("disabled",false);
    }
    $("#btn_cancelar_asignacion_pasajeros").click(function(){
        nro_pas=0;
        x=0;
        idh=$("#habitacion").val(); 
        $("#detalle_estadia tr").each(function(){
            id_h = $("#detalle_estadia tr:eq("+x+") td:eq(0) :input").val();
            if(idh==id_h){
                $("#detalle_estadia tr:eq("+x+")").remove();
            }
            x++;
        });
        nueva_asignacion();
    });
    
    //asignar pasajero al detalle estadía
    nro_pas=0;
    $("#asignar_pasajero").click(function(){
        idp=$("#idcliente").val();
        p=$("#cliente").val();
        idh=$("#habitacion").val();
        h=$("#habitacion option:selected").html(); 
        idth=$("#tipo_habitacion").val(); 
        th=$("#tipo_habitacion option:selected").html(); 
        error= false;
        msg='';
        if(p==''){
            alert('Seleccione o inserte pasajero');
            return 0;
        }
        
        x=0;
        $("#detalle_estadia tr").each(function(){
            id_p = $("#detalle_estadia tr:eq("+x+") td:eq(2) :input").val();
            if(idp==id_p){
                error= true;
                msg = "Este pasajero ya fue asignado";
            }
            x++;
        });
        
        if(error){
            alert(msg);
        }else{
            html="<tr>";
            html=html+"<td><input type='hidden' name='idhabitacion[]' value='"+idh+"'/>"+h+"</td>";
            html=html+"<td><input type='hidden' name='idhabitacion_especifica[]' value='"+idhe+"'/>"+th+"</td>";
            html=html+"<td><input type='hidden' name='idpasajero[]' value='"+idp+"'/>"+p+"</td>";
            html=html+"<td><input type='hidden' name='representante[]' value='0'/> <input type='radio' name='estado'/></td>";
            html=html+'<td><a class="imgdelete eliminar" title="Eliminar item" href="javascript:"></a></td>';
            html=html+"</tr>";

            $("#detalle_estadia").append(html);
            $("#cliente").val('');
            $("#idcliente").val('');
            
            nro_pas++;
            switch(idth){
                case '1':if(nro_pas==1){nueva_asignacion();nro_pas=0;alert('Pasajeros completos en esta habitacion');}break;
                case '2':if(nro_pas==2){nueva_asignacion();nro_pas=0;alert('Pasajeros completos en esta habitacion');}break;
                case '3':if(nro_pas==3){nueva_asignacion();nro_pas=0;alert('Pasajeros completos en esta habitacion');}break;
                case '4':if(nro_pas==4){nueva_asignacion();nro_pas=0;alert('Pasajeros completos en esta habitacion');}break;
                case '5':if(nro_pas==5){nueva_asignacion();nro_pas=0;alert('Pasajeros completos en esta habitacion');}break;
            }
        }
    });
    
    //eliminar celda
    $(".eliminar").live('click', function() {
       i = $(this).parent().parent().index();
       $("#detalle_estadia tr:eq("+i+")").remove();
   });
    
    //salir de ventanas emergentes
    function salir(){
        $("#txt_buscar_pasajeros").val('');
        $("#vtna_busca_pasajero").fadeOut(300);
        $("#vtna_inserta_pasajero").fadeOut(300);
        $("#fondooscuro").fadeOut(300);
    }
    
    //ventana de busqueda de pasajeros
    $("#btn_vtna_busca_pasajeros").click(function(){
        buscar_pasajeros();
        $("#vtna_busca_pasajero").fadeIn(300);
        $("#fondooscuro").fadeIn(300);
        $("#txt_buscar_pasajeros").focus();
    });
    
    $(".cancelar").click(function(){salir();});
    
    $("#txt_buscar_pasajeros").keypress(function(event){
       if(event.which == 13){buscar_pasajeros();} 
    });
    
    $("#btn_vtna_busca_pasajeros").click(function(){
        buscar_pasajeros();
        $("#txt_buscar_pasajeros").focus();
    });
    
    function buscar_pasajeros(){
        $.post('/jungla/pasajeros/buscador','cadena='+$("#txt_buscar_pasajeros").val()+'&filtro='+$("#filtro_pasajeros").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla" id="tbl_busca_pasajeros">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Nombre/Razon Social</th>'+
                            '<th>DNI/RUC</th>'+
                            '<th>Direccion</th>'+
                            '<th>Seleccionar</th>'+
                        '</tr>';
            for(var i=0;i<datos.length;i++){
                id=datos[i].IDCLIENTE;
                if(datos[i].APELLIDOS != null){
                    pasajero=datos[i].NOMBRES+' '+datos[i].APELLIDOS;
                }else{
                    pasajero=datos[i].NOMBRES;
                }
                HTML = HTML + '<tr>';
                HTML = HTML + '<td>'+id+'</td>';
                HTML = HTML + '<td>'+pasajero+'</td>';
                HTML = HTML + '<td>'+datos[i].DOCUMENTO+'</td>';
                HTML = HTML + '<td>'+datos[i].DIRECCION+'</td>';
                HTML = HTML + '<td><a href="javascript:void(0)" onclick="seleccionar_pasajero(\''+id+'\',\''+pasajero+'\')" class="imgselect"></a></td>';
                HTML = HTML + '</tr>';
            }            
            HTML = HTML + '</table>'
                $("#grilla_pasajeros").html(HTML);
                $("#tbl_busca_pasajeros").kendoGrid({
                    dataSource: {
                        pageSize: 7
                    },
                    pageable: true
                });
        },'json');        
    }
    
    $("#btn_guardar").click(function(){
        x=0;
        error_repre=true;
        $("#detalle_estadia tr").each(function(){
            if($("#detalle_estadia tr:eq("+x+") td:eq(3) :radio").is(":checked")){
                error_repre=false;
            }
            x++;
        });
        
        if(error_repre){
            alert("Seleccione el representante de reserva");
            return 0;
        }
        $("#frm").submit();
    });
   
    $("input:radio").live('click',function(){
       i = $(this).parent().parent().index();
       x=0;
        $("#detalle_estadia tr").each(function(){
            if(x==i){
                $("#detalle_estadia tr:eq("+x+") td:eq(3) :hidden").val('1');
            }else{
                $("#detalle_estadia tr:eq("+x+") td:eq(3) :hidden").val('0');
            }
            x++;
        });
    });
    
    //insertar pasajero
    $("#btn_vtna_agrega_pasajeros").click(function(){
        $("#vtna_inserta_pasajero").fadeIn(300);
        $("#fondooscuro").fadeIn(300);
    });
    
    $("#btn_inserta_pasajero").click(function(){
        n=$("#nombres").val();a=$("#apellidos").val();d=$("#nrodoc").val();f=$("#fecha_nacimiento").val();
        t=$("#telefono").val();e=$("#email").val();ec=$("#estado_civil :selected").val();p=$("#profesion").val();
        dir=$("#direccion").val();pa=$("#paises").val();
        if(n=='' || a=='' || d=='' || f=='' || t=='' || e=='' || ec=='' || p=='' || dir=='' || pa==''){
            alert("Debe llenar todos los datos");
            return 0;
        }
        if($("#sexo_m").is(":checked")){
            sexo=1;
        }else{
            sexo=2;
        }
        if($("#membresia").val()==''){
            membresia=0;
        }else{
            membresia=$("#membresia").val();
        }
        $.post('/jungla/reserva/inserta_pasajero','nombres='+n+'&apellidos='+a+
            '&documento='+d+'&fecha_nacimiento='+f+'&sexo='+sexo+
            '&telefono='+t+'&email='+e+'&estado_civil='+ec+
            '&profesion='+p+'&ubigeo='+$("#ubigeo option:selected").val()+'&membresia='+membresia+
            '&direccion='+dir+'&tipo_cliente=natural',
        function(datos){
            $("#idcliente").val(datos[0].X_IDCLIENTE);
            $("#cliente").val($("#nombres").val()+' '+$("#apellidos").val());
            $("#nombres").val('');
            $("#apellidos").val('');
            $("#nrodoc").val('');
            $("#fecha_nacimiento").val('');
            $("#telefono").val('');
            $("#email").val('');
            $("#direccion").val('');
            $("#sexo_m").attr("checked",true);
            $(".combo").val('');
        },'json');
        $("#vtna_inserta_pasajero").fadeOut(300);
        $("#fondooscuro").fadeOut(300);
    });
});

function seleccionar_pasajero(id,pasajero){
    $("#idcliente").val(id);
    $("#cliente").val(pasajero);
    $("#txt_buscar_pasajeros").val('');
    $("#vtna_busca_pasajero").fadeOut(300);
    $("#fondooscuro").fadeOut(300);
}