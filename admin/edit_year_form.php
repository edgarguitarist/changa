   <div class="row-fluid">
     <a href="school_year.php" class="btn btn-info"><em class="icon-arrow-left icon-large"></em> Regresar</a>
     <!-- block -->
     <div class="block mincon">
       <div class="navbar navbar-inner block-header">
         <div class="muted pull-left">Editar Periodo</div>
       </div>
       <div class="block-content collapse in">
         <div class="span12">
           <?php
            $query = mysqli_query($con, "SELECT * from school_year where school_year_id = '$get_id'") or die(mysqli_error($con));
            $row = mysqli_fetch_array($query);
            ?>
           <form method="post">
             <div class="control-group">
               <div class="controls">
                 <input class="input focused" value="<?= $row['school_year']; ?>" name="school_year" id="focusedInput" type="text" placeholder="Periodo" required>
               </div>
             </div>



             <div class="control-group">
               <div class="controls tcenter">
                 <button name="update" class="btn btn-success"><em class="icon-save icon-large"></em></button>

               </div>
             </div>
           </form>
         </div>
       </div>
     </div>
     <!-- /block -->
   </div>
   <?php

    if (isset($_POST['update'])) {

      //$school_year_id = $_POST['school_year_id'];
      $school_year = $_POST['school_year'];

      mysqli_query($con, "UPDATE school_year set school_year = '$school_year' where school_year_id = '$get_id' ") or die(mysqli_error($con));

      //header('location:school_year.php');
    }
    ?>