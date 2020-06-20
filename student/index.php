
<?php
session_start();
if(!isset($_SESSION['uname']))
{
    header("Location: ../studLog.php");
}
$register=$_SESSION['uname'];
include_once('../db.php');
include_once('studentnav.php');
include_once('../assets/notiflix.php');

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Index</title>
</head>

<body>
  <div class="ui raised very padded text container segment">
    <h2 class="ui header">Hi </h2>
    
    
  </div>
</body>

</html>