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
    
    <link rel="icon" type="image/png" href="../KEC.png">
 
    <title>OD Details</title>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&display=swap" rel="stylesheet">

    <link href="css/main.css" rel="stylesheet" media="all">

    <style>

    .card{
        height: 70%;
        width: 100%;/*1000px;*/
    }
    body
        {
            font-family: 'Open Sans', sans-serif;
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
        height: 35px;
    }
    </style>
</head>

<body>
<?php include_once('staffnav.php');
include_once('../assets/notiflix.php');?>

<style>
    body{
        background:url('../backstaff.jpg');
        font-family: 'Open Sans', sans-serif;
    }
</style>
<?php
if(isset($_GET['id']))
{
    $appno=$_GET['id'];
    $sql1="Select * from oddetails where appno like '$appno'";
    $data=$con->query($sql1);
    if($data->num_rows<=0)
    {
        echo "<script> Notiflix.Report.Failure( 'KEC Student+', 'Application Number Invalid.', 'Retry', function(){location.replace('OdList.php');} ); </script>";
        exit();
    }
    $odrow=$data->fetch_assoc();
    $sql2="Select * from registration where regno like '".$odrow['regno']."'";
    $data=$con->query($sql2);
    $temp=$data->fetch_assoc();
    $name=$temp['name'];
    $sql3="select * from preod where appno like '$appno'";
    $data=$con->query($sql3);
    $prerow=$data->fetch_assoc();
    $_SESSION['appno']=$appno;
    $_SESSION['type']='OD';
}
?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $stat=$_POST['advisor'];
        if($_SESSION['design']=='Advisor')
        {
            $sql="UPDATE preod set advisor='$stat' where appno like '".$_SESSION['appno']."'";
        }
        else if($_SESSION['design']=='Year in Charge')
        {
            $sql="UPDATE preod set yearin='$stat' where appno like '".$_SESSION['appno']."'";
        }
        if($con->query($sql))
        {
            echo "<script> Notiflix.Report.Success( 'KEC Student+', 'Application Status Updated Successfully.', 'Okay', function(){window.location.replace('OdList.php');}); </script>";
            unset($_SESSION['appno']);
            exit();
        }
        else{
            echo "<script> Notiflix.Report.Failure( 'KEC Student+', 'Updation Error. Please try agin later.', 'Okay', function(){window.location.replace('OdList.php');}); </script>";
            unset($_SESSION['appno']);
            exit();
        }
    }
    if(!isset($_GET['id']) && !isset($_POST['advisor']))
    {
        echo "<script> Notiflix.Report.Failure( 'KEC Student+', 'Bad Gateway', 'Exit', function(){location.replace('OdList.php');} ); </script>";
        exit();
    }

?>

<?php
$a=0;
$d=0;
$o=0;
$p=0;
$mail=$temp['mail'];
$phone=$temp['phone'];
$gender=$temp['gender'];
$regno=$odrow['regno'];
$name=$temp['name'];
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
        <script>
function editmodal()
    {
        $("#Editor").form('set values', {

        e_regno    : "<?php echo $odrow['regno'];?>",
        e_name     : "<?php echo $name; ?>",

        e_appno    : "<?php echo $appno ?>",
        e_date     : "<?php echo $odrow['appdate'];?>",

        e_start    : "<?php echo date_format(date_create($odrow['odfrom']),'m/d/Y');?>",
        e_end      : "<?php echo date_format(date_create($odrow['odto']),'m/d/Y');?>",

        e_type     : "<?php echo $odrow['odtype'];?>",
        e_hrs      : "<?php echo $odrow['hrs'];?>",

        e_title    : "<?php echo $odrow['title'];?>",
        e_college  : "<?php echo $odrow['college'];?>",

        e_state    : "<?php echo $odrow['state'];?>",
  

    });
    $("#Editor").modal("show");
    }

</script>
    <h1 align="center" style="color:bisque;">OD Permission Form of <?php echo $name; ?><div class="pop"><h3><a class="ui right aligned item" id="pop" >
<?php 
if($gender=='Male')
    echo '<img class="ui avatar image" src="../images/matthew.png"/>';
else if($gender=='Female')
    echo '<img class="ui avatar image" src="../images/molly.png"/>'; 
else
    echo '<img class="ui avatar image" src="../images/elyse.png"/>';
