<?php
session_start();
if (!isset($_SESSION['uname'])) {
  header("location: ../studLog.php");
}
$register = $_SESSION['uname'];
include_once('../db.php');
include_once('../assets/notiflix.php');
?>
<?php include_once('studentnav.php'); ?>
<title>Profile</title>
<link rel="icon" type="image/png" href="../KEC.png">
<link rel="stylesheet" href="css/profile.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .preloader {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background-repeat: no-repeat;
    background-color: #FFF;
    background-size: auto;
    background-position: center;

  }
</style>
</head>

<div class="pusher">
  <aside class="profile-card">

    <header>
      <a>
        <?php
        if ($gender == 'Male')
          echo '<img class="hoverZoomLink" src="../images/matthew.png"/>';
        else if ($gender == 'Female')
          echo '<img class="hoverZoomLink" src="../images/molly.png"/>';
        else
          echo '<img class="hoverZoomLink" src="../images/elyse.png"/>';
        ?>

      </a>
      <h1 style="font-family: Georgia, serif; font-size: 25px;"><?php echo $name; ?></h1>

    </header>
    <?php include_once('../staff/StudentProfile.php'); ?>
    <div class="profile-bio">
      <h5 style="color: #009933; font-size: 20px;">Computer Science and Engineering</h5>
      <h5 style="font-size: 17px">
        <label class="prf">Batch/Section:</label>
        <a><?php echo $batch . ' / ' . $sec; ?></a><br>
        <div class="row" style="height: 10px;"></div>
        <label class="prf">Phone:</label>
        <a><?php echo $phone; ?></a><br>
        <div class="row" style="height: 10px;"></div>
        <label class="prf">Mail Id:</label>
        <a href="mailto:<?php echo $mail; ?>" target="_blank"><?php echo $mail; ?></a><br>
        <div class="row" style="height: 10px;"></div>
        <label class="prf">Total Applied:</label>
        <a><?php echo $a + $p + $d; ?></a><br>
        <div class="row" style="height: 10px;"></div>
        <label class="prf">Total Pending:</label>
        <a><?php echo $p; ?></a><br>
        <div class="row" style="height: 10px;"></div>
        <label class="prf">Total Granted:</label>
        <a><?php echo $a; ?></a><br>
        <div class="row" style="height: 10px;"></div>
        <label class="prf">Total Rejected:</label>
        <a><?php echo $d; ?></a><br>
        <div class="row" style="height: 10px;"></div>
        <label class="prf">Certificates Registered:</label>
        <a><?php echo $o; ?></a><br>
      </h5>
    </div>
  </aside>
</div>
</body>

</html>