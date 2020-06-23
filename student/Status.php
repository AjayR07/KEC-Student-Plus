
<?php
session_start();
if(!isset($_SESSION['uname']))
{
  header("location: ../studLog.php");
}
$register=$_SESSION['uname'];
include_once('../db.php');
include_once('../assets/notiflix.php');
?>
<?php
function statusbar($i,$j,$k)
{
 
  $status="<ul class='steps'>";
  $n=1;
  while($n<=$i)
  {
    $status.='<li class="step step--complete step--inactive" ><span class="step__icon"></span><span class="step__label">'.$n.'</span></li>';
    $n+=1;
  }
  echo "<script>console.log(".$n.")</script>";
  if($j==1)
  {
    if($n<=$k)
    {
    $status.='<li class="step step--incomplete step--active" ><span class="step__icon"></span><span class="step__label">'.$n.'</span></li>';
    $n+=1;
    }
    while($n<=$k)
    {
        $status.='<li class="step step--incomplete step--inactive" ><span class="step__icon"></span><span class="step__label">'.$n.'</span></li>';
        $n+=1;
    }
  }
  else if($j==-1)
  {
    while($n<=$k)
    {
        $status.='<li class="step step--incomplete step--inactive"><span class="step__icon" style="background-color: red;"></span><span class="step__label">'.$n.'</span></li>';
        $n+=1;
    }
  }
  $status.= '</ul>';
  return $status;
}


