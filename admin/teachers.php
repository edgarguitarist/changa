<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
    <?php include('navbar.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('sidebar.php'); ?>
            <div class="span3" id="adduser">
                <?php include('add_teacher.php'); ?>
            </div>
            <div class="span6" id="">
                <div class="row-fluid">
                    <!-- block -->
                    <div id="block_bg" class="block mincon">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Lista de Docentes</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form action="delete_teacher.php" method="post">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                        <a data-toggle="modal" href="#teacher_delete" id="delete" class="btn btn-danger" name=""><em class="icon-trash icon-large"></em></a>
                                        <?php include('modal_delete.php'); ?>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Foto</th>
                                                <th>Nombre</th>
                                                <th>Usuario</th>
                                                <th>Teléfono</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $teacher_query = mysqli_query($con, "select * from teacher") or die(mysqli_error($con));
                                            while ($row = mysqli_fetch_array($teacher_query)) {
                                                $id = $row['teacher_id'];
                                                $teacher_stat = $row['teacher_stat'];
                                            ?>
                                                <tr>
                                                    <td width="30">
                                                        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                    </td>
                                                    <td width="40"><img class="img-circle" src="<?php echo $row['location']; ?>" height="50" width="50"></td>
                                                    <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['phone']; ?></td>
                                                    <td width="50"><a href="edit_teacher.php<?php echo '?id=' . $id; ?>" class="btn btn-success"><em class="icon-pencil"></em></a></td>
                                                    <?php if ($teacher_stat == "Activated") { ?>
                                                        <td width="120"><a href="de_activate.php<?php echo '?id=' . $id; ?>" class="btn btn-danger"><em class="icon-remove"></em> Desactivar</a></td>
                                                    <?php } else { ?>
                                                        <td width="120"><a href="a_activate.php<?php echo '?id=' . $id; ?>" class="btn btn-success"><em class="icon-check"></em> Activar</a></td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>


            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
    <?php include('script.php'); ?>
</body>

</html>