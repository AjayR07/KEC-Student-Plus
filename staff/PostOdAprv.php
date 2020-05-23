<?php
    session_start();
    if(!isset($_SESSION['user']))
    {
      header("Location: ../staffLog.php");
    }
    include_once('../db.php');
    include_once('staffnav.php');
    include_once('../assets/notiflix.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Post OD Approve</title>


    <link href="css/main.css" rel="stylesheet" media="all">
    <style>
    .card{
        height: 70%;
        width: 100%;/*1000px;*/
    }
    table, th, td
     {
     border: 1px solid black;
     color:white;
     font-size: 130%;
    }
    p{
            color:white;
            font-size: 150%;
    }
    th {
  text-align: left;
    }
    th,td{
      height:50px;
    }
    </style>

</head>

<body>
<?php include_once('staffnav.php');
include_once('../assets/notiflix.php');?>

<style>
  body
        {
            background:url('../backstaff.jpg');
            font-family: 'Open Sans', sans-serif;
        }

</style>
<?php
if(isset($_GET['id']))
{
    //echo '<script>alert("getting in");</script>';
    $appno=$_GET['id'];
    $sql1="Select * from oddetails where appno like '$appno'";
    $data=$con->query($sql1);
    if($data->num_rows<=0)
    {
        $sql="select * from othercert o,registration r where o.appno like '$appno' and o.regno like r.regno";
        $data=$con->query($sql);
        $cr=$data->fetch_assoc();
        $_SESSION['appno']=$appno;
        $_SESSION['type']='CR';
        if($data->num_rows<=0)
        {
          echo "<body><script> Notiflix.Report.Failure( 'KEC Student+', 'Application Number Invalid.', 'Retry', function(){location.replace('OdList.php');} ); </script></body>";
          exit();
        }
    }
    else
    {
      $odrow=$data->fetch_assoc();
      $sql="Select * from registration where `regno` like '{$odrow['regno']}'";
      $data=$con->query($sql);
      $det=$data->fetch_assoc();
      $sql2="Select name from registration where regno like '".$odrow['regno']."'";
      $data=$con->query($sql2);
      $temp=$data->fetch_assoc();
      $name=$temp['name'];
      $sql3="select * from postod where appno like '$appno'";
      $data=$con->query($sql3);
      $postrow=$data->fetch_assoc();
      $_SESSION['appno']=$appno;
      $_SESSION['type']='OD';
   }
}
if(isset($_GET['id'])==false && isset($_POST['status'])==false)
{
    echo "</body><script> Notiflix.Report.Failure( 'KEC Student+', 'Bad Gateway', 'Exit', function(){location.replace('PostOdList.php');} ); </script></body>";
    exit();
}

?>
<?php
$a=0;
$d=0;
$o=0;
$p=0;
$mail=($_SESSION['type']=='OD')?$det['mail']:$cr['mail'];
$phone=($_SESSION['type']=='OD')?$det['phone']:$cr['phone'];
$regno=($_SESSION['type']=='OD')?$odrow['regno']:$cr['regno'];
$name=($_SESSION['type']=='OD')?$name:$cr['name'];
$sql="SELECT o.status as status, p.status1 as status1, p.status2 as status2, p.status3 as status3,p.advisor as advisor from registration r, oddetails o,preod p where (r.regno like '$regno') and (r.regno like o.regno) and (o.appno like p.appno)";
//echo '<script>alert("'.$sql.'")</script>';
$sql2="SELECT c.status as othercert from othercert c where c.regno like '$regno'";
$data=$con->query($sql);
if($data->num_rows==0)
{
    echo '<tr><td colspan="6">No Record Found</td></tr>';
}
else{
while ($row = mysqli_fetch_array($data))
{
    if($row['status']=='Approved' && $row['status1']=='Approved' && $row['status2']=='Approved' && $row['status3']=='Approved' && $row['advisor']=='Approved')
    { $a++; }
    else if($row['status']=='Declined' || $row['status1']=='Declined' || $row['status2']=='Declined' || $row['status3']=='Declined' || $row['advisor']=='Declined')
    { $d++; }
    else if($row['status']=='Pending' || $row['status1']=='Pending' || $row['status2']=='Pending' || $row['status3']=='Pending' || $row['advisor']=='Pending')
    { $p++; }

}
}
$data=$con->query($sql2);
$a=$a+$data->num_rows;
if($data->num_rows==0)
{
    echo '<tr><td colspan="6">No Record Found</td></tr>';
}
else{
while ($row = mysqli_fetch_array($data))
{
        if($row['othercert']=='Approved')
        {
          $o++;
        }
        else if($row['othercert']=='Declined')
        {
          $d++;
        }
        else if($row['othercert']=='Pending')
        {
          $p++;
        }
}
}
?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

        $stat=$_POST['status'];
        if($_SESSION['type']=="OD")
        {            $sql="UPDATE postod set `status`='$stat' where appno like '".$_SESSION['appno']."'";
                    if($con->query($sql))
                    {
                        $sql="UPDATE oddetails set `status`='$stat' where appno like '".$_SESSION['appno']."'";
                        if($con->query($sql))
                        {
                            echo "<script> Notiflix.Report.Success( 'KEC Student+', 'Application Status Updated Successfully.', 'Okay', function(){location.replace('PostOdList.php');} ); </script>";
                            exit();
                        }
                        else{
                            echo "<script> Notiflix.Report.Failure( 'KEC Student+', 'Updation Error. Please try agin later.', 'Okay', function(){window.location.replace('PostOdList.php');}); </script>";
                            exit();
                        }
                    }
                    else{
                        echo "<script> Notiflix.Report.Failure( 'KEC Student+', 'Updation Error. Please try agin later.', 'Okay', function(){window.location.replace('PostOdList.php');}); </script>";
                        exit();
                    }
        }
        else{
            $sql="UPDATE othercert set `status`='$stat' where appno like '".$_SESSION['appno']."'";
            if($con->query($sql))
            {
                echo "<script> Notiflix.Report.Success( 'KEC Student+', 'Application Status Updated Successfully.', 'Okay', function(){location.replace('PostOdList.php');} ); </script>";
                exit();
            }
            else{
                    echo "<script> Notiflix.Report.Failure( 'KEC Student+', 'Updation Error. Please try agin later.', 'Okay', function(){window.location.replace('PostOdList.php');}); </script>";
                    exit();
                }
            }
        }
