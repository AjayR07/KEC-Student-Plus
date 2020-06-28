<?php

include_once('./db.php');
include_once('./assets/notiflix.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include_once('./entity/mailheader.php');
?>
<html>
    <head>
        <title>Registration</title>        
        <link rel="stylesheet" type="text/css" href="./css/reg.css">
        <link rel="icon" type="image/png" href="KEC.png">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./assets/animate.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <!-- No Script Part -->
	<noscript><meta http-equiv="refresh" content="0; URL='./errorfile/noscript.html'" /></noscript>
	<!-- -------- -->
  <style>
			.preloader {
				position: -webkit-sticky;
                position: sticky;
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
                overflow: hidden;
                }
                body{
                    font-family: 'Open Sans', sans-serif;
			        overflow: hidden;
                }
		</style>
<script>
			$(window).on("load", function(){
				$('.preloader').hide();
                $('body').css({
			overflow: 'auto',
		});
			});
		</script>
<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip(); 
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
<body background="backgrd.jpg">
<script>
 $(document).ready(function(){
      var reg=$(".reg").val(); 
      var mail=$(".mail").val(); 
      if(reg!='' && mail=='')
      {
        Notiflix.Report.Failure( 'No Data Found!', 'Error fetching your data from our sources', 'Okay',function(){location.replace('registration.php');} );
      }
    });
</script>
<div class="preloader"></div>
<script>Notiflix.Notify.Info('Type your register number and press TAB');</script>
    <div class="container register animated pulse">
                <div class="row">
                    <div class="col-md-4 register-left">
                        <a href="https://www.kongu.ac.in"><img src="KEC.png" alt=""/></a>
                        <h3>Kongu Engineering College</h3>
                        <p>Perundurai, Erode</p>
                        <p>Student Online Registration Portal</p>
                        <form action="studLog.php" method="post">
                        <input type="submit" name="login" value="Login"/><br/></form>
                    </div>
                    <form name="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="col-md-12 register-right">
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Apply as a Student</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="regno" class="form-control" placeholder="Register Number *" id="reg" value="" required minlength="8" maxlength="8" onblur="GetDetail(this.value)" onkeyup="this.value = this.value.toUpperCase();"/>
                                        </div>
                                        <div class="form-group">
                                                <a data-toggle="tooltip" data-placement="left" title="As per Nominal roll">
                                            <input type="text" name="name" class="form-control" placeholder="Full Name *" value="" id="name" readonly />
                                            </a>
                                        </div>
                                        <div class="form-group ">
                                                <!-- <a  data-toggle="tooltip" data-placement="left" title="Must contain 8-12 char, 1 UPPER,1 LOWER,1 Special">
                                              <input type="password" name="pass" id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" placeholder="Password *" value="" required/>
                                            </a>  
                                          </div>
                                          <div><span class="glyphicon glyphicon-eye-open" id="passtoggle" onclick="togglepass()">Show Password</span></div>                         -->
                                          <a  data-toggle="tooltip" data-placement="left" title="Must contain 8-12 char, 1 UPPER,1 LOWER,1 Special">
                                          <div class="input-group no gutter">
                                          
                                            <input type="password" name="pass" id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" placeholder="Password *" value="" required >
                                            <div class="input-group-text">
                                                <i class="fa fa-eye" aria-hidden="true" id="passtoggle" onclick="togglepass()"></i>
                                            </div>
                                        </div></a>
                                        </div>
                                          <div class="form-group">
                                               
                                            <input type="password" name="repass" id="repass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control"  placeholder="Confirm Password *" value="" required/>
                                            
                                        </div>
                                        <div class="form-group"><center>
                                            <div class="maxl">
                                            <div class="radio">
                                                <label class="radio-inline"> 
                                                    <input type="radio" name="gender" value="male" required>
                                                    <span> Male &nbsp&nbsp </span> 
                                                </label>                                             <label class="radio-inline"> 
                                                    <input type="radio" name="gender" value="female" required>
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                            </div></center>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Kongu Mail ID " value="" id="mail" readonly/>
                                        </div>
                                        <div class="form-group">

                                            <input type="text"  class="form-control" placeholder="Phone" value="" id= "phoneno" readonly/>

                                        </div>
                                        <div class="form-group">
                                            <input type="text"  class="form-control" placeholder="Year" value="" id="year" readonly/>

                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Department" value="" id="dept" readonly/>

                                        </div>
                                        <div class="form-group">
                                            <input type="text"  class="form-control" placeholder="Section" value="" id="sec" readonly/>

                                        </div>
                                        <script type="text/javascript">
                                            function Validate() {
                                                var password = document.getElementById("Password").value;
                                                var confirmPassword = document.getElementById("repass").value;
                                                var old=document.getElementById("old").value;
                                                if (password != confirmPassword) {
                                                    alert("Passwords do not match.");
                                                    return false;
                                                }
                                                else{
                                                    if(old==password)
                                                    {
                                                        alert("Enter Password other than the Old Password");
                                                         return false;   
                                                    }
                                                    else{
                                                        return true;
                                                    }
                                                }
                                            }

                                            function GetDetail(str){
                                                 if(str.length==0){
                                                     document.getElementById("mail").value="";
                                                     document.getElementById("year").value="";
                                                     document.getElementById("dept").value="";
                                                     document.getElementById("sec").value="";
                                                     document.getElementById("name").value="";
                                                     document.getElementById("phoneno").value="";
                                                    return;
                                                 }
                                                 else{

                                                     var xmlhttp = new XMLHttpRequest();
                                                     xmlhttp.onreadystatechange=function(){
                                                         if(this.readyState == 4 && this.status==200){
                                                            
                                                             var myOBJ=JSON.parse(this.responseText);
                                                             if(myOBJ[6]=="NOT FOUND")
                                                             {
                                                                Notiflix.Report.Failure( 'No Data Found!', 'Error fetching your data from our sources', 'Okay',function(){location.replace('registration.php');} );
                                                             }
                                                             document.getElementById("mail").value=myOBJ[0];
                                                             document.getElementById("year").value=myOBJ[1];
                                                             document.getElementById("dept").value=myOBJ[2];
                                                             document.getElementById("sec").value=myOBJ[3];
                                                             document.getElementById("name").value=myOBJ[4];
                                                             document.getElementById("phoneno").value=myOBJ[5].substr(0,2)+"******"+myOBJ[5].substr(8,2);
                                                         }
                                                         else if(this.status==403 || this.status==404)
                                                         {
                                                             
                                                            Notiflix.Report.Failure( 'No Data Found!', 'Error fetching your data from our sources', 'Okay',function(){location.replace('registration.php');} );
                                                         }
                                                     }
                                                     xmlhttp.open("GET","search.php?roll="+str, true);
                                                     xmlhttp.send();
                                                 }
                                               
                                             }   


                                        </script>
                                        <input type="submit"  name="submit" class="btnRegister" onclick="return Validate();" value="Register"/>
                                    </div>
                                </div>
                                </div>
                            </form>
        </div>
        <?php
        $result='';
        if(isset($_POST['submit']))
        {
        $rollno=$_POST['regno'];
        $check="SELECT pass from registration where regno like '$rollno'";
        $z=$con->query($check);
        if($z->num_rows!=0)
        {
            $row=$data->fetch_assoc();
            if(empty($row['pass']))
                echo "<script>Notiflix.Report.Failure( 'Already Registered', 'You are already registered with us. Please proceed to login.', 'Okay',function(){window.location.replace('studLog.php');} );</script>"; 
            exit();
        }
        else
        {
            echo "<script>Notiflix.Report.Failure( 'Data Not Found', 'Your information is not there in our sources. Please contact the Admin.', 'Okay',function(){window.location.replace('aboutUs.html');} );</script>"; 
            exit();
        }
        $gender=$_POST['gender'];
        $pass=$_POST['pass'];
        $repass=$_POST['repass'];
        if(strcmp($pass,$repass)!=0)
        {
            echo "<script>Notiflix.Report.Report( 'Password Mismatch', 'Both Password and Forget Password doesn't match', 'Okay',function(){window.location.replace('registration.php');} );</script>"; 
            exit();
        }
        else{
            if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $_POST['pass'] ))
            {
                echo "<script>Notiflix.Report.Failure( 'Password Weak', 'Your password is not matching our password policy', 'Okay',function(){window.location.replace('registration.php');} );</script>"; 
                exit();
            }
        }
        $sql="SELECT * from `registration` where `rollno` like '$rollno'";
        $data=$con->query($sql);
        $row=$data->fetch_assoc();
        $Mail=$row['mail'];
        $batch=$row['batch'];
        $Dept=$row['dept'];
        $Sec=$row['sec'];
        $phone=$row['phone'];
        $Name=$row['name'];
        $passw=md5($pass);
        $sql="UPDATE `registration` SET `pass`='$passw' WHERE `regno` like '$rollno'";
        $con->query($sql);
        $key='AbinashArulAjayMNC';
        $hash=sha1($rollno.$key);
        $link='http://student.kongu.edu/entity/auth.php?regno='.$rollno.'&hash='.$hash;
        $len=strlen($pass);
        $star='';
        for($i=0;$i<$len-4;$i++)
           $star.='*';
        $mask=substr($pass,0,2).$star.substr($pass,-2);
        $mailto=$Mail;
        $mail = new PHPMailer(true);
        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->SMTPDebug = 0;
        $mail->Host = $Host;             // Specify main and backup SMTP servers
        $mail->SMTPAuth = $SMTPAuth;                     // Enable SMTP authentication
        $mail->Username = $Username;          // SMTP username
        $mail->Password = $Password; // SMTP password
        $mail->SMTPSecure = $SMTPSecure;                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = $Port;                         // TCP port to connect to
        $mail->setFrom('studentplus@kongu.edu', 'KEC Student+');
        $mail->addAddress($mailto);   // Add a recipient
        $mail->isHTML(true);
        $bodyContent = '<!doctype html>
        <html>
            <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>EmailTemplate-Responsive</title>
            <style type="text/css">
        html,  body {
            margin: 0 !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        .ExternalClass {
            width: 100%;
        }
        /* What is does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }
        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,  td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }
        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode: bicubic;
        }
        /* What it does: Overrides styles added when Yahoo"s auto-senses a link. */
        .yshortcuts a {
            border-bottom: none !important;
        }
        /* What it does: Another work-around for iOS meddling in triggered links. */
        a[x-apple-data-detectors] {
            color: inherit !important;
        }
        </style>
            <!-- Progressive Enhancements -->
            <style type="text/css">
                
                /* What it does: Hover styles for buttons */
                .button-td,
                .button-a {
                    transition: all 100ms ease-in;
                }
                .button-td:hover,
                .button-a:hover {
                    background: #555555 !important;
                    border-color: #555555 !important;
                }
                /* Media Queries */
                @media screen and (max-width: 600px) {
                    .email-container {
                        width: 100% !important;
                    }
                    /* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
                    .fluid,
                    .fluid-centered {
                        max-width: 100% !important;
                        height: auto !important;
                        margin-left: auto !important;
                        margin-right: auto !important;
                    }
                    /* And center justify these ones. */
                    .fluid-centered {
                        margin-left: auto !important;
                        margin-right: auto !important;
                    }
                    /* What it does: Forces table cells into full-width rows. */
                    .stack-column,
                    .stack-column-center {
                        display: block !important;
                        width: 100% !important;
                        max-width: 100% !important;
                        direction: ltr !important;
                    }
                    /* And center justify these ones. */
                    .stack-column-center {
                        text-align: center !important;
                    }       
                    /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
                    .center-on-narrow {
                        text-align: center !important;
                        display: block !important;
                        margin-left: auto !important;
                        margin-right: auto !important;
                        float: none !important;
                    }
                    table.center-on-narrow {
                        display: inline-block !important;
                    }               
                }
            </style>
            </head>
            <body>
            <table bgcolor="#e0e0e0" cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" style="border-collapse:collapse;">
              <tr>
                <td><center style="width: 100%;">
                      <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;"> Regards from KEC Student+, Thank You for the Registration </div>
                    <table align="center" width="600" class="email-container">
                    <tr>
                        <td style="padding: 20px 0; text-align: center"><h1 style="color:black">KEC Student+</h1></td>
                      </tr>
                  </table> 
                    <table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#ffffff" width="600" class="email-container">
                    <tr> </tr>
                    <tr>
                        <td style="padding: 40px; color:black;text-align: center; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;"> 
                            <p style="color:black"><strong>Dear '.$Name.',</strong></p><br>Your have successfuly registered for KEC Student+. Thank You! <br>Your registration details are as follows: <br>
                            <b> <br> Registration Number: '.$rollno.'<br>Password : '.$mask.' </b><br><br>
                            <br><p style="color:black"><strong>Please activate your account in order to start using it, through this link: 
                        <table cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto">
                            <tr>
                            <td style="border-radius: 3px; background: #222222; text-align: center;" class="button-td"><a href="'.$link.'" style="background: #222222; border: 15px solid #222222; padding: 0 10px;color: #ffffff; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a"> 
                              <!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;<![endif]-->Activate Now<!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;<![endif]--> 
                              </a></td>
                          </tr>
                          </table>  </strong>
                  <br><p>If you are not redirected automatically, please copy and paste this link in the browser for activation.</p>              
                  <p><a href="'.$link.'" target="_blank">'.$link.'</a></p>
                  </td></tr><tr>
                        <td background="images/Image_600x230.png" bgcolor="#222222" valign="middle" style="text-align: center; background-position: center center !important; background-size: cover !important;"></td>
                      </tr><tr> </tr><tr> </tr> <tr> </tr><tr> </tr>       
                  </table> 
                    <table align="center" width="600" class="email-container">
                    <tr>
                        <td style="padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; mso-height-rule: exactly; line-height:18px; text-align: center; color: #888888;">
                            <b><h3>Team A3</b></h3><br>
                        <span class="mobile-link--footer">All rights reserved @Team A3. </span> <br>
                        <br>
                      </td>
                      </tr>
                  </table></center></td>
              </tr>
            </table>
        </body>
        </html>';

        $mail->Subject = 'Welcome to KEC Student+';
        $mail->Body=$bodyContent;
        if(!$mail->send())
            echo "<script>Notiflix.Report.Failure( 'Read Below!', 'Error sending the Activation Link Sent to your mail. Please select Resend Activation Link in the Login Page.', 'Okay',function(){location.replace('index.php');} );</script> ";
        else
            echo "<script>Notiflix.Report.Success( 'Read Below!', 'Activation Link Sent to your mail Successfully. Please Activate to continue.', 'Okay',function(){location.replace('index.php');}  );</script> ";
        }
        ?>                   
        </body>
 </html>