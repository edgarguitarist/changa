<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
	<?php include('navbar.php') ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('sidebar.php'); ?>

			<!--/span-->
			<div class="span9" id="content">
				<div id="block_bg" class="block mincon">

					<div class="block-content collapse in">
						<div class="span12">
							<!-- block -->
							<div class="navbar navbar-inner block-header">
								<div class="muted pull-left">Copia de Seguridad</div>
							</div>
							<div>
<br>
								<a class="btn btn-success f-20 p-10" href="backup_script.php" id="sss">
									<!-- <img src="images/backup.png" alt="backup" /> -->
									<i class="fas fa-database"></i>	Click aqui para Respaldar la Base de Datos.
								</a>
								<br>
								<br>
								<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<thead>
									<tr>
										<td>
											Archivo
										</td>
										<td style='padding-left: 20px;'>
											Acción
										</td>
									</tr>
									</thead>
									<tbody>
									<?php
									// List the files
									$dir = opendir("./DB_backup");
									while (false !== ($file = readdir($dir))) {

										// Print the filenames that have .sql extension
										if (strpos($file, '.sql', 1)) {

											// Remove the sql extension part in the filename
											$filenameboth = str_replace('.sql', '', $file);

											// Print the cells

											echo "<tr id='eee'>";
											echo '<td>' . $filenameboth . ".sql" . '</td>';
											echo "<td style='padding-left: 20px;'>" . "<a href='DB_backup/" . $filenameboth . ".sql' class='view'><i class='fas fa-download'></i> Descargar SQL</a>" . "</td>";
											echo "</tr>";
										}
									}
									?>
									</tbody>
								</table>

							</div>
						</div>


						<!-- block -->

					</div>
				</div>
			</div>
		</div>

		<?php include('footer.php'); ?>
	</div>
	<?php include('script.php'); ?>

</body>

</html>