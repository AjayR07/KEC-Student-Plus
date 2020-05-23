<?php
session_start();
if(!isset($_SESSION['kecadmin']))
{
    header("Location:login.php");
}
include_once('../db.php');
 include_once('../assets/notiflix.php');
 include_once('adminnav.php');
$result="";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Drop Batch</title>
    <?php include_once('../assets/notiflix.php');?>

    <style>
body {
    background-image: url("../bgpic.jpg");
}
.ui.card{
  width: 70%;
}
    </style>
    <?php
if(isset($_SESSION['mailsent']))
{
  echo '<script>
$(document).ready(function(){
    $("#pass").removeAttr("disabled");
    $("#otp1").removeAttr("disabled");
});
</script>';
}
    ?>
  </head>
  <body >
  <?php include_once('adminnav.php'); ?>
  <div class="contact-background-image">
 <center>
      <br><br>
  <div id="card">
  <div class="ui container">
  <div class="ui card">
  <div class="content">
  <div class="ui placeholder segment">
  <div class="ui two column very relaxed stackable grid">
  <div class="middle aligned column">
     <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
     <button name="submitotp" type="submit" class="  ui big green button">Send OTP</button>
  </form>
    </div>
    <div class="column">
      <div class="ui form">
          <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
      <div class="field">
          <label>Password</label>
          <div class="ui left icon input">
            <input name="pass" id="pass" type="password" placeholder="Admin Password" disabled required>
            <i class="lock icon"></i>
          </div>
        </div>
        <div class="field">
          <label>OTP</label>
          <div class="ui left icon input">
            <input name="otp1" id="otp1" type="password" placeholder="6-Digit OTP" disabled required>
            <i class="bell icon"></i>
          </div>
        </div>
        <button name="ssubmit" type="submit" class=" ui  blue submit button">Submit</button>
          </form>
      </div>
    </div>

  </div>
  <div class="ui vertical divider">AND
 </div>
</div>
  </div>
</div>
</div>
  </div>
<br>
<br>
<div id="dropcard" style="display:none">
<div class="ui container">
  <div class="ui card">
  <div class="content">
  <br><br>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" >
  <label><b>Select the Batch to Delete from DataBase: &nbsp;</b></label>
   <select name="batch" class="ui dropdown">
  <option value="">BATCH</option>
  <option value="<?php echo date("Y")-4;?>"><?php echo date("Y")-4;?></option>
  <option value="<?php echo date("Y")-4*2;?>"><?php echo date("Y")-4*2;?></option>
 </select><br>
 <br>
 <button name="dropsubmit" type="submit" class="negative ui button">Delete</button>
</form>
</div>
<br><br>
</div>
</div>
</div>
</div>
</center>
</div>
 </body>
</html>


<?php

if(isset($_POST['submitotp']))
{
//generate OTP and send via mail
$generator = "1357902468";
$result = "";
$n=6;
for ($i = 1; $i <= $n; $i++)
{
    $result .= substr($generator, (rand()%(strlen($generator))), 1);
}
    //echo $result;
    $_SESSION["otp"]=$result;
    $_SESSION['sent']=true;
    echo '<script>window.open("adminotp.php","_self");</script>';
}
if(isset($_POST['ssubmit']))
{

    $pass=md5($_POST['pass']);
    if($pass==md5("admin") &&  $_POST['otp1']==$_SESSION["otp"])
    {
      ?>
      <script language="javascript">
        document.getElementById("dropcard").style.display = "block";
      </script>

      <?php

    }
    else{
        echo "<script> Notiflix.Report.Failure( 'Invalid Credientials', 'Retry again', 'Okay');</script>";
       }
}
if(isset($_POST['dropsubmit']))
{
  ?>
      <script language="javascript">
        document.getElementById("dropcard").style.display = "block";
      </script>
      <?php
        $year=$_POST['batch'];
        if($year=='')
        {
          echo "<script> Notiflix.Report.Warning( 'Select Batch First', 'First select a batch to deleted in the database', 'Okay');</script>";
        }
        else
        {
        $sql="select * FROM `registration` WHERE `batch`= '$year' ";
        $data=$con->query($sql);
        $row=$data->fetch_assoc();
        if($row<=0)
        {
          echo "<script> Notiflix.Report.Failure( 'No Data in Database', 'Selected batch is not in the database', 'Okay');</script>";
        }
        else
        {
          $sql="DELETE FROM `registration` WHERE `batch`= '$year' ";
          $data=$con->query($sql);
          echo "<script> Notiflix.Report.Success( 'Deleted Successfully', 'All the batch student data are deleted in the database', 'Okay');</script>";
        }

        }
        unset($_SESSION["otp"]);
        unset($_SESSION['sent']);
}
?>
