<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<base href="<?php echo base_url();?>">
<head>
	<meta charset="utf-8">
	<title>Resultado de examen</title>
	<link rel="stylesheet" type="text/css" href="lib/style.css" />
</head>
<body>

<div id="container">


	<div id="body">
		
    <p><h2>Resultado Examen <?php echo $total;?>%</h2></p>

	</div>
<form name="start" method="post" action="/ExamController/">


</form>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>