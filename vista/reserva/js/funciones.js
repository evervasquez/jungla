$(document).ready(function(){
    $("#vtna_busca_pasajero").hide();
    
    //salir
    function salir(){
        $("#txt_buscar_pasajeros").val('');
        $("#vtna_busca_pasajero").fadeOut(300);
        $("#fondooscuro").fadeOut(300);
    }
    
    //ventana de busqueda de clientes
    $("#btn_vtna_busca_pasajeros").click(function(){
        buscar_pasajeros();
        $("#vtna_busca_pasajero").fadeIn(300);
        $("#txt_buscar_pasajeros").focus();
    });
    
     $(".cancelar").click(function(){
        salir();
    });
    
    $("#txt_buscar_pasajeros").keypress(function(event){
       if(event.which == 13){
           buscar_pasajeros();
       } 
    });
    
    $("#btn_vtna_busca_pasajeros").click(function(){
        buscar_pasajeros();
        $("#txt_buscar_pasajeros").focus();
    });
    
    function buscar_pasajeros(){
        $.post('/sisjungla/pasajeros/buscador','cadena='+$("#txt_buscar_pasajeros").val()+'&filtro='+$("#filtro_pasajeros").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla" id="tbl_busca_pasajeros">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Nombre/Razon Social</th>'+
                            '<th>DNI/RUC</th>'+
                            '<th>Direccion</th>'+
                            '<th>Seleccionar</th>'+
                        '</tr>';
            for(var i=0;i<datos.length;i++){
                id=datos[i].idcliente;
                if(datos[i].apellidos != null){
                    pasajero=datos[i].nombres+' '+datos[i].apellidos;
                }else{
                    pasajero=datos[i].nombres;
                }
                HTML = HTML + '<tr>';
                HTML = HTML + '<td>'+id+'</td>';
                HTML = HTML + '<td>'+pasajero+'</td>';
                HTML = HTML + '<td>'+datos[i].documento+'</td>';
                HTML = HTML + '<td>'+datos[i].direccion+'</td>';
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
    
    //asignar pasajero al detalle estadía
    $("#asignar_pasajero").click(function(){
        idp=$("#idcliente").val();
        p=$("#cliente").val();
        idh=$("#habitacion").val();
        h=$("#habitacion option:selected").html(); 
        error= false;
        msg='';
        if(p==''){
            alert('Seleccione o inserte pasajero');
            return 0;
        }
        
        if(idh==''){
            alert('Seleccione la habitacion del pasajero');
            return 0;
        }
        x=0;
        $("#detalle_estadia tr").each(function(){
            id_p = $("#detalle_estadia tr:eq("+x+") td:eq(0) :input").val();
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
            html=html+"<td><input type='hidden' name='idpasajero[]' value='"+idp+"'/>"+p+"</td>";
            html=html+"<td><input type='hidden' name='idhabitacion[]' value='"+idh+"'/>"+h+"</td>";
            html=html+"<td><input type='radio' name='representante' /></td>";
            html=html+'<td><a class="imgdelete eliminar" title="Eliminar item" href="javascript:"></a></td>';
            html=html+"</tr>";

            $("#detalle_estadia").append(html);
            $("#habitacion option:eq(0)").attr('selected',true);
            $("#habitacion").kendoComboBox();
            $("#idpasajero").val('');
            $("#cliente").val('');
            $("#idcliente").val('');
        }
    });
    
    $(".eliminar").live('click', function() {
       i = $(this).parent().parent().index();
       $("#detalle_estadia tr:eq("+i+")").remove();
   });
   
});

function seleccionar_pasajero(id,pasajero){
    $("#idcliente").val(id);
    $("#cliente").val(pasajero);
    $("#txt_buscar_pasajeros").val('');
    $("#vtna_busca_pasajero").fadeOut(300);
    $("#fondooscuro").fadeOut(300);
}