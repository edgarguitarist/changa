<div class="span3" id="">
	<div class="row-fluid">
				      <!-- block -->
                        <div id="block_bg" class="block mincon">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><h4><em class="icon-plus-sign"></em> Agregar Descargable</h4></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
						<form id="add_assignment"   method="post" enctype="multipart/form-data">
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Archivo:</label>
                            <div class="controls">
				
									
								<input name="uploaded_file"  class="input-file uniform_on" id="fileInput" type="file" style="box-sizing: content-box;" required />
                         
                                <input type="hidden" name="MAX_FILE_SIZE" value="1048576000" />
                                <input type="hidden" name="id" value="<?php echo $post_id; ?>"/>
                                <input type="hidden" name="get_id" value="<?php echo $get_id; ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                      
                            <div class="controls">
                                <input type="text" name="name" Placeholder="Nombre de Archivo"  class="input" required />
                            </div>
                        </div>
                        <div class="control-group">
                          
                            <div class="controls">
                                <input type="text" name="desc" Placeholder="Descripcion"  class="input" required />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">

                                <button name="Upload" type="submit" value="Upload" class="btn btn-success"><em class="icon-upload-alt"></em>&nbsp;Subir</button>
                            </div>
                        </div>
                    </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
							<script>
			jQuery(document).ready(function($){
				$("#add_assignment").submit(function(e){
					e.preventDefault();
					var _this = $(e.target);
					var formData = new FormData($(this)[0]);
					$.ajax({
						type: "POST",
						url: "upload_assignment.php",
						data: formData,
						success: function(html){
							$.jGrowl("Exito", { header: 'Subido correctamente' });
							window.location = 'submit_assignment.php<?php echo '?id='.$get_id.'&'.'post_id='.$post_id; ?>';
						},
						cache: false,
						contentType: false,
						processData: false
					});
				});
			});
			</script>	
		
						

	</div>
</div>