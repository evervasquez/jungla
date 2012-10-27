// JavaScript Document

$(document).ready(function(){
	$("#menu").kendoMenu();
	$(".datepicker").kendoDatePicker({format: "dd-MM-yyyy"});
	$(".combo").kendoComboBox();
	$("#panelbar").kendoPanelBar({
		expandMode: "single"
	});
        $("#descuento").kendoNumericTextBox({ format: "p" }).data("kendoNumericTextBox");
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

