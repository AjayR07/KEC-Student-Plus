<?php
session_start();
if(!isset($_SESSION['user']))
{
  header("Location: ../staffLog.php");
}
else
{
include_once("staffnav.php");
$batch=$_SESSION['batch'];
$dept=$_SESSION['dept'];
$sec=$_SESSION['sec'];
	$login_session=$_SESSION['user'];
}
?>
<html>
<head>
    <title>
        Export
    </title>




    <script>
        $(document).ready(function()
        {
            $('#example').DataTable();

        $('#filter').on("click",function(){
            $('.ui.basic.modal').modal('show');});
            $('.ui.dropdown').dropdown();
        });
    </script>

    <script>
    $(document).ready(function(){
          $('#rangestart').calendar({
  type: 'date',
  formatter: {
    date: function (date, settings) {
      if (!date) return '';
      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear();
      if (day.toString().length == 1) {
            day = "0" + day;
        }
        if (month.toString().length == 1) {
            month = "0" + month;
        }
      return day + '/' + month + '/' + year;
    }
  },
  endCalendar: $('#rangeend')
});
$('#rangeend').calendar({
  type: 'date',
  formatter: {
    date: function (date, settings) {
      if (!date) return '';
      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear();
      if (day.toString().length == 1) {
            day = "0" + day;
        }
        if (month.toString().length == 1) {
            month = "0" + month;
        }
      return day + '/' + month + '/' + year;
    }
  },
  startCalendar: $('#rangestart')
});
});
    </script>

    <script src="https://kit.fontawesome.com/bdc16c89a5.js" crossorigin="anonymous"></script>
    <style>
        .container
        {

            padding:20px;

        }
        body{
            background-image: url("../backstaff.jpg");
            font-family: 'Open Sans', sans-serif;
            }
    </style>
    <script>
      $(window).on("load", function() {
     
        $('#filter').popup();

      });
    </script>
</head>
<body>
<?php include_once("staffnav.php"); ?>
<?php
  if(isset($_POST['sub']))
  {
    $e=$_POST['events']." Event";
  }
  else if (isset($_POST['TN']))
  {
    $e='Tamilnadu';
  }
  else if (isset($_POST['non']))
  {
    $e='Other States';
  }
  else
  {
    $e='All Events';
  }
?>
<div class="ui placeholder segment" style="width:98%;margin:1%;">
<div class="ui container">
<div class="main">
<div class="w3-container">
<button class="ui circular left floated icon button" id="filter" data-content="Click to Filter List" data-variation="inverted" >  <h1><i class="top right corner icon filter"></i></h1></button>
    <center>
        <h1 class="ui icon header">
        <i class="fas fa-file-export"></i>
        <div class="content">
            <h1>Export Data
            <div class="sub white header">
                <h3>List of Students Participated in
                <span class="text-success">
                    <?php echo $e; ?></h1></h3>
                </span>
            </div>
        </div></h1>
    </center>
<br>
<div class="ui container">
    <div class="ui tablet stackable mini steps">
  <div class="step">
    <i class="sort icon"></i>
    <div class="content">
      <div class="title">Sort</div>
      <div class="description">Choose your Sorting options</div>
    </div>
  </div>
  <div class="step">
  <i class="filter icon"></i>
    <div class="content">
      <div class="title">Filter</div>
      <div class="description">Filter the Data using Date Range and Events</div>
    </div>
  </div>
  <div class="step">
    <i class="cloud download icon"></i>
    <div class="content">
      <div class="title">Export</div>
      <div class="description">Download the Table contents in Any Format</div>
    </div>
  </div>
  <div class="step" >
    <i class="download icon"></i>
    <div class="content">
      <div class="title">Download Certificates</div>
      <div class="description" >Download the Proof Certificate <br>uploaded by the student</div>
    </div>
  </div>
