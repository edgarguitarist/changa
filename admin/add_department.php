   <div class="row-fluid">
       <!-- block -->
       <div class="block mincon">
           <div class="navbar navbar-inner block-header">
               <div class="muted pull-left">Añadir Paralelo</div>
           </div>
           <div class="block-content collapse in">
               <div class="span12">
                   <form method="post">
                       <div class="control-group">
                           <div class="controls">
                               <input class="input focused" id="focusedInput" name="d" type="text" placeholder="Paralelo">
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <input class="input focused" id="focusedInput" name="pi" type="text" placeholder="Persona Encargada">
                           </div>
                       </div>


                       <div class="control-group">
                           <div class="controls tcenter">
                               <button name="save" class="btn btn-info"><em class="icon-plus-sign icon-large"></em></button>

                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
       <!-- /block -->
   </div>

   <?php
    if (isset($_POST['save'])) {
        $pi = $_POST['pi'];
        $d = $_POST['d'];


        $query = mysqli_query($con, "select * from department where department_name = '$d' and dean = '$pi' ") or die(mysqli_error($con));
        $count = mysqli_num_rows($query);

        if ($count > 0) { ?>
           <script>
               alert('Data Already Exist');
           </script>
       <?php
        } else {
            mysqli_query($con, "insert into department (department_name,dean) values('$d','$pi')") or die(mysqli_error($con));
        ?>
           <script>
               window.location = "department.php";
           </script>
   <?php
        }
    }
    ?>