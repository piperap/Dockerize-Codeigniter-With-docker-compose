<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<base href="<?php echo base_url();?>">
<head>
  
	<meta charset="utf-8">
	<title>Bienvenido a Examenes Scrum</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="lib/style.css" />
</head>
<body>


<div id="container">


	<div id="body">
		
  <p id="timerexam"></p><h2>
    <?php
  

  echo $questions_exam[0]->Question;
?>
  </p>
  <form method="post" id="frm_answer" action="" name="frm_answer">

<?php
//print_r($alternatives);

  foreach ($alternatives as $alternative)
  {
      

    if($alternativeselected == $alternative->idalternative)
    {
?>



<input type="radio" name="alternative" value="<?php echo $alternative->idalternative; ?>" checked>
<label for="html"><?php echo $alternative->Alternative; ?></label><br>


<?php

    }else{


    



   ?>

<input type="radio" name="alternative" value="<?php echo $alternative->idalternative; ?>">
<label for="html"><?php echo $alternative->Alternative; ?></label><br>





</select>

<?php
  } //end if  
  }   
    ?></h2></p>
    <?php
    if(!$isStart){
      ?>   
    <button  id="btn_back">< Atras </button>
    <?php
    }
   ?>
    <?php

if($isfinal)
{
  ?>
		<button id="btn_end" >Finalizar</button>
    <?php
}else{
?>
<button id="btn_next" >Siguiente > </button>

<?php
}
?>


	</div>
</form>
<form action="ExamController/backquestion">
    
</form>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
<script>
  $( document ).ready(function() {

    $( "#btn_next" ).click(function() {
  
      $('#frm_answer').attr('action', 'ExamController/validate');
      $( "#frm_answer" ).submit();



});

$( "#btn_back" ).click(function() {

  $('#frm_answer').attr('action', 'ExamController/backquestion');
      $( "#frm_answer" ).submit();


});

$( "#btn_end" ).click(function() {

  $('#frm_answer').attr('action', 'ResultController/index');
      $( "#frm_answer" ).submit();


});







});

  </script>


















</html>