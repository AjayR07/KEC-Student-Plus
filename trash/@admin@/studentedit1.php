<?php require('header.php');?>
<?php
$regno = $_SESSION['regno'];
$con= new mysqli("localhost","root","","regist");
        if ($con->connect_error) 
        {
            die("Connection failed: " . $con->connect_error);
        }
        $sql="SELECT * FROM `registration` WHERE `RegNo` LIKE '$regno'";
        $data=$con->query($sql);
        $row=$data->fetch_assoc();
        
        
?>
 
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if(isset($_POST['name']) && ($_POST['regno'])){
  $name = $_POST['name'];
  $pass=$_POST['pass'];
  $mail = $_POST['mail'];
  $phone=$_POST['phone'];
  $year=$_POST['year'];
  $dep=$_POST['dep'];
  $sec=$_POST['sec'];
  $sql = "UPDATE registration SET  `Name`='$name', `Pass`='$pass', `Mail`='$mail', `Phone`='$phone', `Year`='$year', `Dep`='$dep', `Sec`='$sec' WHERE `RegNo`='$regno'";
  if($con->query($sql)==TRUE)
  {
        echo '<div class="alert alert-success" align="center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Student Detail Updated Success
        </div>';
        unset($_SESSION['regno']);
      echo "<script>function Redirect(){window.location.replace('http://localhost/test1/@admin@/studentedit.php');}setTimeout('Redirect()',1800);</script>";
  }
  else{
    die("<script>alert('Updation Error');</script>");
  }}
}
 ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update <?=$row['Name'];?></h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
        <div class="form-group">
          <label for="email">Register Number</label>
          <input type="text" value="<?= $row['RegNo'];?>" name="regno" id="regno" class="form-control" readonly="readonly" required>
        </div>
          <label for="name">Name</label>
          <input value="<?= $row['Name'];?>" type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Password</label>
          <input type="text" value="<?=$row['Pass'];?>" name="pass" id="pass" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Mail</label>
          <input type="mail" value="<?=$row['Mail'];?>" name="mail" id="mail" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Phone</label>
          <input type="text" value="<?=$row['Phone'];?>" name="phone" id="phone" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Year</label>
          <input type="text" value="<?=$row['Year'];?>" name="year" id="year" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Department</label>
          <input type="text" value="<?=$row['Dep'];?>" name="dep" id="dep" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Section</label>
          <input type="text" value="<?=$row['Sec'];?>" name="sec" id="sec" class="form-control" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update Student</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require('footer.php');?>
