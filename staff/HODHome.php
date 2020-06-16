<?php
session_start();
if(!isset($_SESSION['user']))
{
    header("Location: ../staffLog.php");
}
if($_SESSION['design']!='HOD')
{
  header('Location: index.php');
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

$sec=$_SESSION['sec'];
$dept=$_SESSION['dept'];
$design=$_SESSION['design'];
$today=date("Y-m-d");
$paper='';
$project='';
$other='';
$noncert='';
if($design='HOD')
      {
        // Paper Presentation
        $sql="SELECT * FROM registration r INNER JOIN oddetails o ON r.regno like o.regno INNER JOIN preod p ON o.appno like p.appno 
        WHERE (r.dept like '$dept') and (o.odfrom <='$today' and o.odto >='$today') AND (p.status1 is not null) and 
        (p.status2 is not null) and (p.status3 is not null) and (p.advisor like 'Approved') and (p.yearin like 'Approved') AND (o.odtype like 'PAPER');";
        $data=$con->query($sql);
        $paper=$data->num_rows;

        // Project Presentation
        $sql="SELECT * FROM registration r INNER JOIN oddetails o ON r.regno like o.regno INNER JOIN preod p ON o.appno like p.appno 
        WHERE (r.dept like '$dept') and (o.odfrom <='$today' and o.odto >='$today') AND (p.status1 is not null) and 
        (p.status2 is not null) and (p.status3 is not null) and (p.advisor like 'Approved') and (p.yearin like 'Approved') AND (o.odtype like 'PROJECT');";
        $data=$con->query($sql);
        $project=$data->num_rows;

        // Other Events
        $sql="SELECT * FROM registration r INNER JOIN oddetails o ON r.regno like o.regno INNER JOIN preod p ON o.appno like p.appno 
        WHERE (r.dept like '$dept') and (o.odfrom <='$today' and o.odto >='$today') AND (p.status1 is not null) and 
        (p.status2 is not null) and (p.status3 is not null) and (p.advisor like 'Approved') and (p.yearin like 'Approved') AND (o.odtype not like 'PAPER' or o.odtype not like 'PROJECT');";
        $data=$con->query($sql);
        $other=$data->num_rows;

        //Non Cert OD
        $sql="SELECT * FROM registration r INNER JOIN noncertod o ON r.regno like o.regno WHERE 
        (r.dept like '$dept') and (o.start <='$today' and o.end >='$today') AND (o.advisor like 'Approved');"; 
        $data=$con->query($sql);
       
       $noncert=$data->num_rows;
      }

function getDetails($batch)
{
      global $design,$today,$dept,$con,$detailsList,$batchAcc,$yprev;
      $cA=$cB=$cC=$cD=0;
      $tot=0;
      $A=$B=$C=$D='';
      $batchAcc='';
      $sql="SELECT * FROM registration r INNER JOIN oddetails o ON r.regno like o.regno INNER JOIN preod p ON o.appno like p.appno 
        WHERE (r.batch like '$batch') AND (r.dept like '$dept') and (o.odfrom <='$today' and o.odto >='$today') AND (p.status1 is not null) and 
        (p.status2 is not null) and (p.status3 is not null) and (p.advisor like 'Approved') and (p.yearin like 'Approved');";
      $data=$con->query($sql);
      if($data->num_rows==0)
      {
          $batchAcc.='<div class="header">No Data</div>';
      }
      else{
        
        while($row = mysqli_fetch_array($data))
        {
            if($row['sec']=='A')
            { 
                $cA++;
                $A.='<div class="item"><div class="header">'.$row['regno'].' - '.$row['name'].'</div><div class="description"><p>'.$row['odtype'].' ~ '.$row['college'].' ~ '.$row['title'].' </p></div></div>';
            }
            else if($row['sec']=='B')
            { 
                $cB++;
                $B.='<div class="item"><div class="header">'.$row['regno'].' - '.$row['name'].'</div><div class="description"><p>'.$row['odtype'].' ~ '.$row['college'].' ~ '.$row['title'].' </p></div></div>';
            }
            else if($row['sec']=='C')
            { 
                $cC++;
                $C.='<div class="item"><div class="header">'.$row['regno'].' - '.$row['name'].'</div><div class="description"><p>'.$row['odtype'].' ~ '.$row['college'].' ~ '.$row['title'].' </p></div></div>';
            }
            else if($row['sec']=='D')
            { 
                $cD++;
                $D.='<div class="item"><div class="header">'.$row['regno'].' - '.$row['name'].'</div><div class="description"><p>'.$row['odtype'].' ~ '.$row['college'].' ~ '.$row['title'].' </p></div></div>';
            }
        }
        $Aprev='<div class="accordion"><div class="title"><i class="dropdown icon"></i> A - '.$cA.'</div><div class="content"><div class="ui relaxed divided list">';
        $Bprev='<div class="accordion"><div class="title"><i class="dropdown icon"></i> B - '.$cB.'</div><div class="content"><div class="ui relaxed divided list">';
        $Cprev='<div class="accordion"><div class="title"><i class="dropdown icon"></i> C - '.$cC.'</div><div class="content"><div class="ui relaxed divided list">';
        $Dprev='<div class="accordion"><div class="title"><i class="dropdown icon"></i> D - '.$cD.'</div><div class="content"><div class="ui relaxed divided list">';
        $A.='</div></div></div>';
        $B.='</div></div></div>';
        $C.='</div></div></div>';
        $D.='</div></div></div>';
        $batchAcc.=$Aprev.$A;
        $batchAcc.=$Bprev.$B;
        $batchAcc.=$Cprev.$C;
        $batchAcc.=$Dprev.$D;
        $tot=$cA+$cB+$cC+$cD;
      }
      $yprev='<div class="ui accordion"><div class="title"><i class="dropdown icon"></i>'.$batch.' - '.$tot.'</div><div class="active content">';
      $yprev.=$batchAcc;
      $yprev.='</div></div>';
      return $yprev;
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
            <?php echo $paper; ?>
            </div>
              <div class="label">
             Paper
           </div>
          </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="ui blue inverted statistic">
         <div class="value">
           <?php echo $project; ?>
          </div>
           <div class="label" >
           Project
         </div>
        </div>
      </div>
    </div>
    <!-- FIRST CARD 2ND SEG -->
    <div class="middle aligned column">
    <div class="ui inverted segment">
         <div class="ui green inverted statistic">
           <div class="value">
            <?php echo $other; ?>
            </div>
              <div class="label">
             Other Events
           </div>
          </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="ui blue inverted statistic">
         <div class="value">
           <?php echo $noncert; ?>
          </div>
           <div class="label" >
            Non-Certificate
         </div>
        </div>
      </div>
     </div>
  </div><br>
  </div>
    <!-- CARD 2 -->
  <div class="ui raised very padded container segment">
  <div class="ui header">Students going OD Today</div>
  <div class="ui segment">
  <?php echo getDetails(2017); ?>
  <?php echo getDetails(2018); ?>
  <?php echo getDetails(2019); ?>
 </div>
</div><br>


</body>

</html>

