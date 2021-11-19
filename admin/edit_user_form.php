   <div class="row-fluid">
     <a href="admin_user.php" class="btn btn-info"><em class="icon-plus-sign icon-large"></em> Añadir Usuario</a>
     <!-- block -->
     <div class="block mincon">
       <div class="navbar navbar-inner block-header">
         <div class="muted pull-left">Edit User</div>
       </div>
       <div class="block-content collapse in">
         <div class="span12">
           <?php
            $query = mysqli_query($con, "select * from users where user_id = '$get_id'") or die(mysqli_error($con));
            $row = mysqli_fetch_array($query);
            ?>
           <form method="post">
             <div class="control-group">
               <div class="controls">
                 <input class="input focused" value="<?php echo $row['firstname']; ?>" name="firstname" id="focusedInput" type="text" placeholder="Nombre" required>
               </div>
             </div>

             <div class="control-group">
               <div class="controls">
                 <input class="input focused" value="<?php echo $row['lastname']; ?>" name="lastname" id="focusedInput" type="text" placeholder="Apellido" required>
               </div>
             </div>

             <div class="control-group">
               <div class="controls">
                 <input class="input focused" value="<?php echo $row['username']; ?>" name="username" id="focusedInput" type="text" placeholder="Usuario" required>
               </div>
             </div>

             <div class="control-group">
               <div class="controls">
                 <input class="input focused" value="<?php echo $row['password']; ?>" name="password" id="focusedInput" type="password" placeholder="Contraseña" required>
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

      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $username = $_POST['username'];
      $password = $_POST['password'];


      mysqli_query($con, "update users set username = '$username'  , firstname = '$firstname' , lastname = '$lastname', password = '$password' where user_id = '$get_id' ") or die(mysqli_error($con));

      mysqli_query($con, "insert into activity_log (date,username,action) values(NOW(),'$user_username','Edit User $username')") or die(mysqli_error($con));
    ?>
     <script>
       window.location = "admin_user.php";
     </script>
   <?php
    }
    ?>