</div>
</div>

        <br><br>
        <table id="examples" class="ui  selectable striped table" style="overflow:auto;">
            <?php include_once '../db.php'; ?>
            <thead>
                <tr class="w3-red ">
                    <th>S.No</th>
                    <th>Application No</th>
                    <th>Register No</th>
                    <th>Student Name</th>
                    <th>Event Category</th>
                    <th>Title</th>
                    <th>College</th>
                    <th>Prize Won</th>
                    <th>State</th>
                </tr>
            </thead>


<?php
    
    if(!strcmp($_SESSION['design'],'Advisor'))
    {
        $start=$end=$event='N/A';


        if (isset($_POST['sub'])&& isset($_POST['start'])&& isset($_POST['end']))
        {
            $start=$_POST['start'];
            $end=$_POST['end'];

            $start=date("Y-m-d", strtotime(str_replace('/', '-', $start)));
            $end=date("Y-m-d", strtotime(str_replace('/', '-', $end)));
            if(isset($_POST['events']))
            {
                $event=$_POST['events'];

                $sql = "SELECT OD.appno,OD.regno,R.name,OD.odtype,OD.title,OD.college,OD.odfrom,OD.odto,PO.prize,OD.state,PO.certificate FROM postod PO LEFT JOIN oddetails OD ON PO.appno=OD.appno INNER JOIN registration R on OD.regno=R.regno WHERE OD.odtype LIKE '$event' AND R.dept LIKE '$dept' AND R.sec LIKE '$sec' AND R.batch LIKE '$batch' AND OD.status LIKE 'Approved' AND OD.odfrom Between '$start' and '$end' ORDER BY FIELD(PO.prize,'First','Second','Third','Consolation','Participation'),OD.regno ASC,OD.odtype ASC";
                $query=mysqli_query($con, $sql);
                $sql1 = "SELECT OD.appno,OD.regno,R.name,OD.type,OD.title,OD.cname,OD.start,OD.end,OD.state,OD.file FROM othercert OD INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept' AND R.sec LIKE '$sec' AND R.batch LIKE '$batch' AND OD.type LIKE '$event' AND OD.status LIKE 'Approved' AND OD.start Between '$start' and '$end' ORDER BY OD.regno ASC,OD.type ASC";
                $query1=mysqli_query($con, $sql1);
                if (!$query || !$query1)
                {
                    die ('SQL Error: ' . mysqli_error($con));
                }
            }


            else if (isset($_POST['TN']))
            {
                $sql = "SELECT OD.appno,OD.regno,R.name,OD.odtype,OD.title,OD.college,OD.odfrom,OD.odto,PO.prize,OD.state,PO.certificate FROM postod PO LEFT JOIN oddetails OD ON PO.appno=OD.appno INNER JOIN registration R on OD.regno=R.regno WHERE OD.state LIKE 'TAMILNADU' AND R.dept LIKE '$dept' AND R.sec LIKE '$sec' AND R.batch LIKE '$batch' AND OD.status LIKE 'Approved' AND OD.odfrom Between '$start' and '$end' ORDER BY FIELD(PO.prize,'First','Second','Third','Consolation','Participation'),OD.regno ASC,OD.odtype ASC";
                $query=mysqli_query($con, $sql);
                $sql1 = "SELECT OD.appno,OD.regno,R.name,OD.type,OD.title,OD.cname,OD.start,OD.end,OD.state,OD.file FROM othercert OD INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept' AND R.sec LIKE '$sec' AND R.batch LIKE '$batch' AND OD.state LIKE 'TAMILNADU' AND OD.status LIKE 'Approved' AND OD.start Between '$start' and '$end' ORDER BY OD.regno ASC,OD.type ASC";
                $query1=mysqli_query($con, $sql1);
                if (!$query || !$query1)
                {
                    die ('SQL Error: ' . mysqli_error($con));
                }
            }
            else if (isset($_POST['non']))
            {
                $sql = "SELECT OD.appno,OD.regno,R.name,OD.odtype,OD.title,OD.college,OD.odfrom,OD.odto,PO.prize,OD.state,PO.certificate FROM postod PO LEFT JOIN oddetails OD ON PO.appno=OD.appno INNER JOIN registration R on OD.regno=R.regno WHERE OD.state LIKE 'OTHERSTATE' AND R.dept LIKE '$dept' AND R.sec LIKE '$sec' AND R.batch LIKE '$batch' AND OD.status LIKE 'Approved' AND OD.odfrom Between '$start' and '$end' ORDER BY FIELD(PO.prize,'First','Second','Third','Consolation','Participation'),OD.regno ASC,OD.odtype ASC";
                $query=mysqli_query($con, $sql);
                $sql1 = "SELECT OD.appno,OD.regno,R.name,OD.type,OD.title,OD.cname,OD.start,OD.end,OD.state,OD.file FROM othercert OD INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept' AND R.sec LIKE '$sec' AND R.batch LIKE '$batch' AND OD.state LIKE 'OTHERSTATE' AND OD.status LIKE 'Approved' AND OD.start Between '$start' and '$end' ORDER BY OD.regno ASC,OD.type ASC";
                $query1=mysqli_query($con, $sql1);
                if (!$query || !$query1)
                {
                    die ('SQL Error: ' . mysqli_error($con));
                }
            }
        }
        else
        {
            $sql = "SELECT OD.appno,OD.regno,R.name,OD.odtype,OD.title,OD.college,OD.odfrom,OD.odto,PO.prize,OD.state,PO.certificate FROM postod PO LEFT JOIN oddetails OD ON PO.appno=OD.appno INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept' AND R.sec LIKE '$sec' AND R.batch LIKE '$batch' AND OD.status LIKE 'Approved'  ORDER BY FIELD(PO.prize,'First','Second','Third','Consolation','Participation'),OD.regno ASC,OD.odtype ASC";
            $query=mysqli_query($con, $sql);
            $sql1 = "SELECT OD.appno,OD.regno,R.name,OD.type,OD.title,OD.cname,OD.start,OD.end,OD.state,OD.file FROM othercert OD INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept' AND R.sec LIKE '$sec' AND R.batch LIKE '$batch' AND OD.status LIKE 'Approved'  ORDER BY OD.regno ASC,OD.type ASC";
            $query1=mysqli_query($con, $sql1);
            if (!$query || !$query1)
            {
                die ('SQL Error: ' . mysqli_error($con));
            }
        }

        while ($row = mysqli_fetch_array($query))
        {
            $url=sprintf("../repos/certificates/%s/%s/%s/%s",$batch,$dept,$sec,$row['certificate']);
            echo '<tr class="w3-hover-text-green">
            <td></td>
            <td> <a href='.$url.'> '.$row['appno'].'</a></td>
            <td>'.$row['regno'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['odtype'].'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['college'].'</td>
            <td>'.$row['prize'].'</td>
            <td>'.$row['state'].'</td>
            </tr>';
        }
        while ($row = mysqli_fetch_array($query1))
        {
            $url=sprintf("https://docs.google.com/viewerng/viewer?url=https://kecstudent.xyz/repos/certificates/%s/%s/%s/%s",$batch,$dept,$sec,$row['file']);
            echo '<tr class="w3-hover-text-green">
            <td></td>
            <td> <a href='.$url.'> '.$row['appno'].'</a></td>
            <td>'.$row['regno'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['type'].'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['cname'].'</td>
            <td>N/A</td>
            <td>'.$row['state'].'</td>
            </tr>';
        }
    }
    if(!strcmp($_SESSION['design'],'Year in Charge'))
    {
        $start=$end=$event='N/A';


        if (isset($_POST['sub'])&& isset($_POST['start'])&& isset($_POST['end']))
        {
            $start=$_POST['start'];
            $end=$_POST['end'];

            $start=date("Y-m-d", strtotime(str_replace('/', '-', $start)));
            $end=date("Y-m-d", strtotime(str_replace('/', '-', $end)));
            if(isset($_POST['events']))
            {
                $event=$_POST['events'];

                $sql = "SELECT OD.appno,OD.regno,R.name,OD.odtype,OD.title,OD.college,OD.odfrom,OD.odto,PO.prize,OD.state,PO.certificate FROM postod PO LEFT JOIN oddetails OD ON PO.appno=OD.appno INNER JOIN registration R on OD.regno=R.regno WHERE OD.odtype LIKE '$event' AND R.dept LIKE '$dept'  AND R.batch LIKE '$batch' AND OD.status LIKE 'Approved' AND OD.odfrom Between '$start' and '$end' ORDER BY FIELD(PO.prize,'First','Second','Third','Consolation','Participation'),OD.regno ASC,OD.odtype ASC";
                $query=mysqli_query($con, $sql);
                $sql1 = "SELECT OD.appno,OD.regno,R.name,OD.type,OD.title,OD.cname,OD.start,OD.end,OD.state,OD.file FROM othercert OD INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept' AND R.batch LIKE '$batch' AND OD.type LIKE '$event' AND OD.status LIKE 'Approved' AND OD.start Between '$start' and '$end' ORDER BY OD.regno ASC,OD.type ASC";
                $query1=mysqli_query($con, $sql1);
                if (!$query || !$query1)
                {
                    die ('SQL Error: ' . mysqli_error($con));
                }
            }


            else if (isset($_POST['TN']))
            {
                $sql = "SELECT OD.appno,OD.regno,R.name,OD.odtype,OD.title,OD.college,OD.odfrom,OD.odto,PO.prize,OD.state,PO.certificate FROM postod PO LEFT JOIN oddetails OD ON PO.appno=OD.appno INNER JOIN registration R on OD.regno=R.regno WHERE OD.state LIKE 'TAMILNADU' AND R.dept LIKE '$dept' AND R.batch LIKE '$batch' AND OD.status LIKE 'Approved' AND OD.odfrom Between '$start' and '$end' ORDER BY FIELD(PO.prize,'First','Second','Third','Consolation','Participation'),OD.regno ASC,OD.odtype ASC";
                $query=mysqli_query($con, $sql);
                $sql1 = "SELECT OD.appno,OD.regno,R.name,OD.type,OD.title,OD.cname,OD.start,OD.end,OD.state,OD.file FROM othercert OD INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept' AND R.batch LIKE '$batch' AND OD.state LIKE 'TAMILNADU' AND OD.status LIKE 'Approved' AND OD.start Between '$start' and '$end' ORDER BY OD.regno ASC,OD.type ASC";
                $query1=mysqli_query($con, $sql1);
                if (!$query || !$query1)
                {
                    die ('SQL Error: ' . mysqli_error($con));
                }
            }
            else if (isset($_POST['non']))
            {
                $sql = "SELECT OD.appno,OD.regno,R.name,OD.odtype,OD.title,OD.college,OD.odfrom,OD.odto,PO.prize,OD.state,PO.certificate FROM postod PO LEFT JOIN oddetails OD ON PO.appno=OD.appno INNER JOIN registration R on OD.regno=R.regno WHERE OD.state LIKE 'OTHERSTATE' AND R.dept LIKE '$dept'  AND R.batch LIKE '$batch' AND OD.status LIKE 'Approved' AND OD.odfrom Between '$start' and '$end' ORDER BY FIELD(PO.prize,'First','Second','Third','Consolation','Participation'),OD.regno ASC,OD.odtype ASC";
                $query=mysqli_query($con, $sql);
                $sql1 = "SELECT OD.appno,OD.regno,R.name,OD.type,OD.title,OD.cname,OD.start,OD.end,OD.state,OD.file FROM othercert OD INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept' AND R.batch LIKE '$batch' AND OD.state LIKE 'OTHERSTATE' AND OD.status LIKE 'Approved' AND OD.start Between '$start' and '$end' ORDER BY OD.regno ASC,OD.type ASC";
                $query1=mysqli_query($con, $sql1);
                if (!$query || !$query1)
                {
                    die ('SQL Error: ' . mysqli_error($con));
                }
            }
        }
        else
        {
            $sql = "SELECT OD.appno,OD.regno,R.name,OD.odtype,OD.title,OD.college,OD.odfrom,OD.odto,PO.prize,OD.state,PO.certificate FROM postod PO LEFT JOIN oddetails OD ON PO.appno=OD.appno INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept' AND R.batch LIKE '$batch' AND OD.status LIKE 'Approved'  ORDER BY FIELD(PO.prize,'First','Second','Third','Consolation','Participation'),OD.regno ASC,OD.odtype ASC";
            $query=mysqli_query($con, $sql);
            $sql1 = "SELECT OD.appno,OD.regno,R.name,OD.type,OD.title,OD.cname,OD.start,OD.end,OD.state,OD.file FROM othercert OD INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept' AND R.batch LIKE '$batch' AND OD.status LIKE 'Approved'  ORDER BY OD.regno ASC,OD.type ASC";
            $query1=mysqli_query($con, $sql1);
            if (!$query || !$query1)
            {
                die ('SQL Error: ' . mysqli_error($con));
            }
        }

        while ($row = mysqli_fetch_array($query))
        {
            $url=sprintf("../repos/certificates/%s/%s/%s/%s",$batch,$dept,$sec,$row['certificate']);
            echo '<tr class="w3-hover-text-green">
            <td></td>
            <td> <a href='.$url.'> '.$row['appno'].'</a></td>
            <td>'.$row['regno'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['odtype'].'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['college'].'</td>
            <td>'.$row['prize'].'</td>
            <td>'.$row['state'].'</td>
            </tr>';
        }
        while ($row = mysqli_fetch_array($query1))
        {
            $url=sprintf("https://docs.google.com/viewerng/viewer?url=https://kecstudent.xyz/repos/certificates/%s/%s/%s/%s",$batch,$dept,$sec,$row['file']);
            echo '<tr class="w3-hover-text-green">
            <td></td>
            <td> <a href='.$url.'> '.$row['appno'].'</a></td>
            <td>'.$row['regno'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['type'].'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['cname'].'</td>
            <td>N/A</td>
            <td>'.$row['state'].'</td>
            </tr>';
        }
    }
    if(!strcmp($_SESSION['design'],'HOD'))
    {
        $start=$end=$event='N/A';


        if (isset($_POST['sub'])&& isset($_POST['start'])&& isset($_POST['end']))
        {
            $start=$_POST['start'];
            $end=$_POST['end'];

            $start=date("Y-m-d", strtotime(str_replace('/', '-', $start)));
            $end=date("Y-m-d", strtotime(str_replace('/', '-', $end)));
            if(isset($_POST['events']))
            {
                $event=$_POST['events'];

                $sql = "SELECT OD.appno,OD.regno,R.name,OD.odtype,OD.title,OD.college,OD.odfrom,OD.odto,PO.prize,OD.state,PO.certificate FROM postod PO LEFT JOIN oddetails OD ON PO.appno=OD.appno INNER JOIN registration R on OD.regno=R.regno WHERE OD.odtype LIKE '$event' AND R.dept LIKE '$dept' AND OD.status LIKE 'Approved' AND OD.odfrom Between '$start' and '$end' ORDER BY FIELD(PO.prize,'First','Second','Third','Consolation','Participation'),OD.regno ASC,OD.odtype ASC";
                $query=mysqli_query($con, $sql);
                $sql1 = "SELECT OD.appno,OD.regno,R.name,OD.type,OD.title,OD.cname,OD.start,OD.end,OD.state,OD.file FROM othercert OD INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept' AND OD.type LIKE '$event' AND OD.status LIKE 'Approved' AND OD.start Between '$start' and '$end' ORDER BY OD.regno ASC,OD.type ASC";
                $query1=mysqli_query($con, $sql1);
                if (!$query || !$query1)
                {
                    die ('SQL Error: ' . mysqli_error($con));
                }
            }


            else if (isset($_POST['TN']))
            {
                $sql = "SELECT OD.appno,OD.regno,R.name,OD.odtype,OD.title,OD.college,OD.odfrom,OD.odto,PO.prize,OD.state,PO.certificate FROM postod PO LEFT JOIN oddetails OD ON PO.appno=OD.appno INNER JOIN registration R on OD.regno=R.regno WHERE OD.state LIKE 'TAMILNADU' AND R.dept LIKE '$dept' AND OD.status LIKE 'Approved' AND OD.odfrom Between '$start' and '$end' ORDER BY FIELD(PO.prize,'First','Second','Third','Consolation','Participation'),OD.regno ASC,OD.odtype ASC";
                $query=mysqli_query($con, $sql);
                $sql1 = "SELECT OD.appno,OD.regno,R.name,OD.type,OD.title,OD.cname,OD.start,OD.end,OD.state,OD.file FROM othercert OD INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept'  AND OD.state LIKE 'TAMILNADU' AND OD.status LIKE 'Approved' AND OD.start Between '$start' and '$end' ORDER BY OD.regno ASC,OD.type ASC";
                $query1=mysqli_query($con, $sql1);
                if (!$query || !$query1)
                {
                    die ('SQL Error: ' . mysqli_error($con));
                }
            }
            else if (isset($_POST['non']))
            {
                $sql = "SELECT OD.appno,OD.regno,R.name,OD.odtype,OD.title,OD.college,OD.odfrom,OD.odto,PO.prize,OD.state,PO.certificate FROM postod PO LEFT JOIN oddetails OD ON PO.appno=OD.appno INNER JOIN registration R on OD.regno=R.regno WHERE OD.state LIKE 'OTHERSTATE' AND R.dept LIKE '$dept'  AND OD.status LIKE 'Approved' AND OD.odfrom Between '$start' and '$end' ORDER BY FIELD(PO.prize,'First','Second','Third','Consolation','Participation'),OD.regno ASC,OD.odtype ASC";
                $query=mysqli_query($con, $sql);
                $sql1 = "SELECT OD.appno,OD.regno,R.name,OD.type,OD.title,OD.cname,OD.start,OD.end,OD.state,OD.file FROM othercert OD INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept'  AND OD.state LIKE 'OTHERSTATE' AND OD.status LIKE 'Approved' AND OD.start Between '$start' and '$end' ORDER BY OD.regno ASC,OD.type ASC";
                $query1=mysqli_query($con, $sql1);
                if (!$query || !$query1)
                {
                    die ('SQL Error: ' . mysqli_error($con));
                }
            }
        }
        else
        {
            $sql = "SELECT OD.appno,OD.regno,R.name,OD.odtype,OD.title,OD.college,OD.odfrom,OD.odto,PO.prize,OD.state,PO.certificate FROM postod PO LEFT JOIN oddetails OD ON PO.appno=OD.appno INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept'  AND OD.status LIKE 'Approved'  ORDER BY FIELD(PO.prize,'First','Second','Third','Consolation','Participation'),OD.regno ASC,OD.odtype ASC";
            $query=mysqli_query($con, $sql);
            $sql1 = "SELECT OD.appno,OD.regno,R.name,OD.type,OD.title,OD.cname,OD.start,OD.end,OD.state,OD.file FROM othercert OD INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept'  AND OD.status LIKE 'Approved'  ORDER BY OD.regno ASC,OD.type ASC";
            $query1=mysqli_query($con, $sql1);
            if (!$query || !$query1)
            {
                die ('SQL Error: ' . mysqli_error($con));
            }
        }

        while ($row = mysqli_fetch_array($query))
        {
            $url=sprintf("../repos/certificates/%s/%s/%s/%s",$batch,$dept,$sec,$row['certificate']);
            echo '<tr class="w3-hover-text-green">
            <td></td>
            <td> <a href='.$url.'> '.$row['appno'].'</a></td>
            <td>'.$row['regno'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['odtype'].'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['college'].'</td>
            <td>'.$row['prize'].'</td>
            <td>'.$row['state'].'</td>
            </tr>';
        }
        while ($row = mysqli_fetch_array($query1))
        {
            $url=sprintf("https://docs.google.com/viewerng/viewer?url=https://kecstudent.xyz/repos/certificates/%s/%s/%s/%s",$batch,$dept,$sec,$row['file']);
            echo '<tr class="w3-hover-text-green">
            <td></td>
            <td> <a href='.$url.'> '.$row['appno'].'</a></td>
            <td>'.$row['regno'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['type'].'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['cname'].'</td>
            <td>N/A</td>
            <td>'.$row['state'].'</td>
            </tr>';
        }
    }
