<?php

    session_start();
    if(!isset($_POST['regno']) && !isset($_SESSION['ForgetPsk']))
    {
        header("location: ../studLog.php");
    }

    include_once("../db.php");
    include_once('../assets/notiflix.php');
    $_SESSION['ForgetPsk']="forget";
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forget Password</title>
  <link rel="icon" type="image/png" href="../KEC.png">
   <!-- No Script Part -->
   <noscript><meta http-equiv="refresh" content="0; URL='../errorfile/noscript.html'" /></noscript>
	<!-- -------- -->
  <script src="../assets/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.4/dist/semantic.min.css">
  <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.4/dist/semantic.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

  <script>
          $(document).ready(function()
          {
            $("#otpvld")
            .modal({
               closable : false,
               keyboardShortcuts:false,
               onApprove :function()
               {
                 return false;
               },
               onDeny :function()
               {
                return false;
               }
             });


      $('#form1').form({fields: {name: {identifier : 'otpent',
          rules: [
                        {
                              type   : 'empty',
                            prompt : 'Please enter your OTP'
                        },
                        {
                            type   : 'exactLength[6]',
                          prompt : 'Please enter a valid 6 Digit OTP'
                        },
                        {
                          type   : 'integer',
                          prompt : 'Please enter a valid OTP'
                        }
                  ]
        }}});
        $('#form2').form({fields:{ pass: {identifier : 'pass',rules:
                       [
                             {
                                   type   : 'empty',
                                 prompt : 'Please enter your New Password'
                             },
                             {
                                 type   : 'minLength[8]',
                               prompt : 'Please enter a password of minimum length of 8 characters'
                             },
                             {
                             type   : 'regExp[/^[A-Za-z0-9@_-]{8,32}$/]',
                             prompt : 'Please enter a 8-32 character Password'
                             }
                       ]
             },
                                 repass: {identifier: 'repass',rules:
                                   [
                                       {
                                           type: 'match[pass]',
                                           prompt :'Password And Confirm Password are not the same...'
                                       },
                                       {
                                             type   : 'empty',
                                           prompt : 'Please Confirm your New Password'
                                       }
                                   ]
                                 }
                                 }
           });
        $("#closebtn1").click(function()
        {
          location.replace("../studlog.php");
        });
        $("#closebtn2").click(function()
        {
          location.replace("../studlog.php");
        });
              });
    </script>

<?php include_once('../assets/notiflix.php');?>
</head>