?></a></h3></div></h1> <br>
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

    <div class="page-wrapper  p-t-80 p-b-100">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-image">
                    <div class="card-body">
                    <center> <h1 class="title"><b>Permission Form</b> </h1></center>
                        <br>
                            <table id="tab">
                                <tr>
                                    <td>Application:</td>
                                    <td><h3><?php echo $appno;?>&nbsp <button class="ui circular icon button" style="background-color:bisque;color:black;" id="mod"> <i class="edit icon" ></i></button></h3></td>
                                </tr>

                                <tr>
                                    <td>Roll No: </td>
                                    <td><?php echo $odrow['regno'];?></td>
                                    </tr>
                                <tr>
                                    <td>Name: </td>
                                    <td><?php echo $name; ?></td>
                                </tr>
                                <tr>
                                    <td >Applied Date: &nbsp&nbsp&nbsp </td>
                                    <td ><?php echo date_format(date_create($odrow['appdate']),'d/m/Y');?></td>
                                </tr>
                                <tr>
                                    <td>Date: </td>
                                    <td>From: &nbsp<?php echo date_format(date_create($odrow['odfrom']),'d/m/Y');?> <br></br>To &nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp<?php echo date_format(date_create($odrow['odto']),'d/m/Y');?></td>

                                </tr>
                                <tr>
                                    <td>OD Type: </td>
                                    <td><?php echo $odrow['odtype'];?></td>
                                </tr>
                                <tr>
                                    <td>No. of Hrs: </td>
                                    <td><?php echo $odrow['hrs'];?></td>
                                </tr>
                                <tr>
                                    <td>Purpose: </td>
                                    <td><?php echo $odrow['purpose'];?></td>
                                </tr>
                                <tr>
                                    <td>Title: </td>
                                    <td><?php echo $odrow['title'];?></td>
                                </tr>
                                <tr>
                                    <td>OD College: </td>
                                    <td><?php echo $odrow['college'];?></td>
                                </tr>
                                <tr>
                                    <td>State: </td>
                                    <td><?php echo $odrow['state'];?></td>
                                </tr>
                            </table>

                    </div>
                </div>
            </div>
            <br>

            <div class="card card-3" id="staff1">
                <div class="card-image">
                    <div class="card-body">
                    <center> <h1 class="title"><b>Suggestion 1</b> </h1></center>
                       <br>
                            <table>
                                <tr>
                                    <td>Staff Name: </td>
                                    <td><?php echo $prerow['staff1'];?></td>
                                </tr>
                                <tr>
                                    <td >Recommendation: &nbsp </td>
                                    <td ><?php echo $prerow['status1'];?></td>
                                    </tr>

                                <tr>
                                    <td>Comments if any:&nbsp&nbsp&nbsp </td>
                                    <td><?php echo $prerow['comments1'];?></td>
                                </tr>

                            </table><br>


                    </div>
                </div>
            </div><br>


            <div class="card card-3" id="staff2">
                <div class="card-image">
                    <div class="card-body">
                    <center> <h1 class="title"><b>Suggestion 2</b> </h1></center>
                        <br>
                            <table>

                                <tr>
                                    <td>Staff Name: </td>
                                    <td><?php echo $prerow['staff2'];?></td>
                                </tr>
                                <tr>
                                    <td >Recommendation: &nbsp </td>
                                    <td><?php echo $prerow['status2'];?></td>
                                </tr>

                                <tr>
                                    <td>Comments if any:&nbsp&nbsp&nbsp </td>
                                    <td><?php echo $prerow['comments2'];?></td>
                                </tr>



                            </table><br>

                    </div>
                </div>
            </div><br>


            <div class="card card-3" id="staff3">
                <div class="card-image">
                    <div class="card-body">
                    <center> <h1 class="title"><b>Suggestion 3</b> </h1></center>
                 <br>
                            <table>
                                    <td>Staff Name: </td>
                                    <td><?php echo $prerow['staff3'];?></td>
                                </tr>
                                <tr>
                                    <td >Recommendation: &nbsp </td>
                                    <td ><?php echo $prerow['status3'];?></td>

                                </tr>
                                <tr>
                                    <td>Comments if any:&nbsp&nbsp&nbsp </td>
                                    <td><?php echo $prerow['comments3'];?></td>
                                </tr>



                            </table><br>

                    </div>
                </div>
            </div><br>

            <div class="card card-3">
                <div class="card-image">
                    <div class="card-body">
                    <center> <h1 class="title"><b>Give permission for On-Duty: </b> </h1></center><br>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="ui form">
                            <div class="two fields">
                            <div class="field">
                            <button type="submit" class="big ui positive button" name="advisor" value="Approved">Approve</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div><div class="field">
                            <button type="submit" class="big ui negative button" name="advisor" value="Declined">Decline</button>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div><br>

       </div>
    </div>

</center>



<?php include_once('EditApplication.php');?>

<script>
    $(document).ready(function(){
    $('.ui.checkbox').checkbox();
    });
</script>
<?php

 if($odrow['odtype']!='PAPER' || $odrow['odtype']!='PROJECT')
 {
    echo '<script>$(document).ready(function(){'; 
    echo '$("#staff1").hide();';
    echo '$("#staff2").hide();';
    echo '$("#staff3").hide();});</script>';
 }
?>

</body>

</html>