function statusclassify($app,$con,$tab)
{
  //Function for the status bar
    $i=1;$j=1;$k=8;
    $approve=array('Permission Form Submitted','Staff 1 Approved','Staff 2 Approved','Staff 3 Approved','Advisor Approved','Year in Charge Approved','Certificate Uploaded','OD Approved');
    $legend=array("Waiting for Permission Form Submission","Waiting for Staff-1 Approval","Waiting for Staff-2 Approval","Waiting for Staff-3 Approval","Waiting for Advisor Approval","Waiting for Year in Charge Approval","Waiting for Certificate Submission","Waiting for OnDuty Approval");
    $decline=array('Staff 1 Declined','Staff 2 Declined','Staff 3 Declined','Advisor Declined','Year in Charge Declined','OD Declined');
    if(strcmp($tab,"oddetails")==0)
    {
      $sql1="SELECT status1,status2,status3,advisor,yearin from preod where appno like '$app'";
      $data=$con->query($sql1);
      $set=$data->fetch_assoc();
      if($set['status1']=='Approved')
      {
        $i++;
        if($set['status2']=='Approved')
        {
          $i++;
          if($set['status3']=='Approved')
          {
            $i++;
            if($set['advisor']=='Approved')
            {
              $i++;
              if($set['yearin']=='Approved')
              {
                $i++;
                $sql1="SELECT `certificate`,`status` from postod where appno like '$app'";
                $data2=$con->query($sql1);
                if($data2->num_rows)
                {
                  $set2=$data2->fetch_assoc();
                  if($set2['certificate'])
                  {
                    $i++;
                  
                    if($set2['status']=='Approved')
                    {
                      $i++;
                    }
                    else if( $set2['status']=='Declined')
                    {
                        $j=-1;
                    }
                  }
                }
              }
            }
          }
        }
      }

      if($set['yearin']=='Declined' || $set['advisor']=='Declined' || $set['status3']=='Declined'|| $set['status2']=='Declined' || $set['status1']=='Declined')  
      {
        $j=-1;
      }
   
      $n=$i;
      $sql2="SELECT odtype from oddetails where appno like '$app'";
      $type=($con->query($sql2))->fetch_assoc();
      if( strcmp($type["odtype"],"PROJECT") && strcmp($type["odtype"],"PAPER"))
      {
        $i-=3;
        $k=5;
        $approve=array('Permission Form Submitted','Advisor Approved','Year in Charge Approved','Certificate Uploaded','OD Approved',"","","");
        $legend=array("Waiting for Permission Form Submission","Waiting for Advisor Approval","Waiting for Year in Charge Approval","Waiting for Certificate Submission","Waiting for OnDuty Approval","","","");
        $decline=array('Advisor Declined','Year in Charge Declined',"",'OD Declined');
      }
    }


    else if(strcmp($tab,"noncertod")==0)
    {
      $sql1="select advisor,yearin from noncertod where appno like '$app'";
      $data=$con->query($sql1);
      $set=$data->fetch_assoc();
      if($set['advisor']=='Approved')
      {
        $i++;
        if($set['yearin']=='Approved')
        {
          $i++;
        }
      }

      if($set['yearin']=='Declined' || $set['advisor']=='Declined')  
      {
        $j=-1;
      }
      $approve=array('Permission Form Submitted','Advisor Approved','On Duty Approved','','','','','');
      $legend=array("","Waiting for Advisor Approval","Waiting for Year in Charge Approval","","","","","","");
      $decline=array('Advisor Declined','Year in Charge Declined','','','','','');

      $k=3;
    }


    else if(strcmp($tab,"othercert")==0)
    {
   
      $sql="SELECT r.status from othercert r where appno like '$app'";
      $sts=($con->query($sql))->fetch_assoc();
      if($sts['status']=='Approved')
      {
        $i++;
      }
      else if( $sts['status']=='Declined')
      {
          $j=-1;
      }
      $approve=array('Certificate Registered','Certificate Approved','','','','','','');
      $legend=array("","Waiting for Certificate Approval","","","","","","","");
      $decline=array('Certificate Declined',"",'','','','','');
    
      $k=2;
    }


    $st="<span style='color:cyan;'>";
    $br="</span><br><br>";
    $status='';

    if($j==1)
    {
      switch($i)
      {


        case 1: $status=$st.$approve[0].$br.$legend[1];
                break;
        case 2: $status=$st.$approve[1].$br.$legend[2];
                break;
        case 3: $status=$st.$approve[2].$br.$legend[3];
                break;
        case 4: $status=$st.$approve[3].$br.$legend[4];
                break;
        case 5: $status=$st.$approve[4].$br.$legend[5];
                break;
        case 6: $status=$st.$approve[5].$br.$legend[6];
                break;
        case 7: $status=$st.$approve[6].$br.$legend[7];
                break;
        case 8: $status=$st.$approve[7]."</span>";
                break;
      }
    }
    else if($j==-1)
    {      
      $st="<span style='color:#F20056;'>";
      $end="</span>";   
      switch($i+1)
      {
        
          case 2: $status=$st.$decline[0].$end;
                  break;
          case 3: $status=$st.$decline[1].$end;
                  break;
          case 4: $status=$st.$decline[2].$end;
                  break;
          case 5: $status=$st.$decline[3].$end;
                  break;
          case 6: $status=$st.$decline[4].$end;
                break; 
          case 8: $status=$st.$decline[5].$end;
                  break;
      }
    }
    return array($i,$j,$k,$status);
}
?>
<!DOCTYPE html>
<html>
    <head>


        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>OD Status</title>
        <link rel="icon" type="image/png" href="../KEC.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <style>

       @-webkit-keyframes bounce {
         0% {
           -webkit-transform: scale(1);
                   transform: scale(1);
         }
         33% {
           -webkit-transform: scale(0.9);
                   transform: scale(0.9);
         }
         66% {
           -webkit-transform: scale(1.1);
                   transform: scale(1.1);
         }
         100% {
           -webkit-transform: scale(1);
                   transform: scale(1);
         }
       }
       @keyframes bounce {
         0% {
           -webkit-transform: scale(1);
                   transform: scale(1);
         }
         33% {
           -webkit-transform: scale(0.9);
                   transform: scale(0.9);
         }
         66% {
           -webkit-transform: scale(1.1);
                   transform: scale(1.1);
         }
         100% {
           -webkit-transform: scale(1);
                   transform: scale(1);
         }
       }
       /* Base Styles */
       html {
         font-size: 16px;
       }

       html,
    .pro {
         height: 100%;
       }

      .pro {
         display: -webkit-box;
         display: flex;
         -webkit-box-align: center;
                 align-items: center;
         -webkit-box-pack: center;
                 justify-content: center;

         color: #FF0000;
         font-family: 'Open Sans', sans-serif;
       }

       /* Component Styles - Steps */
       .steps {
         display: -webkit-box;
         display: flex;
         width: 100%;
         margin: 0;
         padding: 0 0 2rem 0;
         list-style: none;
       }

       .step {
         display: -webkit-box;
         display: flex;
         -webkit-box-align: center;
                 align-items: center;
         -webkit-box-pack: center;
                 justify-content: center;
         -webkit-box-orient: vertical;
         -webkit-box-direction: normal;
                 flex-direction: column;
         -webkit-box-flex: 1;
                 flex: 1;
         position: relative;
         pointer-events: none;
       }
       .step--active, .step--complete {
         cursor: pointer;
         pointer-events: all;
       }
       .step:not(:last-child):before, .step:not(:last-child):after {
         display: block;
         position: absolute;
         top: 50%;
         left: 50%;
         height: 0.25rem;
         content: '';
         -webkit-transform: translateY(-50%);
                 transform: translateY(-50%);
         will-change: width;
         z-index: -1;
       }
       .step:before {
         width: 100%;
         background-color: #FF0000;
       }
       .step:after {
         width: 0;
         background-color: #32CD32;;
       }
       .step--complete:after {
         width: 100% !important;
         opacity: 1;
         -webkit-transition: width 0.6s ease-in-out, opacity 0.6s ease-in-out;
         transition: width 0.6s ease-in-out, opacity 0.6s ease-in-out;
       }

       .step__icon {
         display: -webkit-box;
         display: flex;
         -webkit-box-align: center;
                 align-items: center;
         -webkit-box-pack: center;
                 justify-content: center;
         position: relative;
         width: 1.5rem;
         height: 1.5rem;
         background-color: #292627;
         border: 0.25rem solid #FF0000;
         border-radius: 50%;
         color: transparent;
         font-size: 1rem;
       }


       .step__icon:before {
         display: block;
         color: #fff;
         content: '\2713';
       }
       .step--complete.step--active .step__icon {
         color: #fff;
         -webkit-transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out, color 0.3s ease-in-out;
         transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out, color 0.3s ease-in-out;
       }
       .step--incomplete.step--active .step__icon 
       {
         border-color: #32CD32;
         -webkit-transition-delay: 0.5s;
                 transition-delay: 0.5s;
       }

       .step--complete .step__icon {
         -webkit-animation: bounce 0.5s ease-in-out;
                 animation: bounce 0.5s ease-in-out;
         background-color: #32CD32;
         border-color: #32CD32;;
         color: #fff;
       }

       .step__label {
         position: absolute;
         bottom: -2rem;
         left: 50%;
         margin-top: 1rem;
         font-size: 0.8rem;
         text-transform: uppercase;
         -webkit-transform: translateX(-50%);
                 transform: translateX(-50%);
       }
       .step--incomplete.step--inactive .step__label {
         color: #FF0000;
       }
       .step--incomplete.step--active .step__label {
         color: #fff;
       }
       .step--active .step__label {
         -webkit-transition: color 0.3s ease-in-out;
         transition: color 0.3s ease-in-out;
         -webkit-transition-delay: 0.5s;
                 transition-delay: 0.5s;
       }
  
      .container 
      {
      width: 600px;
      margin: 100px auto;
      }
