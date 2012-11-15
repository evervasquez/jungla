 $(document).ready(function() {
    $('#panelrg').kendoPanelBar({
        expandMode: "single"
    });
});
 function cargar_php(pagina,capa){
        $('#'+capa).toggle();
        $('#'+capa).load("/sisjungla/reportes_graficos/"+pagina,function(){
            $('#'+capa).show("slow");
        });
    }
