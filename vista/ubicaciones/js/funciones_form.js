    $(function() {    
    $( "#descripcion" ).focus(); 
    $( "#saveform" ).click(function(){
        bval = true;        
        bval = bval && $( "#descripcion" ).required();  
        bval = bval && $( "#almacen" ).required();     
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});