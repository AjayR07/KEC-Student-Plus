<?php
session_start();
if(!isset($_SESSION['kecadmin']))
{
    header("Location:login.php");
}
//icons in this page taken from https://www.w3schools.com/icons/fontawesome_icons_webapp.asp
?>
<!doctype html>
<!-- code by webdevtrick (https://webdevtrick.com) -->
<html lang="en">
  <head>
    <title>KEC Student+</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="KEC.png"> 
	  
  </head>
  <body background="bgpic.jpg">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="http://localhost/test1/">KEC Student+</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
		  <a class="nav-link" href="http://localhost/test1/@admin@/index.php"><b>Home </b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create.php"><b>+ Add User</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="yearupgrade.php"><b>Year Upgrade</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="studentedit.php"><b>Edit Student</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dropstudent.php"><b>Drop IV Students</b></a>
      </li>


      
      
    </ul>
    <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true">Logout</i></a>
                </li>
            </ul>
  </div>
</nav>