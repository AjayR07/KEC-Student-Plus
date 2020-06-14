<?php
session_start();
if(!isset($_SESSION['user']))
{
    header("Location: ../staffLog.php");
}
$staff=$_SESSION['user'];
include_once('../db.php');
include_once('staffnav.php');
include_once('../assets/notiflix.php');

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Index</title>
</head>


<script>

$(document).ready(function(){

  $('.ui.inverted.accordion')
  .accordion();

});


</script>


<body>
  <style>
    body{
      background-image: url('../backstaff.jpg');
    }
    .ui.inverted.segment {
    padding-left:80px;
    padding-top:30px;
    padding-bottom:20px;
    }
    .content.active{
        margin-left:50px;

    }
    .ui.segment{
      background: #565454;
    }
    .ui.inverted.segment
    {
      border-radius: 5px;
    }

    </style>
  <br>
  <div class="ui raised very padded container segment">
    <center><h1 class="ui header">Hi <?php echo $staff; ?>!</h1></center>
   <br><br>
  <div class="ui two column very relaxed stackable grid">
    <!-- FIRST CARD 1ST SEG -->
    <div class="column">
      <div class="ui inverted segment">
         <div class="ui green inverted statistic">
           <div class="value">
            30
            </div>
              <div class="label">
             OD Permission
           </div>
          </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="ui blue inverted statistic">
         <div class="value">
           19
          </div>
           <div class="label" >
            Non Certificate OD
         </div>
        </div>
      </div>
    </div>
    <!-- FIRST CARD 2ND SEG -->
    <div class="middle aligned column">
    <div class="ui inverted segment">
         <div class="ui green inverted statistic">
           <div class="value">
            5
            </div>
              <div class="label">
             OD Certificate
           </div>
          </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="ui blue inverted statistic">
         <div class="value">
           18
          </div>
           <div class="label" >
            Other Certificate
         </div>
        </div>
      </div>
     </div>
  </div><br>
  </div>
    <!-- CARD 2 -->
  <div class="ui raised very padded container segment">
  <div class="ui inverted segment">
  <div class="ui inverted accordion">
    <div class="title">
      <i class="dropdown icon"></i>
      Abinash S
    </div>
    <div class="content">
    <p>Paper Presentation-Big Data , PSG ,Koyampuththoor.</p>
    </div>
    <div class="title">
      <i class="dropdown icon"></i>
      Kelavan GJ
    </div>
    <div class="content">
      <p>Paper Presentation-Big Data , PSG ,Koyampuththoor.</p>
    </div>
  </div>
 </div>
</div><br>


</body>

</html>

