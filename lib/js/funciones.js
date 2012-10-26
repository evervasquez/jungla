// JavaScript Document

$(document).ready(function(){
	$("#menu").kendoMenu();
	$(".datepicker").kendoDatePicker();
	$(".combo").kendoComboBox();
	$("#panelbar").kendoPanelBar({
		expandMode: "single"
	});
	/*$('body').html5form();*/
        /*$('[placeholder]').focus(function() {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
                input.val('');
                input.removeClass('placeholder');
            }
            }).blur(function() {
            var input = $(this);
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.addClass('placeholder');
                input.val(input.attr('placeholder'));
            }
            }).blur();*/
        /*var options = {};
        if (document.location.search) {
                var array = document.location.search.split('=');
                var param = array[0].replace('?', '');
                var value = array[1];

                if (param == 'animation') {
                        options.animation = value;
                }
                else if (param == 'type_navigation') {
                        if (value == 'dots_preview') {
                                $('.border_box').css({'marginBottom': '40px'});
                                options['dots'] = true;
                                options['preview'] = true;
                        }
                        else {
                                options[value] = true;
                                if (value == 'dots') $('.border_box').css({'marginBottom': '40px'});
                        }
                }
        }

        $('.box_skitter_large').skitter(options);

        // Highlight
        $('pre.code').highlight({source:1, zebra:1, indent:'space', list:'ol'});*/
        
        $("#um").click(function(){
                var pwd = $(this).next().html();
                $("#ventana").fadeIn(300);
                $("#fondooscuro").fadeIn(300);
        });
        $(".close").click(function(){
                $("#ventana").fadeOut(300);
                $("#fondooscuro").fadeOut(300);
        });

});

function soloNumeros(evt){
	evt = (evt) ? evt : event; //Validar la existencia del objeto event
	var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0)); //Extraer el codigo del caracter de uno de los diferentes grupos de codigos
	var respuesta = true; //Predefinir como valido
	if(charCode>31&&(charCode<48||charCode>57)){
		respuesta = false;
	}
	return respuesta;
}
function soloLetras(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
    patron =/[A-Za-z\s]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
} 
function validarCombo(obj){
    if(obj.tipo.value=="0"){alert('Seleccione '+$(obj).attr('name')+''); return 0;}
}
