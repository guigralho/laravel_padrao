	/* ============================================================
	 * DataTables
	 * Generate advanced tables with sorting, export options using
	 * jQuery DataTables plugin
	 * For DEMO purposes only. Extract what you need.
	 * ============================================================ */
	(function($) {

		'use strict';

		var responsiveHelper = undefined;
		var breakpointDefinition = {
			tablet: 1024,
			phone: 480
		};

		// Initialize datatable showing a search box at the top right corner
		var initTableWithSearch = function() {
			var table = $('#tableWithSearch');

			var settings = {
				"sDom": "<'table-responsive't><'row'<p i>>",
				"sPaginationType": "bootstrap",
				"destroy": true,
				"scrollCollapse": true,
				"oLanguage": {
					"sLengthMenu": "_MENU_ ",
					"sInfo": "Exibindo <b>_START_ - _END_</b> de _TOTAL_ itens"
				},
				"iDisplayLength": 15
			};

			table.dataTable(settings);

			// search box for table
			$('#search-table').keyup(function() {
				table.fnFilter($(this).val());
			});
		}

		// Initialize datatable with ability to add rows dynamically
		var initTableWithDynamicRows = function() {
			var table = $('#tableWithDynamicRows');


			var settings = {
				"sDom": "<'table-responsive't><'row'<p i>>",
				"sPaginationType": "bootstrap",
				"destroy": true,
				"scrollCollapse": true,
				"oLanguage": {
					"sLengthMenu": "_MENU_ ",
					"sInfo": "Exibindo <b>_START_ - _END_</b> de _TOTAL_ itens"
				},
				"iDisplayLength": 15
			};


			table.dataTable(settings);

			$('#show-modal').click(function() {
				$('#addNewAppModal').modal('show');
			});

			$('#add-app').click(function() {
				table.dataTable().fnAddData([
					$("#appName").val(),
					$("#appDescription").val(),
					$("#appPrice").val(),
					$("#appNotes").val()
				]);
				$('#addNewAppModal').modal('hide');

			});
		}

		// Initialize datatable showing export options
		var initTableWithExportOptions = function() {
			var table = $('#tableWithExportOptions');
			
			var settings = {
				"sDom": "<'exportOptions'T><'table-responsive't><'row'<p i>>",
				"sPaginationType": "bootstrap",
				"destroy": true,
				"scrollCollapse": true,
				"oLanguage": {
					"sEmptyTable": "Nenhum registro encontrado",
					"sInfo": "Exibindo de _START_ até _END_ de _TOTAL_ registros",
					"sInfoEmpty": "Exibindo 0 até 0 de 0 registros",
					"sInfoFiltered": "(Filtrados de _MAX_ registros)",
					"sInfoPostFix": "",
					"sInfoThousands": ".",
					"sLengthMenu": "_MENU_ resultados por página",
					"sLoadingRecords": "Carregando...",
					"sProcessing": "Processando...",
					"sZeroRecords": "Nenhum registro encontrado",
					"sSearch": "Pesquisar",
					"oPaginate": {
						"sNext": "Próximo",
						"sPrevious": "Anterior",
						"sFirst": "Primeiro",
						"sLast": "Último"
					},
					"oAria": {
						"sSortAscending": ": Ordenar colunas de forma ascendente",
						"sSortDescending": ": Ordenar colunas de forma descendente"
					}
				},
				"iDisplayLength": 15,
				"oTableTools": {
					"sSwfPath": '<?php echo $this->base;?>'+"/js/jquery-datatable/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
					"aButtons": [{
						"sExtends": "csv",
						"sButtonText": "<i class='pg-grid'></i>",
					}, {
						"sExtends": "xls",
						"sButtonText": "<i class='fa fa-file-excel-o'></i>",
					}, {
						"sExtends": "pdf",
						"sButtonText": "<i class='fa fa-file-pdf-o'></i>",
					}, {
						"sExtends": "copy",
						"sButtonText": "<i class='fa fa-copy'></i>",
					}]
				},

				fnDrawCallback: function(oSettings) {
					$('.export-options-container').append($('.exportOptions'));

					$('#ToolTables_tableWithExportOptions_0').tooltip({
						title: 'Exportar em CSV',
						container: 'body'
					});

					$('#ToolTables_tableWithExportOptions_1').tooltip({
						title: 'Exportar em Excel',
						container: 'body'
					});

					$('#ToolTables_tableWithExportOptions_2').tooltip({
						title: 'Exportar em PDF',
						container: 'body'
					});

					$('#ToolTables_tableWithExportOptions_3').tooltip({
						title: 'Copiar dados',
						container: 'body'
					});
				},
				
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select><option value=""></option></select>')
							.appendTo( $(column.footer()).empty() )
							.on( 'change', function () {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);

								column
									.search( val ? '^'+val+'$' : '', true, false )
									.draw();
							});

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						});
					});
				}
			};


			table.dataTable(settings);
			
			$('#search-table').keyup(function() {
				table.fnFilter($(this).val());
			});
		}

		// Initialize datatable showing export options
		var initTableWithExportOptionsNoPages = function() {
			var table = $('#tableWithExportOptionsNoPages');
			
			var settings = {
				"sDom": "<'exportOptions'T><'table-responsive't><'row'<p i>>",
				"sPaginationType": "bootstrap",
				"destroy": true,
				"scrollCollapse": true,
				"oLanguage": {
					"sEmptyTable": "Nenhum registro encontrado",
					"sInfo": "Exibindo de _START_ até _END_ de _TOTAL_ registros",
					"sInfoEmpty": "Exibindo 0 até 0 de 0 registros",
					"sInfoFiltered": "(Filtrados de _MAX_ registros)",
					"sInfoPostFix": "",
					"sInfoThousands": ".",
					"sLengthMenu": "_MENU_ resultados por página",
					"sLoadingRecords": "Carregando...",
					"sProcessing": "Processando...",
					"sZeroRecords": "Nenhum registro encontrado",
					"sSearch": "Pesquisar",
					"oPaginate": {
						"sNext": "Próximo",
						"sPrevious": "Anterior",
						"sFirst": "Primeiro",
						"sLast": "Último"
					},
					"oAria": {
						"sSortAscending": ": Ordenar colunas de forma ascendente",
						"sSortDescending": ": Ordenar colunas de forma descendente"
					}
				},
				"paging": false,
				"iDisplayLength": -1,
				"oTableTools": {
					"sSwfPath": '<?php echo $this->base;?>'+"/js/jquery-datatable/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
					"aButtons": [{
						"sExtends": "csv",
						"sButtonText": "<i class='pg-grid'></i>",
					}, {
						"sExtends": "xls",
						"sButtonText": "<i class='fa fa-file-excel-o'></i>",
					}, {
						"sExtends": "pdf",
						"sButtonText": "<i class='fa fa-file-pdf-o'></i>",
					}, {
						"sExtends": "copy",
						"sButtonText": "<i class='fa fa-copy'></i>",
					}]
				},

				fnDrawCallback: function(oSettings) {
					$('.export-options-container').append($('.exportOptions'));

					$('#ToolTables_tableWithExportOptions_0').tooltip({
						title: 'Exportar em CSV',
						container: 'body'
					});

					$('#ToolTables_tableWithExportOptions_1').tooltip({
						title: 'Exportar em Excel',
						container: 'body'
					});

					$('#ToolTables_tableWithExportOptions_2').tooltip({
						title: 'Exportar em PDF',
						container: 'body'
					});

					$('#ToolTables_tableWithExportOptions_3').tooltip({
						title: 'Copiar dados',
						container: 'body'
					});
				}
			};


			table.dataTable(settings);
			
			$('#search-table').keyup(function() {
				table.fnFilter($(this).val());
			});
		}

		initTableWithSearch();
		initTableWithDynamicRows();
		initTableWithExportOptions();
		initTableWithExportOptionsNoPages();

	})(window.jQuery);