<!-- Student Details Fetch - Arul -->
<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: ../staffLog.php");
} else {
  $staff = $_SESSION['user'];
  include_once('../assets/notiflix.php');
}
?>
<html>

<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../KEC.png">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <?php require_once('staffnav.php');
  include_once('../assets/notiflix.php'); ?>

  <script>
    $(document).ready(function() {
      $('.ui.dropdown').dropdown('show');
    });
  </script>

  <style>
    body,
    .root {
      background: url('../backstaff.jpg');
      background-size: cover;
      font-family: 'Open Sans', sans-serif;
    }

    .landpage-image {
      background-image: url('../backstaff.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }

    .css {
      margin-top: 15%;
      margin-bottom: 15%;
    }
  </style>
  <title>Student Details</title>

</head>

<body background="../backstaff.jpg">
  <br><br>
  <style>
    body,
    .root {
      background: url('../backstaff.jpg');
      background-size: cover;
      font-family: 'Open Sans', sans-serif;
    }

    td {
      font-weight: bold;

    }
  </style>



  <script>
    $(document).ready(function() {
      $(".detail").hide();
    })

    function GetDetail() {

      $(".detail").hide();
      var str = $('#roll').val();
      if (str.length != 0) {
        // console.log("ula vanten");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {

            var myOBJ = JSON.parse(this.responseText);

            if (myOBJ[6] == "NOT FOUND") {
              $(".detail").hide();
              Notiflix.Report.Failure('No Data Found!', 'Error fetching your data from our sources', 'Okay', function() {});
            } else {

              $('#regno').text(myOBJ[12]);
              $('#name').text(myOBJ[4]);
              $('#dept').text(myOBJ[2]);
              $('#batch').text(myOBJ[1]);
              $('#section').text(myOBJ[3]);
              $('#email').text(myOBJ[0]);
              $('#phone').text(myOBJ[5]);
              $('#t').text(myOBJ[7]);
              $('#a').text(myOBJ[9]);
              $('#p').text(myOBJ[8]);
              $('#d').text(myOBJ[10]);
              $('#certi').text(myOBJ[11]);

              $(".detail").show();
            }

          } else if (this.status == 403 || this.status == 404) {
            $(".detail").hide();
            Notiflix.Report.Failure('No Data Found!', 'Error fetching your data from our sources', 'Okay', function() {});
          }
        }
        xmlhttp.open("GET", "../search.php?roll=" + str, true);
        xmlhttp.send();
      }

      return false;
    }
  </script>
  <div class="ui raised very padded container segment">
    <form class="ui form" onsubmit="return GetDetail();">
      <center>
        <h1 class="ui header">Search Student Details</h1><br><br>
        <div class="ui content">
          <div class="ui form">
            <label for="">Enter Roll Number : &nbsp;&nbsp;</label>
            <div class="ui input">
              <input type="text" id="roll" placeholder="Roll Number" minlength="8" maxlength="8" onkeyup="this.value = this.value.toUpperCase();" required />
            </div>&nbsp;&nbsp;

            <button class="ui positive button">Search</button>

          </div>
        </div>
      </center>
    </form>
  </div>

  <div class="detail">
    <div class="ui raised very padded container segment">
      <table class="ui table">

        <tbody>
          <tr>
            <td>Roll Number</td>
            <td><label id="regno"></label></td>
          </tr>
          <tr>
            <td>Name</td>
            <td><label id="name"></label></td>
          </tr>
          <tr>
            <td>Department</td>
            <td><label id="dept"></label></td>
          </tr>
          <tr>
            <td>Batch</td>
            <td><label id="batch"></label></td>
          </tr>
          <tr>
            <td>Section</td>
            <td><label id="section"></label></td>
          </tr>
          <tr>
            <td>Mail ID</td>
            <td><label id="email"></label></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td><label id="phone"></label></td>
          </tr>
          <tr>
            <td>Total OD Applied</td>
            <td><label id="t"></label></td>
          </tr>
          <tr>
            <td>Granted</td>
            <td><label id="a"></label></td>
          </tr>
          <tr>
            <td>Pending</td>
            <td><label id="p"></label></td>
          </tr>
          <tr>
            <td>Rejected</td>
            <td><label id="d"></label></td>
          </tr>
          <tr>
            <td>Certificate Registered</td>
            <td><label id="certi"></label></td>
          </tr>
        </tbody>

      </table>


    </div>
  </div>




</body>

</html>