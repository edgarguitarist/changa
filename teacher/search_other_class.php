<!-- block -->
<div class="block mincon" id="" style="width:auto; max-width:225px !important; min-height:min-content; ">
  <div class="navbar navbar-inner block-header">
    <div id="" class="muted pull-left"><strong>Buscar clases pasadas</strong></div>
  </div>
  <div class="block-content collapse in">
    <div class="span12">
      <form method="post" action="search_class.php">
        <div class="control-group">
          <label>Periodo:</label>
          <div class="controls">
            <select name="school_year" class="span8" required>
              <option></option>
              <?php
              $query = mysqli_query($con, "SELECT * from school_year where status='Activated' order by school_year DESC");
              while ($row = mysqli_fetch_array($query)) {

              ?>
                <option><?php echo $row['school_year']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <button name="search" class="btn btn-info"><em class="icon-search"></em> Buscar</button>

          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /block -->