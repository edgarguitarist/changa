<!-- block -->
<div class="block mincon" id="" style="width:auto; max-width:225px !important; min-height:min-content; ">
  
  <div class="block-content collapse in">
    <div class="span12">
      <form method="post" action="enroll_class_data.php">
        <div class="control-group">
          <h4>Matricularme</h4>
          <div class="controls">
            <input type="text" class="span12" name="classCode" placeholder="Codigo de clase" required>
            <input type="hidden" class="span12" name="id_student"  value="<?= $_SESSION['id']?>" required>
            
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <button type="submit" name="search" class="btn btn-info"><em class="icon-check "></em> Unirme</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /block -->