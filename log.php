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
<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<link rel="stylesheet" type="text/css" href="./assets/Semantic/dist/semantic.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="images/wave.png">
	<div class="container">
		<div class="img">
			<img src="images/KEC.png">
		</div>
	
		<div class="login-content">
			<form action="index.html">
				<img src="images/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Register Number</h5>
           		   		<input type="text" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input">
				   </div>
				   
				</div>
				<a href="#">Show Password</a>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
	<script type="text/javascript" src="js/login.js"></script>
	<script type="text/javascript" src="./assets/jquery.min.js"></script>
	<script type="text/javascript" src="./assets/Semantic/dist/semantic.min.js"></script>
</body>
</html>