?>
<center>
<br>
<script type="text/javascript">
  $(document).ready(function() {

      $('#pop').popup({
        on    : 'click',
        inline     : true,
        position   : 'bottom center',
    popup: '#tool'
  });

  });
</script>
 <h1 align="center" style="color:bisque;">Proof Submission Form of <?php echo ($_SESSION['type']=='OD')?$name:$cr['name']; ?> <div class="pop"><i class="user circle icon" id="pop"></i></div></h1> <br>
 <div class="ui special basic popup" id="tool">
   <h1 class="header">
      Profile
   </h1>
 <br>
 <h4 class="content">
   Name: <?php echo $name; ?><br><br>
   Phone: <?php echo $phone; ?><br><br>
   Mail Id: <a href="mailto:<?php echo $mail; ?>"><i class="mail icon"></i></a><br><br>
   Total Applied: <?php echo $a+$p+$d; ?><br><br>
   Total Pending: <?php echo $p; ?><br><br>
  Total Granted: <?php echo $a; ?><br><br>
   Total Rejected: <?php echo $d; ?><br><br>
   Certificates Registered: <?php echo $o; ?> <br>
 </h4>
   </div>
 </div>

    <div class="page-wrapper p-t-80 p-b-100">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-image">
                    <div class="card-body">
                    <center> <h1 class="title"><b>Proof Approval</b> </h1></center>
                        <br>
                        <table>
                                <tr>
                                    <td>Application:</td>
                                    <td><?php echo $appno;?></td>
                                </tr>

                                <tr>
                                    <td>Roll No: </td>
                                    <td><?php echo ($_SESSION['type']=='OD')?$odrow['regno']:$cr['regno'];?></td>
                                    </tr>
                                <tr>
                                    <td>Name: </td>
                                    <td><?php echo ($_SESSION['type']=='OD')?$name:$cr['name']; ?></td>
                                </tr>
                                <tr>
                                    <td >Applied Date: &nbsp&nbsp&nbsp </td>
                                    <td align="center"><?php echo ($_SESSION['type']=='OD')?date_format(date_create($odrow['appdate']),'d/m/Y'):date_format(date_create($cr['appdate']),'d/m/Y');?></td>
                                </tr>
                                <tr>
                                    <td>Date: </td>
                                    <td>From: &nbsp<?php echo ($_SESSION['type']=='OD')?date_format(date_create($odrow['odfrom']),'d/m/Y'):date_format(date_create($cr['start']),'d/m/Y');?> <br>To &nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp
                                      <?php echo ($_SESSION['type']=='OD')?date_format(date_create($odrow['odto']),'d/m/Y'):date_format(date_create($cr['end']),'d/m/Y');?></td>

                                </tr>
                                <tr>
                                    <td>Type: </td>
                                    <td><?php echo ($_SESSION['type']=='OD')?$odrow['odtype']:$cr['type'];?> <br></td>

                                </tr>
                                <tr>
                                    <td><?php echo ($_SESSION['type']=='OD')?'No. of Hrs: ':'No. of Days: ';?></td>
                                    <td><?php echo ($_SESSION['type']=='OD')?$odrow['hrs']:$cr['days'];?>
                                </tr>
                                <tr>
                                    <td>Purpose: </td>
                                    <td><?php echo ($_SESSION['type']=='OD')?$odrow['purpose']:$cr['purpose'];?></td>
                                </tr>
                                <tr>
                                    <td>Title?Designation: </td>
                                    <td><?php echo ($_SESSION['type']=='OD')?$odrow['title']:$cr['title'];?></td>
                                </tr>
                                <tr>
                                    <td>College/Company: </td>
                                    <td><?php echo ($_SESSION['type']=='OD')?$odrow['college']:$cr['cname'];?></td>
                                </tr>
                                <tr>
                                    <td>State: </td>
                                    <td><?php echo ($_SESSION['type']=='OD')?$odrow['state']:$cr['state'];?></td>
                                </tr>
                                <tr>
                                    <td>Rewards: </td>
                                    <td><?php echo ($_SESSION['type']=='OD')?$postrow['prize']:"NA";?></td>
                                </tr>
                            </table>

                    </div>
                </div>
            </div>
            <br>

            <div class="card card-3">
                <div class="card-image">
                    <div class="card-body">
                    <center>
                      <div class="ui form">
                      <div class="field">
                      <a href="../repos/certificate/<?php echo ($_SESSION['type']=='OD')?($det['batch'].'/'.$det['dept'].'/'.$det['sec'].'/'.$postrow['certificate']):($cr['batch'].'/'.$cr['dept'].'/'.$cr['sec'].'/'.$cr['file']);?>" download><button class="big ui teal button">
                      Download Proof</button></a><div><br><br>
                    <!-- <a href="../repos/certificates/<?php //echo $det['batch'].'/'.$det['dept'].'/'.$det['sec'].'/'.$postrow['certificate'];?>"> <button> Download Proof</button></a><br> -->
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <center>
                        <div class="fields">
                        <div class="field">
                            <button type="submit" name="status" class="big ui positive button" value="Approved">Approve</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="field">
                        <button type="submit" name="status" class="big ui negative button" value="Declined">Decline</button>
                        </div>
                    </div>
                    </center>
                    </div>
                        </center>
                    </div>
                </div>
            </div><br>
        </div>
    </div>

</center>
</body>

</html>
