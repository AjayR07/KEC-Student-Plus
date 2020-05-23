<?php 
 session_start();
 if(!isset($_SESSION['kecadmin']))
 {
     header("Location:login.php");
 }
include_once('../db.php');
include_once('../assets/notiflix.php');
include_once('adminnav.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>KEC Student+</title>
    <link rel="stylesheet" type="text/css" href="../assets/Semantic/dist/semantic.min.css">
    <?php include_once('../assets/notiflix.php');?>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="../assets/Semantic/dist/semantic.min.js"></script>
    <script> $(document).ready(function() 
     {$("#card").hide();
        $('.ui.checkbox').checkbox();
     }); </script>
     <script>
    function editing()
    {
        document.getElementById('name').removeAttribute('disabled');
        document.getElementById('mail').removeAttribute('disabled');
        document.getElementById('phone').removeAttribute('disabled');
        document.getElementById('batch').removeAttribute('disabled');
        document.getElementById('dept').removeAttribute('disabled');
        document.getElementById('sec').removeAttribute('disabled');      
        document.getElementById('pass').removeAttribute('disabled');  
        document.getElementById('activate').removeAttribute('disabled'); 
    }
    </script>
    <style>

        body {
            background-image: url("../bgpic.jpg");
        }
        .ui.card{
             width: 70%;
         } 
        label{
            font-size: 130%;
        }
        .ui.input.focus{
		width: 15%;
        }
        .ui.input{
		width: 50%;
        }
        p{
	 font-size:130%; 
        }
     </style>
    </head>
    <body>
    <?php  include_once('adminnav.php'); ?>
    <div class="contact-background-image">
    <center>
        <br><br>
        <div class="ui card">
        <div class="content">
        <h3 align="left" class="ui header">
        <i class="edit icon"></i>
        <div class="content">
            Edit Student Details
        </div>
        </h3>
        <div class="ui divider cc_cursor"></div>
        <br><br>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <label >Enter the Student Rollno to Edit : </label>&nbsp;&nbsp;&nbsp;
        <div class="ui input focus">
        <input type="text" id="roll" name="rollno" placeholder="&nbsp;&nbsp;&nbsp; Roll Number" onkeyup="this.value = this.value.toUpperCase();" required >
         </div><br><br><br>
         <button type="submit" name="searchsubmit"class="ui large blue button"  >Search</button>
         <br><br>
        </form>
        </div>
        </div>
        </center>
        <br>
<?php
if(isset($_POST['searchsubmit']))
{
    $rollno=strtoupper($_POST['rollno']);
    $sql="SELECT * FROM `registration` WHERE `regno`='$rollno'";
    $data=$con->query($sql);
    $row=$data->fetch_assoc();
    if ($row['regno']==$rollno) 
    {
        echo '<script> $(document).ready(function() {$("#card").show();}); </script>';
    }
    else
    {
        echo "<script> Notiflix.Report.Failure( 'Roll Number Not Found!', 'Entered Roll Number Not Found in the Database', 'Okay');</script>";
    }
}
?>
    <center> 
        <div id='card'>
        <div class="ui card">
        <div class="content">
        <br>

        <div class="ui large form cc_cursor">
            <div align="right">
            <button onclick="editing()" class="ui button ">
            <i class="edit  icon"></i>
            Edit
            </button></div><br>

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <div class="field">
        <label align="left">Roll Number :</label>
        <input value="<?php echo $row['regno'] ?>" id="roll" type="text" name="rollno" readonly>
        </div>
        <div class="field">
        <label align="left">Name :</label>
        <input value="<?php echo $row['name'] ?>" id="name" type="text" name="name" disabled>
        </div>
        <div class="field">
        <label align="left">Mail ID :</label>
        <input value="<?php echo $row['mail'] ?>" id="mail"type="text" name="mail"disabled>
        </div>
        <div class="field">
        <label align="left">Phone :</label>
        <input value="<?php echo $row['phone'] ?>" id="phone" type="text" name="phone" disabled>
        </div>
        <div class="field">
        <label align="left">Batch :</label>
        <input value="<?php echo $row['batch'] ?>" id="batch"type="text"name="batch" disabled>
        </div>
        <div class="field">
        <label align="left">Department :</label>
        <input value="<?php echo $row['dept'] ?>" id="dept" type="text" name="dept" disabled>
        </div>
        <div class="field">
        <label align="left">Section :</label>
        <input value="<?php echo $row['sec'] ?>" id="sec" type="text" name="sec" disabled>
        </div>
        <div class="field">
        <label align="left">Password (MD5 Hash):</label>
        <input value="<?php echo $row['pass'] ?>" id="pass" type="password" name="pass" disabled>
        </div>
        <div class="two fields">
        <div class="field">
        <div class="ui toggle checkbox">
        <input type="checkbox" tabindex="0" name="activate" id="activate" value="yes" class="hidden" disabled>
        <label>Activate Account</label>
        </div>
        </div>
        <div class="field">
        <button class="positive ui button" type="submit" name="updatesubmit">Update</button>
        </div>
        </div>
         </form>   
     </div>
    </center>
         </div>
        </div>
        </div>
        <br><br>
        </div>
    </body>
    </html>

 <?php
 if(isset($_POST['updatesubmit']))
 {
    $rollno=$_POST['rollno'];
    $name=$_POST['name'];
    $mail=$_POST['mail'];
    $phone=$_POST['phone'];
    $batch=$_POST['batch'];
    $dept=$_POST['dept'];
    $sec=$_POST['sec'];
    $pass=$_POST['pass'];
    
    $sql="SELECT * from registration where regno like '$rollno'";
    $data=$con->query($sql);
    $row=$data->fetch_assoc();
    if(strcmp($row['pass'],$pass)==0)
    {
        $sql = "UPDATE registration SET  `name`='$name', `mail`='$mail', `phone`='$phone', `batch`='$batch', `dept`='$dept', `sec`='$sec' WHERE `regno`='$rollno'";
    }
    else
    {
        $pass=md5($pass);
        $sql = "UPDATE registration SET  `name`='$name', `mail`='$mail', `phone`='$phone', `batch`='$batch', `dept`='$dept', `sec`='$sec', `pass`='$pass' WHERE `regno`='$rollno'";
    }
    //$sql = "UPDATE registration SET  `name`='$name', `mail`='$mail', `phone`='$phone', `batch`='$batch', `dept`='$dept', `sec`='$sec' WHERE `regno`='$rollno'";
    $data1=$con->query($sql);
    if(isset($_POST['activate']))
    {
        if($_POST['activate']=='yes')
        {
            $sql="UPDATE authenticate SET `status`='Verified' WHERE `regno` like '$rollno'";
            
        }
    }
    $data2=$con->query($sql);
    if($data1==TRUE && $data2==TRUE)
    {
        echo "<script> Notiflix.Report.Success( 'Updated Successfully!', 'Updated in the Database', 'Okay');</script>";
    }
    else{

        echo "<script> Notiflix.Report.Failure( 'Updation Failed !', 'Retry Again , 'Okay');</script>";
    }
}
?>

