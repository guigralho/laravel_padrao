$(document).ready(function(){
	$("form").on("submit", function(){
	   var $el = $(".js-salvar");

	   $el.button('loading');

	   setTimeout(function(){$el.button('reset')},4000);
	});

	$(".sub-menu").each(function(index, el) {
	   if ($(this).find('li.active').length == 1) {
	      $(this).parent().addClass('active open');
	   }
	});

	$(".menu-items").each(function(index, el) {
	   if ($(this).find('li.active').length == 1) {
	      $(this).find('li.active').find('.icon-thumbnail').addClass('icone-ativado');
	   }
	});

	$('.money_format').maskMoney({
		decimal: ',',
		thousands: '.',
		precision: 2
	});

	$('.percent_format').maskMoney({
		decimal: '.',
		thousands: '',
		precision: 2
	});

    $(".cellphone_mask").focusout(function(){
        var phone, element;
        element = $(this);
        element.unmask();
        phone = element.val().replace(/\D/g, '');
        if(phone.length > 10) {
            element.mask("(99) 99999-999?9");
        } else {
            element.mask("(99) 9999-9999?9");
        }
    }).trigger('focusout');

    $(".phone_mask").mask("(99) 9999-9999");
    $(".zip_code_mask").mask("99999-999");
    $(".date_mask").mask("99/99/9999");
    $(".state_mask").mask("aa");

	$(".datepicker").attr("autocomplete", false);
	$(".datepicker").datepicker({format: 'dd/mm/yyyy', weekStart: 1, autoclose: true, language: "pt-BR", todayHighlight: true, toggleActive: true, orientation: "bottom auto",daysOfWeekHighlighted: "0,6"});
	$(".input-daterange").datepicker({format: 'dd/mm/yyyy', multidate: false, weekStart: 1, autoclose: true, language: "pt-BR", todayHighlight: true, toggleActive: true, orientation: "auto",daysOfWeekHighlighted: "0,6"});

    $(".get_cep").on('change', function() {
        var el = $(this);

        get_cep(el);
    });

    $(".btn-cep").on('click', function() {
        var el = $('.cep');

        get_cep(el);
    });
})

$(function() {
    var icon         = $('.upload-profile-image'),
        form         = $('#upload-profile-form'),
        input        = $('#upload-profile-input');

    icon.click(function(e) {
        e.preventDefault();
        input.click();
    });

    input.change(function() {
        waiting_layer('Carregando', 5000);
        form.submit();
    });
});

function get_cep(el){
    el.parent().parent().find('i').removeClass('fa-map-marker').addClass('fa-spinner fa-spin');
    if(el.val() != '') {
        $.getJSON('https://api.postmon.com.br/v1/cep/' + el.val())
        .success(function(data) {
            el.parent().parent().find('i').removeClass('fa-spinner fa-spin').addClass('fa-map-marker');
            $(".endereco").val(data["logradouro"]);
            $(".bairro").val(data["bairro"]);
            $(".cidade").val(data["cidade"]);
            $(".estado").val(data["estado"]);
        }).error(function(data) {
            el.parent().parent().find('i').removeClass('fa-spinner fa-spin').addClass('fa-map-marker');
            alert('Informe um CEP válido.');
        });
    }
}

function waiting_layer(text, time){
   waitingDialog.show(text);

   if (time) {
      setTimeout(function () {
         waitingDialog.hide();
      }, time);
   };
}