<<<<<<< HEAD

=======
>>>>>>> b4c0f4b3be16687b7aad2fcea3aa8eb5e3af8e24
<?php
session_start();
if(!isset($_SESSION['user']))
{
    header("Location: ../staffLog.php");
}
$staff=$_SESSION['user'];
include_once('../db.php');
include_once('staffnav.php');
include_once('../assets/notiflix.php');

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Index</title>
</head>

<body>
  <style>
    body{
      background-image: url('../backstaff.jpg');
    }
  </style>
  <div class="ui raised very padded container segment">
    <center><h1 class="ui header">Hi <?php echo $staff; ?>!</h1></center>
    <div class="ui form">
    <div class="content">
    <div class="ui two fields">
      <!-- Card 1 -->
      <div class="ui inverted card">
        <div class="content">
          <div class="header">Permission Appl.</div>
          <div class="meta">PreOd, Non-Cert Od</div>
          <div class="description">
<<<<<<< HEAD
          
=======
            
>>>>>>> b4c0f4b3be16687b7aad2fcea3aa8eb5e3af8e24
          </div>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="ui inverted card">
        <div class="content">
          <div class="header">Certificate Appl.</div>
          <div class="meta">PostOd, Other Cert</div>
          <div class="description">
           
          </div>
        </div>
      </div>
      </div>
    </div>
    </div>
    
  </div>
</body>

<<<<<<< HEAD
</html>
=======
</html>

>>>>>>> b4c0f4b3be16687b7aad2fcea3aa8eb5e3af8e24
