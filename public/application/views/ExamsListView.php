<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<base href="<?php echo base_url();?>">
<head>
	<meta charset="utf-8">
	<title>Bienvenido a Examenes Scrum</title>
	<link rel="stylesheet" type="text/css" href="lib/style.css" />
</head>
<body>

<div id="container">


	<div id="body">
		
    <p><?php 
    
    foreach ($exams as $row)
    {
      ?><h2><a href="<?php echo $row->string_exam; ?>"><?php echo $row->name; ?></a></h2><br>   
        <h1><?php echo $row->descript; ?></h1><br>   
     <?php
    }
    
    ?></p>

		
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>