function cargar_php(pagina,capa){
    $(document).ready(function() {
            $('#'+capa).toggle();
            $('#'+capa).load("/sisjungla/reportes_graficos/"+pagina,function(){
                $('#'+capa).show("slow");
            });
          
    });  
    }