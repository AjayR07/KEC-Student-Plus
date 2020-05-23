<?php
include_once('../db.php');
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no"
    />
    <link rel="icon" type="image/png" href="../KEC.png">
   <!-- No Script Part -->
   <noscript><meta http-equiv="refresh" content="0; URL='../errorfile/noscript.html'" /></noscript>
	<!-- -------- -->
<?php include_once('../assets/notiflix.php'); ?>
<link rel="stylesheet" href="../assets/Semantic/dist/semantic.min.css" type="text/css" />

<script src="../assets/jquery.min.js"></script>
    <script src="../assets/Semantic/dist/semantic.min.js"></script>
 
    <style type="text/css">
      body {
        -webkit-font-smoothing: antialiased;
        -moz-font-smoothing: grayscale;
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
    </style>

    <script>
      $(window).on("load", function() {
        $('.preloader').hide();
        $('#filter').popup();

      });
    </script>

    <script type="text/javascript">
  $(document).ready(function() {

      $('#avatar').popup({
        on    : 'click',
        inline     : true,
        position   : 'bottom center',
    popup: '#tool'
  });

  });
</script>
<?php
$regno=$_SESSION['uname'];
$sql="SELECT * from registration where regno like '$regno'";

$temp=($con->query($sql))->fetch_assoc();

$a=0;
$d=0;
$o=0;
$p=0;
$mail=$temp['mail'];
$phone=$temp['phone'];
$gender=$temp['gender'];
$name=$temp['name'];
$sql="SELECT o.status as status, p.status1 as status1, p.status2 as status2, p.status3 as status3,p.advisor as advisor from registration r, oddetails o,preod p where (r.regno like '$regno') and (r.regno like o.regno) and (o.appno like p.appno)";
//echo '<script>alert("'.$sql.'")</script>';
$sql2="SELECT c.status as othercert from othercert c where c.regno like '$regno'";
$data=$con->query($sql);
if($data->num_rows==0)
{
    echo '<tr><td colspan="6">No Record Found</td></tr>';
}
else{
while ($row = mysqli_fetch_array($data))
{
    if($row['status']=='Approved' && $row['status1']=='Approved' && $row['status2']=='Approved' && $row['status3']=='Approved' && $row['advisor']=='Approved')
    { $a++; }
    else if($row['status']=='Declined' || $row['status1']=='Declined' || $row['status2']=='Declined' || $row['status3']=='Declined' || $row['advisor']=='Declined')
    { $d++; }
    else if($row['status']=='Pending' || $row['status1']=='Pending' || $row['status2']=='Pending' || $row['status3']=='Pending' || $row['advisor']=='Pending')
    { $p++; }

}
}
$data=$con->query($sql2);
$a=$a+$data->num_rows;
if($data->num_rows==0)
{
    echo '<tr><td colspan="6">No Record Found</td></tr>';
}
else{
while ($row = mysqli_fetch_array($data))
{
        if($row['othercert']=='Approved')
        {
          $o++;
        }
        else if($row['othercert']=='Declined')
        {
          $d++;
        }
        else if($row['othercert']=='Pending')
        {
          $p++;
        }
}
}
?>
  </head>

  <body id="root">
  <div class="preloader"><body><div class="ui active dimmer"><div class="ui large text loader">Please wait...</div></div></body></div>
    <div class="ui tablet computer only padded grid">
      <div class="ui borderless fluid huge inverted menu">
        <a class="active green item" href="#root">KEC Student+</a>
          <a class="item" href="PreOdForm">OD Permission Form</a>
          <a class="item" href="OdSubmission">OD Submit</a>
          <a class="item" href="Status">Status</a>
          <a class="item" href="OtherCert">Certificate Registration</a>
          <a class="item" href="CertRepos">Certificate Repository</a>
          <a class="right item" id="avatar">
          <?php 
          if($gender=='male')
                echo '<img class="ui avatar image" src="/images/matthew.png"/>';
          else if($gender=='female')
                echo '<img class="ui avatar image" src="/images/molly.png"/>'; 
          else
                echo '<img class="ui avatar image" src="/images/elyse.png"/>';
          ?>
          <div class="content">
          <div class="ui sub header" style="color:white"><?php 
          $fname = explode (" ", $name); 
          echo $fname[0]; ?></div>
            Student
        </div>
          
          </a>
          <a class="right item" href="../Logout.php"><i class="share square outline icon"></i>Logout</a>

      </div>
    </div>
    <div class="ui mobile only padded grid">
      <div class="ui borderless fluid huge inverted menu">
        <a class="header item" href="#root">KEC Student+</a>
        <div class="right menu">
          <div class="item">
            <button class="ui icon toggle basic inverted button">
              <i class="content icon"></i>
            </button>
          </div>
        </div>
        <div class="ui vertical borderless fluid inverted menu">
        <a class="item" href="PreOdForm">OD Permission Form</a>
          <a class="item" href="OdSubmission">OD Submit</a>
          <a class="item" href="Status">Status</a>
          <a class="item" href="OtherCert">Certificate Registration</a>
          <a class="item" href="CertRepos">Certificate Repository</a>
         
          <a class="item" href="../Logout.php"><i class="share square outline icon"></i>Logout</a>
        </div>
      </div>
    </div>

    <div class="ui popup" id="tool">
      <h1 class="header">
        <center> Profile</center>
      </h1>
 
    <h4 class="content">
      Name: <?php echo $name; ?><br><br>
      Phone: <?php echo $phone; ?><br><br>
      Mail Id: <a href="mailto:<?php echo $mail; ?>"><i class="mail icon"></i></a><br><br>
      Total Applied: <?php echo $a+$p+$d; ?><br><br>
      Total Pending: <?php echo $p; ?><br><br>
      Total Granted: <?php echo $a; ?><br><br>
      Total Rejected: <?php echo $d; ?><br><br>
      Certificates Registered: <?php echo $o; ?> <br>
    </h4>
      </div>
    <script>
      $(document).ready(function() {
        $(".ui.toggle.button").click(function() {
          $(".mobile.only.grid .ui.vertical.menu").toggle(100);
        });
      });
    </script>
  </body>
</html>
