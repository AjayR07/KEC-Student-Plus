<?php
    session_start();
    include_once("../db.php");
    include_once("studentnav.php");


?>
<?php
    $register=$_SESSION['uname'];
    $sql="SELECT * FROM `registration` WHERE `regno` LIKE '$register'";
    $data=$con->query($sql);
    $row=$data->fetch_assoc();
    $register=$row['regno'];
    $name=$row['name'];
?>
<?php
    if(isset($_POST['submit']))
    {
    $appdate=date('Y-m-d');
    $from = str_replace('/', '-',$_POST['odfrom']);
    $odfrom = date('Y-m-d', strtotime($from));
    $to = str_replace('/', '-',$_POST['odto']);
    $odto = date('Y-m-d', strtotime($to));
    $hrs=$_POST['hrs'];
    $type=$_POST['odtype'];
    if(strlen($_POST['odtypeother'])>0)
        $type=$_POST['odtypeother'];

    $college=$_POST['college'];
    $state=$_POST['state'];
    $title=$_POST['title'];
    $purpose=$_POST['purpose'];
    $temp1=$row['batch']%2000;
    $temp2=$row['dept'];
    $temp3=substr($row['regno'],5);
    $temp4=date('d');
    $temp5=date('m');
    $temp6=rand(10,99);
    $appno=strval($temp1).strval($temp2).strval($temp3).strval($temp4).strval($temp5).strval($temp6);
    //echo '<script>alert("'.$appno.'")</script>';
    $sql="INSERT into oddetails values('$appno','$register','$appdate','$type','$title','$odfrom','$odto','$hrs','$college','$state','$purpose','Pending')";
    $con->query($sql);
    if($type!='PAPER' && $type!='PROJECT')
    {
        $sql="INSERT INTO preod (appno,staff1,comments1,status1,staff2,comments2,status2,staff3,comments3,status3) VALUES ('$appno','NA','NA','Approved','NA','NA','Approved','NA','NA','Approved')";
        $con->query($sql);
    }
    else
    {
        $sql="INSERT into preod (appno) values ('$appno')";
        $con->query($sql);
    }
        
    $_SESSION['appno']=$appno;
    echo '<script>location.href="PermissionSuccess.php"</script>';
}
?>
<?php echo "<script>Notiflix.Notify.Info('OD can be applied only before 7 Days');</script>";?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OD Permission</title>
    <style>
        #seg
        {
            width:37%;
            margin:1% auto;
            padding:42px 55px 45px;  
            border-radius:10px;
        }

        @media (max-width: 500px) 
        {
            #seg
            {
                width:92%;
                height:100%;
                margin:4% auto;
                padding:12% 15px 10%;  
                border-radius:10px;
            }
        }
        #int
        {
        
            border-left:0;
            border-top:0;
            border-right:0;
      
        }

        #lbl
        {
            font-size:13px;
            font-weight:1;
            color:	#666666;
        }

        #slt 
        {
            border-left:0;
            border-top:0;
            border-right:0;     
        }
     
    </style>
