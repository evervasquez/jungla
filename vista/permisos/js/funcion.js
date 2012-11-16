$(document).ready(function(){
    $("#perfil").focus();
    $("#div_modulos").hide();
    $("#perfil").change(function(){
        $(document).find(':checkbox').attr('checked',false);
        if($(this).val()==''){
            $("#div_modulos").hide("slow");
        }else{
            $.post('/sisjungla/permisos/get_permisos','idperfil='+$(this).val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $("#"+datos[i].idmodulo).attr('checked','checked');
                }
            },'json');
            $("#div_modulos").slideDown("slow");
        }            
    });
    $("input:checkbox").click(function(){
        if(this.checked){
            $.post('/sisjungla/permisos/inserta_permiso','idperfil='+$("#perfil").val()+'&idmodulo='+$(this).val())
        }else{
            $.post('/sisjungla/permisos/elimina_permiso','idperfil='+$("#perfil").val()+'&idmodulo='+$(this).val())
        }
        
    });
});