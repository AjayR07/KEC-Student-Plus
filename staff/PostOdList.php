<?php
    session_start();
    if(!isset($_SESSION['user']))
    {
      header("Location: ../staffLog.php");
    }
    include_once('../db.php');
    include_once('staffnav.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>On-Duty Proof</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
</head>


<link rel="icon" type="image/png" href="../KEC.png">
</head>
<body>
    <?php require_once('staffnav.php');?><br><br>
<h1 align="center" style="color:bisque;">Students Submitted Proof</h1> <br>
<center>
<table>
<table class="ui inverted basic collapsing very padded table" style="color:white">
<thead>
<tr>
<th>S.No.</th>
<th>Register No.</th>
<th>Name</th>
<th>Application No.</th>
<th>Applied Date</th>
<th>Date</th>
<th>Cat.</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
     $batch=$_SESSION['batch'];
     $dep=$_SESSION['dept'];
     $sec=$_SESSION['sec'];
     $i=1;
     $sql="SELECT r.regno,r.name,d.appno,d.odfrom,d.appdate from registration r, oddetails d, postod p where (r.regno like d.regno) and (d.appno like p.appno)
     and (r.batch like '$batch') and (r.dept like '$dep') and (r.sec like '$sec') and (p.status like 'Pending');";

     $sql2="SELECT r.regno,r.name,d.appno,d.start,d.appdate from registration r, othercert d where (r.regno like d.regno)
     and (r.batch like '$batch') and (r.dept like '$dep') and (r.sec like '$sec') and (d.status like 'Pending');";
    // echo $sql2;
     $data=$con->query($sql);
     $data2=$con->query($sql2);
     if($data->num_rows==0 && $data2->num_rows==0)
     {
         //echo '<script>alert("getting in");</script>';
         echo '<tr><td colspan="5">No Data Present</td></tr>';
     }
     else{
     while ($row = mysqli_fetch_array($data))
     {
        echo "<tr>";
        echo '<td>'.$i++.'</td>';
       echo '<td>'.$row["regno"].'</td>';
       echo "<td>".$row["name"]."</td>";
       echo '<td>'.$row["appno"].'</td>';
       echo '<td>'.date_format(date_create($row['appdate']),'d/m/Y').'';
       echo "<td>".date_format(date_create($row['odfrom']),'d/m/Y')."</td>";
       echo "<td>On-Duty</td>";
       echo '<td><a class="ui olive button" href="PostOdAprv.php?id='.$row["appno"].'">View</a></td>';
       echo "</tr>";

     }
     $od=$i;
     while ($row = mysqli_fetch_array($data2))
     {
        echo "<tr>";
        echo '<td>'.$i++.'</td>';
       echo '<td>'.$row["regno"].'</td>';
       echo "<td>".$row["name"]."</td>";
       echo '<td>'.$row["appno"].'</a></td>';
       echo '<td>'.date_format(date_create($row['appdate']),'d/m/Y').'';
       echo "<td>".date_format(date_create($row['start']),'d/m/Y')."</td>";
       echo "<td>Cert. Reg.</td>";
       echo '<td><a class="ui olive button" href="PostOdAprv.php?id='.$row["appno"].'">View</a></td>';
       echo "</tr>";
     }
    }
    $crr=$i-$od;
     $con->close();
?>
</tbody>
<tfoot>
    <tr><th><?php echo --$od; ?> On-Duty</th>
    <th><?php echo $crr; ?> Certificate Registrations</th>
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
