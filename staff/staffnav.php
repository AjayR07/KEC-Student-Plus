<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no"/>
    <link rel="icon" type="image/png" href="../KEC.png">
<link rel="stylesheet" href="../assets/Semantic/dist/semantic.min.css" type="text/css"/> 
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
       <!-- No Script Part -->
	<noscript><meta http-equiv="refresh" content="0; URL='../errorfile/noscript.html'" /></noscript>
	<!-- -------- -->

    <style type="text/css">
      body {
        -webkit-font-smoothing: antialiased;
        -moz-font-smoothing: grayscale;
        font-family: 'Open Sans', sans-serif;
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
       /* .ui.modal,
        .ui.active.modal {
          position: fixed;
          margin: auto auto!important;
          top:23%;
          left:18%;
          right: 18%;
          transform-origin: center !important;
          transition: all ease .5s;
        }
        .modal {
            height: auto;
            top: auto;
            left: auto;
            bottom: auto;
            right: auto;
        } */
    </style>
    <script src="../assets/jquery.min.js"></script>
    <script src="../assets/Semantic/dist/semantic.min.js"></script>
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
        // $(function(){
        //   $.ajaxSetup ({
        //       cache: false
        //   });
        //   //var ajax_load = "<img src='../images/giphy3.svg' alt='Loading...' style='position: absolute;top: 0;left: 0;width: 100%;height: 100%;z-index: 9999;'/>";
        //  // var ajax_load=Notiflix.Loading.Dots();Notiflix.Loading.Remove();
        //   var ajax_load='<body><div class="ui active dimmer"><div class="ui loader"></div></div></body>';
         
        //   var loadUrl = "./OdList.php";
        //   var loadUrl1 = "./PostOdList.php";
        //   var loadUrl2 = "./Export.php";
        //   var loadUrl3 = "./ClassInfo.php";
          
        //   $("#OdList").click(function(){
        //     let stateObj = { id: "100" }; 
        //     window.history.pushState(stateObj,"OD Permission", "./OdList");
        //       $("body").html(ajax_load).load(loadUrl);
        //   });
        //   $("#PostOdList").click(function(){
        //     let stateObj = { id: "100" }; 
        //     window.history.pushState(stateObj,"OD Submission", "./PostOdList");
        //     $("body").html(ajax_load).load(loadUrl1);
        //   });
         
        //   $("#Export").click(function(){
        //     let stateObj = { id: "100" }; 
        //     window.history.pushState(stateObj,"OD Status", "./Export");
        //       $("body").html(ajax_load).load(loadUrl2);
        //   });
  
        //   $("#ClassInfo").click(function(){
        //     let stateObj = { id: "100" }; 
        //     window.history.pushState(stateObj,"Certificate Registration", "./ClassInfo");
        //       $("body").html(ajax_load).load(loadUrl3);
        //   });
         
        
      // });
    </script> 
     <script>
      $(window).on("load", function() {
        $('.preloader').hide();
        $('#filter').popup();
      });
    </script>
  </head>

<body id="root">
<div class="preloader"><body><div class="ui active dimmer"><div class="ui large text loader">Please wait...</div></div></body></div>
    <div class="ui tablet computer only padded grid">
      <div class="ui borderless fluid huge inverted menu">
        <a class="active green item" href="#root">KEC Student+</a>
        <a class="item" href="OdList">Pre-OD List</a>
          <a class="item" id="togglemodal">Suggestion Approval</a>
          <a class="item" href="PostOdList">Post-OD List</a>
          <a class="item" href="Export">Export</a>
          <a class="item" href="ClassInfo">Class Info</a>
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
        <a class="item" href="OdList.php">Pre-OD List</a>
          <a class="item" id="togglemobile">Suggestion Approval</a>
          <a class="item" href="PostOdList.php">Post-OD List</a>
          <a class="item" href="Export.php">Export</a>
          <a class="item" href="ClassInfo.php">Class Info</a>
          <a class="item" href="../Logout.php"><i class="share square outline icon"></i>Logout</a>
        </div>
      </div>
    </div>


    <script>
      $(document).ready(function() {
        $(".ui.toggle.button").click(function() {
          $(".mobile.only.grid .ui.vertical.menu").toggle(100);
        });
      });

    </script>
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
</body>
</html>
