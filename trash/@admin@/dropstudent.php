<?php require('header.php');?>
<?php
if(isset($_GET['otp']))
{
    $generator = "1357902468"; 
    $result = ""; 
    $n=6;
    for ($i = 1; $i <= $n; $i++)
    { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
    $_SESSION["otp"]=$result;
    $_SESSION['sent']=true;
    echo '<script>window.open("adminotp.php","_self");</script>';
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if(isset($_POST['userotp']))
    {
        if($_POST['userotp']!=$_SESSION["otp"])
        {
            echo '<div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>OTP not valid. Please try again</strong> 
            </div>';
        }
        else
        {
            $year="IV";
            $sql="DELETE FROM `registration` WHERE `Year`= '$year' ";
            $con= new mysqli("localhost","root","","regist");
            if ($con->connect_error) 
            {
                die("Connection failed: " . $con->connect_error);
            }
            $data=$con->query($sql);
            unset($_SESSION["otp"]);
            unset($_SESSION['sent']);
            echo '<div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Students deleted successfully.</strong> 
             </div>';
        }
    }
}
?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Drop IV Students</h2>
    </div>
    <div class="card-body">
    <br>
    <div class="row"><h5>Year to be deleted: </h5 >&nbsp;&nbsp;
    <div class="col-xs-3">
        <input type="text" class="form-control" value="4th Year" readonly="readonly"/>
        </div></div><br>
        <div class="row">
   
        <a href="dropstudent.php?otp=true" target="_self">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="col-xs-3"><button class="btn btn-info">Send OTP</button></a>

        <?php if(isset($_SESSION['sent'])){echo '<i class="fa fa-check" style="color:green" aria-hidden="true">OTP Sent</i>';}?>
        </div></div><br>
        <form method="post">
        <div class="row"><h5>Enter OTP: </h5 >&nbsp;&nbsp;<div class="col-xs-3">
        <input type="text" class="form-control" name="userotp" id="userotp" placeholder="One Time Password"/></div>
        </div><br>
        <div align="center"><br>
        &nbsp;&nbsp;<button type="submit" class="btn btn-success" name="delete">Delete</button>
        </div>    </div>
    </div>
    </div>
    </form>
<?php require('footer.php');?>