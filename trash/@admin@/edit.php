<?php require 'header.php'; ?>
<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM staff WHERE StaffID=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['user']) ) 
{
  $staff=$_POST['id'];
  $name = $_POST['name'];
  $user=$_POST['user'];
  $pass=$_POST['pass'];
  $mail = $_POST['email'];
  $year=$_POST['year'];
  $dep=$_POST['dep'];
  $sec=$_POST['sec'];
  $sql = 'UPDATE staff SET  Name=:name, User=:user, Pass=:pass, Mail=:mail, Year=:year, Dep=:dep, Sec=:sec WHERE StaffID=:staff';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':user'=>$user, ':pass'=>$pass, ':mail'=>$mail, ':year'=>$year, ':dep'=>$dep, ':sec' => $sec, ':staff' => $staff])) {
    header("Location: index.php");
  }



}


 ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update User</h2>
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
          <label for="email">Staff ID</label>
          <input type="text" value="<?= $person->StaffID; ?>" name="id" id="id" class="form-control" readonly="readonly" required>
        </div>
          <label for="name">Name</label>
          <input value="<?= $person->Name; ?>" type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Username</label>
          <input type="text" value="<?= $person->User; ?>" name="user" id="user" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Password</label>
          <input type="text" value="<?= $person->Pass; ?>" name="pass" id="pass" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Mail ID</label>
          <input type="email" value="<?= $person->Mail; ?>" name="email" id="eamil" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Department</label>
          <input type="text" value="<?= $person->Dep; ?>" name="dep" id="dep" class="form-control" >
        </div>
        <div class="form-group">
          <label for="email">Year</label>
          <input type="text" value="<?= $person->Year; ?>" name="year" id="year" class="form-control" >
        </div>
       
        <div class="form-group">
          <label for="email">Section</label>
          <input type="text" value="<?= $person->Sec; ?>" name="sec" id="sec" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>