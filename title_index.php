				<div class="row-fluid">
					<div class="span9"></div>
				</div>
				<div class="row-fluid">
					<div class="span2">
						<a href="./">
							<img class="index_logo" src="admin/images/logo.png">
						</a>
					</div>
					<div class="span10">
						<div class="title" style="margin: 0px auto; margin-top: 20px;">
							<a class="no-pointer-hover" href="./">
								<h1>
									<strong>
										<p style="color: #3B5998; text-align: left ">Sistema Lecto-Escritura</p>
									</strong>
								</h1>
							</a>
						</div>
					</div>
				</div>

				<div class="row-fluid">
					<div class="span12">
						<br>
						<div class="tittle-info">
							<table>
								<tbody>
									<td>
										<p></p>
										<p>Manual de Estudiante</p>
										<p>Descargar Manual AQUI <a href="#" target=_blank><img src="admin/images/icon_descargar_pdf.png" width="35%"></a></p>
									</td>
									<td>
									</td>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<hr style=" margin: 17px 0px 0px 0px">
				<div class="row-fluid">
					<div class="span12">
						<br>
						<div class="tittle-info">
							<table>
								<tbody>
									<td>
										<p style="text-align: center;">
											<img src="admin/images/info.png" width="10%" alt="info-logo">
											<br>
										<div>
											<?php
											$info_query = mysqli_query($con, "select * from content where title  = 'Info-index' ") or die(mysqli_error($con));
											$info_row = mysqli_fetch_array($info_query);
											echo $info_row['content'];
											?>
										</div>
										</p>
									</td>
									<td>
									</td>
								</tbody>
							</table>
						</div>
					</div>
				</div>