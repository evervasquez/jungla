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
                pageSize: 5
            },
            pageable: true
        });
        $("#descuento").kendoNumericTextBox({
            format: "p0",
            min: 0,
            max: 1,
            step: 0.01
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

