
<?php
session_start();
include_once('./db.php');

if(isset($_SESSION["user"]))
{
    header("Location: ./staff/index.php");
}
?>
<!DOCTYPE html>
<html>
<head>

   <title>Staff Login</title>
   <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" type="image/png" href="./KEC.png">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./assets/animate.min.css"/>
    <?php include_once('./assets/notiflix.php');?>
	<link rel="stylesheet" type="text/css" href="css/staffLog.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <!-- No Script Part -->
	<noscript><meta http-equiv="refresh" content="0; URL='./errorfile/noscript.html'" /></noscript>
	<!-- -------- -->
    <style type="text/css" rel="stylesheet">
        p{font-family:"Sans-Serif";}
    </style>

      <style>
        .preloader {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          z-index: 9999;
          background-image: url('./images/giphy3.svg');
          background-repeat: no-repeat;
          background-color: #FFF;
          background-size: auto;
          background-position: center;
        
        }
      </style>
      <style>
        body {
          background-size: cover;
          font-family: 'Open Sans', sans-serif;
          overflow: hidden;
        }
      </style>
      <script>
        $(window).on("load", function() {
          $('.preloader').hide();
          $('body').css({
          overflow: 'auto',
        });
        });
      </script>

    <script>
    function togglepass(){
      var x = document.getElementById("pass");
    //  var y = document.getElementById("passtoggle");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("passtoggle").className ="fa fa-eye-slash";
  } else {
    x.type = "password";
    document.getElementById("passtoggle").className ="fa fa-eye";
  }}
      </script>
</head>
<body background="./images/backstaff.jpg">
  <script>
  if (navigator.onLine) {
} else {
Notiflix.Notify.Failure('No Internet Connection Detected');
}
</script>
  <div class="preloader"></div>
  
	<div class="container animated flipInX">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
				<center>	<h3><span onclick="location.href='index.php';" style="color:bisque" >KEC Student+</span></h3>

			<h5><i>Staff Login</i></h5></center>
				</div>
				<div class="card-body">
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="user" class="form-control" placeholder="Username*" required/>
						</div>
            <br>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="pass" id="pass" class="form-control" placeholder="PIN*" required/>
              <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-eye" id="passtoggle" onclick="togglepass()"></i></span>
          </div>
						</div>
				</div>
				<div class="card-footer">
			<div class="form-group">
				<input type="submit" name="submit" value="Login" class="btn float-right login_btn"/>
				</div>
			</form>
				</div>
			</div>
		</div>
    </div>
    <?php


if(isset($_POST['submit']))
{
        $user=strtolower($_POST["user"]);
        $pass=md5($_POST["pass"]);
        $sql="SELECT * FROM `staff` WHERE `userid` LIKE '$user' AND `pass`LIKE '$pass' ";
        $data=$con->query($sql);
        if($data->num_rows==0)
        {
            echo "<script> Notiflix.Report.Failure( 'Credentials Mismatch', 'There is no account associated with the username and password given.', 'Retry' );</script>";
        }
        else
        {
            $row=$data->fetch_assoc();
        if($row['userid']==$user && $row['pass']==$pass)
        {
          echo "<script> Notiflix.Report.Success( 'Credentials Mismatch', 'There is no account associated with the username and password given.', 'Retry' );</script>";
            $_SESSION['user']=$user;
            $_SESSION['staffname']=$row['name'];
            $_SESSION['batch']=$row['batch'];
            $_SESSION['dept']=$row['dept'];
            $_SESSION['sec']=$row['sec'];
            $_SESSION['design']=$row['designation'];
            header('Location: ./staff/OdList.php');
            echo '<script>window.location.replace("./staff/index.php");</script>';
            exit();
        }
        else
        {
            echo "<script> Notiflix.Report.Failure( 'Credentials Mismatch', 'There is no account associated with the Username and Password given.', 'Okay' );</script>";
        }
        $con->close();
    }
}
?>

</body>
</html>
