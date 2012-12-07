 $(document).ready(function() {
    $('#panelrg').kendoPanelBar({
        expandMode: "single"
    });
});
 function cargar_php(pagina,capa){
        $('#'+capa).toggle();
        $('#'+capa).load("/jungla/reportes_graficos/"+pagina,function(){
            $('#'+capa).show("slow");
        });
    }
