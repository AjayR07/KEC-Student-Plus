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
    $design=$_SESSION['design'];
    $login_session=$_SESSION['user'];
}
?>
<html>
<head>
    <title>
        Export
    </title>
    <style>
        .container
        {
            padding:3% 2%;
        }
        body
        {
            background-image: url("../backstaff.jpg");
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<body>
<?php include_once("staffnav.php");
include_once('../assets/notiflix.php');
?>
<?php

if(empty($design))
{
    echo "<script>Notiflix.Report.Failure( 'Invalid Action', 'The User has no class Association', 'Okay',function(){window.location.replace('index.php')}); </script>";
}
?>


<div class="ui raised  segment" style="width:96%;margin:2%;">
<div class="ui container" style="padding:3%;">
<div class="main ui container" > 
   
    <h1 class="ui header" style="margin-left:40%;">
        <i class="file export icon"></i>
        <div class="content">
            Export Data
            <div class="sub header">Students' Certificate Records</div>
        </div>
    </h1>
    
    
    <br>
<div class="ui raised segment">
    <div class="ui header"> Filter Data  <em style="font-size:14px;color:grey;">Optional</em></div>
    
    <div class="content">
        <div class="ui stackable tabs fluid five menu" id="dropsec">
            <select class="ui search selection fluid dropdown" id="1">
                <option value="">Sort by Event</option>
            </select>
            <select class="ui search fluid selection  dropdown" id="2">
                <option value="">Sort by College</option>
            </select>
            <select class="ui search selection fluid dropdown" id="3">
                <option value="">Sort by Prize</option>
            </select>
            <select class="ui search selection fluid dropdown" id="4">
                <option value="">Sort by State</option>
            </select>
   
        </div>
   
      

     <center>
     <div class="ui form"> 
    <div class="two fields">
        <div class="mini field">
        <label style="color:#D3D3D3">Start date</label>
        <div class="ui calendar" id="rangestart">
            <div class="ui input left icon">
            <i class="calendar icon"></i>
            <input type="text" id="start" placeholder="Start">
            </div>
        </div>
        </div>
    
        <div class="field">
        <label style="color:#D3D3D3">End date</label>
        <div class="ui calendar" id="rangeend">
            <div class="ui input left icon">
            <i class="calendar icon"></i>
            <input type="text" id="end"  placeholder="End">
            </div>
        </div>
        </div>
    </div>
    </div>
    </center>
    <br>
    <center>
    <button class="blue ui button" id="filter">Filter &nbsp;<i class="filter icon"></i></button>
    <button class="ui negative button" id="reset" type="reset">Reset &nbsp;<i class="redo icon"></i></button>
    <br>
    
    </center>
    </div>
    </div>

        <br>
        <table id="examples" class="ui  selectable striped table" style="overflow-x:auto;">
            <?php include_once '../db.php'; ?>
            <thead>
                <tr class="w3-red">
                    <th>S.No</th>
                    <th>Application No</th>
                    <th>Register No</th>
                    <th>Student Name</th>
                    <th>Event Category</th>
                    <th>Event Date</th>
                    <th>Title</th>
                    <th>College</th>
                    <th>Prize Won</th>
                    <th>State</th>
                </tr>
            </thead>
            <tbody>



            <?php
    
    if(!strcmp($_SESSION['design'],'Advisor'))
    {
        $start=$end=$event='N/A';
        $sql = "SELECT OD.appno,OD.regno,R.name,OD.odtype,OD.title,OD.college,OD.odfrom,OD.odto,PO.prize,OD.state,PO.certificate FROM postod PO LEFT JOIN oddetails OD ON PO.appno=OD.appno INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept' AND R.sec LIKE '$sec' AND R.batch LIKE '$batch' AND OD.status LIKE 'Approved'  ORDER BY FIELD(PO.prize,'First','Second','Third','Consolation','Participation'),OD.regno ASC,OD.odtype ASC";
        $query=mysqli_query($con, $sql);
        $sql1 = "SELECT OD.appno,OD.regno,R.name,OD.type,OD.title,OD.cname,OD.start,OD.end,OD.state,OD.file FROM othercert OD INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept' AND R.sec LIKE '$sec' AND R.batch LIKE '$batch' AND OD.status LIKE 'Approved'  ORDER BY OD.regno ASC,OD.type ASC";
        $query1=mysqli_query($con, $sql1);
        if (!$query || !$query1)
        {
            die ('SQL Error: ' . mysqli_error($con));
        }
        while ($row = mysqli_fetch_array($query))
        {
            $url=sprintf("https://docs.google.com/viewerng/viewer?url=https://kecstudent.xyz/repos/certificates/%s/%s/%s/%s",$batch,$dept,$sec,$row['certificate']);
            echo '<tr class="w3-hover-text-green">
            <td></td>
            <td> <a href='.$url.' target="_blank"> '.$row['appno'].'</a></td>
            <td>'.$row['regno'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['odtype'].'</td>
            <td>'.date_format(date_create($row['odfrom']), 'd/m/Y').'</td>
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
            <td>'.date_format(date_create($row['start']), 'd/m/Y').'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['cname'].'</td>
            <td>N/A</td>
            <td>'.$row['state'].'</td>
            </tr>';
        }
    }
    if(!strcmp($_SESSION['design'],'Year in Charge'))
    {
        $sql = "SELECT OD.appno,OD.regno,R.name,OD.odtype,OD.title,OD.college,OD.odfrom,OD.odto,PO.prize,OD.state,PO.certificate FROM postod PO LEFT JOIN oddetails OD ON PO.appno=OD.appno INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept' AND R.batch LIKE '$batch' AND OD.status LIKE 'Approved'  ORDER BY FIELD(PO.prize,'First','Second','Third','Consolation','Participation'),OD.regno ASC,OD.odtype ASC";
        $query=mysqli_query($con, $sql);
        $sql1 = "SELECT OD.appno,OD.regno,R.name,OD.type,OD.title,OD.cname,OD.start,OD.end,OD.state,OD.file FROM othercert OD INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept' AND R.batch LIKE '$batch' AND OD.status LIKE 'Approved'  ORDER BY OD.regno ASC,OD.type ASC";
        $query1=mysqli_query($con, $sql1);
        if (!$query || !$query1)
        {
            die ('SQL Error: ' . mysqli_error($con));
        }

        while ($row = mysqli_fetch_array($query))
        {
            $url=sprintf("https://docs.google.com/viewerng/viewer?url=https://kecstudent.xyz/repos/certificates/%s/%s/%s/%s",$batch,$dept,$sec,$row['certificate']);
            echo '<tr class="w3-hover-text-green">
            <td></td>
            <td> <a href='.$url.'> '.$row['appno'].'</a></td>
            <td>'.$row['regno'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['odtype'].'</td>
            <td>'.date_format(date_create($row['odfrom']), 'm/d/Y').'</td>
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
            <td>'.date_format(date_create($row['start']), 'm/d/Y').'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['cname'].'</td>
            <td>N/A</td>
            <td>'.$row['state'].'</td>
            </tr>';
        }
    }
    if(!strcmp($_SESSION['design'],'HOD'))
    {
        $sql = "SELECT OD.appno,OD.regno,R.name,OD.odtype,OD.title,OD.college,OD.odfrom,OD.odto,PO.prize,OD.state,PO.certificate FROM postod PO LEFT JOIN oddetails OD ON PO.appno=OD.appno INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept'  AND OD.status LIKE 'Approved'  ORDER BY FIELD(PO.prize,'First','Second','Third','Consolation','Participation'),OD.regno ASC,OD.odtype ASC";
        $query=mysqli_query($con, $sql);
        $sql1 = "SELECT OD.appno,OD.regno,R.name,OD.type,OD.title,OD.cname,OD.start,OD.end,OD.state,OD.file FROM othercert OD INNER JOIN registration R on OD.regno=R.regno WHERE R.dept LIKE '$dept'  AND OD.status LIKE 'Approved'  ORDER BY OD.regno ASC,OD.type ASC";
        $query1=mysqli_query($con, $sql1);
        if (!$query || !$query1)
        {
            die ('SQL Error: ' . mysqli_error($con));
        }

        while ($row = mysqli_fetch_array($query))
        {
            $url=sprintf("https://docs.google.com/viewerng/viewer?url=https://kecstudent.xyz/repos/certificates/%s/%s/%s/%s",$batch,$dept,$sec,$row['certificate']);
            echo '<tr class="w3-hover-text-green">
            <td></td>
            <td> <a href='.$url.'> '.$row['appno'].'</a></td>
            <td>'.$row['regno'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['odtype'].'</td>
            <td>'.date_format(date_create($row['odfrom']), 'm/d/Y').'</td>
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
            <td>'.date_format(date_create($row['start']), 'm/d/Y').'</td>
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

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.semanticui.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/Fomantic/dist/semantic.min.css">

       

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
        <script src="../assets/Fomantic/dist/semantic.min.js"></script>
        <script src="js/Export.js"></script>
</body>
</html>