</head>
<body >
    <div class="ui segment" id="seg">
        <form class="ui form" id="preodform" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <h1 style="font-size:39px;color:#333333;font-weight:1;"><center>OD Permission Application<center></h1>
            
            <div class="field" style="margin-top:10%;">
                <label id="lbl">Roll Number</label>
                <input id="int" type="text" name="roll" value="<?php echo $register;?>" readonly required>
            </div>

            <div class="field">
                <label id="lbl">Name</label>
                <input id="int" type="text" name="name" value="<?php echo $name;?>" readonly required>
            </div>

            <div class="field">
                <label id="lbl">Applied Date:</label>
                <input id="int" id="appdate" type="text" name="appdate" value="<?php echo date('d/m/Y');?>" readonly required>
            </div>
            <div class="field">
                <label id="lbl">From Date:</label>
                <div class="ui calendar" id="rangestart">
                    <div class="ui input right icon">
                        <i class="calendar icon"></i>
                        <input type="text" name="odfrom" id="int" class="start"  placeholder="Start" required />
                    </div>
                </div>
            </div>

            <div class="field">
                <label id="lbl">To Date:</label>
                <div class="ui calendar" id="rangeend">
                    <div class="ui input right icon">
                        <i class="calendar icon"></i>
                        <input type="text" name="odto" id="int" placeholder="End" required>
                    </div>
                </div>
            </div>
            <div class="field">
                <label id="lbl">No. of Hours</label>
                <select class="ui search dropdown" name="hrs" id="slt" required>
                    <option value="" selected disabled>Select No. of Hrs</option>
                    <option value="half">Half Day</option>
                    <option value="full">Full Day</option>
                </select>
            </div>

            <div class="field">
                <label id="lbl">OD Type</label>
                <select class="ui dropdown" name="odtype" onchange='othersel(this.value);' required>
                    <option value=""  selected disabled>Select OD Type</option>
                    <option value="PAPER">Paper Presentation</option>
                    <option value="PROJECT">Project Presentation</option>
                    <option value="SPORT">Sports</option>
                    <option value="CODING">Coding</option>
                    <option value="HACKATHON">Hackathon</option>
                    <option value="OTHER">Others</option>
                </select>
                <div  class="field" id="other" style='display:none;margin-top:4%' >
                <input type="text" name="odtypeother" id="int" placeholder="Enter OD Type"/></div>       
            </div>

            <div class="field">
                <label id="lbl">College</label>
                <select class="ui search dropdown" name="college" id="coll" required>
                    <option value="" selected disabled>Select College Name</option>
                </select>
            </div>

            <div class="field">
                <label id="lbl">State</label>
                <select class="ui  dropdown" name="state" required>
                    <option value=""  selected disabled>Select State</option>
                    <option value="TAMILNADU">Inside Tamilnadu</option>
                    <option value="OTHERSTATE">Outside Tamilnadu</option>
                </select>
            </div>

            <div class="field">
                <label id="lbl">Name of the Paper/Project/Workshop/Sport</label>
                <input type="text" name="title" id="int" placeholder="Title" required/>
            </div>

            <div class="field">
                <label id="lbl">Purpose</label>
                <input type="text" name="purpose" id="int" value="NIL" placeholder="Purpose" required/>
            </div>

            <button class="ui primary button" type="submit" name="submit" style="width:100%;border-radius:30px;height:50px;"> Submit</button>

        </form>
    </div>

<script>

    $(document).ready(function(){
        $('.ui.dropdown').dropdown();
        
        var today = new Date();
  
  
        $('#rangestart').calendar({
            type: 'date',
            endCalendar: $('#rangeend'),
            minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
            maxDate: new Date(today.getFullYear(), today.getMonth(), today.getDate() + 7),
            formatter: 
            {
                date: function (date, settings) {
                    if (!date) return '';
                    var day = date.getDate();
                    var month = date.getMonth() + 1;
                    var year = date.getFullYear();
            
                    $('#rangeend').calendar({
                    type: 'date',
                    startCalendar: $('#rangestart'),
                    maxDate: new Date(date.getFullYear(), date.getMonth(), date.getDate() + 7),
            
                    formatter: 
                    {
                        date: function (date, settings) {
                    
                        if (!date) return '';
                        var day = date.getDate();
                        var month = date.getMonth() + 1;
                        var year = date.getFullYear();
                        return day + '/' + month + '/' + year;
                        }
                    }
                    });
            

                    return day + '/' + month + '/' + year;
                }
            }
        });









        $.getJSON('../assets/CollegeList/colleges.json', function (data) {
            col=Object.values(data)[1];
            $.each(col, function (i, col) {
                var div_data = "<option value='" + col + "'>" +col + "</option>";
           
                $(div_data).appendTo('#coll'); 

        });
        });


   
    });


  function othersel(val)
  {
   var element=document.getElementById('other');
   if(val=='OTHER')
     element.style.display='block';
   else
     element.style.display='none';
  }


  
    </script>
</body>
</html>
