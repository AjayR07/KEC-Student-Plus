<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
include_once('../assets/notiflix.php');

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$register=$_SESSION['username'];
$name= $_SESSION['name'];
$mailto =$_SESSION['mail'];
$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.sendgrid.net';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'apikey';          // SMTP username
$mail->Password = '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'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to
$mail->setFrom('admin@teama3.tech', 'KEC Student+');
$mail->addAddress($mailto);   // Add a recipient


$mail->isHTML(true);  // Set email format to HTML


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
    <body background=".\wamp64\www\test1\86373.jpg" >

    <table bgcolor="#e0e0e0" cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" style="border-collapse:collapse;">
      <tr>
        <td><center style="width: 100%;">


            <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;"> Regards from KEC Student Plus, Your OTP is '.$_SESSION['otp'].' </div>

            <table align="center" width="600" class="email-container">
            <tr>
                <td style="padding: 20px 0; text-align: center"><h1 style="color: #000000; font-family: sans-serif;">KEC Student+</h1></td>
              </tr>
          </table>

            <table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#ffffff" width="600" class="email-container">
            <tr> </tr>

            <tr>
                <td style="padding: 40px; text-align: center; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">
                    <p style="color: #000000;"><strong>Dear '.$name.',</strong></p><br><p style="color: #000000;">Your OTP to reset KEC Student Plus account Password is <br></p>
                <br>

                <table cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto">
                    <tr>
                    <td align="center"><h3 style="color: #000000; font-family: sans-serif; letter-spacing: 0.2em; line-height: 1.1; text-align: center; text-decoration: none; ">
                      <!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;<![endif]--><b>'.$_SESSION['otp'].'<b><!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;<![endif]-->
                      </h3></td>
                  </tr>
                  <tr>
                        <td align="center">
                        <i align="center">If you are not requested for OTP, Please ignore this message.</i></br></td>
                      </tr>
                  </table>

          </td>

            <tr>
                <td background="images/Image_600x230.png" bgcolor="#222222" valign="middle" style="text-align: center; background-position: center center !important; background-size: cover !important;"></td>
              </tr>

            <tr> </tr>

            <tr> </tr>

            <tr> </tr>

            <tr> </tr>


          </table>
            <table align="center" width="600" class="email-container">
            <tr>
                <td style="padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; mso-height-rule: exactly; line-height:18px; text-align: center; color: #888888;">
					<b><h3>Team A3</b></h3><br>
                <span class="mobile-link--footer">All rights reserved © Team A3. No part of the WebApp may be reproduced or distributed in any form or by any means without prior permission</span> <br>
                <br>
              </td>
              </tr>
          </table>
          </center></td>
      </tr>
    </table>
</body>
</html>
';

$mail->Subject = 'OTP';
$mail->Body    = $bodyContent;

?>
<html>
<head> <?php include_once('../assets/notiflix.php');?>
  <script>
   Notiflix.Block.Pulse('#root','Sending Your Mail...');
 </script></head>
<body  background="../backgrd.jpg" id="root">

  <style>
  body,.root
  {
  background: url('../backgrd.jpg');
  background-size: cover ;
  font-family: 'Open Sans', sans-serif;
  }
  </style>

  <?php
  if(!$mail->send()) {

    echo "<script> Notiflix.Report.Failure('Error sending OTP !','May be due Internet issues . Please try again later...', 'Retry' ,function(){ location.replace('../studLog.php')}); </script>";
  }
  else
  {
    echo "<script>Notiflix.Block.Remove('#root');</script>";

        $_SESSION["mailsent"]='yes';
        $str=substr($mailto,0,2).'**'.substr($mailto,4,1).str_repeat("*", strlen($mailto)-14) .substr($mailto,strlen($mailto)-10,strlen($mailto)-1);
        echo "<script> Notiflix.Report.Success('OTP Send Successfully','Your One Time Password to reset your password has been mailed to   $str', 'Okay' ,function(){ location.replace('ForgetPass.php')}); </script>";
  }
?>
</body>
</html>
