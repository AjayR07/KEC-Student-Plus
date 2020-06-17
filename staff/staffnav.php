<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no"/>
    <link rel="icon" type="image/png" href="../KEC.png">
<link rel="stylesheet" href="../assets/Fomantic/dist/semantic.min.css" type="text/css"/> 
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
       <!-- No Script Part -->
	<noscript><meta http-equiv="refresh" content="0; URL='../errorfile/noscript.html'" /></noscript>
	<!-- -------- -->

  

  <style>
        /* Refers the whole setup */
        ::-webkit-scrollbar {
          width: 13px;
          border-radius: 13px;
        }

        /* Refers tracking path */
        ::-webkit-scrollbar-track {
          -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
          border-radius: 13px;
          /* background-color: #F5F5F5; */
        }
        /* Refers Draggable Bar */
        ::-webkit-scrollbar-thumb {
          border-radius: 13px;
          -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
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
      html{
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
      .dimmed.dimmable > .ui.animating.dimmer, .dimmed.dimmable > .ui.visible.dimmer, .ui.active.dimmer {
          display: flex;
          align-items: center;
          justify-content: center;
        }
        #SideNavBar {
            /* background-image: url('../images/sidenav.jpg') !important; */
            background-size: cover !important; 
                    
          }
         body, .pusher {
             background-image: url("../backstaff.jpg") !important;
 
          }
          .header
           {
             color:cyan;
           }


    </style>
    <script src="../assets/jquery.min.js"></script>
    <script src="../assets/Fomantic/dist/semantic.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.pop').popup();
    $("#togglemodal").on("click",function(){
      $('#navmodal').modal({
               onApprove :function()
               {
                 return false;
               }
             }).modal("show");
    });});
    $(document).ready(function(){
      $('.pop').popup();
    $("#togglemobile").on("click",function(){
      $('#navmodal').modal({
               onApprove :function()
               {
                 return false;
               }
             }).modal("show");
    });
      $('.ui.form').form({
    fields: {
      name: {
        identifier: 'appno',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please Enter the Application Number'
          },
          {
            type   : 'maxLength[16]',
            prompt : 'Please Enter a Valid Application Number'
          },
          {
            type   : 'minLength[14]',
            prompt : 'Your Enter a Valid Application Number'
          }
        ]
      }
    }
  });

      });
</script>

     <script>
      $(window).on("load", function() {
        $('.preloader').hide();
        $('#filter').popup();
      });
    </script>
  </head>

<body id="root">
<div class="preloader"><body><div class="ui active dimmer"><div class="ui massive active green elastic loader"></div></div></body></div>


<div class="ui modal" id="navmodal">
  <div class="header">KEC Student+</div>
  <div class="content">
    <p>OD Suggestion Approval</p>

    <form action="PreOdAprv.php" method="POST" class="ui form segment error">
          <div class="field">
          <label>Type in the Application Number: </label>
         <input type="text" id="app" name="appno" onkeyup="this.value = this.value.toUpperCase();">
          </div>
          <div class="actions">
            <center><button type="submit" class="ui positive submit button">Go</button>
            <div class="ui negative button">Close</div>
            <div class="ui error message"></div>
            </div></center>
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
        $('#side_nav').on('click',function(){
                  $('.ui.sidebar').sidebar('setting', 'transition', 'overlay').sidebar('toggle');
                });
      });

    </script>

<div class="ui sidebar inverted vertical menu" id="SideNavBar" style="font-size:18px">
    <div class="item">
      <!-- <a class="ui logo icon image" href="/">
      <?php 
            // if($gender=='male')
            //       echo '<img class="ui avatar image" src="../images/matthew.png"/>';
            // else if($gender=='female')
            //       echo '<img class="ui avatar image" src="../images/molly.png"/>'; 
            // else
            //       echo '<img class="ui avatar image" src="../images/elyse.png"/>';
            ?>
      </a> -->
      <center><a href="index"><img src="../KEC.png" alt=""  style="width:60%"/></a>
      <span class="ui large text" style="color:cyan"><center>KEC Student+</center></span></center><br>
      <!-- <a href="/" style="font-size:18px;text-align:center">&nbsp Hi! &nbsp <b><?php// echo $_SESSION["user"]; ?> </b></a> -->
    </div>
    <div >
    <div class="item" ><div class="header" style="font-size:17px;" >Advisor / Year in Charge</div></div>
          <a class="ui item" href="OdList" style="font-size:16px;text-indent:20%;"><span class="ui inverted grey text">Pre-OD List</span></a>
          <a class="item" href="PostOdList" style="font-size:16px;text-indent:20%;"><span class="ui inverted grey text">Post-OD List</span></a>
          <div class="item" ><div class="header" style="font-size:18px;" >Suggestion</div></div>   
          <a class="item" id="togglemodal" style="font-size:16px;text-indent:20%;"><span class="ui inverted grey text">Suggestion Approval</span></a>
          <div class="item" ><div class="header" style="font-size:18px;" >Repository</div></div>   
          <a class="item" href="Export" style="font-size:16px;text-indent:20%;"><span class="ui inverted grey text">Export</span></a>
          <a class="item" href="ClassInfo" style="font-size:16px;text-indent:20%;"><span class="ui inverted grey text">Class Info</span></a>
          <a class="item" href="StudentDetail" style="font-size:16px;text-indent:20%;"><span class="ui inverted grey text">Student Details</span></a>
         
         
    </div>

    <footer style="margin-top:20%;color:bisque;font-size:14px">
			<center>	&copy; Team A3 . <br>All rights reserved.</center>
				<br>
		</footer>
  </div>
</div class="pusher">