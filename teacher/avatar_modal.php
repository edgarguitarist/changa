<!-- Modal -->
<div id="myModal" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#ffffff; opacity:0.7">x</button>
        <h4 class="modal-title" id="exampleModalLabel">Cambiar imagen de perfil <?php //echo $student_name;?> </h4>
       
        
      </div>
      <div class="modal-body">
        
		<form method="post" action="teacher_avatar.php" enctype="multipart/form-data">
							<center>	
								<div class="control-group">
								<div class="controls">
									<label for="fileInput">Seleccione una nueva imagen para su perfil.</label>
									<input style="width:60%" name="image" class="input-file uniform_on" id="fileInput" type="file" accept="image/*" required>
								</div>
								</div>
							</center>				
					
		
    </div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><em class="icon-remove icon-large"></em> Cerrar</button>
		<button class="btn btn-info" name="change"><em class="icon-save icon-large"></em> Guardar</button>
		</form>
	</div>
  </div>
</div>
</div>
<!-- end  Modal -->