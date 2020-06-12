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
              
          <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
          <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.5/dist/semantic.min.css">
          <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.5/dist/semantic.min.js"></script>
          <title>Non Certificate OD</title>
    <style>

        h2{
          padding-top:10px;
          color:#686868;

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
         .ui.selection.dropdown{
           color:red;
         }
         .ui.dropdown:not(.button)>.default.text {
            color: rgba(16, 14, 14, 0.87);
        }
         
    </style>
    <script >
      
      var addCols = function (num){
         for (var i=1;i<=num;i++) {
                var myCol = $('<div class="col-sm-3 col-md-3 pb-2"></div>');
                var myPanel = $('<div class="container1"></div><div class="ui card" id="day'+i+'"><div class="content"><div class="header">DAY '+i+'</div><div class="ui divider"></div><div class="CardUI"><spam><b>Reason &nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></spam><div class="ui input">  <input type="text" id="Day'+i+'Reason" placeholder="" size="45" required></div></div><div class="CardUI1"><div class="hour"></div><div class="inline field"> <select name="day'+i+'hour[]" multiple="" class="label ui selection fluid dropdown" required> <option value="" class="dropcolor">Select Hours (Multi)</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option>  </select> </div> </div></div></div></div>');
                myPanel.appendTo(myCol);
                myCol.appendTo('#contentPanel');
                if(i==num)
                {
                  
                  var myCol = $('<div class="col-sm-3 col-md-3 pb-2"></div>');
                  var myPanel = $('<div class="container2"><div class="ui card" id="submitcard"> <div><button type="submit" class="positive ui button">Submit</button></div></div></div>');
                  myPanel.appendTo(myCol);
                  myCol.appendTo('#contentPanel');
                }
              
            }
            
            
          

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
          $('.ui.dropdown')
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
          maxDate: new Date(start.getFullYear(), start.getMonth(), start.getDate() + 5),
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
    	getInputValue(diff+1);
      
  	}
  </script>
    </head>
<body>
<?php include_once('studentnav.php');
include_once('../assets/notiflix.php');
?>

    <center>
    <h2 style="color:bisque;">Non Certificate On-Duty</h2>
    <div class="container">
    <form class="ui form" name="myForm" id="daysform">
    <div class="ui card">
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
                            <input type="text" id="end" placeholder="End (MM/DD/YYYY)" onblur="getDiff();" name="odEnd">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                    <span class="positive ui button">OK</span>
                    </div>
                 </div>
                 <div class="row" id="contentPanel">

                 </div>
               </div>
            
         </div>
        </div>
    </div>
    </form>
    </div>
    
  </center>
</body>
</html>
