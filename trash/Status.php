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
function statusbar($i,$j)
{
  $obj1=$obj2=$obj3=$obj4=$obj5=$obj6=$obj7=$obj8='';
  $color='green';
  if($j==-1)
    $color='red';
  else
    $color='red';
  switch($i)
  {
    case 1: $per=3;
            $obj1='class="active"';
            break;
    case 2: $per=6;
            $obj1=$obj2='class="active"';
            break;
    case 3: $per=9;
            $obj1=$obj2=$obj3='class="active"';
            break;
    case 4: $per=12;
            $obj1=$obj2=$obj3=$obj4='class="active"';
            break;
    case 5: $per=15;
            $obj1=$obj2=$obj3=$obj4=$obj5='class="active"';
            break;
    case 6: $per=18;
            $obj1=$obj2=$obj3=$obj4=$obj5=$obj6='class="active"';
            break;
    case 7: $per=21;
            $obj1=$obj2=$obj3=$obj4=$obj5=$obj6=$obj7='class="active"';
            break;
    case 8: $per=24;
            $obj1=$obj2=$obj3=$obj4=$obj5=$obj6==$bj7=$obj8='class="active"';
            break;
  }

  return '<style>
  .container {
width: 600px;
margin: 100px auto;
}
.progressbar {
counter-reset: <span class="material-icons">error</span>;
}
.progressbar li {
list-style-type: none;
width: '.$per.'%;
float: left;
font-size: 9px;
position: relative;
text-align: center;
text-transform: uppercase;
color:'.$color.';
}
.progressbar li:before {
width: 20px;
height: 20px;
content: <span class="material-icons">error</span>;

line-height: 20px;
border: 2px solid '.$color.';
display: block;
text-align: center;
margin: 0 auto 10px auto;
border-radius: 50%;
background-color: white;
}
.progressbar li:after {
width: 100%;
height: 2px;
content: "";
position: absolute;
background-color:'.$color.';
top: 10px;
left: -50%;
z-index: -1;
}
.progressbar li:first-child:after {
content: none;
color: '.$color.';
}
.progressbar li.active {
color: green;
}
.progressbar li.active:before {
border-color: green;
}
.progressbar li.active + li:after {
background-color: green;

}
</style>
<ul class="progressbar">
          <li '.$obj1.'></li>
          <li '.$obj2.'></li>
          <li '.$obj3.'></li>
          <li '.$obj4.'></li>
          <li '.$obj5.'></li>
          <li '.$obj6.'></li>
          <li '.$obj7.'></li>
          <li '.$obj8.'></li>
        </ul>';
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
    return statusbar($i,$j);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>OD Status</title>
    <style>
          .container {
      width: 600px;
      margin: 100px auto;
  }
  .progressbar {
      counter-reset: step;
  }
  .progressbar li {
      list-style-type: none;
      width: 3%;
      float: left;
      font-size: 12px;
      position: relative;
      text-align: center;
      text-transform: uppercase;
      color: #7d7d7d;
  }
  .progressbar li:before {
      width: 20px;
      height: 20px;
      content: counter(step);
      counter-increment: step;
      line-height: 20px;
      border: 2px solid #7d7d7d;
      display: block;
      text-align: center;
      margin: 0 auto 10px auto;
      border-radius: 50%;
      background-color: white;
  }
  .progressbar li:after {
      width: 100%;
      height: 2px;
      content: '';
      position: absolute;
      background-color: #7d7d7d;
      top: 10px;
      left: -50%;
      z-index: -1;
  }
  .progressbar li:first-child:after {
      content: none;
  }
  .progressbar li.active {
      color: green;
  }
  .progressbar li.active:before {
      border-color: #55b776;
  }
  .progressbar li.active + li:after {
      background-color: #55b776;
  }
  </style>


  <script>
  $(document).ready(function(){
    $("button").click(function(){
  $('.ui.basic.modal')
  .modal('show');})});

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
      <th><button class="ui secondary button">Progress Bar</button></th>
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
       echo "<tr>";
       echo '<td>'.$i++.'</td>';
      echo '<td>'.$row["appno"].'</td>';
      echo "<td>".date_format(date_create($row['odfrom']),'d/m/Y')."</td>";
      echo "<td>".$row["odtype"]."</td>";
      echo "<td>".statusclassify($row['appno'],$con,"bar")."</td>";
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

    <p>Step 1 : <h4 style="color:green">Submitted Permission Form.</h4><h4 style="color:yellow">Waiting for Staff Approval.</h4></p>
    <p>Step 2 : Staff 1 Approved. Waiting for Staff 2.</p>
    <p>Step 3 : Staff 2 Approved. Waiting for Staff 3.</p>
    <p>Step 4 : Staff 3 Approved. Waiting for Advisor to Approve.</p>
    <p>Step 5 : Permission Given. Waiting for Certificate to be uploaded.</p>
    <p>Step 6 : Certificate Uploaded. Waiting for Advisor Approval.</p>
    <p>Step 7 : Advisor Approved. On-Duty Given.</p>

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
