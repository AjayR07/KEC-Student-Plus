<div class="ui small modal" id="Editor" style="margin-top:10%;display:none;">
  <div class="header" style="font-size:20px;">
    Edit OnDuty Application
    <button class="ui right floated negative icon button" id="closebtn">
      <i class="close icon"></i>
    </button>
  </div>
  <div class="content">
    <form class="ui form raised segment" id="editor">

      <h3 class="ui dividing header">Applicant Details</h3>
      <div class="two fields">
        <div class="field">
          <label>Register Number:</label>
          <input type="text" name="e_regno" id="e_regno" placeholder="Register Number" readonly>
        </div>
        <div class="field">
          <label>Name:</label>
          <input type="text" name="e_name" id="e_name" placeholder="Applicant Name" readonly>
        </div>
      </div>
      <br>
      <h3 class="ui dividing header">Application Details</h3>
      <div class="two fields">
        <div class="field">
          <label>Application Number:</label>
          <input type="text" name="e_appno" id="e_appno" placeholder="Application Number" readonly>
        </div>
        <div class="field">
          <label>Applied Date (DD/MM/YYYY): </label>

          <div class="ui calendar" id="date_calendar">
            <div class="ui input right icon">
              <input type="text" name="e_date" id="e_date" placeholder="dd/mm/yyyy">
              <i class="calendar icon"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="two fields">
        <div class="field">
          <label>Start Date (DD/MM/YYYY):</label>
          <div class="ui calendar" id="rangestart">
            <div class="ui input right icon">
              <i class="calendar icon"></i>
              <input type="text" name="e_start" id="e_start" placeholder="dd/mm/yyyy" required>
            </div>
          </div>
        </div>
        <div class="field">
          <label>End Date (DD/MM/YYYY):</label>
          <div class="ui calendar" id="rangeend">
            <div class="ui input right icon">

              <input type="text" name="e_end" id="e_end" placeholder="dd/mm/yyyy" required>
              <i class="calendar icon"></i>
            </div>
          </div>
        </div>
      </div>



      <div class="two fields">
        <div class="field">
          <label>Onduty Type:</label>
          <input type="text" name="e_type" id="e_type" placeholder="Application Type" required>
        </div>
        <div class="field">
          <label>No.of.Days / No.of.Hours:</label>
          <input type="text" name="e_hrs" id="e_hrs" placeholder="No.of.Hours" required>
        </div>
      </div>

      <div class="two fields">
        <div class="field">
          <label>Event Title:</label>
          <input type="text" name="e_title" id="e_title" placeholder="Title of the Event" required>
        </div>
        <div class="field">
          <label>College/Company:</label>
          <input type="text" name="e_college" id="e_college" placeholder="College Name" required>
        </div>
      </div>
      <div class="two fields">
        <div class="field">
          <label>State:</label>
          <input type="text" name="e_state" id="e_state" placeholder="TAMILNADU / OTHERSTATE" required>
        </div>
        <div class="field" id="reward">
          <label>Rewards:</label>
          <input type="text" name="e_reward" id="e_reward" placeholder="Rewards Earned">
        </div>
      </div>



  </div>
  <div class="actions" style="padding-bottom:10%;">

    <button class="ui right floated positive large button" type="submit" name="e_update">Update</button>
    </form>
    <button class="ui right floated negative large button" id="closebtn1">Cancel</button>
  </div>


