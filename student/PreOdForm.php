<?php
	session_start();
	if(!isset($_SESSION['uname']))
	{
		header("location: ../studLog.php");
	}
	$register=$_SESSION['uname'];
	include_once('../db.php');
	include_once('../assets/notiflix.php');
?>
<!doctype html>
<html lang="en">
	<head>
		<title>OD Permission</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->

	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--Dont remove-->

		<link rel="icon" type="image/png" href="../KEC.png">
	<!--Import materialize.css-->
	

	</head>

<div class="pusher" background="../backlogout.jpg">
<?php require_once('studentnav.php');?>


<?php
		$register=$_SESSION['uname'];
		$sql="SELECT * FROM `registration` WHERE `regno` LIKE '$register'";
		$data=$con->query($sql);
		$row=$data->fetch_assoc();
		$register=$row['regno'];
		$name=$row['name'];
?>
<?php
if(isset($_POST['submit']))
{
$appdate=date('Y-m-d');
$odfrom=$_POST['odfrom'];
$odto=$_POST['odto'];
$hrs=$_POST['hrs'];
$type=$_POST['odtype'];
if(strlen($_POST['odtypeother'])>0)
	$type=$_POST['odtypeother'];
//echo '<script>alert("'.$type.'");</script>';
$college=$_POST['college'];
$state=$_POST['state'];
$title=$_POST['title'];
$purpose=$_POST['purpose'];
$temp1=$row['batch']%2000;
$temp2=$row['dept'];
$temp3=substr($row['regno'],5);
$temp4=date('d');
$temp5=date('m');
$temp6=rand(10,99);
$appno=strval($temp1).strval($temp2).strval($temp3).strval($temp4).strval($temp5).strval($temp6);
//echo '<script>alert("'.$appno.'")</script>';
$sql="insert into oddetails values('$appno','$register','$appdate','$type','$title','$odfrom','$odto','$hrs','$college','$state','$purpose','Pending')";
$con->query($sql);
$sql="insert into preod (appno) values ('$appno')";
$con->query($sql);
$_SESSION['appno']=$appno;
echo '<script>location.href="PermissionSuccess.php"</script>';
}
?>
<?php echo "<script>Notiflix.Notify.Info('OD can be applied only before 7 Days');</script>";?>



	<div class="container-contact100">

		<div class="wrap-contact100">
			<form class="contact100-form validate-form" name="myForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validate();">
				<span class="contact100-form-title">
					OD Permission Application
				</span>

				<div>
					<span class="label-input100">Roll Number</span>
					<input class="input100" type="text" name="roll" value="<?php echo $register;?>" readonly required>
				</div>

				<div>
					<span class="label-input100">Name</span>
					<input class="input100" type="text" name="name" value="<?php echo $name;?>" readonly required>
				</div>
				<div>
					<span class="label-input100">Applied Date</span>
					<input class="input100" id="appdate" type="text" name="appdate" value="<?php echo date('d/m/Y');?>" readonly required>
				</div>
				<div class="validate-input" data-validate = "Message is required">
					<span class="label-input100">From Date:</span>
					<input type="date" name="odfrom" id="odfrom" min="<?php
							$date=date_create(date("Y-m-d"));
							date_add($date,date_interval_create_from_date_string("1 days"));
							echo date_format($date,"Y-m-d");?>"
							max="<?php
							$date=date_create(date("Y-m-d"));
							date_add($date,date_interval_create_from_date_string("6 days"));
							echo date_format($date,"Y-m-d");?>" required>
					<span class="focus-input100"></span>
				</div>
				<div class="validate-input" data-validate = "Message is required">
					<span class="label-input100">To Date:</span>

					<input type="date" class="form-control" name="odto" id ="odto" min="<?php
							$date=date_create(date("Y-m-d"));
							date_add($date,date_interval_create_from_date_string("1 days"));
							echo date_format($date,"Y-m-d");?>"
							max="<?php
							$date=date_create(date("Y-m-d"));
							date_add($date,date_interval_create_from_date_string("6 days"));
							echo date_format($date,"Y-m-d");?>" required>

					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 input100-select">
					<span class="label-input100 validate-input">No. of Hours</span>
					<div>
						<select class="selection-2" name="hrs" required>
							<option selected disabled>Select No. of Hrs</option>
							<option value="half">Half Day</option>
							<option value="full">Full Day</option>
						</select>

					</div>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 input100-select">
					<span class="label-input100">OD Type</span>

						<select class="selection-2" name="odtype" onchange='othersel(this.value);' required>
							<option selected disabled>Select OD Type</option>
							<option value="PAPER">Paper Presentation</option>
							<option value="PROJECT">Project Presentation</option>
							<option value="SPORT">Sports</option>
							<option value="CODING">Coding</option>
							<option value="HACKATHON">Hackathon</option>
							<option value="OTHER">Others</option>
						</select>

					<input type="text" name="odtypeother" id="other" style='display:none;' placeholder="Enter OD Type"/>
					<span class="focus-input100"></span>
				</div>
				<div>
					<span class="label-input100">College</span>
					<input type="text" name="college" required placeholder="College Name" required/>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 input100-select">
					<span class="label-input100 validate-input">State</span>

						<select class="selection-2" name="state" required>
							<option selected disabled>Select State</option>
							<option value="TAMILNADU">Inside Tamilnadu</option>
							<option value="OTHERSTATE">Outside Tamilnadu</option>
						</select>
				</div>
				<br>
				<div>
					<span class="label-input100">Name of the Paper/Project/Workshop/Sport</span>
					<input type="text" class="input100" name="title" required placeholder="Title" required/>

				</div>
				<div>
					<span class="label-input100">Purpose</span>
					<input type="text" class="input100" name="purpose" required value="NIL" required/>

				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" type="submit" name="submit">
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	


	<div id="dropDownSelect1"></div></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../assets/Semantic/dist/semantic.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script type="text/javascript">
  	function validate()
  	{
  		var fromdate=document.forms["myForm"]["odfrom"].value;
  		var todate=document.forms["myForm"]["odto"].value;
  		//var fromdate = document.getElementById('odfrom');
  		//var todate= document.getElementById('odto');
  		if(new Date(fromdate)>new Date(todate))
  		{
  		//	alert('To date cannot be beyond from date');
         Notiflix.Report.Failure( 'Error', 'End date cannot be beyond Start Date', 'Okay' );
  			return false;
  		}
  		else
  		{
  			return true;
  		}
  	}
  </script>

  <script type="text/javascript">
  function othersel(val){
   var element=document.getElementById('other');
   if(val=='OTHER')
     element.style.display='block';
   else
     element.style.display='none';
  }

  </script>
	</div>
</body>
</html>
