<?php
    session_start();
    include_once('../db.php');
 
    if(!isset($_SESSION['user']))
    {
      header("Location: ../staffLog.php");
    }
   
?>
<?php
    if(isset($_POST["register"]))
    {
   
        $e_name=$_POST["EventName"];
        $e_staff=$_POST["FacultyName"];
        $date=$_POST["EventDate"];
        $e_date = date("Y-m-d", strtotime($date));
        $e_desc=$_POST["EventDesc"];
        $e_staffid=$_SESSION["user"];
        $e_id=strval("ER").strval(date('d')).strval(date('m')).strval(mt_rand(100,999));
        while(true)
        {
            $e_id=strval("ER").strval(date('d')).strval(date('m')).strval(mt_rand(100,999));
            $sql_id="select * from `eventinfo` where eventid LIKE '$e_id'";
            $data=$con->query($sql_id);
            if($data->num_rows==0)
            {
                break;
            }
        }
        
        $sql="insert into eventinfo values('$e_id','$e_name','$e_staff','$e_staffid','$e_date','$e_desc')";
        if($result=$con->query($sql))
        {
            
        }
    }
?>
<?php
    $user=$_SESSION["user"];
    $sql1="select * from eventinfo where `staffid` LIKE '$user'";
    $result1=$con->query($sql1);
    if(!$result1->num_rows)
    {
        echo "<script>document.getElementById('table1').disabled=true;</script>";
    }

?>
<?php include_once("staffnav.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Event Registration </title>
    
    <style>
        body,#tab1
        {
            background-image:url("../backstaff.jpg");
            
        }
        #seg1
        {
            width:35%;
            margin:auto;
            margin-top:3%;
        }
        @media (max-width: 500px) {
        #seg1
        {
            width:94%;
            margin:auto;
            margin-top:3%;
        }


        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.5/dist/semantic.min.js"></script>
</head>
<body>

<div class="ui pointing menu" style="margin-top:0%;font-size:18px;font-weight:bold" id="tab1">
  <a class="item teal active" data-tab="first" style="color:bisque;">Event Registration</a>
  <a class="right floated teal item " data-tab="second"  style="color:bisque;" id="table1">My Events</a>
</div>


<div class="ui bottom attached tab " data-tab="first">
<h1 style="text-align:center;color:bisque;">Event Registration</h1>
    <div class="ui raised segment" id="seg1" >
   <form class="ui form" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="myform">
        <!-- <form class="ui form"  id="myform"> -->
        <div class="field">
            <label>Event Name</label>
            <input type="text" name="EventName" placeholder="Event Name" required>
        </div>
        <div class="field">
            <label>Organizing Faculty Name</label>
            <input type="text" name="FacultyName" placeholder="Organizing Faculty Name" id="Faculty" required>
        </div>
        <div class="field">
            <label>Event Date</label>
            <div class="ui calendar" id="calendar">
                <div class="ui input left icon">
                    <i class="calendar icon"></i>
                    <input type="text" name="EventDate" placeholder="Event Date" required>
                </div>
            </div>
        </div>
        <div class="field">
            <label>Event Description</label>
            <textarea rows="4" placeholder="Optional" name="EventDesc"></textarea>
        </div>
        
        
        <button class="ui primary button" type="submit" name="register" >Register Event</button>

        </form>
    </div>
</div>
<div class="ui bottom attached tab" data-tab="second">
<h1 style="text-align:center;color:bisque;">Your Events</h1>
<table class="ui raised selectable striped inverted table" style="width:96%;margin:auto;margin-top:3%;">
  <thead>
    
    <tr>
    <th>S.no</th>
      <th>Event ID </th>
      <th>Event Name</th>
      <th>Event Date</th>
      <th>Event Description</th>
      <!-- <th>Mark Attendance</th> -->
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    if(!$result1->num_rows)
    {
        echo "<tr><td colspan='5' style='text-align:center'>No Event Organized </td></tr>";
    }
    while($row=mysqli_fetch_array($result1))
    {
        echo "<tr>";
       echo '<td>'.$i++.'</td>';
       echo '<td>'.$row["eventid"].'</td>';
       echo "<td>".$row["name"]."</td>";
    
       echo '<td>'.date_format(date_create($row['date']),'d/m/Y').'';
       echo '<td>'.$row["description"].'</td>';
    //    echo '<td>'.'<center><h3><i class="clipboard check icon"></i></h3></center>'.'</td>';
       echo "</tr>";
    }
    ?>
  </tbody>
</table>

</div>

   





   
<!-- JavaScript -->
<script>
    $(document).ready(function()
    {
        $('.menu .item').tab();
        var today = new Date();
        $('#calendar').calendar({type: 'date', minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),direction: 'rightward'});
    });
    var val = "<?php echo $_SESSION['staffname']; ?>";
    document.getElementById("Faculty").value=val;


</script>

<!--  -->

</body>
</html>