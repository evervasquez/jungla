$(document).ready(function(){
    $("#perfil").focus();
    $("#div_modulos").hide();
    $("#celda_aceptar").hide();
    $("#perfil").change(function(){
        $(document).find(':checkbox').attr('checked',false);
        if($(this).val()==0){
            $("#div_modulos").hide("slow");
            $("#celda_aceptar").hide();
        }else{
            $.post('/jungla/permisos/get_permisos','idperfil='+$(this).val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $("#"+datos[i].IDMODULO).attr('checked','checked');
                }
                $("#celda_aceptar").show();
            },'json');
            $("#div_modulos").slideDown("slow");
        }            
    });
    
//    $(".padre").live('click',function(){
//        if($(this).is(":checked")){
//            x=$(this).children("input:checkbox").find(":eq(0)").val();
//            alert(x);
//            $(this).children("input:checkbox").each(function(x, y) {
//                alert('x');
//                if($(this).children("input:checkbox").is(":checked")){
//                    alert('1');
//                }else{
//                    alert('0');
//                }
//            });
//        }else{
//        }
//    });
    
    $("input:checkbox [class!=padre]").click(function(){
        if(this.checked){
            $.post('/jungla/permisos/inserta_permiso','idperfil='+$("#perfil").val()+'&idmodulo='+$(this).val())
        }else{
            $.post('/jungla/permisos/elimina_permiso','idperfil='+$("#perfil").val()+'&idmodulo='+$(this).val())
        }
    });
});