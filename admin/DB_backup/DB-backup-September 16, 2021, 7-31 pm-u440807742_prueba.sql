

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  PRIMARY KEY (`activity_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_question_id` int(11) NOT NULL,
  `answer_text` varchar(100) NOT NULL,
  `choices` varchar(3) NOT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO answer VALUES("1","1","","A");
INSERT INTO answer VALUES("2","1","","B");
INSERT INTO answer VALUES("3","1","","C");
INSERT INTO answer VALUES("4","1","","D");
INSERT INTO answer VALUES("5","2","","A");
INSERT INTO answer VALUES("6","2","","B");
INSERT INTO answer VALUES("7","2","","C");
INSERT INTO answer VALUES("8","2","","D");





CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL AUTO_INCREMENT,
  `floc` varchar(300) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  PRIMARY KEY (`assignment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO assignment VALUES("1","5420_File_230134141_326326145897016_323880411958097064_n.jpg","2021-08-14 15:35:33","asdasdasd","9","1","asdasd");
INSERT INTO assignment VALUES("2","3214_File_boy.png","2021-08-14 15:37:29","ggggggggggg","9","1","asdasdasdsddd");
INSERT INTO assignment VALUES("3","1759_File_Screenshot_2019-06-24-13-23-46.png","2021-08-14 16:04:24","vvvvvvvvvv","9","1","sdfsdfsdf");





CREATE TABLE `avisos` (
  `avisos_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_aviso` varchar(100) NOT NULL,
  `contenido` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  `tiempo` int(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  PRIMARY KEY (`avisos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO avisos VALUES("13","Bienvenido al Sistema Lecto-Escritura","<p><img alt=\"\" src=\"http://localhost/Sistema_Chang/admin/images/fondo.jpeg\" style=\"height:576px; width:597px\" /></p>
","2020-04-19 09:02:14","200","Inactivo");





CREATE TABLE `class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(100) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

INSERT INTO class VALUES("101","Quinto");





CREATE TABLE `class_quiz` (
  `class_quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_class_id` int(11) NOT NULL,
  `quiz_time` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `fecha_p` datetime NOT NULL,
  PRIMARY KEY (`class_quiz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO class_quiz VALUES("1","1","60","1","2021-08-14 17:33:00");





CREATE TABLE `class_subject_overview` (
  `class_subject_overview_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_class_id` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL,
  PRIMARY KEY (`class_subject_overview_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `content` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO content VALUES("1","Mission","<pre>
<span style=\"font-size:16px\"><strong>Misi&oacute;n</strong></span><span style=\"font-size:large\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><span style=\"font-family:sans-serif,arial,verdana,trebuchet ms\">&nbsp; &nbsp;</span><span style=\"font-family:sans-serif,arial,verdana,trebuchet ms; font-size:18px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></pre>

<p><span style=\"color:rgb(33, 33, 33); font-family:arial,sans-serif; font-size:16px\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ldquo;Mision de la instituci&oacute;n&rdquo;.</span></p>
");
INSERT INTO content VALUES("2","Vision","<pre>
<span style=\"font-size:large\"><strong>Visi&oacute;n</strong></span></pre>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-size:large\">&nbsp;&nbsp;</span><span style=\"color:rgb(33, 33, 33); font-family:arial,sans-serif; font-size:16px\">&quot;Vision de la instituci&oacute;n&quot;</span></p>

<p>&nbsp;</p>
");
INSERT INTO content VALUES("3","History","<pre>
<span style=\"font-size:large\">HISTORIA &nbsp;</span> </pre>

<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UNEPAT (Unidad Educativa Carlos Julio Arosemena Tola) <a href=\"https://www.facebook.com/unepatoficial/?ref=page_internal\">Facebook</a>.</p>
");
INSERT INTO content VALUES("4","Footer","<p style=\"text-align:center\">Sistema&nbsp;Lecto-Escritura</p>

<p style=\"text-align:center\">Derechos Reservados &reg;2021</p>
");
INSERT INTO content VALUES("5","Proximos Eventos","<pre>
PROXIMOS EVENTOS</pre>

<p><strong>&gt;</strong>&nbsp;APERTURA</p>

<p><strong>&gt;</strong>&nbsp;INCIO DE CLASES</p>

<p><strong>&gt;</strong>&nbsp;EXAMENES</p>

<p><strong>&gt;</strong> INSCRIBIRSE</p>

<p>&nbsp;</p>
");
INSERT INTO content VALUES("6","Title","<p><span style=\"font-family:trebuchet ms,geneva\">Platea21&nbsp;</span>Sistema Virtual E-Learning 2020</p>
");
INSERT INTO content VALUES("7","News","<pre>
<strong><em>Noticias Recientes</em></strong></pre>
");
INSERT INTO content VALUES("8","Announcements","<pre>
<span style=\"font-size:medium\"><em><strong>Avisos</strong></em></span></pre>

<p>&nbsp;</p>
");
INSERT INTO content VALUES("10","Calendar","<pre style=\"text-align:center\">
<span style=\"font-size:medium\"><strong>&nbsp;CALENDARIO ACADEMICOS</strong></span></pre>

<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"line-height:1.6em; margin-left:auto; margin-right:auto\">
	<tbody>
		<tr>
			<td>
			<p>Inscripciones&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>
			</td>
			<td>
			<p>&nbsp;&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td>
			<p>Inicio de Clases</p>
			</td>
		</tr>
		<tr>
			<td>
			<p>Examenes</p>
			</td>
		</tr>
		<tr>
			<td>
			<p>Culminaci&oacute;n Periodo</p>
			</td>
		</tr>
	</tbody>
</table>

<p>&nbsp;</p>
");
INSERT INTO content VALUES("11","Directories","<div class=\"jsn-article-content\" style=\"text-align: left;\">
<pre>
<span style=\"font-size:medium\"><em><strong>DIRECTORIO</strong></em></span></pre>

<ul>
	<li>Contacto: <a class=\"negrita\" href=\"tel: (04) 384-5891\">(04) 384-5891</a></li>
	<br />
	<li>Correo: <a class=\"negrita\" href=\"mailto:info@unepat.edu.ec\">info@unepat.edu.ec</a></li>
	<br />
	<li>Redes: <a class=\"negrita\" href=\"https://www.facebook.com/unepatoficial/about/?ref=page_internal\">Facebook</a></li>
</ul>
</div>
");
INSERT INTO content VALUES("12","president","");
INSERT INTO content VALUES("13","motto","<p><strong><span style=\"color:#FFF0F5\"><span style=\"font-family:arial,helvetica,sans-serif\">CENTRO DE ESTUDIOS PRE UNIVERSITARIO - CEPU :</span></span></strong></p>

<p><strong><span style=\"color:#FFF0F5\"><span style=\"font-family:arial,helvetica,sans-serif\">Te prepar&aacute;mos para el &eacute;xtio</span></span></strong></p>

<p><strong><span style=\"color:#FFF0F5\"><span style=\"font-family:arial,helvetica,sans-serif\">Elige lo Mejor</span></span></strong></p>
");
INSERT INTO content VALUES("14","Campuses","<pre>
<span style=\"font-size:16px\"><strong>Campus</strong></span></pre>

<ul>
	<li class=\"negrita\">SEDE GUAYAQUIL</li>
</ul>
<br>
<center>
<p><iframe allowfullscreen=\"\" height=\"450\" loading=\"lazy\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.7115279495843!2d-79.901415049367!3d-2.2612332983438046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d6f202331a97d%3A0xbf9cfac408f18a97!2sUNIDAD%20EDUCATIVA%20PARTICULAR%20PDTE.%20CARLOS%20JULIO%20AROSEMENA%20TOLA%20-%20GUAYAQUIL!5e0!3m2!1ses-419!2sec!4v1628553742874!5m2!1ses-419!2sec\" style=\"border:0;\" width=\"500\"></iframe></p>
</center>
");
INSERT INTO content VALUES("15","Info-index","<p>Si tienes problemas con el Aula Virtual, cont&aacute;ctenos al correo electr&oacute;nico <a href=\"mailto:genecracy_13@hotmail.com\">genecracy_13@hotmail.com</a> &oacute; al tel&eacute;fono (+593) 999999999 tambien puedes escribirnos a tr&aacute;ves de nuestra cuenta en redes sociales.</p>
");





CREATE TABLE `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date_start` varchar(100) NOT NULL,
  `date_end` varchar(100) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `floc` varchar(500) NOT NULL,
  `fdatein` varchar(200) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `uploaded_by` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `games` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `description` mediumtext CHARACTER SET latin1 NOT NULL,
  `status` varchar(15) CHARACTER SET latin1 NOT NULL,
  `path` varchar(300) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`game_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO games VALUES("1","Sopa de Letras","Juego de buscar palabras en una superficie llena de letras desordenadas y ordenadas.","Activated","");
INSERT INTO games VALUES("2","Crucigrama","Juego en el cual se da una pista para encontrar la palabra correspondiente a los recuadros a los que pertenece la pista.","Desactivated","");





CREATE TABLE `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(50) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `message_status` varchar(100) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO message VALUES("1","1111111","sadasd","2021-09-16 17:30:55","9","Perfil Estudiante","Perfil Profesor","");





CREATE TABLE `message_sent` (
  `message_sent_id` int(11) NOT NULL AUTO_INCREMENT,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  PRIMARY KEY (`message_sent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO message_sent VALUES("1","1111111","sadasd","2021-09-16 17:30:55","9","Perfil Estudiante","Perfil Profesor");





CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO notification VALUES("1","1","Agregó archivo de práctica <b>asdasd</b>","2021-08-14 15:35:33","assignment_student.php");
INSERT INTO notification VALUES("2","1","Agregó aviso","2021-08-14 15:36:11","announcements_student.php");
INSERT INTO notification VALUES("3","1","Agregó archivo de práctica <b>asdasdasdsddd</b>","2021-08-14 15:37:29","assignment_student.php");
INSERT INTO notification VALUES("4","1","Agregó aviso","2021-08-14 15:40:47","announcements_student.php");
INSERT INTO notification VALUES("5","1","Agregó archivo de práctica <b>sdfsdfsdf</b>","2021-08-14 16:04:24","assignment_student.php");
INSERT INTO notification VALUES("6","1","Agrego un examen en","2021-08-14 17:32:18","student_quiz_list.php");
INSERT INTO notification VALUES("7","1","Agregó aviso","2021-08-16 15:58:04","announcements_student.php");
INSERT INTO notification VALUES("8","2","Agregó aviso","2021-08-25 12:34:03","announcements_student.php");
INSERT INTO notification VALUES("9","2","Agregó aviso","2021-08-25 12:36:48","announcements_student.php");
INSERT INTO notification VALUES("10","2","Agregó aviso","2021-08-25 12:50:17","announcements_student.php");





CREATE TABLE `notification_read` (
  `notification_read_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `student_read` varchar(50) NOT NULL,
  `notification_id` int(11) NOT NULL,
  PRIMARY KEY (`notification_read_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO notification_read VALUES("1","1111111","yes","7");
INSERT INTO notification_read VALUES("2","1111111","yes","6");
INSERT INTO notification_read VALUES("3","1111111","yes","5");





CREATE TABLE `notification_read_teacher` (
  `notification_read_teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `student_read` varchar(100) NOT NULL,
  `notification_id` int(11) NOT NULL,
  PRIMARY KEY (`notification_read_teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `paralelo` (
  `paralelo_id` int(11) NOT NULL AUTO_INCREMENT,
  `paralelo_name` varchar(100) NOT NULL,
  `dean` varchar(100) NOT NULL,
  PRIMARY KEY (`paralelo_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

INSERT INTO paralelo VALUES("37","B","sdfsdfsdf");





CREATE TABLE `question_type` (
  `question_type_id` int(11) NOT NULL,
  `question_type` varchar(150) NOT NULL,
  PRIMARY KEY (`question_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO question_type VALUES("1","Múltiple respuesta");
INSERT INTO question_type VALUES("2","Verdadero o Falso");





CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_title` varchar(50) NOT NULL,
  `quiz_description` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`quiz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO quiz VALUES("1","Examen 5","examen","2020-10-14 20:53:48","9");





CREATE TABLE `quiz_question` (
  `quiz_question_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `question_text` varchar(900) NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  PRIMARY KEY (`quiz_question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO quiz_question VALUES("1","1","<p><img alt=\"5	frac{1}{8}\" src=\"http://latex.codecogs.com/gif.latex?5%5Ctfrac%7B1%7D%7B8%7D\" /></p>","1","0","2020-10-14 20:55:21","C");
INSERT INTO quiz_question VALUES("2","1","<p>prueba</p>
","1","0","2021-08-13 20:35:07","D");





CREATE TABLE `school_year` (
  `school_year_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_year` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`school_year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO school_year VALUES("1","2020-I","Desactivated");
INSERT INTO school_year VALUES("2","2020-II","Activated");
INSERT INTO school_year VALUES("3","2020-III","Desactivated");





CREATE TABLE `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(15) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `class_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `paralelo` int(10) NOT NULL,
  `cod_ciclo` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1111115 DEFAULT CHARSET=latin1;

INSERT INTO student VALUES("1111111","11111111","Perfil","Estudiante","948445199","101","estudiante","estudiante","uploads/p21.png","37","2","Registered");
INSERT INTO student VALUES("222222","","Canal2","Dos","","201","222222","admin","uploads/NO-IMAGE-AVAILABLE.jpg","12","2","Registered");
INSERT INTO student VALUES("333333","","Canal3","Tres","","301","333333","admin","uploads/NO-IMAGE-AVAILABLE.jpg","20","2","Registered");
INSERT INTO student VALUES("444444","0956332050","Canal4","Cuatro","54564654","102","444444","admin","uploads/NO-IMAGE-AVAILABLE.jpg","37","2","Registered");
INSERT INTO student VALUES("1111113","sdfsdf","sdfsdf","sdfsdfd","sdfsdf","101","sdfsdf","","uploads/NO-IMAGE-AVAILABLE.jpg","37","2","Unregistered");
INSERT INTO student VALUES("1111114","sdfsdf","XVXCV","VXCVXCV","CVXCVXCV","101","","","uploads/NO-IMAGE-AVAILABLE.jpg","37","2","Unregistered");





CREATE TABLE `student_assignment` (
  `student_assignment_id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `assignment_fdatein` varchar(50) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` varchar(5) NOT NULL,
  PRIMARY KEY (`student_assignment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO student_assignment VALUES("1","11","5806_File_thumbnails.png","2020-04-16 23:47:11","prueba","1111","1111111","11");
INSERT INTO student_assignment VALUES("2","11","3187_File_thumbnails.jpg","2020-04-16 23:47:33","leo","lee","1111111","15");





CREATE TABLE `student_backpack` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `student_class_quiz` (
  `student_class_quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_quiz_time` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  PRIMARY KEY (`student_class_quiz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO student_class_quiz VALUES("1","1","1111111","3600","1 de 2");





CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `unit` int(11) NOT NULL,
  `Pre_req` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO subject VALUES("7","LENG","Lenguaje","","<p>Lenguaje</p>
","1","","2nd");





CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `about` varchar(500) NOT NULL,
  `teacher_status` varchar(20) NOT NULL,
  `teacher_stat` varchar(100) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO teacher VALUES("1","bio","bio","Docente","Biología","37","uploads/NO-IMAGE-AVAILABLE.jpg","0987654321","Registered","Activated");
INSERT INTO teacher VALUES("2","ari","ari","Docente","Aritmética y Algebra","2","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered
","Activated");
INSERT INTO teacher VALUES("3","geo","geo","Docente","Geo. Trigonometria","1","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered
","Activated");
INSERT INTO teacher VALUES("15","","","Edgar","Laz","37","uploads/NO-IMAGE-AVAILABLE.jpg","0987654321","","Desactivated");
INSERT INTO teacher VALUES("5","rv","rv","Docente","Raz. Verbal","2","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered
","Activated");
INSERT INTO teacher VALUES("6","fisi","fisi","Docente","Física","2","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered
","Activated");
INSERT INTO teacher VALUES("7","quim","quim","Docente","Química","2","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered
","Activated");
INSERT INTO teacher VALUES("8","len","len","Docente","Lenguaje","2","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered
","Activated");
INSERT INTO teacher VALUES("9","docente","docente","Perfil","Profesor","12","uploads/Masa_san.jpg","948445199","Registered","Activated");
INSERT INTO teacher VALUES("10","logi","logi","Docente","Lógica","11","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered","Activated");
INSERT INTO teacher VALUES("11","hist","hist","Docente","Historia","34","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered","Activated");
INSERT INTO teacher VALUES("12","geog","geog","Docente","Geografía","34","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered","Activated");
INSERT INTO teacher VALUES("13","eco","eco","Docente","Economía","27","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered","Activated");
INSERT INTO teacher VALUES("14","lite","lite","Docente Lite","Literatura","1","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered","Activated");





CREATE TABLE `teacher_backpack` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `teacher_class` (
  `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `thumbnails` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL,
  `paralelo_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO teacher_class VALUES("2","9","101","7","admin/uploads/thumbnails.jpg","2","37");





CREATE TABLE `teacher_class_announcements` (
  `teacher_class_announcements_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`teacher_class_announcements_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;






CREATE TABLE `teacher_class_student` (
  `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_class_student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO teacher_class_student VALUES("2","2","1111111","9");





CREATE TABLE `teacher_notification` (
  `teacher_notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `teacher_shared` (
  `teacher_shared_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `shared_teacher_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  PRIMARY KEY (`teacher_shared_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

INSERT INTO user_log VALUES("1","admin","2020-04-17 11:26:14","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("2","admin","2020-04-19 08:56:46","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("3","admin","2020-04-19 09:06:09","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("4","admin","2020-04-19 09:23:44","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("5","admin","2020-10-03 07:03:13","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("6","admin","2021-01-14 16:39:03","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("7","admin","2021-01-14 16:41:31","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("8","admin","2021-01-14 17:12:26","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("9","admin","2021-01-14 17:04:27","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("10","admin","2021-08-01 12:20:02","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("11","admin","2021-08-01 19:24:42","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("12","admin","2021-08-09 18:56:57","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("13","admin","2021-08-09 20:09:54","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("14","admin","2021-08-13 17:16:34","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("15","admin","2021-08-14 18:51:32","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("16","admin","2021-08-16 14:13:21","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("17","admin","2021-08-16 14:14:09","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("18","admin","2021-08-16 16:27:08","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("19","admin","2021-08-18 19:38:13","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("20","admin","2021-08-19 15:44:02","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("21","admin","2021-08-20 14:26:08","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("22","admin","2021-08-23 16:23:46","2021-08-25 12:13:35","15");
INSERT INTO user_log VALUES("23","admin","2021-09-01 12:25:48","","15");
INSERT INTO user_log VALUES("24","admin","2021-09-01 14:24:37","","15");
INSERT INTO user_log VALUES("25","admin","2021-09-02 11:15:18","","15");
INSERT INTO user_log VALUES("26","admin","2021-09-14 11:53:36","","15");
INSERT INTO user_log VALUES("27","admin","2021-09-14 13:14:56","","15");
INSERT INTO user_log VALUES("28","admin","2021-09-16 19:05:54","","15");





CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO users VALUES("15","admin","admin","admin","admin");





CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `floc` varchar(500) DEFAULT NULL,
  `uploaded_by` varchar(100) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `teacher_class_id` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




