<div class="row-fluid">
	<!-- block -->
	<div class="block mincon">
		<div class="navbar navbar-inner block-header">
			<div class="muted pull-left">Agregar Juego</div>
		</div>
		<div class="block-content collapse in">
			<div class="span12">
				<form id="add_student" method="post">

					
				</form>
			</div>
		</div>
	</div>
	<!-- /block -->
</div>


<script>
	jQuery(document).ready(function($) {
		$("#add_student").submit(function(e) {
			e.preventDefault();
			var _this = $(e.target);
			var formData = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "save_games.php",
				data: formData,
				success: function(html) {
					$.jGrowl("Juego agregado exitosamente", {
						header: 'Juego agregado'
					});
					$('#studentTableDiv').load('games_table.php', function(response) {
						$("#studentTableDiv").html(response);
						$('#example').dataTable({
							"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
							"sPaginationType": "bootstrap",
							"oLanguage": {
								"sLengthMenu": "_MENU_ Registros por pagina"
							}
						});
						$(_this).find(":input").val('');
						$(_this).find('select option').attr('selected', false);
						$(_this).find('select option:first').attr('selected', true);
					});
				}
			});
		});
	});
</script>