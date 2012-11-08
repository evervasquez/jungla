$(function() {    
    $( "#descripcion" ).focus(); 
    $( "#saveform" ).click(function(){
        bval = true;        
        bval = bval && $( "#descripcion" ).required(); 
        bval = bval && $( "#nro_elemento" ).required();      
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});