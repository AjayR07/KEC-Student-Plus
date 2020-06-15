<?php
    session_start();
    include_once('../db.php');
?>
<?php
    if(!isset($_SESSION['user']))
    {
      header("Location: ../staffLog.php");
    }
    include_once('staffnav.php');
    include_once('../assets/notiflix.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>On-Duty Approval</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
</head>

<link rel="icon" type="image/png" href="../KEC.png">
</head>
<body background="../backstaff.jpg">
    <?php include_once('staffnav.php');?><br><br>
<h1 align="center" style="color:bisque;">Students Applied for On-Duty</h1> <br>
<center>
<table class="ui inverted basic collapsing very padded table" style="color:white">
<thead >
<tr>
<th>S.No.</th>
<th>Register No.</th>
<th>Name</th>
<th>Section</th>
<th>Application No.</th>
<th>Applied Date</th>
<th>OD Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
if($_SESSION['design']=='Advisor')
{
    $batch=$_SESSION['batch'];
    $dep=$_SESSION['dept'];
    $sec=$_SESSION['sec'];
    $i=1;
    $sql="SELECT r.regno,r.name,r.sec,d.appno,d.odfrom,d.appdate from registration r, oddetails d, preod p where (r.regno like d.regno) and (d.appno like p.appno)
    and (r.batch like '$batch') and (r.dept like '$dep') and (r.sec like '$sec') and (p.status1 is not null) and (p.status2 is not null)
    and (p.status3 is not null) and (p.advisor like 'Pending');";
}
else if($_SESSION['design']=='Year in Charge')
{
    $batch=$_SESSION['batch'];
    $dep=$_SESSION['dept'];
    $i=1;
    $sql="SELECT r.regno,r.name,r.sec,d.appno,d.odfrom,d.appdate from registration r, oddetails d, preod p where (r.regno like d.regno) and (d.appno like p.appno)
    and (r.batch like '$batch') and (r.dept like '$dep') and (p.status1 is not null) and (p.status2 is not null)
    and (p.status3 is not null) and (p.advisor like 'Approved') and (p.yearin like 'Pending');";
}
else
{
    echo "<body><script> Notiflix.Report.Failure( 'Invalid Action', 'User has no class Association', 'Okay', function(){window.location.href='index.php'} ); </script></body>";
    exit();
}
     
     $data=$con->query($sql);

     if($data->num_rows==0)
     {
         //echo '<script>alert("getting in");</script>';
         echo '<tr><td colspan="8"><b>No Data Present</b></td></tr>';
     }
     else{
     while ($row = mysqli_fetch_array($data))
     {
       echo "<tr>";
       echo '<td>'.$i++.'</td>';
       echo '<td>'.$row["regno"].'</td>';
       echo "<td>".$row["name"]."</td>";
       echo "<td>".$row['sec']."</td>";
       echo '<td>'.$row["appno"].'';
       echo '<td>'.date_format(date_create($row['appdate']),'d/m/Y').'';
       echo "<td>".date_format(date_create($row['odfrom']),'d/m/Y')."</td>";
       echo '<td><a class="ui olive button" href="PreOdAprvAdv.php?id='.$row["appno"].'">View</a></td>';
       echo "</tr>";
     }
    }
     $con->close();
?>
</tbody>
<tfoot>
    <tr><th><?php echo --$i; ?> People</th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
  </tr></tfoot>
</table>
</center>

<style>
body{
    background-image: url("../backstaff.jpg");
    font-family: 'Open Sans', sans-serif;
}
table {
    text-align:center;
    color:white;
}

th, td,tr {
color:white;
  text-align: center;
}
thead,tbody{
    color:white;
}


</style>
</body>
</html>
