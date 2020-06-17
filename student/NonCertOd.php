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
    <script >
       var diff;
      var addCols = function (num){
         for (var i=1;i<=num+1;i++) {
                var myCol = $('<div class="col-sm-3 col-md-3 pb-2"></div>');
                var myPanel = $('<div class="container1"></div><div class="ui card" id="day'+i+'"><div class="content"><div class="header">DAY '+i+'</div><div class="ui divider"></div><div class="CardUI"><spam><b>Reason &nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></spam><div class="ui input">  <input type="text" id="Day'+i+'Reason" placeholder="" size="45" required></div></div><div class="CardUI1"><div class="hour"></div><div class="inline field"> <select name="day'+i+'hour[]" multiple="" class="label ui selection fluid dropdown" required> <option value="" class="dropcolor">Select Hours (Multi)</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option>  </select> </div> </div></div></div></div>');
                myPanel.appendTo(myCol);
                myCol.appendTo('#contentPanel');
              }
                 
                  var myCol = $('<div class="col-sm-3 col-md-3 pb-2"></div>');
                  var myPanel = $('<div class="container2"><div class="ui card" id="submitcard"> <div><button type="submit" class="positive ui button">Submit</button></div></div></div>');
                  myPanel.appendTo(myCol);
                  myCol.appendTo('#contentPanel');
                
              
           
           };
       function getInputValue(count)
       {
          $('#contentPanel').empty();
            console.log("button clicked");
             var inputVal = count;
             var pre=inputVal;
             if(inputVal<=5)
             {
                addCols(inputVal);
                return false;
             }else{
                 console.log("exceed");
             }
            
       }

     $(document).ready(function(){
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
              return month + '/' + day + '/' + year;
            }
          }
         });
         var thatday=new Date(day,month,year);
         $('#rangeend').calendar({
              type: 'date',
              startCalendar: $('#rangestart'),
              formatter: {
                date: function (date, settings) {
                  if (!date) return '';
                  day = date.getDate();
                  month = date.getMonth() + 1;
                  year = date.getFullYear();
                  return month + '/' + day + '/' + year;
                }
              }
        });
        });

        $(document).ready(function()
                {
        $('.label.ui.dropdown')
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

        
    </script>
    <style>
        body {
        background-image: url("../backlogout.jpg");
        
        }
    </style>
    <script type="text/javascript">
  	
    function getStart()
    {
      var start=$('#rangeend').calendar("get startDate");
      //alert(start);
      $('#rangeend').calendar({
          type: 'date',
          startCalendar: $('#rangestart'),
          maxDate: new Date(start.getFullYear(), start.getMonth(), start.getDate() + 4),
          formatter: {
          date: function (date, settings) {
            if (!date) return '';
            day = date.getDate();
            month = date.getMonth() + 1;
            year = date.getFullYear();
            return month + '/' + day + '/' + year;
          }
        }
        });
    }
    function getDiff()
  	{
     
  		var fromdate=new Date(document.forms["myForm"]["odStart"].value);
  		var todate=new Date(document.forms["myForm"]["odEnd"].value);
      var diffTime = (todate.getTime() - fromdate.getTime());
      var diff = (diffTime / (1000 * 60 * 60 * 24)); 
      getInputValue(diff);
    
      
  	}
    function getcards()
    {
      getInputValue(diff);
      console.log("get cards clicked");
      console.log(diff);
    }
    $(document).ready(function()
    {
         $('.ui.selection.dropdown')
          .dropdown();
    });


    function FormValidate()
    {

      console.log(diff); 
      return false;

     }
     function selectChanged(newvalue) {
       console.log("rjr");
        alert("you chose: " + newvalue);
    }

    
    $(document).ready(function(){
       
      $('.ui.selection.dropdown')
      .dropdown({
       
        onChange: function(value, text, $selectedItem) {
            console.log(text);
        }
      });
    });

  function firstcardValidate() {
    
    var startd=document.getElementById("start").value;
    var endd=document.getElementById("end").value;
    var x= $('.ui.selection.dropdown').dropdown('get text');
    var y=document.getElementById("faculty").value;
    if(startd=="")
    {
      
      alert("Enter start Date");
      exit();
    }
    else{
    if(endd=="")
    {
      
      alert("Enter End Date");
      exit();
    }}
    if(y=="")
    {
      document.getElementById("faculty").focus();
     
    }
    else{

      if(x=="Select")
      {
      $('.ui.selection.dropdown').focus();
      }else{

        getDiff();
      }

    }

          
}

    

  </script>
    </head>
    <body>
    <?php 
        include_once('studentnav.php');
        include_once('../assets/notiflix.php');
    ?>
<center>
    <h2 style="color:bisque;">Non Certificate On-Duty</h2>
    <div class="container">
        <form class="ui form" name="myForm" id="daysform" onsubmit="return FromValidate();">
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
                                  <input type="text"  id="start" onblur="getStart();" placeholder="Start (MM/DD/YYYY)" name="odStart">
                                </div>
                              </div>
                            </div>
                            <div class="field">
                              <label>End Date</label>
                              <div class="ui calendar" id="rangeend">
                                <div class="ui input left icon">
                                  <i class="calendar icon"></i>
                                  <input type="text" id="end" placeholder="End (MM/DD/YYYY)" " name="odEnd">
                                </div>
                              </div>
                            </div>
                          </div>
                          <br>


                          <div style="padding-right:100px">
                              <spam>Authorising Faculty : &nbsp;</spam>
                              <div class="ui input">
                                <input type="text" minlength="4" size="25" id="faculty"   required>
                              </div>
                          </div>
                          <br>
                  
                  
                          <div style="padding-right:10px">
                            <spam>Club :&nbsp;</spam>
                            <div class="ui selection dropdown">
                                <input type="text" id="club" name="Select" required>
                                <i class="dropdown icon"></i>
                                <div class="default text">Select</div>
                                <div class="menu" >
                                  <div class="item" data-value="1">Tamil Mandram</div>
                                  <div class="item" data-value="2">Pasumai Vanam</div>
                                  <div class="item" data-value="3">Women Development Cell</div>
                                  <div class="item" data-value="4">Yoga & Meditation Club</div>
                                  <div class="item" data-value="5">Youth Red Cross</div>
                                  <div class="item" data-value="6">Photography Club</div>
                                  <div class="item" data-value="7">Cultural Club</div> 
                                  <div class="item" data-value="8">Self Development Club</div>
                                  <div class="item" data-value="9">Rotaract Club</div>
                                  <div class="item" data-value="10">Android Application Development Club</div>
                                  <div class="item" data-value="11">English Proficiency Club</div>
                                </div>
                            </div>
                          </div>
                          <br>


                          <div>
                              <spam onclick="firstcardValidate();"class="positive ui button">OK</spam>
                          </div>
                        </div>
                      </div>
                    </div>  
                <div class="row" id="contentPanel" style="margin-bottom:3%;">
                </div>
            
        
    
    </form>
    </div>
    
  </center>
</body>
</html>




