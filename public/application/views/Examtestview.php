<html>

<head>

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body>
    <title>Exam Scrum</title>
    <h2><?php //$a = date("D M d Y H:i:s e-I");?></h2>
    <?php
$minutes_to_add = 50;

$time = new DateTime('2022-11-07 18:05');
$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

 $stamp = $time->format('Y-m-d H:i');
 echo $time;
    ?>
      <div class="container">
        <!-- Page Content goes here -->


        <div class="row">
       <br>
       <br>

<br>
<br>

<div class="col s8 m8">
    <h4 class="header">Tiempo Restante  <span id="timerexam"></span></h4>
    <div class="card horizontal">
      <div class="card-image">
        
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>Pregunta: <?php echo $idquestion;?>/<?php echo $countquestions; ?></p>
          <h4><?php echo $questions_exam[0]->Question;?></h4>
        </div>
      


<form method="post" id="frm_answer" action="" name="frm_answer">
  
  <?php

foreach ($alternatives as $alternative)
{
      

if($alternativeselected == $alternative->idalternative)
{
  ?>
<p>
<label>
<input class="with-gap" type="radio" name="alternative" value="<?php echo $alternative->idalternative; ?>" checked>
<span><?php echo $alternative->Alternative; ?></span>
</label>
</p>

<?php

}else{
      
   ?>
<p>   
<label>
<input class="with-gap" type="radio" name="alternative" value="<?php echo $alternative->idalternative; ?>">
<span ><?php echo $alternative->Alternative; ?></span>
</label>
</p>

         

  <?php
  } //end if  
  }   
    ?>
     </div>
    </div>
    </div>
</div>
</form>

      <div class="row s12">

      <div class="col s6"> 
      <?php
      if(!$isStart){
      ?>   
      <a id="btn_back" class="waves-effect waves-light btn"><i class="material-icons left"><</i>Atras</a>   
      <?php
      }
      ?>
     
    
    
      </div>
      <div class="col s6"> 
      <?php

if($isfinal)
{
?>

<a id="btn_end" class="waves-effect waves-light btn"><i class="material-icons right">></i>Finalizar</a>
<?php
}else{
?>
<a id="btn_next" class="waves-effect waves-light btn"><i class="material-icons right">></i>Siguiente</a>


<?php
}
?>
     
             
      </div>
   
    
      </div>







      </div>
   
    </div>


      </div>
    </body>


    <script>
  $( document ).ready(function() {
   

    $( "#btn_next" ).click(function() {
  
      $('#frm_answer').attr('action', '/ExamController/validate');
      $( "#frm_answer" ).submit();



});

$( "#btn_back" ).click(function() {

  $('#frm_answer').attr('action', '/ExamController/backquestion');
      $( "#frm_answer" ).submit();


});

$( "#btn_end" ).click(function() {

  $('#frm_answer').attr('action', '/ResultController/index');
      $( "#frm_answer" ).submit();


});






});






function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}



<?php 

//if is exam start create a cookie with the date to start

if($isStart == true )
{
?>

let user = getCookie("timer");
  if (user != "") {
    
  } else {
     
    const date = new Date();
  date.setMinutes(date.getMinutes() + 30);
  setCookie('timer', date, 1);


  }






<?php

 
}

?>





var countDownDate = new Date(getCookie('timer')).getTime();


// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("timerexam").innerHTML =   minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    $('#frm_answer').attr('action', 'ResultController/index');
      $( "#frm_answer" ).submit();
    document.getElementById("timerexam").innerHTML = "EXPIRED";
  }
}, 10);




  </script>


</html>