<?php
session_start();
if(!isset($_SESSION['uname']))
{
    header("location: ../studLog.php");
}
$register=$_SESSION['uname'];
include_once('../db.php');
include_once('studentnav.php');
include_once('../assets/notiflix.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <!-- You MUST include jQuery before Fomantic -->
      <title>Non Certificate OD</title>
      <style>

        h2{
          padding-top:10px;
          color:#686868;

        }
        #firstcard{
          padding-bottom:300px;
        }
        .ui.card
            {
                padding-top: 10px;
                height: 200px;
                width: 800px;
               
            }
            .wrapper wrapper--w780
            {

                visibility:hidden;
            }
            .container{
                padding-top:10px;
            }
            .container1{
                padding-top:10px;
                                              
            }
            .container2>.ui.card{
                padding-top:80px;
                
             }
             .container2{
              padding-top:30px;
             }
           .ui.calender{
              width:20px;
            }
          .row{
            padding-top:40px;
          }
    
          .inline.field{
           width:300px;
          }
          .hour>.spam{
            color:black;
            padding: 30px 400px 0px 0px;

          }
          .CardUI1{
            padding-top:20px;
            padding-left:20px
          }
          .ui.dropdown:not(.button)>.default.text {
          color: rgba(31, 29, 29, 0.87);
          }         
      </style>
    </head>
    <body>
    <?php 
        include_once('studentnav.php');
        include_once('../assets/notiflix.php');
    ?>
    <center>
    <h2 style="color:bisque;">Non Certificate On-Duty</h2>
    <div class="container">
        <form class="ui form" name="myForm" id="daysform">
                    <div class="ui card" id="firstcard">
                      <div class="content">
                        <div class="header">
                          Select OD Range
                        </div>
                        <div class="description">

                          <div class="two fields">
                            <div class="field">
                              <label>Start Date </label>
                              <div class="ui calendar" id="rangestart">
                                <div class="ui input left icon">
                                  <i class="calendar icon"></i>
                                  <input type="text"  id="start"  placeholder="Start (DD/MM/YYYY)" name="odStart" required>
                                </div>
                              </div>
                            </div>
                            <div class="field">
                              <label>End Date</label>
                              <div class="ui calendar" id="rangeend">
                                <div class="ui input left icon">
                                  <i class="calendar icon"></i>
                                  <input type="text" id="end" placeholder="End (DD/MM/YYYY)"  name="odEnd" required>
                                </div>
                              </div>
                            </div>
                          </div>
                          <br>
                          <div style="padding-right:100px">
                              <spam>Authorising Faculty : &nbsp;</spam>
                              <div class="ui input">
                                <input type="text" minlength="4" size="25" id="faculty" name="faculty"  required>
                              </div>
                          </div>
                          <br>
                  
                  
                          <div style="padding-right:10px">
                            <spam>Club :&nbsp;</spam>
                            <div class="ui selection dropdown" id="event">
                                <input type="hidden" id="club" name="event" required>
                                <i class="dropdown icon"></i>
                                <div class="default text">Select</div>
                                <div class="menu" >
                                  <div class="item" data-value="Tamil Mandram">Tamil Mandram</div>
                                  <div class="item" data-value="Pasumai Vanam">Pasumai Vanam</div>
                                  <div class="item" data-value="Women Development Cell">Women Development Cell</div>
                                  <div class="item" data-value="Yoga & Meditation Club">Yoga & Meditation Club</div>
                                  <div class="item" data-value="Youth Red Cross">Youth Red Cross</div>
                                  <div class="item" data-value="Photography Club">Photography Club</div>
                                  <div class="item" data-value="Cultural Club">Cultural Club</div> 
                                  <div class="item" data-value="Self Development Club">Self Development Club</div>
                                  <div class="item" data-value="Rotaract Club">Rotaract Club</div>
                                  <div class="item" data-value="Android Application Development Club">Android Application Development Club</div>
                                  <div class="item" data-value="English Proficiency Club">English Proficiency Club</div>
                                </div>
                            </div>
                          </div>
                          <br>

                          <div>
                              <spam class="positive ui button" id="okbtn">OK</spam>
                          </div>
                        </div>
                      </div>
                    </div>  
                <div class="row" id="contentPanel" style="margin-bottom:3%;">
                
                </div>
    </form>
    </div>
    
  </center>
  <script>
    $(document).ready(function()
    {
      var day=0;
      var month=0;
      var year=0;      
      var today = new Date();
      $('#rangestart').calendar({
        type: 'date',
        endCalendar: $('#rangeend'),
        minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate() + 1),
        maxDate: new Date(today.getFullYear(), today.getMonth(), today.getDate() + 5),
        formatter: {
        date: function (date, settings) {
          if (!date) return '';
          day = date.getDate();
          month = date.getMonth() + 1;
          year = date.getFullYear();
          $('#rangeend').calendar({
  
            type: 'date',
            startCalendar: $('#rangestart'),
            maxDate: new Date(date.getFullYear(),date.getMonth(), date.getDate() + 4),
            formatter: {
            date: function (date, settings) {
              if (!date) return '';
            
              day = date.getDate();
              month = date.getMonth() + 1;
              year = date.getFullYear();
              return day + '/' + month + '/' + year;
            }
            }
        });
          return day + '/' + month + '/' + year;
        }
        }
      });


      $("#okbtn").on("click",function(){
    
        if($("#start").val()=="" ||$("#end").val()=="" )
        { 
          Notiflix.Notify.Warning('Please choose a correct Date Span');
        }
        else
        {
          var x= $('#event').dropdown('get text');
          var y=document.getElementById("faculty").value;
          if(y=="")
          {
            document.getElementById("faculty").focus();
          
          }
          else
          {

            if(x=="Select")
            {
            $('.ui.selection.dropdown').focus();
            }
            else
            {
              getDiff();
            }
          }
        }
      });
    });
    var diff;
    function getDiff()
  	{ 
  		var start=document.forms["myForm"]["odStart"].value.split('/');
  		var end=document.forms["myForm"]["odEnd"].value.split('/');

      var fromdate=new Date(start[1]+'/'+start[0]+'/'+start[2]);
      var todate=new Date(end[1]+'/'+end[0]+'/'+end[2]);

      var diffTime = (todate.getTime() - fromdate.getTime());
      var diff = (diffTime / (1000 * 60 * 60 * 24)); 
      diff+=1;
      getInputValue(diff);    
  	}
    function getInputValue(count)
    {
          $('#contentPanel').empty();
          if(count<=5)
          {
            addCols(count);
            return false;
          }
    } 


 


    $(document).ready(function()
    {
        $('.label.ui.dropdown')
          .dropdown();
          $('.ui.dropdown')
          .dropdown();

        $('.no.label.ui.dropdown')
          .dropdown({
          useLabels: false
        });

        $('.ui.button').on('click', function () {
          $('.label.ui.selection.fluid.dropdown')
            .dropdown('restore defaults')
        })

    });


  
  	
    
  
    var addCols = function (num){
        for (var i=1;i<=num;i++) {
              var myCol = $('<div class="col-sm-3 col-md-3 pb-2"></div>');
              var myPanel = $('<div class="container1"></div><div class="ui card" id="day'+i+'"><div class="content"><div class="header">DAY '+i+'</div><div class="ui divider"></div><div class="CardUI"><spam><b>Reason &nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></spam><div class="ui input">  <input type="text" name="day'+i+'reason" placeholder="" size="45" required></div></div><div class="CardUI1"><div class="hour"></div><div class="inline field"> <select name="day'+i+'hour[]" multiple="" class="label ui selection fluid dropdown" required> <option value="" class="dropcolor">Select Hours (Multi)</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option>  </select> </div> </div></div></div></div>');
              myPanel.appendTo(myCol);
              myCol.appendTo('#contentPanel');
            }
                
        var myCol = $('<div class="col-sm-3 col-md-3 pb-2"></div>');
        // var myPanel = $('<div class="container2"><div class="ui card" id="submitcard"> <div><button type="submit" id="noncertod"  class="positive ui button">Submit</button></div></div></div>');
        var myPanel = $('<div class="container2"><div><button type="submit" id="noncertod"  class="positive ui huge button">Submit</button></div></div>');
        myPanel.appendTo(myCol);
        myCol.appendTo('#contentPanel');    
    };
    

    $(document).ready(function(){
    $("#daysform").on("submit",function()
    {
      $("#noncertod").addClass("loading");
      var form1=$("#daysform").serialize();
      form1+="&noncertod=submitted";

      var response="";
      $.ajax({
        url:"ajax_handler.php",
        type:"POST",
        data:form1,
        success:function(d)
        {
          $("#noncertod").removeClass("loading");
          response = d;
          if(response!="")
          {
            Notiflix.Report.Success( 'Submission Successful', '<br>Your Application submitted successfully<br>', 'Okay' ,function(){location.href="Status.php";}); 
          }  
          else
          {
            $("#daysform").form('clear');
            $('#contentPanel').empty();
            Notiflix.Report.Failure( 'Submission Error', 'Some error occured. <br> Please try again with correct information.', 'Okay');
          }
        }
      });
      return false;
    });

  });
  </script>
</body>
</html>