</div>
<script>
  $(document).ready(function() {
    $('#rangestart').calendar({
      type: 'date',

      endCalendar: $('#rangeend'),
      formatter: {
        date: function(date, settings) {

          if (!date) return '';
          var day = date.getDate();
          var month = date.getMonth() + 1;
          var year = date.getFullYear();
          return day + '/' + month + '/' + year;
        }
      }
    });
    $('#rangeend').calendar({
      type: 'date',
      startCalendar: $('#rangestart'),
      formatter: {
        date: function(date, settings) {

          if (!date) return '';
          var day = date.getDate();
          var month = date.getMonth() + 1;
          var year = date.getFullYear();

          return day + '/' + month + '/' + year;
        }
      }
    });

    $('#date_calendar').calendar({
      type: 'date',
      formatter: {
        date: function(date, settings) {

          if (!date) return '';
          var day = date.getDate();
          var month = date.getMonth() + 1;
          var year = date.getFullYear();

          return day + '/' + month + '/' + year;
        }
      }
    });

    $("#closebtn").on("click", function() {
      $("#Editor").modal("hide");
    });
    $("#closebtn1").on("click", function() {
      $("#Editor").modal("hide");
    });
    $('#pop1').on("click", function() {

      $(window).scrollTop(0);
      $("#pop").click();
    });
    if ($(document).attr('title') != "Post OD Approve") {
      $("#reward").hide();
      $("#e_reward").prop("disabled", true);
    }

    $("#Editor").modal({
      closable: false,
      keyboardShortcuts: false,
      onApprove($element) {
        return false
      }
    });



    $("#mod1").on("click", function() {
      $("#mod").click();
    });
    $("#mod").on("click", function() {
      editmodal();
    });


    $("#editor").on("submit", function() {
      var apptype = "<?php echo $_SESSION['type'] ?>";
      var pgTitle = $(document).attr('title');
      var form = $("#editor").serialize() + "&editApp=edited&odtype=" + apptype + "&pageFrom=" + pgTitle;

      $("#editor").attr("class", "ui blue double loading form raised segment");

      $.ajax({
        url: "ajax_handler.php",
        data: form,
        type: "POST",
        success: function(d) {
          $("#editor").attr("class", "ui form raised segment");
          Notiflix.Notify.Success(d);
          location.reload(true);
        }
      });
      return false;

    });
  });
</script>



<link rel="stylesheet" href="../assets/animate.min.css" type="text/css" />
<!-- Floating Action Button -->
<div class="adminActions">
  <input type="checkbox" name="adminToggle" class="adminToggle" />
  <a class="adminButton" href="#!"><i class="setting icon"></i></a>
  <div class="adminButtons" id="FAB">
    <a id="pop1" data-tooltip="User Profile" data-position="left center"><i class="user icon"></i></a>
    <a id="mod1" data-tooltip="Edit Application" data-position="left center"><i class="edit icon"></i></a>

  </div>
</div>
<style>
  body {
    background-color: #f5f5f5;
  }

  .adminActions {
    position: fixed;
    bottom: 35px;
    right: 35px;
  }

  .adminButton {
    height: 60px;
    width: 60px;
    background-color: rgba(67, 83, 143, .8);
    border-radius: 50%;
    display: block;
    color: #fff;
    text-align: center;
    position: relative;
    z-index: 1;
  }

  .adminButton:hover {
    height: 60px;
    width: 60px;
    background-color: rgba(67, 83, 143, .8);
    border-radius: 50%;
    display: block;
    color: #fff;
    text-align: center;
    position: relative;
    z-index: 1;
  }

  .adminButton i {
    font-size: 22px;
  }

  .adminButtons {
    position: absolute;
    width: 100%;
    bottom: 120%;
    text-align: center;
  }

  .adminButtons a {
    display: block;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    text-decoration: none;
    margin: 10px auto 0;
    line-height: 1.15;
    color: #fff;
    opacity: 0;
    visibility: hidden;
    position: relative;
    box-shadow: 0 0 5px 1px rgba(51, 51, 51, .3);
  }

  .adminButtons a:hover {
    transform: scale(1.05);
  }

  .adminButtons a:nth-child(1) {
    background-color: #ff5722;
    transition: opacity .2s ease-in-out .3s, transform .15s ease-in-out;
  }

  .adminButtons a:nth-child(2) {
    background-color: #03a9f4;
    transition: opacity .2s ease-in-out .25s, transform .15s ease-in-out;
  }

  .adminButtons a:nth-child(3) {
    background-color: #f44336;
    transition: opacity .2s ease-in-out .2s, transform .15s ease-in-out;
  }

  .adminButtons a:nth-child(4) {
    background-color: #4CAF50;
    transition: opacity .2s ease-in-out .15s, transform .15s ease-in-out;
  }

  .adminActions a i {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }


  .adminToggle {
    -webkit-appearance: none;
    position: absolute;
    border-radius: 50%;
    top: 0;
    left: 0;
    margin: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
    background-color: transparent;
    border: none;
    outline: none;
    z-index: 2;
    transition: box-shadow .2s ease-in-out;
    box-shadow: 0 3px 5px 1px rgba(51, 51, 51, .3);
  }

  .adminToggle:checked~.adminButtons a {
    opacity: 1;
    visibility: visible;
  }
</style>