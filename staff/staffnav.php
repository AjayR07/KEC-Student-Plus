<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no" />
  <link rel="icon" type="image/png" href="../KEC.png">
  <link rel="stylesheet" href="../assets/Fomantic/dist/semantic.min.css" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <!-- No Script Part -->
  <noscript>
    <meta http-equiv="refresh" content="0; URL='../errorfile/noscript.html'" /></noscript>
  <!-- -------- -->


  <?php include_once('../assets/notiflix.php'); ?>
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
      font-family: 'Open Sans', sans-serif;
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

    .dimmed.dimmable>.ui.animating.dimmer,
    .dimmed.dimmable>.ui.visible.dimmer,
    .ui.active.dimmer {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    #SideNavBar {
      /* background-image: url('../images/sidenav.jpg') !important; */
      background-size: cover !important;

    }

    body,
    .pusher {
      background-image: url("../backstaff.jpg") !important;

    }

    .header {
      color: cyan;
    }
  </style>
  <script src="../assets/jquery.min.js"></script>
  <script src="../assets/Fomantic/dist/semantic.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.pop').popup();
      $("#togglemodal").on("click", function() {
        $('#navmodal').modal({
          onApprove: function() {
            return false;
          }
        }).modal("show");
      });
    });
    $(document).ready(function() {
      $('.pop').popup();
      $("#togglemobile").on("click", function() {
        $('#navmodal').modal({
          onDeny: function() {
            return false;
          }
        }).modal("show");
      });
      $('#suggform').form({
        fields: {
          rollno: {
            identifier: 'rollno',
            rules: [{
              type: 'empty',
              prompt: 'Please Enter the Register Number'
            }, ],
          },
          addprop: {
            identifier: 'appdrop',
            rules: [{
                type: 'empty',
                prompt: 'Please select the Application Number'
              },
              {
                type: 'match[""]',
                prompt: 'Please select an Application Number'
              }
            ]
          }
        }
      });

      $('#togglepass').on("click", function() {
        $('#changepass').modal({
          onApprove: function() {
            return false;
          }
        }).modal('show');
        $('#newpass').on("change", function() {
          var pass = $("#newpass").val();
        });
      });


      $('#passform').form({
        fields: {
          oldpass: {
            identifier: 'oldpass',
            rules: [{
                type: 'empty',
                prompt: 'Please Enter the Old Password'
              },
              {
                type: 'maxLength[16]',
                prompt: 'Please Enter Password upto 16 Characters'
              },
              {
                type: 'minLength[4]',
                prompt: 'Please Enter Password above 4 characters'
              }
            ]
          },
          newpass: {
            identifier: 'newpass',
            rules: [{
                type: 'empty',
                prompt: 'Please Enter the Old Password'
              },
              {
                type: 'maxLength[16]',
                prompt: 'Please Enter Password upto 16 Characters'
              },
              {
                type: 'minLength[4]',
                prompt: 'Please Enter Password above 4 characters'
              }
            ]
          },
          cnfmnewpass: {
            identifier: 'cnfmnewpass',
            rules: [{
                type: 'empty',
                prompt: 'Please Enter the Old Password'
              },
              {
                type: 'maxLength[16]',
                prompt: 'Please Enter Password upto 16 Characters'
              },
              {
                type: 'minLength[4]',
                prompt: 'Please Enter Password above 4 characters'
              },
              {
                type: 'match[newpass]',
                prompt: 'Password and Confirm Password should be same'
              },

            ]
          }

        },
        onSuccess: function(event, fields) {
          event.preventDefault();
          SubmitDetails();
        }

      });
    });

    function SubmitDetails() {
      data = $("#passform").serializeArray();
      $("#passform").attr("class", "ui blue double loading form segment error");
      data[3] = {
        name: "staffid",
        value: "<?php echo $_SESSION['staffid']; ?>"
      };
      //console.log(data);
      $.ajax({
        url: "ajax_handler.php",
        type: "POST",
        data: data,
        success: function(d) {
          $("#passform").attr("class", "ui form segment error");
          $('#changepass').modal('hide');
          Notiflix.Notify.Success(d);
        }
      });
    }
  </script>

  <script>
    $(window).on("load", function() {
      $('.preloader').hide();
      $('#filter').popup();
      $('#appdrop').dropdown({
        clearable: true,
      });
    });
  </script>
</head>

