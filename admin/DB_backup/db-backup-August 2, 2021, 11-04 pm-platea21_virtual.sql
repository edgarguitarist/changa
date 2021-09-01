

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO answer VALUES("1","1","","A");
INSERT INTO answer VALUES("2","1","","B");
INSERT INTO answer VALUES("3","1","","C");
INSERT INTO answer VALUES("4","1","","D");





CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL AUTO_INCREMENT,
  `floc` varchar(300) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  PRIMARY KEY (`assignment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






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
","2020-04-19 09:02:14","600","Activo");





CREATE TABLE `class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(100) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

INSERT INTO class VALUES("101","Aula 101");
INSERT INTO class VALUES("102","Aula 102");
INSERT INTO class VALUES("103","Aula 103");
INSERT INTO class VALUES("104","Aula 104");
INSERT INTO class VALUES("105","Aula 105");
INSERT INTO class VALUES("106","Aula 106");
INSERT INTO class VALUES("107","Aula 107");
INSERT INTO class VALUES("108","Aula 108");
INSERT INTO class VALUES("109","Aula 109");
INSERT INTO class VALUES("110","Aula 110");





CREATE TABLE `class_quiz` (
  `class_quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_class_id` int(11) NOT NULL,
  `quiz_time` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `fecha_p` datetime NOT NULL,
  PRIMARY KEY (`class_quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

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

<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Platea21 <a href=\"http://platea21.blogspot.com\">http://platea21.blogspot.com</a>.</p>
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
	<li>Contacto (+51) 948445199</li>
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
	<li>SEDE LOS GRANADOS</li>
</ul>
");





CREATE TABLE `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) NOT NULL,
  `dean` varchar(100) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

INSERT INTO department VALUES("1","MEDICINA HUMANA","");
INSERT INTO department VALUES("2","ODONTOLOGÍA","");
INSERT INTO department VALUES("3","OBSTETRICIA","");
INSERT INTO department VALUES("4","ENFERMERÍA","");
INSERT INTO department VALUES("5","FARMACIA Y BIOQUÍMICA","");
INSERT INTO department VALUES("6","BIOLOGÍA - MICROBIOLOGÍA","");
INSERT INTO department VALUES("7","MEDICINA VETERINARIA Y ZOOTECNIA","");
INSERT INTO department VALUES("8","INGENIERÍA EN INDUSTRIAS ALIMENTARIAS","");
INSERT INTO department VALUES("9","INGENIERÍA PESQUERA","");
INSERT INTO department VALUES("10","AGRONOMÍA","");
INSERT INTO department VALUES("11","INGENIERÍA CIVIL","");
INSERT INTO department VALUES("12","INGENIERÍA EN INFORMÁTICA Y SISTEMAS","");
INSERT INTO department VALUES("13","ARQUITECTURA","");
INSERT INTO department VALUES("14","INGENIERÍA MECÁNICA","");
INSERT INTO department VALUES("15","INGENIERÍA DE MINAS","");
INSERT INTO department VALUES("16","INGENIERÍA GEOLÓGICA - GEOTECNIA","");
INSERT INTO department VALUES("17","INGENIERÍA METALÚRGICA","");
INSERT INTO department VALUES("18","INGENIERÍA QUÍMICA","");
INSERT INTO department VALUES("19","FÍSICA APLICADA","");
INSERT INTO department VALUES("20","DERECHO Y CIENCIAS POLÍTICAS","");
INSERT INTO department VALUES("21","CIENCIAS DE LA COMUNICACIÓN","");
INSERT INTO department VALUES("23","ARTES","");
INSERT INTO department VALUES("24","CIENCIAS CONTABLES Y FINANCIERAS","");
INSERT INTO department VALUES("25","CIENCIAS ADMINISTRATIVAS","");
INSERT INTO department VALUES("26","INGENIERÍA COMERCIAL","");
INSERT INTO department VALUES("27","ECONOMÍA AGRARIA","");
INSERT INTO department VALUES("28","CIENCIAS DE LA NATURALEZA Y PROMOCIÓN EDUCATIVA AMBIENTAL","");
INSERT INTO department VALUES("29","IDIOMA EXTRANJERO","");
INSERT INTO department VALUES("30","LENGUA Y LITERATURA","");
INSERT INTO department VALUES("31","CIENCIAS SOCIALES Y PROMOCIÓN SOCIO CULTURAL","");
INSERT INTO department VALUES("32","MATEMÁTICA COMPUTACIÓN E INFORMÁTICA","");
INSERT INTO department VALUES("33","MATEMÁTICA","");
INSERT INTO department VALUES("34","HISTORIA","");
INSERT INTO department VALUES("35","INGENIERÍA AMBIENTAL","");
INSERT INTO department VALUES("36","P","p");





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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `message_sent` (
  `message_sent_id` int(11) NOT NULL AUTO_INCREMENT,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  PRIMARY KEY (`message_sent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `notification_read` (
  `notification_read_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `student_read` varchar(50) NOT NULL,
  `notification_id` int(11) NOT NULL,
  PRIMARY KEY (`notification_read_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `notification_read_teacher` (
  `notification_read_teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `student_read` varchar(100) NOT NULL,
  `notification_id` int(11) NOT NULL,
  PRIMARY KEY (`notification_read_teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO quiz_question VALUES("1","1","<p><img alt=\"5	frac{1}{8}\" src=\"http://latex.codecogs.com/gif.latex?5%5Ctfrac%7B1%7D%7B8%7D\" /></p>","1","0","2020-10-14 20:55:21","C");





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
  `carrera` int(10) NOT NULL,
  `cod_ciclo` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1111113 DEFAULT CHARSET=latin1;

INSERT INTO student VALUES("1111111","11111111","Perfil","Estudiante","948445199","101","estudiante","estudiante","uploads/p21.png","1","2","Registered");
INSERT INTO student VALUES("222222","","Canal2","Dos","","201","222222","admin","uploads/NO-IMAGE-AVAILABLE.jpg","12","2","Registered");
INSERT INTO student VALUES("333333","","Canal3","Tres","","301","333333","admin","uploads/NO-IMAGE-AVAILABLE.jpg","20","2","Registered");
INSERT INTO student VALUES("444444","","Canal4","Cuatro","","401","444444","admin","uploads/NO-IMAGE-AVAILABLE.jpg","24","2","Registered");





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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






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

INSERT INTO subject VALUES("1","GEOTR","Geo. Trigonometria","","<p>Geometria y trigonometria</p>
","1","","2nd");
INSERT INTO subject VALUES("2","ARIT","Aritmética y álgebra","","","1","","1st");
INSERT INTO subject VALUES("3","RAZM","Razonamiento Matemático","","","1","","2nd");
INSERT INTO subject VALUES("4","BIO","Biología","","<p>Curso Biologia</p>
","1","","2nd");
INSERT INTO subject VALUES("5","FISI","Fisica","","<p>FISICA</p>
","1","","1st");
INSERT INTO subject VALUES("6","QUIM","Química","","<p>Quimica</p>
","1","","1st");
INSERT INTO subject VALUES("7","LENG","Lenguaje","","<p>Lenguaje</p>
","1","","2nd");
INSERT INTO subject VALUES("8","RAZV","Razonamiento Verbal","","<p>Razonamiento Verbal</p>
","1","","1st");
INSERT INTO subject VALUES("11","LOGICA","Lógica","","","1","","2nd");
INSERT INTO subject VALUES("12","HISTO","Historia","","","1","","1st");
INSERT INTO subject VALUES("13","GEOG","Geografía","","","1","","1st");
INSERT INTO subject VALUES("14","ECON","Economía","","","1","","2nd");
INSERT INTO subject VALUES("15","LITE","Literatura","","","1","","2nd");
INSERT INTO subject VALUES("16","CEPU","Noticias CEPU","","<p>En esta seccion publicaremos las noticias, novedades, comunicados, etc con respecto al trabajo que se viene realizando en el Centro de Estudios Preuniversitario CEPU.</p>
","2","","1st");





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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO teacher VALUES("1","bio","bio","Docente","Biología","2","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered","Activated");
INSERT INTO teacher VALUES("2","ari","ari","Docente","Aritmética y Algebra","2","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered
","Activated");
INSERT INTO teacher VALUES("3","geo","geo","Docente","Geo. Trigonometria","1","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered
","Activated");
INSERT INTO teacher VALUES("4","rm","rm1","Docente","Raz. Matemático","2","uploads/platea21_logotrans.png","987654321","Registered
","Activated");
INSERT INTO teacher VALUES("5","rv","rv","Docente","Raz. Verbal","2","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered
","Activated");
INSERT INTO teacher VALUES("6","fisi","fisi","Docente","Física","2","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered
","Activated");
INSERT INTO teacher VALUES("7","quim","quim","Docente","Química","2","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered
","Activated");
INSERT INTO teacher VALUES("8","len","len","Docente","Lenguaje","2","uploads/NO-IMAGE-AVAILABLE.jpg","987654321","Registered
","Activated");
INSERT INTO teacher VALUES("9","docente","docente","Perfil","Profesor","12","uploads/blanco.png","948445199","Registered","Activated");
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
  PRIMARY KEY (`teacher_class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO teacher_class VALUES("1","9","101","2","admin/uploads/thumbnails.jpg","2");





CREATE TABLE `teacher_class_announcements` (
  `teacher_class_announcements_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`teacher_class_announcements_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `teacher_class_student` (
  `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_class_student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO teacher_class_student VALUES("1","1","1111111","9");





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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO user_log VALUES("1","admin","2020-04-17 11:26:14","2021-08-01 12:25:28","15");
INSERT INTO user_log VALUES("2","admin","2020-04-19 08:56:46","2021-08-01 12:25:28","15");
INSERT INTO user_log VALUES("3","admin","2020-04-19 09:06:09","2021-08-01 12:25:28","15");
INSERT INTO user_log VALUES("4","admin","2020-04-19 09:23:44","2021-08-01 12:25:28","15");
INSERT INTO user_log VALUES("5","admin","2020-10-03 07:03:13","2021-08-01 12:25:28","15");
INSERT INTO user_log VALUES("6","admin","2021-01-14 16:39:03","2021-08-01 12:25:28","15");
INSERT INTO user_log VALUES("7","admin","2021-01-14 16:41:31","2021-08-01 12:25:28","15");
INSERT INTO user_log VALUES("8","admin","2021-01-14 17:12:26","2021-08-01 12:25:28","15");
INSERT INTO user_log VALUES("9","admin","2021-01-14 17:04:27","2021-08-01 12:25:28","15");
INSERT INTO user_log VALUES("10","admin","2021-08-01 12:20:02","2021-08-01 12:25:28","15");
INSERT INTO user_log VALUES("11","admin","2021-08-01 19:24:42","","15");





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




