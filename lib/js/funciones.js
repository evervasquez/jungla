// JavaScript Document

$(document).ready(function(){
	$("#menu").kendoMenu();
	$(".datepicker").kendoDatePicker({format: "dd-MM-yyyy"});
	$(".combo").kendoComboBox();
//        $("#regiones").kendoComboBox();
	$("#panelbar").kendoPanelBar({
		expandMode: "single"
	});
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 6
            },
            pageable: true
        });
        $(".tabtr").css("width","10%");
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
                $("#des_um").css('border','solid 1px #CCC');
                $("#abreviatura_um").css('border','solid 1px #CCC');
        });
        $("#btn_asignar_tipo_habitacion").click(function(){
                var pwd = $(this).next().html();
                $("#ventana_tipo_habitacion").fadeIn(300);
                $("#fondoclaro").fadeIn(300);
        });
        $("#cancela_tmphabitacion").click(function(){
                $("#ventana_tipo_habitacion").fadeOut(300);
                $("#fondoclaro").fadeOut(300);
        });
});

