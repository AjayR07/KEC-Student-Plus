<?php
include_once('../db.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="../KEC.png">
  <link rel="stylesheet" href="../assets/Fomantic/dist/semantic.min.css" type="text/css" />


  <!-- No Script Part -->
  <noscript>
    <meta http-equiv="refresh" content="0; URL='../errorfile/noscript.html'" /></noscript>
  <!--  -->

  <?php include_once('../assets/notiflix.php'); ?>
  <script src="../assets/jquery.min.js"></script>
  <script src="../assets/Fomantic/dist/semantic.min.js"></script>
  <style>
    /* Refers the whole setup */
    ::-webkit-scrollbar {
      width: 13px;
      border-radius: 13px;
    }

    /* Refers tracking path */
    ::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      border-radius: 13px;
      /* background-color: #F5F5F5; */
    }

    /* Refers Draggable Bar */
    ::-webkit-scrollbar-thumb {
      border-radius: 13px;
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
      box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
      background-color: #555;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #ef8376;
    }
  </style>
  <style type="text/css">
    body {
      -webkit-font-smoothing: antialiased;
      -moz-font-smoothing: grayscale;
      height: auto;
    }

    html {
      scroll-behavior: smooth;
    }

    .ui.center.aligned.container {
      margin-top: 4em;
    }

    p.lead {
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
      font-size: 1.3em;
      color: #333333;
      line-height: 1.4;
      font-weight: 300;
    }

    .ui.huge.header {
      font-size: 36px;
    }

    .ui.inverted.menu {
      border-radius: 0;
      flex-wrap: wrap;
      border: none;
      padding-left: 0;
      padding-right: 0;
    }

    .ui.mobile.only.grid .ui.menu .ui.vertical.menu {
      display: none;
    }

    .ui.inverted.menu .item {
      color: rgb(157, 157, 157);
      font-size: 16px;
    }

    .ui.inverted.menu .active.item {
      background-color: #080808;
    }

    #SideNavBar {
      background-image: url('../images/backlogout.jpg') !important;
      background-size: cover !important;

    }

    body,
    .pusher {
      background-image: url("../backlogout.jpg") !important;

    }

    .header {
      color: cyan;
    }
  </style>

  <script type="text/javascript">
    $(window).on("load", function() {
      $('.preloader').hide();
      $('#filter').popup();

    });



    $(document).ready(function() {
      $('#side_nav').on('click', function() {
        $('.ui.sidebar').sidebar('toggle');
      });
      $('#side_nav_mobile').on('click', function() {
        $('.ui.sidebar').sidebar('toggle');
      });


    });
  </script>


</head>

<body id="root">
  <?php
  include_once('./StudentProfile.php'); ?>
  <div class="preloader">

    <body>
      <div class="ui active dimmer" style="position: fixed;">
        <div class="ui massive active green elastic loader"></div>
      </div>
    </body>
  </div>
  <div class="ui tablet computer only padded grid">
    <div class="ui borderless fluid  inverted menu" style="font-size:16px">
      <a class=" active  item" id="side_nav"><i class="sidebar icon"></i></a>
      <a class="active green item" href="#root" style="font-size:20px">KEC Student+</a>

      <a class="ui right aligned item" id="avatar">
        <?php
        if ($gender == 'Male')
          echo '<img class="ui avatar image" src="../images/matthew.png"/>';
        else if ($gender == 'Female')
          echo '<img class="ui avatar image" src="../images/molly.png"/>';
        else
          echo '<img class="ui avatar image" src="../images/elyse.png"/>';
        ?>
        <div class="content" style="font-size:16px">
          <div class="ui sub header" style="color:white;font-size:16px"><?php echo $name; ?><br></div>
          Student

        </div>

      </a>

      <a class="item" href="../Logout.php" style="font-size:20px"><i class="share square outline icon"></i>Logout</a>

    </div>
  </div>

  <div class="ui mobile only padded grid">
    <div class="ui borderless fluid huge inverted menu" style="font-size:16px">
      <a class=" active  item" id="side_nav_mobile"><i class="sidebar icon"></i></a>
      <a class="active green item" href="#root" style="font-size:20px">KEC Student+</a>



      <a class="ui right aligned item" href="../Logout.php"><i class="share square outline icon"></i></a>

    </div>
  </div>






  <script>
    $(document).ready(function() {
      $(".ui.toggle.button").click(function() {
        $(".mobile.only.grid .ui.vertical.menu").toggle(100);
      });
    });
  </script>

  <div class="ui sidebar inverted vertical menu" id="SideNavBar" style="font-size:18px">
    <div class="item">

      <center><a href="index"><img src="../KEC.png" alt="" style="width:60%" /></a>
        <span class="ui large text" style="color:cyan">
          <center>KEC Student+</center>
        </span></center><br>
    </div>
    <div class="item">
      <div class="header" style="font-size:18px">On Duty</div>
    </div>
    <a class="item" href="PreOdForm" style="text-indent:20%;font-size:18px">Permission Form</a>
    <a class="item" href="OdSubmission" style="text-indent:20%;font-size:18px">Submission</a>
    <a class="item" href="Status" style="text-indent:20%;font-size:18px">Status</a>
    <a class="item" href="NonCertOd" style="text-indent:20%;font-size:18px">Local OD</a>
    <div class="item">
      <div class=" header" style="font-size:18px">Certificates</div>
    </div>
    <a class="item" href="OtherCert" style="text-indent:20%;font-size:18px">Registration</a>
    <a class="item" href="CertRepos" style="text-indent:20%;font-size:18px">Repository</a>
    <div class="item">
      <div class=" header" style="font-size:18px">Profile</div>
    </div>
    <a class="item" href="../Logout.php" style="text-indent:20%;font-size:18px">Logout<i class="share square outline icon"></i></a>
    <footer style="margin-top:30%;color:bisque;font-size:14px">
      <center> &copy; Kongu Engineering College . <br>All rights reserved.</center>
      <br>
    </footer>

  </div>