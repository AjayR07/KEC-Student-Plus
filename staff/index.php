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

  $('.ui.inverted.accordion').accordion();
  $('.ui.accordion').accordion();

});


</script>
<?php
// Calculations
$batch=$_SESSION['batch'];
$sec=$_SESSION['sec'];
$dept=$_SESSION['dept'];
$design=$_SESSION['design'];
$today=date("Y-m-d");

// PreOd Part
if($design=='Advisor')
{
  $sql="SELECT * FROM registration r INNER JOIN oddetails o ON r.regno like o.regno INNER JOIN preod p ON o.appno like p.appno 
  WHERE (r.batch like '$batch') AND (r.dept like '$dept') and (r.sec like '$sec') and (o.appdate like '$today') AND (p.status1 is not null) and 
  (p.status2 is not null) and (p.status3 is not null) and (p.advisor like 'Pending');";
  
}
else if($design='Year in Charge')
{
  $sql="SELECT * FROM registration r INNER JOIN oddetails o ON r.regno like o.regno INNER JOIN preod p ON o.appno like p.appno 
  WHERE (r.batch like '$batch') AND (r.dept like '$dept') and (o.appdate like '$today') AND (p.status1 is not null) and 
  (p.status2 is not null) and (p.status3 is not null) and (p.advisor like 'Approved') and (p.yearin like 'Pending');";
}
$data=$con->query($sql);
$preod=$data->num_rows;

// Non Cert OD Part
if($design=='Advisor')
{
  $sql="SELECT * FROM registration r INNER JOIN noncertod o ON r.regno like o.regno 
  WHERE (r.batch like '$batch') AND (r.dept like '$dept') and (r.sec like '$sec') and (o.appdate like '$today')
  AND (o.advisor like 'Pending');"; 
}
else if($design='Year in Charge')
{
  // $sql="SELECT * FROM registration r INNER JOIN noncertod o ON r.regno like o.regno 
  // WHERE (r.batch like '$batch') AND (r.dept like '$dept') and (r.sec like '$sec') and (o.appdate like '$today')
  // AND (o.advisor like 'Approved') and (p.yearin like 'Pending');";
}
$data=$con->query($sql);
$noncert=$data->num_rows;

// Post Od Part 

if($design=='Advisor')
{
  $sql="SELECT * FROM registration r INNER JOIN oddetails o ON r.regno like o.regno INNER JOIN postod p ON o.appno like p.appno 
  WHERE (r.batch like '$batch') AND (r.dept like '$dept') and (r.sec like '$sec') and (o.appdate like '$today') AND 
  (p.status like 'Pending');";
  $data=$con->query($sql);
  $postod=$data->num_rows;
  
}
else if($design='Year in Charge')
{
    $postod='-';
}


