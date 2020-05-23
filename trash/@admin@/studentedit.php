<?php require('header.php');?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if(isset($_POST['regno'])){
        $regno=strtoupper($_POST['regno']);
        $con= new mysqli("localhost","root","","regist");
        if ($con->connect_error) 
        {
            die("Connection failed: " . $con->connect_error);
        }
        $sql="SELECT * FROM `registration` WHERE RegNo='$regno'";
        $data=$con->query($sql);
        $row=$data->fetch_assoc();
        if ($row['RegNo']!=$regno) 
        {
           
             echo '<div class="alert alert-danger">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Error - Student not Registered!</strong> 
             </div>';
             //echo "<script>function Redirect(){window.location.replace('http://localhost/test1/@admin@/studentedit.php');}setTimeout('Redirect()',1500);</script>";
           
        } 
        else
        {
            $_SESSION['regno']=$regno;
            header('Location:studentedit1.php');
        }
    }
}

?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Search Student</h2>
    </div>
    <form class="login-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <div class="card-body">
    <div class="row">
    <br>
    <h5>Enter the Register Number to Edit: </h5 >&nbsp;&nbsp;
        <div class="col-xs-2">
        <input type="text" class="form-control" placeholder="Register Number" name="regno" id="regno" maxlength="8" minlenght="8"/>&nbsp;
        </div>
        <div class=col-xs-1>
        &nbsp;&nbsp;<button type="submit" class="btn btn-success" name="search">Search</button>
        </div>    
    </div>
    </div>
    </div>
    </form>
<?php require('footer.php');?>