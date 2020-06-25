<?php
session_start();
?>
<?php include_once('studentnav.php');?>
  <title>Profile</title>
  <link rel="stylesheet" href="css/profile.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
</head>

<div class="pusher">
<aside class="profile-card">
  
  <header>
    <a>
      <img src="../images/matthew.png" class="hoverZoomLink">
    </a>
    <h1>John Doe</h1>
    
  </header>

  <div class="profile-bio">
    <p>
      <label class="prf">Phone:</label>
      <a>7871502525</a><br>
      <div class="row" style="height: 10px;"></div>
      <label class="prf">Mail Id:</label>
      <i class="fa fa-envelope" style="color: purple;" aria-hidden="true"></i><br>
      <div class="row" style="height: 10px;"></div>
      <label class="prf">Total Applied:</label>
      <a>3</a><br>
      <div class="row" style="height: 10px;"></div>
      <label class="prf">Total Pending:</label>
      <a>2</a><br>
      <div class="row" style="height: 10px;"></div>
      <label class="prf">Total Granted:</label>
      <a>4</a><br>
      <div class="row" style="height: 10px;"></div>
      <label class="prf">Total Rejected:</label>
      <a>1</a><br>
      <div class="row" style="height: 10px;"></div>
      <label class="prf">Certificates Registered:</label>
      <a>5</a><br>
    </p>

  </div>

</aside> 
</div> 
</body>
</html>