?>
</table>
</div>
</div>
</div>
</div>
<div class="ui basic modal">
    <div class="ui icon header">
        <i class="icon filter"></i>
            Filters
    </div>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <div class="content">
            <br><br>
            <div class="segment">
                <div class="ui form">
                    <div class="two fields">
                        <div class="field">

                            <select class="ui search dropdown" id="events" name="events">
                                <option selected>All Events</option>
                                <option value="PAPER">Paper Presentation</option>
                                <option value="PROJECT">Project Presentation</option>
                                <option value="IDEA">Idea Presentation</option>
                                <option value="WORKSHOP">Workshop</option>
                                <option value="SPORT">Sports</option>
                                <option value="CODING">Coding</option>
                                <option value="HACKATHON">Hackathon</option>
                                <option value="INTERNSHIP">Internship</option>
                                <option value="IV">Industrial Visit</option>
                                <option value="IPT">In-Plant Training</option>
                                <option value="COURSE">Online Certification</option>
                                <option value="OTHER">Others</option>
                            </select>

                        </div>
                        <div class="field"><center>

                            <div class="ui buttons">

                                <button class="ui inverted pink button" type="submit" name="TN" id="TN" style="cursor:pointer;">Tamilnadu</button>
                                    <div class="or"></div>
                                    <button class="ui inverted purple  button" type="submit" name="non" id="non" style="cursor:pointer;">Other States</button>
                           </div></center>
                        </div>
                    </div>
                </div>
                <br><br>

                <div class="ui form">
                    <div class="two fields">
                        <div class="field">
                            <label>Start Date</label>
                            <div class="ui calendar" id="rangestart">
                                <div class="ui input left icon">
                                    <i class="calendar icon"></i>
                                    <input type="text" name="start" placeholder="Start" required>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label>End Date</label>
                            <div class="ui calendar" id="rangeend">
                                <div class="ui input left icon">
                                    <i class="calendar icon"></i>
                                    <input type="text" name="end" placeholder="End" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>

        <br><br>
        <div class="actions"><center>
            <div class="ui red basic cancel inverted button">
                <i class="remove icon"></i>
                    Close
            </div>
            <button class="ui inverted green button" type="submit" id="sub" name="sub">
                <i class="checkmark icon"></i>   Submit
            </button>
               </center>
        </div>

    </form>
    </div>
