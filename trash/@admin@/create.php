<!-- code by webdevtrick (https://webdevtrick.com) -->
<?php require 'header.php'; ?>
<?php
//require 'db.php';
$message = '';
if (isset ($_POST['name'])  && isset($_POST['email']) ) {
    $staff=$_POST['id'];
    $name = $_POST['name'];
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $mail = $_POST['email'];
    $year=$_POST['year'];
    $dep=$_POST['dep'];
    $sec=$_POST['sec'];
    
  //$sql = 'INSERT INTO staff(StaffID,Name,User,Pass,Mail,Dep,Year,Sec) VALUES(:id, :name, :user, :pass, :mail,  :dep, :year, :sec)';
  //$statement = $connection->prepare($sql);
  //if ($statement->execute([':id' => $staff, ':name' => $name, ':user'=>$user, ':pass'=>$pass, ':mail'=>$mail,  ':dep'=>$dep, ':year'=>$year,':sec' => $sec])) {
    $con= new mysqli("localhost","root","","regist");
        if ($con->connect_error) 
        {
            die("Connection failed: " . $con->connect_error);
        }
        $sql="INSERT INTO staff (StaffID, Name, User, Pass, Mail, Dep, Year, Sec) VALUES ('$staff','$name','$user','$pass','$mail','$dep','$year','$sec')";
        if ($con->query($sql) === TRUE) {
                $message = 'User Added Successfully';
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
            
  }


 ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a User</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="email">Staff ID</label>
          <input type="text" placeholder="Staff ID" name="id" id="id" class="form-control" required/>
        </div>
        <div class="form-group">
          <label for="name">Name</label>
          <input placeholder="Name" type="text" name="name" id="name" class="form-control" required/>
        </div>
        <div class="form-group">
          <label for="email">Username</label>
          <input type="text" placeholder="Username" name="user" id="user" class="form-control" required/>
        </div>
        <div class="form-group">
          <label for="email">Password</label>
          <input type="text" placeholder="Password" name="pass" id="pass" class="form-control" required/>
        </div>
        <div class="form-group">
          <label for="email">Mail ID</label>
          <input type="text" placeholder="Mail" name="email" id="eamil" class="form-control" required/>
        </div>
        <div class="form-group">
          <label for="email">Department</label>
          <input type="text" placeholder="Department" name="dep" id="dep" class="form-control" required/>
        </div>
        <div class="form-group">
          <label for="email">Year</label>
          <input type="text" placeholder="Year" name="year" id="year" class="form-control" >
        </div>
        <div class="form-group">
          <label for="email">Section</label>
          <input type="text" placeholder="Section" name="sec" id="sec" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create User</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>