// Cert Reg Part 
if($design=='Advisor')
{
  $sql="SELECT * FROM registration r INNER JOIN othercert o ON r.regno like o.regno 
  WHERE (r.batch like '$batch') AND (r.dept like '$dept') and (o.appdate like '$today') AND 
  (o.status like 'Pending');";

  $data=$con->query($sql);
  $othercert=$data->num_rows;
 
}
else if($design='Year in Charge')
{
    $othercert='-';
}
$detailsList = '';
function getDetails()
{
      global $design,$batch,$sec,$today,$dept,$con,$detailsList;
      if($design=='Advisor')
      {
        $sql="SELECT * FROM registration r INNER JOIN oddetails o ON r.regno like o.regno INNER JOIN preod p ON o.appno like p.appno 
        WHERE (r.batch like '$batch') AND (r.dept like '$dept') and (r.sec like '$sec') and (o.odfrom <='$today' and o.odto >='$today') AND (p.status1 is not null) and 
        (p.status2 is not null) and (p.status3 is not null) and (p.advisor like 'Approved') and (p.yearin like 'Approved');";
        $data=$con->query($sql);
        if($data->num_rows==0)
        {
            echo '<div class="title">No Students</div>';
        }
        else{
        while ($row = mysqli_fetch_array($data))
        {
              $detailsList.='<div class="title">
              <i class="dropdown icon"></i>
              '.$row['regno'].' - '.$row['name'].'
            </div>
            <div class="content">
            <p>'.$row['odtype'].' ~ '.$row['college'].' ~ '.$row['title'].' </p>
            </div>';
        }
        echo $detailsList;
        }
      }
      else if($design='Year in Charge')
      {
        $sql="SELECT * FROM registration r INNER JOIN oddetails o ON r.regno like o.regno INNER JOIN preod p ON o.appno like p.appno 
        WHERE (r.batch like '$batch') AND (r.dept like '$dept') and (o.odfrom <='$today' and o.odto >='$today') AND (p.status1 is not null) and 
        (p.status2 is not null) and (p.status3 is not null) and (p.advisor like 'Approved') and (p.yearin like 'Approved');";

        $data=$con->query($sql);
        if($data->num_rows==0)
        {
            echo '<div class="title">No Students</div>';
        }
        else{
        $A='<div class="accordion">
            <div class="title"><i class="dropdown icon"></i>
            A Section</div><div class="active content">';
        $B='<div class="accordion">
            <div class="title"><i class="dropdown icon"></i>
            B Section</div><div class="active content">';
        $C='<div class="accordion">
            <div class="title"><i class="dropdown icon"></i>
            C Section</div><div class="active content">';
        $D='<div class="accordion">
            <div class="title"><i class="dropdown icon"></i>
            D Section</div><div class="active content">';
        while ($row = mysqli_fetch_array($data))
        {
              if($row['sec']=='A')
              {
                $A.='<div class="title">
                <i class="dropdown icon"></i>
                  '.$row['regno'].' - '.$row['name'].'
                </div>
                <div class="content">
                <p>'.$row['odtype'].' ~ '.$row['college'].' ~ '.$row['title'].' </p>
                </div>';
              }
              else if($row['sec']=='B')
              { 
                $B.='<div class="title">
                <i class="dropdown icon"></i>
                  '.$row['regno'].' - '.$row['name'].'
                </div>
                <div class="content">
                <p>'.$row['odtype'].' ~ '.$row['college'].' ~ '.$row['title'].' </p>
                </div>';
              }
              else if($row['sec']=='C')
              {
                $C.='<div class="title">
                <i class="dropdown icon"></i>
                  '.$row['regno'].' - '.$row['name'].'
                </div>
                <div class="content">
                <p>'.$row['odtype'].' ~ '.$row['college'].' ~ '.$row['title'].' </p>
                </div>';
              }
              else if($row['sec']=='D')
              {
                $D.='<div class="title">
                <i class="dropdown icon"></i>
                  '.$row['regno'].' - '.$row['name'].'
                </div>
                <div class="content">
                <p>'.$row['odtype'].' ~ '.$row['college'].' ~ '.$row['title'].' </p>
                </div>';
              }
              
        }
        $A.='</div></div>';
        $B.='</div></div>';
        $C.='</div></div>';
        $D.='</div></div>';
        echo $A.$B.$C.$D;
        }
      }
 
    
}
?>

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
   

    </style>
  <br>
  <div class="ui raised very padded container segment">
    <center><h1 class="ui header">Hi <?php echo $staff; ?>!</h1>
    <h3 class="description">Today's On-Duty Trend</h3> </center>
   <br><br>
  <div class="ui two column very relaxed stackable grid">
    <!-- FIRST CARD 1ST SEG -->
    <div class="column">
      <div class="ui inverted segment">
         <div class="ui green inverted statistic">
           <div class="value">
            <?php echo $preod; ?>
            </div>
              <div class="label">
             OD Permission
           </div>
          </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="ui blue inverted statistic">
         <div class="value">
           <?php echo $noncert; ?>
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
            <?php echo $postod; ?>
            </div>
              <div class="label">
             OD Certificate
           </div>
          </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="ui blue inverted statistic">
         <div class="value">
           <?php echo $othercert; ?>
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
  <div class="ui header">Students going OD Today</div>
  <div class="ui inverted segment">
  <div class="ui inverted accordion">
    <?php getDetails(); ?>
  </div>
 </div>
</div><br>


</body>

</html>