<body id="root">
  <div class="preloader">

    <body>
      <div class="ui active dimmer" style="position: fixed;">
        <div class="ui massive active green elastic loader"></div>
      </div>
    </body>
  </div>

  <!-- Password Changing Modal -->
  <div class="ui small modal" id="changepass">
    <i class="close icon"></i>
    <div class="header">Change Password</div>
    <div class="content">
      <form class="ui form segment error" id="passform">
        <div class="field">
          <label>Old Password:</label>
          <input type="password" name="oldpass" id="oldpass" placeholder="Old Password">
        </div>
        <div class="field">
          <label>New Password:</label>
          <input type="password" name="newpass" id="newpass" placeholder="New Password">
        </div>
        <div class="field">
          <label>Confirm New Password:</label>
          <input type="password" name="cnfmnewpass" placeholder="Confirm Password">
        </div>
        <div class="actions" style="text-align: right;">
          <button class="ui positive button" type="submit" name="changepass">Proceed</button>
          <div class="ui negative button" onClick="return true">Ignore</div><br />
          <div class="ui error message"></div>
        </div>
      </form>

    </div>

  </div>
  <script>
    $(document).ready(function() {
      $("#activateajax").on("click", function() {
        if ($('#rollno').val().length != 8) {
          $("#pri").attr("class", "field error");
          $("#sec").attr("class", "disabled field");
          $("#appdrop").empty();
        } else if ($('#rollno').val().length == 8) {
          $("#appdrop").empty();
          $("#pri").attr("class", "field");
          var regno = $('#rollno').val();
          $("#suggform").attr("class", "ui blue double loading form segment error");
          data = [{
            name: "regno",
            value: regno
          }];

          $.ajax({
            url: "ajax_handler.php",
            type: "POST",
            data: data,
            success: function(d) {

              d = JSON.parse(d);
              $("#suggform").attr("class", "ui form segment error");
              if (d[0] != 0) {
                var i;
                for (i = 1; i <= d[0]; i++) {
                  var op = "<option value=" + d[i] + ">" + d[i] + "</option>";

                  $(op).appendTo("#appdrop");
                }
                $("#sec").attr("class", "field");

                $('#msubmit').prop("disabled", false);
              } else {
                Notiflix.Notify.Info("No Application Pending");
              }
            }
          });

        }
      });

    });

    function dropy() {
      console.log('getting in')
      if (document.getElementById("appdrop").val() != "") {
        document.getElementById("msubmit").removeAttribute("disabled");
      }
    }
  </script>

  <!-- Suggestion Modal -->
  <div class="ui modal" id="navmodal">
    <i class="close icon"></i>
    <div class="header">KEC Student+</div>
    <div class="content">
      <p>OD Suggestion Approval</p>

      <form action="PreOdAprv.php" method="POST" class="ui form segment error" id="suggform">
        <div class="two fields">
          <div class="field" id="pri">
            <label>Enter Register and Search: </label>
            <div class="ui icon input" data-children-count="1">
              <input type="text" placeholder="Enter Roll Number" id="rollno" name="rollno" onkeyup="this.value = this.value.toUpperCase();" required>
              <i class="inverted circular search link icon" id="activateajax" style="color:#000099;"></i>
            </div>
          </div>

          <div class="disabled field" id="sec">
            <label>Select the Application Number: </label>
            <select class="ui clearable search dropdown" id="appdrop" name="appdrop" onchange="dropy()" required>
              <option value="">Select an Application</option>
            </select>
          </div>
        </div>

        <div class="actions">
          <center><button type="submit" class="ui positive submit button" id="msubmit" disabled="disabled">Go</button>
            <div class="ui negative button">Close</div>
            <div class="ui error message"></div>
        </div>
        </center>

      </form>

    </div>
  </div>
  </div>

  <div class="ui borderless fluid huge inverted menu" style="margin-top:0%">
    <a class=" active  item" id="side_nav"><i class="sidebar icon"></i></a>
    <a class="active green item" href="index.php">KEC Student+</a>
    <a class="right item" href="../Logout.php"><i class="share square outline icon"></i>Logout</a>
  </div>

  <script>
    $(document).ready(function() {
      $('#side_nav').on('click', function() {
        $('.ui.sidebar').sidebar('setting', 'transition', 'overlay').sidebar('toggle');
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
      <div class="header">
        <i class="user circle outline icon"></i><?php echo $_SESSION['staffname']; ?></div>
    </div>
    <div class="item">
      <div class="header" style="font-size:17px;">Advisor / Year in Charge</div>
    </div>
    <a class="ui item" href="OdList" style="font-size:16px;text-indent:20%;"><span class="ui inverted grey text">Pre-OD List</span></a>
    <a class="item" href="PostOdList" style="font-size:16px;text-indent:20%;"><span class="ui inverted grey text">Post-OD List</span></a>
    <div class="item">
      <div class="header" style="font-size:18px;">Suggestion</div>
    </div>
    <a class="item" id="togglemodal" style="font-size:16px;text-indent:20%;"><span class="ui inverted grey text">Suggestion Approval</span></a>
    <div class="item">
      <div class="header" style="font-size:18px;">Repository</div>
    </div>
    <a class="item" href="Export" style="font-size:16px;text-indent:20%;"><span class="ui inverted grey text">Export</span></a>
    <a class="item" href="ClassInfo" style="font-size:16px;text-indent:20%;"><span class="ui inverted grey text">Class Info</span></a>
    <a class="item" href="StudentDetail" style="font-size:16px;text-indent:20%;"><span class="ui inverted grey text">Student Details</span></a>
    <div class="item">
      <div class="header" style="font-size:18px;">Profile</div>
    </div>
    <a class="item" style="font-size:16px;text-indent:20%;"><span id="togglepass" class="ui inverted grey text">Change Password</span></a>

    </h6>

    <footer style="margin-top:20%;color:bisque;font-size:14px">
      <center> &copy; Kongu Engineering College. <br>All rights reserved.</center>
      <br>
    </footer>
  </div>
  </div class="pusher">