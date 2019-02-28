$(document).ready(function() {
	$("#CustomerTel").mask("(99) 9999-9999");
	$("#CustomerTel2").mask("(99) 9999-9999");
	$("#CustomerFax").mask("(99) 9999-9999");
	$("#CustomerDocumento").mask("99.999.999/9999-99");
	$("#CustomerCep").mask('99999-999');
	$(".cpf").mask('999.999.999-99');

	if ($("#CustomerSite").val() == '') {
		$("#CustomerSite").val('http://www');
	}


	$("#CustomerDocumento").on("focusout", function(){
    var documento = $(this).val();					
    var el = $(this);

    if (documento) {
      $.ajax({
        url: base_url+"/customers/validador_documento/",
        type: "post",
        data: {documento : documento},
        dataType: "json",
        beforeSend: function(xhr){
          el.parent().parent().find(".error").remove();
        },
        success: function(data){
          if(!data.success){
            el.parent().parent().append('<span class="error">Informe um CNPJ válido.</span>');
            $("#desconto_bt").attr("disabled", true);
          } else {
       	    el.parent().parent().find(".error").remove();
            $("#desconto_bt").removeAttr("disabled", true);
          }
        }
      });
    };
  });


	$("#CustomerCep").on("change", function(){
		var el = $(this);
		var cep = $(this).val();
		var endereco = $("#CustomerAddress");
		var bairro = $("#CustomerDistrict");
		var cidade = $("#CustomerCity");
		var estado = $("#CustomerState");

		cep = cep.replace('-', '');

		get_cep_ajax(el, cep, endereco, bairro, cidade, estado)
	});
});

function validarCNPJ(str) {

 str = str.replace('.','');
   str = str.replace('.','');
   str = str.replace('.','');
   str = str.replace('-','');
   str = str.replace('/','');
   cnpj = str;
   var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
   digitos_iguais = 1;
   if (cnpj.length < 14 && cnpj.length < 15)
       return false;
   for (i = 0; i < cnpj.length - 1; i++)
       if (cnpj.charAt(i) != cnpj.charAt(i + 1))
   {
       digitos_iguais = 0;
       break;
   }
   if (!digitos_iguais)
   {
       tamanho = cnpj.length - 2
       numeros = cnpj.substring(0,tamanho);
       digitos = cnpj.substring(tamanho);
       soma = 0;
       pos = tamanho - 7;
       for (i = tamanho; i >= 1; i--)
       {
           soma += numeros.charAt(tamanho - i) * pos--;
           if (pos < 2)
               pos = 9;
       }
       resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
       if (resultado != digitos.charAt(0))
           return false;
       tamanho = tamanho + 1;
       numeros = cnpj.substring(0,tamanho);
       soma = 0;
       pos = tamanho - 7;
       for (i = tamanho; i >= 1; i--)
       {
           soma += numeros.charAt(tamanho - i) * pos--;
           if (pos < 2)
               pos = 9;
       }
       resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
       if (resultado != digitos.charAt(1))
           return false;
       return true;
   } else {
     return false;
   }
}

function get_cep_ajax(el, cep, endereco, bairro, cidade, estado){
	$.ajax({
		url: base_url+"/auth/get_cep/",
		type: "post",
		data: {cep : cep},
		dataType: "json",
		beforeSend: function(){
			el.parent().find('.input-group-addon').find('i').removeClass().addClass('fa fa-spin fa-spinner');
		},
		success: function(data){
			el.parent().find('.input-group-addon').find('i').removeClass().addClass('fa fa-map-marker');
			$(".error").remove();

			if (data.length != 0) {
				endereco.val(data.CepbrEndereco.tipo_logradouro+' '+data.CepbrEndereco.logradouro);
				bairro.val(data.CepbrBairro.bairro);
				cidade.val(data.CepbrCidade.cidade);
				estado.val(data.CepbrCidade.uf);
        estado.select2();
			} else {
				endereco.val('');
				bairro.val('');
				cidade.val('');
				estado.val('');
				el.parent().parent().append('<span class="error">Informe um CEP válido.</span>');
			}

			$('#CustomerEstado').select2();
		},
		error: function(){
			el.parent().find('.input-group-addon').find('i').removeClass().addClass('fa fa-map-marker');
			$(".error").remove();
			el.parent().parent().append('<span class="error">Algo deu errado! Tente outra vez</span>');
		}
	});
}