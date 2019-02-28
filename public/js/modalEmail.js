// JavaScript Document
function enviarEmail(){

	string =  '<div class="modal fade stick-up" id="modalStickUpSmall" tabindex="-1" role="dialog" aria-hidden="true">'+
				      '<div class="modal-dialog modal-sm">'+
				        '<div class="modal-content-wrapper">'+
				          '<div class="modal-content">'+
				            '<div class="modal-header clearfix text-left">'+
				              '<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>'+
				              '</button>'+
				              '<h5>Deseja enviar um email para o cliente?</h5>'+
				            '</div>'+
				            '<div class="modal-body">'+
				              '<p class="no-margin">Importante: essa ação não poderá ser desfeita</p>'+
				            '</div>'+
				            '<div class="modal-footer">'+
				              '<button type="button" id="finalizar" class="btn btn-success btn-cons   pull-left inline" >Enviar</button>'+
				              '<button id="naoEnviar" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Não enviar</button>'+
				            '</div>'+
				          '</div>'+
				        '</div>'+
				      '</div>'+
				    '</div>';

	$(string).modal("show");
}