<body background="../backgrd.jpg" id="root">
<div class="preloader"><body><div class="ui active dimmer"><div class="ui large text loader">Please wait...</div></div></body></div>
  <style>
  body,.root
  {
  background: url('../backgrd.jpg');
  background-size: cover ;
  font-family: 'Open Sans', sans-serif;
  }
  </style>

  <?php
  if(isset($_POST["regno"]) && isset($_POST["email"]) )
  {
      $register=strtoupper($_POST["regno"]);
      $email=$_POST["email"];
      unset($_POST["regno"]);
      unset($_POST["email"]);
      $sql="SELECT * FROM `registration` WHERE `regno` LIKE '$register' AND `mail` LIKE '$email'";
      //echo '<script>alert("'.$sql.'");</script>';
      $data=$con->query($sql);
      if($data->num_rows>0)
      {
        //echo '<script>alert("getting in ra");</script>';
        $row=$data->fetch_assoc();
        if(!strcmp($row['regno'],$register) && !strcmp($row['mail'],$email))
        {
                $_SESSION['username']=$register;
                $_SESSION['name']=$row['name'];
                $_SESSION['mail']=$row['mail'];
                $generator = "1357902468";
                $result = "";
                $n=6;
                for ($i = 1; $i <= $n; $i++)
                {
                $result .= substr($generator, (rand()%(strlen($generator))), 1);
                }

                $_SESSION["otp"]=$result;
                echo "<script>location.href='forgetmail.php'</script>";
        }
        else
        {
                echo "<script> Notiflix.Report.Failure('Invalid Register Number or Email Id !','Redirect to registration page...', 'Proceed->' ,function(){ location.replace('../registration.php')}); </script>";
        }
      }
      else
      {
              echo "<script> Notiflix.Report.Failure('Invalid Register Number or Email Id !','Redirect to registration page...', 'Proceed->' ,function(){ location.replace('../registration.php')}); </script>";
      }
  }
  elseif (isset($_SESSION["mailsent"]))
  {
    echo '<script>$(document).ready(function()
        {
            $("#otpvld").modal("show");
        });  </script>';
        unset($_SESSION["mailsent"]);
  }
  elseif(isset($_POST['submit']))
  {
    unset($_POST['submit']);
    $register=$_SESSION['username'];
    $otporig=$_SESSION['otp'];
    $otpent=$_POST['otpent'];
    if(!strcmp($otporig,$otpent))
    {
      echo '<script>
              $(document).ready(function()
          {
                         $("#pwdchng").modal({
                            closable : false,
                            keyboardShortcuts:false,
                            onApprove :function()
                            {
                              return false;
                            }
                          }).modal("show");

          });  </script>';
    }
    else
    {
            $_SESSION["mailsent"]="yes";
            echo "<script> Notiflix.Report.Failure('Invalid OTP!','Entered One Time Password Mismatch with the Mailed OTP...', 'Retry' ,function(){ location.replace('ForgetPass.php')}); </script>";

    }
  }
  elseif(isset($_POST['submited']))
  {

        $register=$_SESSION['username'];
        $pass=md5($_POST["pass"]);
        $ins="UPDATE `registration` SET `pass`='$pass' WHERE `regno`='$register' ";
        if ($con->query($ins) == TRUE)
        {
          echo "<script>Notiflix.Report.Success('Password Updated Successfully','Your password has been successfully updated. You can proceed to Login... ','Okay', function(){location.replace('../studLog.php')  });</script>";
            session_destroy();
            session_unset();
        }
        else
        {
            session_destroy();
            session_unset();
            $POST["regno"]=$register;
          echo "<script> Notiflix.Confirm.Show('Error Updating the Password ', 'Do you want to try again?', 'Retry', 'Close', function(){location.replace('ForgetPass.php')  }, function(){location.replace('../index.php')  } );</script>";

        }
  }
  else
  {
      echo '<script>window.location.replace("../studLog.php");';
  }

   ?>


<div class="ui tiny inverted modal" id="otpvld">
    <div class="header">
        KEC Student+
      <button class="ui right floated icon button" id="closebtn1">
          <i class=" close icon"></i>
      </button>
            </div>
                  <div class="content">
                    <script>Notiflix.Notify.Info('Please do not refresh this page');</script>
                    <div class="ui form" id="form1">
                          <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                          <br></br>
                          <center>
                          <div class="ui header"><span class="ui inverted grey text"> Enter the OTP</span></div><br>
                          <div class="ui large input focus">
                            <input type="text" name="otpent"  placeholder="6 Digit OTP"  style="text-align:center;" maxlength="6"/></div>
                          <br></br>
                          <br></br>
                          <span class="ui inverted grey text"> Didn't received?</span> <a href="forgetmail.php">Resend OTP</a>
                          <br></br>

                          <div class="ui inverted red error message"></div>
                          </center>
                  </div>
                </div>
            <div class="actions">
              <button class="ui positive right labeled icon button" type="submit" name="submit">
                  Verify<i class="checkmark icon"></i>
              </button>
            </div>
</form>
</div>


<div class="ui tiny inverted modal" id="pwdchng">
    <div class="header">
        KEC Student+
      <button class="ui right floated icon button" id="closebtn2">
          <i class=" close icon"></i>
      </button>
            </div>
                  <div class="content">
                    <div class="ui form" id="form2">
                          <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                          <br></br>
                          <center>
                          <div class="ui header"><span class="ui inverted grey text"> Enter New Password</span></div>
                          <div class="ui large  input focus">
                            <input type="password" name="pass" id="pass"  placeholder="Password *"  style="text-align:center;"/>
                          </div>
                          <br></br>
                              <div class="ui header"><span class="ui inverted grey text"> Confirm New Password</span></div>
                          <div class="ui large input focus">
                          <input type="password" name="repass" id="repass"  placeholder=" Re-Type Password *"  style="text-align:center;"/>
                        <br></br>
                          </div>

                          <div class="ui inverted red error message"></div>
                          </center>
                  </div>
                </div>
            <div class="actions">
              <button class="ui positive right labeled icon button" type="submited" name="submited" >
                  Change<i class="sync icon"></i>
              </button>
            </div>
</form>
</div>


</body>
</html>
