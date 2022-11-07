<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<base href="<?php echo base_url();?>">
<head>
	<meta charset="utf-8">
	<title>Dar Examen Scrum</title>
	<link rel="stylesheet" type="text/css" href="lib/style.css" />
</head>
<body>

<div id="container">


	<div id="body">
		
    <p><h2>Comenzar Examen <?php echo $exams_detail['name'];?></h2></p>
<p>Descripción Test: <?php echo $exams_detail['descript']; ?></p>	
<p>Numero de preguntas:30</p>
<p>Tiempo:30 minutos</p>
	</div>
<form name="start" method="post" action="/ExamController/">
<input name="idexam" type="hidden" value="<?php echo $exams_detail['idexam']; ?>"></input>
<button type="submit">comenzar Examen</button>
</form>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>