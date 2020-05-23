
<?php
session_start();
if(!isset($_SESSION['uname']))
{
    header("location: ../studLog.php");
}
$register=$_SESSION['uname'];
include_once('../db.php');
include_once('studentnav.php');
include_once('../assets/notiflix.php');
?>
<?php
function statusbar($i)
{
$status="<ul class='steps'>";
$n=1;
while($n<=$i)
{
  $status.='<li class="step step--complete step--inactive" ><span class="step__icon"></span><span class="step__label">'.$n.'</span></li>';
  $n+=1;
}
if($i==7 && $n==8)
{
  $status.='<li class="step step--complete step--active" ><span class="step__icon"></span><span class="step__label">'.$n.'</span></li>';
  $n+=1;
}
else {
  $status.='<li class="step step--incomplete step--active" ><span class="step__icon"></span><span class="step__label">'.$n.'</span></li>';
  $n+=1;
}


  while($n<=8)
  {
      $status.='<li class="step step--incomplete step--inactive" ><span class="step__icon"></span><span class="step__label">'.$n.'</span></li>';
      $n+=1;
  }


  $status.= '</ul>';
  return $status;
}
function statusclassify($app,$con,$ele)
{
  //Function for the status bar
    $i=1;$j=1;
    $sql1="SELECT status1,status2,status3,advisor from preod where appno like '$app'";
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
                $i++;
            else if($set['advisor']=='Declined')
                $j=-1;
            else
                $j=1;
          }
          else if($set['status3']=='Declined')
            $j=-1;
          else
            $j=1;
        }
        else if($set['status2']=='Declined')
          $j=-1;
        else
          $j=1;

    }
    else if($set['status1']=='Declined')
        $j=-1;
    else
        $j=1;
    $sql1="SELECT `appno`,`status` from postod where appno like '$app'";
    $data=$con->query($sql1);
    if($data->num_rows==0)
    {
      if($set['advisor']=='Approved')
          $j=-1;
    }
    else
    {
      $j=1;
      $set=$data->fetch_assoc();

      $i++;
      if($set['status']=='Approved')
      {
        $i++;
      }
    }
    $status='';
    if(strcmp($ele,"status")==0)
    {
      if($j==1)
      {           switch($i)
                  {
                    case 1: $status='Permission Form Submitted';
                            break;
                    case 2: $status='Staff 1 Approved';
                            break;
                    case 3: $status='Staff 2 Approved';
                            break;
                    case 4: $status='Staff 3 Approved';
                            break;
                    case 5: $status='Advisor Approved';
                            break;
                    case 6: $status='Certificate Uploaded';
                            break;
                    case 7: $status='OD Approved';
                            break;

                  }
      }
      if($j==-1)
      {           switch($i+2)
                  {
                    case 1: $status='Permission Form Submitted';
                            break;
                    case 2: $status='Permission Form Submitted';
                            break;
                    case 3: $status='Staff 1 Decined';
                            break;
                    case 4: $status='Staff 2 Declined';
                            break;
                    case 5: $status='Staff 3 Declined';
                            break;
                    case 6: $status='Advisor Declined';
                            break;
                    case 7: $status='Certificate Not Uploaded';
                            break;
                    case 8: $status='OD Declined';
                            break;

                    }
      }

      return $status;
    }
    return statusbar($i);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>OD Status</title>
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
       .step--incomplete.step--active .step__icon {
         border-color: #32CD32;;
         -webkit-transition-delay: 0.5s;
                 transition-delay: 0.5s;
       }
       .step--complete .step__icon {
         -webkit-animation: bounce 0.5s ease-in-out;
                 animation: bounce 0.5s ease-in-out;
         background-color: #32CD32;;
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
       .container {
   width: 600px;
   margin: 100px auto;
}
       </style>
       <script>

     $(document).ready(function(){
       $("button").click(function(){
     $('.ui.basic.modal').modal('show');
   });
       });
       </script>



<style>
body  {
  background-image: url("../backlogout.jpg");
}
</style>
</head>

<body background="../backlogout.jpg">

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
    // , preod p where (r.regno like d.regno) and (d.appno like p.appno)
    // and (r.batch like '$batch') and (r.dept like '$dep') and (r.sec like '$sec') and (p.status1 is not null) and (p.status2 is not null)
    // and (p.status3 is not null) and (p.advisor like 'Pending');";
    //echo '<script>alert("'.$sql.'");</script>';
    $data=$con->query($sql);
    if($data->num_rows==0)
    {
        echo '<tr><td colspan="6">No Record Found</td></tr>';
    }
    else{
    while ($row = mysqli_fetch_array($data))
    {
      $index=$row["appno"];
       echo "<tr>";
       echo '<td>'.$i++.'</td>';
      echo '<td>'.$row["appno"].'</td>';
      echo "<td>".date_format(date_create($row['odfrom']),'d/m/Y')."</td>";
      echo "<td >".$row["odtype"]."</td>";
      echo "<td id='pro' name='pro'>".statusclassify($row['appno'],$con,"bar")."</td>";
      echo "<td>".statusclassify($row['appno'],$con,"status")."</td>";
      echo "</tr>";

    }

   }
    $con->close();
?>

  </tbody>
</table>

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


</body>
</html>