</div>

<script>
    $(document).ready(function() {
    var table = $('#examples').DataTable( {
        lengthChange: false,
//        dom: 'Bfrtip',
        buttons: [
         'copy',
        {
                extend: 'excelHtml5',
                title: 'KEC Student+ Export',
                messageTop: 'Table based on Date Range <?php echo $start; ?> to <?php echo $end; ?> and Event = <?php echo $event; ?>',
                messageBottom: '&copy; Team A3. This page has been created from KEC Student+'

        },
        {
                extend: 'pdfHtml5',
                download: 'open',
                title: 'KEC Student+ Export',
                messageTop: 'Table based on Date Range <?php echo $start; ?> to <?php echo $end; ?> and Event = <?php echo $event; ?>',
                messageBottom: '&copy; Team A3. This page has been created from KEC Student+'
        },
        {
                extend: 'print',
                messageTop: 'Table based on Date Range <?php echo $start; ?> to <?php echo $end; ?> and Event = <?php echo $event; ?>',
                messageBottom: '&copy; Team A3. This page has been created from KEC Student+'
        },
        'colvis']
    } );

    table.buttons().container()
        .appendTo( $('div.eight.column:eq(0)', table.table().container()) );
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i)
          {
              cell.innerHTML = i+1;
              table.cell(cell).invalidate('dom');
          });
} );
    </script>


        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.semanticui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>


        <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.semanticui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.semanticui.min.css">
        <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>



</body>
</html>
