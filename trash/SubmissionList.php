<?php
    session_start();
    if(!isset($_SESSION['user']))
    {
      header("Location: ../staffLog.php");
    }
    include_once('../db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Submitted Certificates</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="reg.css">
<link rel="stylesheet" href="main.scss">
<script src="js/main.js"></script>
<script src="js/app.js"></script>
<style>
table {
    border-collapse: separate;
    width:70%;
    margin-left:15%;
    margin-right:15%;
    text-align:center;
    color:white;
}
body
        {
            font-family: 'Open Sans', sans-serif;
        }
th, td {
  padding: 8px;
  text-align: center;

}
p{
    background-color: white;
}

</style>
<link rel="icon" type="image/png" href="../KEC.png">
</head>
<body background="../backstaff.jpg">
    <?php require_once('staffnav.php');?><br><br>
<h1 align="center" style="color:bisque;">Students Applied for On-Duty</h1> <br>
<table>
<tr>
<th>S.No.</th>
<th>Register No.</th>
<th>Name</th>
<th>Application No.</th>
<th>OD Date</th>
</tr>
<?php
     $batch=$_SESSION['batch'];
     $dep=$_SESSION['dept'];
     $sec=$_SESSION['sec'];
     $i=1;
     $sql="SELECT r.regno,r.name,d.appno,d.odfrom from registration r, oddetails d, preod p where (r.regno like d.regno) and (d.appno like p.appno)
     and (r.batch like '$batch') and (r.dept like '$dep') and (r.sec like '$sec') and (p.status1 is not null) and (p.status2 is not null)
     and (p.status3 is not null) and (p.advisor like 'Pending');";

     $data=$con->query($sql);

     if($data==false)
     {
         echo 'Failed to Fetch';
     }
     else{
     while ($row = mysqli_fetch_array($data))
     {
        echo "<tr>";
        echo '<td>'.$i++.'</td>';
       echo '<td>'.$row["regno"].'</td>';
       echo "<td>".$row["name"]."</td>";
       echo '<td><a href="PostOdAppl.php?id='.$row["appno"].'">'.$row["appno"].'</a></td>';
       echo "<td>".$row["odfrom"]."</td>";
       echo "</tr>";

     }

    }
     $con->close();
?>
</table>
</body>
</html>
