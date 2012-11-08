    $(function() {    
    $( "#descripcion" ).focus(); 
    $( "#saveform" ).click(function(){
        bval = true;        
        bval = bval && $( "#descripcion" ).required();
        bval = bval && $( "#descuento" ).required(); 
        bval = bval && $( "#fechaini" ).required();
        bval = bval && $( "#fechafin" ).required();     
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});