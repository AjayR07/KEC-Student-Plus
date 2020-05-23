<html>
<head>
<title>Admin</title>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

<link rel="icon" type="image/png" href="../KEC.png">

<link
      rel="stylesheet"
      href="../assets/Semantic/dist/semantic.min.css"
      type="text/css"
    />
<?php include_once('../assets/notiflix.php');?>
</head>
<body background="bgpic.jpg">
  <style>
  body{
    background-image:url('../bgpic.jpg');
  font-family: 'Open Sans', sans-serif;
  }
  .center{
    padding: 70px 0;

  }
  </style>
  <center>
  <div class="center">
<div class="ui raised very padded text container segment">
    <h1 clas"ui dividing header">Admin Login</h1>
    <h3 class="ui horizontal divider">
<i class="key icon"></i>
  
</h3>
<div class="ui form">

  <form class="login-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <div class="seven wide field">
  <label><h4>Enter Username: </h4></label>
  <div class="ui input">
      <input type="text" placeholder="Username" name="user" required/>
    </div></div><br>
    <div class="seven wide field">
      <label><h4>Enter Password:</h4> </label>
      <div class="ui input">
      <input type="password" placeholder="Password" name="pass" required/>
  </div></div><br>
<center> <button class="large ui teal button" type="submit" name="submit">Login</button></center>
    </form>
  </div>
</div>
</div>
<center>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../assets/Semantic/dist/semantic.min.js"></script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['user'])&&isset($_POST['pass']))
    {
        $user=md5($_POST['user']);
        $pass=md5($_POST['pass']);
        if($user==md5("kecadmin") && $pass==md5("Admin@123"))
        {
            session_start();
            $_SESSION['kecadmin']="kecadmin";
            date_default_timezone_set("Asia/Calcutta");
            date("h:i");
            header('Location:./index.php');
            exit();
        }
        else if($user==md5("developer") && $pass==md5("AbiArulAjayMNC"))
        {
            session_start();
            $_SESSION['kecadmin']="kecadmin";
            $_SESSION['developer']="AAA";
            date_default_timezone_set("Asia/Calcutta");
            date("h:i");
            header('Location:./developer.php');
            exit();
        }
        else{
          echo "<script> Notiflix.Report.Failure( 'Access Denied ! ', 'The Username or Password is incorrect', 'Retry', function(){location.replace('login.php');} );</script>";

        }
    }
}
?>

</body>
</html>
