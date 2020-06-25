<?php
session_start();
include_once('./db.php');
include_once('./assets/notiflix.php');
    if(isset($_SESSION['uname']))
    {
        header('Location:./student/PreOdForm.php');
    }
    $mail="";
?>
<html>
    <head>
    <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-151639011-2');
</script>
  <title>Login</title>
<link rel="icon" type="image/png" href="KEC.png">
  <meta charset="utf-8" />
  <meta name="dark-theme" color="#181818" />
	<link rel="manifest" href="/manifest.json">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<!-- No Script Part -->
<noscript><meta http-equiv="refresh" content="0; URL='./errorfile/noscript.html'" /></noscript>
	<!-- -------- -->
  <link href="css/studLog.css" rel="stylesheet" type="text/css">
  <?php include_once('./assets/notiflix.php');?>

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
    <script>
      $(window).on("load", function() {
        $('.preloader').hide();
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
<body background="images/backgrd.jpg">

<div class="preloader"></div>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <div class="fadeIn first" href="./index.php">
      <img src="images/keclog.png" id="icon" alt="User Icon"  />
    </div>

    <br>
    <!-- Login Form -->
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
      <input type="text" id="Register No" class="fadeIn second" name="regno" placeholder="Register Number*" required length="8" onkeyup="this.value = this.value.toUpperCase();"/>
      <input type="password" id="pass" class="fadeIn third" name="pass" placeholder="Password*" required >
      <br>  <center><span onclick="togglepass()" ><p><i class="fa fa-eye" id="passtoggle" ></i> Show Password</p></span>
      <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal1">Forget Password</button>
        &nbsp;
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal2">Change Password</button>
        &nbsp;
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal3">Get Activation Link</button>
    </div>

  </div>
</div>
    <!-- Forget Password -->
<div class="modal fade" id="myModal1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">KEC Student+</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
              <div ng-app="myApp" ng-controller="myCtrl">
                  </div>

                  <div class="row">
                      <div class="col-sm-3"></div>
                      <div class="col-sm-6">
                          <p class="Leave">Enter your Register Number</p>
                          <form action="entity/ForgetPass.php" method="post">
                          <input type="text" name="regno" class="form-control" placeholder="Roll No." minlength="8" maxlength="8" required onkeyup="this.value = this.value.toUpperCase();"/>
                          <div class="row" style="height:25px"></div>

                          <p class="Leave">Enter you Mail Id</p>
                          <input type="text" name="email" class="form-control" placeholder="Mail ID" required/>
                          <div class="row" style="height:25px"></div>
                              <div class="col-sm-4"></div>
                      <div class="col-sm-3"></div>
                  </div>

              </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
      </div>

  </div>
</div>

</div>


<!--Activation link-->

 <div class="modal fade" id="myModal3" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">KEC Student+</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
              <div ng-app="myApp" ng-controller="myCtrl">
                  </div>

                  <div class="row">
                      <div class="col-sm-3"></div>
                      <div class="col-sm-6">
                          <p class="Leave">Enter your Register Number</p>
                          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                          <input type="text" name="regno" class="form-control" placeholder="Roll No." minlength="8" maxlength="8" required onkeyup="this.value = this.value.toUpperCase();"/>
                          <div class="row" style="height:25px"></div>

                          <p class="Leave">Enter you Password</p>
                          <input type="password" name="pass" class="form-control" placeholder="Password" required/>
                          <div class="row" style="height:25px"></div>
                              <div class="col-sm-4"></div>
                      <div class="col-sm-3"></div>
                  </div>

              </div>

      <div class="modal-footer">
        <button type="submit"  name="actsubmit"class="btn btn-primary">Submit</button>
      </form>
      </div>
    </div>

  </div>
</div>

</div>

    <!-- Change Password -->
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">KEC Student+</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
                <div ng-app="myApp" ng-controller="myCtrl">
                    </div>

                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <form action="changepass.php" method="post">
                                <label>Enter your Register Number: </label>
                            <input type="text" name="RegNo" class="form-control" value="" placeholder="Roll No." minlength="8" maxlength="8" required/>
                            <label>Current Password: </label>
                            <input type="password" name="old" id="old" class="form-control" value="" placeholder="Old Password"  required/>
                            <label>New Password: </label>
                            <input type="password" name="npass" id="Password" class="form-control" value="" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  required/>
                            <label>Confirm New Password</label>
                            <input type="password" name="repass" id="repass" class="form-control" value="" placeholder="Re-Type" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  required/>
                            <div class="row" style="height:25px"></div>
                                <div class="col-sm-4"></div>
                        <div class="col-sm-3"></div>
                    </div>

                </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" onclick="return Validate();">Submit</button>

        </form>
        <script type="text/javascript">
          function Validate() {
              var password = document.getElementById("Password").value;
              var confirmPassword = document.getElementById("repass").value;
              var old=document.getElementById("old").value;
              if (password.localeCompare(confirmPassword) != 0) {
                  alert("Passwords do not match.");
                  return false;
              }
              else{
                  if(old.localePassword)
                  {
                      alert("Please Enter any password other than the old one");
                       return false;
                  }
                  else{
                      return true;
                  }
              }
          }
      </script>
        </div>
      </div>

    </div>
  </div>

</div>
<?php
  if(isset($_POST['submit']))
    {
    if(isset($_POST['regno']) && isset($_POST['pass']))
    {
        $register=strtoupper($_POST["regno"]);
        $pass=md5($_POST["pass"]);
        $sql="SELECT * FROM `registration` WHERE `regno` LIKE '$register' AND `pass`LIKE '$pass' ";
        $data=$con->query($sql);
        $row_cnt = $data->num_rows;

        if($row_cnt==0)
        {
          echo "<script> Notiflix.Report.Failure( 'Credentials Mismatch', 'There is no account associated with the register no and password given', 'Okay');</script>";
            exit();
        }
        $row=$data->fetch_assoc();
        if($row['regno']==$register && $row['pass']==$pass)
        {
            $_SESSION['uname']=$register;
            $_SESSION['name']=$row["name"];
            echo '<script>location.href="./student/PreOdForm.php";</script>';
            //header('Location: ./student/PreOdForm.php');
            exit();
}
else
{
  session_destroy();
  echo "<script> Notiflix.Report.Failure( 'Credentials Mismatch', 'There is no account associated with the register no and password given', 'Okay' );</script>";
}
$con->close();
    }
  }

  if(isset($_POST['actsubmit']))
  {
    $rollno=$_POST["regno"];
    $pass=md5($_POST["pass"]);
    $sql="SELECT * FROM `registration` WHERE `regno` LIKE '$rollno' AND `pass`LIKE '$pass' ";
    $data=$con->query($sql);
    $row=$data->fetch_assoc();
    $row_cnt = $data->num_rows;
    $mail=$row["mail"];
    $name=$row["name"];
    if($row_cnt==1)
    {

      $sql="SELECT * FROM `authenticate` WHERE `regno` LIKE '$rollno' ";
      $data=$con->query($sql);
      $row=$data->fetch_assoc();
      if($row["status"]=="Pending")
      {
        //echo "<script> Notiflix.Report.Failure( 'Account Not Activated', 'Please acrivate your account through the link sent to your registered mail id.', 'Okay');</script>";
        $_SESSION["rollno"]=$rollno;
        $_SESSION["mail"]=$mail;
        $_SESSION["name"]=$name;       
      echo '<script>window.open("./entity/activationmail.php","_self");</script>';
      }
      else
      {
        echo "<script> Notiflix.Report.Success( 'Account Activated Already !', 'You can login', 'Okay');</script>";
      }
    }
    else
    {

      echo "<script> Notiflix.Report.Failure( 'Credentials Mismatch', 'There is no account associated with the register no and password given', 'Okay');</script>";
    }
  }

?>
</body>
</html>
