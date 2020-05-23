<?php
    session_start();
    include_once('../db.php');
    include_once('../assets/notiflix.php');
?>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <link rel="icon" type="image/png" href="KEC.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body background="backlogout.jpg">
<?php require_once('../assets/notiflix.php');?>
<?php


$regno=$_GET['regno'];
$hash=$_GET['hash'];
$sql="select * from `authenticate` where `regno` like '$regno'";
$data=$con->query($sql);
$row=$data->fetch_assoc();
$status=$row['status'];
$key='AbinashArulAjayMNC';
$hash1=sha1($regno.$key);
if(strcmp($status,'Pending')==0)
{

      if(strcmp($hash,$hash1)==0)
      {
         $sql = "UPDATE `authenticate` SET `status` = 'Verified' WHERE `regno` = '$regno' ";
         $con->query($sql);
         echo "<script> Notiflix.Report.Success( 'Verified Successful ! ', 'Your Account verified Successful', 'Okay', function(){location.replace('../index.php');} );</script>";
      }
      else
      {

         echo "<script> Notiflix.Report.Failure( 'Verified Failed ! ', 'Your Account verified Failed', 'Okay', function(){location.replace('../index.php');} );</script>";

      }




}
else
{
   echo "<script> Notiflix.Report.Success( 'Verified Already !', 'Your Account already verified ', 'Okay', function(){location.replace('../index.php');} );</script>";




}


?>
<script type="text/javascript">
   Notiflix.Notify.Init({ borderRadius:"16px",timeout:"3000",distance:"20px"});
 Notiflix.Report.Init({ titleFontSize:"20px",width:"450px",messageFontSize:"25px",buttonFontSize:"18px", });
</script>
<>