</style>
       
       
   

<style>
.pusher {
  
  padding-bottom:3%;
}
</style>

</head>

<div class="pusher" background="../backlogout.jpg">
<?php include_once('studentnav.php');
include_once('../assets/notiflix.php');
?>
<center>
<br>
<br>

<h2 class="ui header" style="color:white">
<i class="history icon"></i>
  <div class="content">
    OD Status
    <div class="sub header" style="color:white">View the status of the On-Duties Applied</div>
  </div>
</h2>
    </center>
    <br>
<table class="ui inverted table" style="width:90%; margin-left:5%; margin-right:5%;text-align:center;">
  <thead>
    <tr>
      <th>S.No.</th>
      <th>Application Number</th>
      <th>OD Date</th>
      <th>OD Type</th>
      <th><button class="ui secondary button" data-tooltip="Show Legend" data-position="bottom center">Progress Bar</button></th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i=1;

    $sql="SELECT r.appno,r.odfrom,r.odtype from oddetails r where `regno` like '$register'";
    $data=$con->query($sql);
    if($data->num_rows!=0)
    {
      while ($row = mysqli_fetch_array($data))
      {
 
        echo "<tr>";
        echo '<td>'.$i++.'</td>';
        echo '<td>'.$row["appno"].'</td>';
        echo "<td>".date_format(date_create($row['odfrom']),'d/m/Y')."</td>";
        echo "<td >".$row["odtype"]."</td>";
        $arr=statusclassify($row['appno'],$con,"oddetails");
        echo "<td id='pro' name='pro'>".statusbar($arr[0],$arr[1],$arr[2])."</td>";
        echo "<td style='font-size:15px'>".$arr[3]."</td>";
        echo "</tr>";
      }
    }

    $sql="SELECT r.appno,r.activity,r.start from noncertod r where `regno` like '$register'";
    $data1=$con->query($sql);
    if($data1->num_rows!=0)
    {
      while ($row = mysqli_fetch_array($data1))
      {

        echo "<tr>";
        echo '<td>'.$i++.'</td>';
        echo '<td>'.$row["appno"].'</td>';
        echo "<td>".date_format(date_create($row['start']),'d/m/Y')."</td>";
        echo '<td >'.$row["activity"].'</td>';
        $arr=statusclassify($row['appno'],$con,"noncertod");
        echo "<td id='pro' name='pro'>".statusbar($arr[0],$arr[1],$arr[2])."</td>";
        echo "<td style='font-size:15px'>".$arr[3]."</td>";
        echo "</tr>";
      }
    }

    $sql="SELECT r.appno,r.start,r.type from othercert r where `regno` like '$register'";
    $data2=$con->query($sql);
    if($data2->num_rows!=0)
    {
      while ($row = mysqli_fetch_array($data2))
      {
   
        echo "<tr>";
        echo '<td>'.$i++.'</td>';
        echo '<td>'.$row["appno"].'</td>';
        echo "<td>".date_format(date_create($row['start']),'d/m/Y')."</td>";
        echo '<td >'.$row["type"].'</td>';
        $arr=statusclassify($row['appno'],$con,"othercert");
        echo "<td id='pro' name='pro'>".statusbar($arr[0],$arr[1],$arr[2])."</td>";
        echo "<td style='font-size:15px'>".$arr[3]."</td>";
        echo "</tr>";
      }
    }

    if(($data->num_rows==0)&&($data1->num_rows==0)&&($data2->num_rows==0))
    {
      echo "<tr><td colspan='6' ><center>No Records Found</center></td></tr>";
    }

    
    $con->close();
  ?>

  </tbody>
</table>
</div>



<div class="ui basic modal">
  <div class="ui icon header">
    <i class="info icon"></i>
    KEC Student+
  </div>
  <div class="content">

    <p>Step 1 : Submitted Permission Form.Waiting for Staff Approval.</p>
    <p>Step 2 : Staff 1 Approved. Waiting for Staff 2.</p>
    <p>Step 3 : Staff 2 Approved. Waiting for Staff 3.</p>
    <p>Step 4 : Staff 3 Approved. Waiting for Advisor to Approve.</p>
    <p>Step 5 : Permission Given. Waiting for Certificate to be uploaded.</p>
    <p>Step 6 : Certificate Uploaded. Waiting for Advisor Approval.</p>
    <p>Step 7 : Advisor Approved. On-Duty Given.</p>
    <p>Step 8 : On-Duty Sanctioned.</p>

  </div>
  <div class="actions">

    <div class="ui blue ok inverted button">
      <i class="checkmark icon"></i>
      Okay
    </div>
  </div>
</div>

<script>

     $(document).ready(function(){
       $("button").click(function(){
     $('.ui.basic.modal').modal('show');
   });
       });
       </script>
</body>

</html>
