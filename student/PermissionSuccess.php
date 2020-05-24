<?php
    session_start();
?>
<?php
    if(!isset($_SESSION['uname']))
    {
        header('Location:../studLog.php');
    }
    include_once('../db.php');
    include_once('studentnav.php');
    include_once('../assets/notiflix.php');
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Permission Success Page">
    <meta name="author" content="Team A3">
    <link rel="icon" type="image/png" href="../KEC.png">

    <title>Successfull</title>

    <link href="../staff/css/main.css" rel="stylesheet" media="all">
    <?php include_once('../assets/notiflix.php'); ?>
    <style>
    
    .card{
        height: 70%;
        width: 100%;/*1000px;*/
    }
    table, th, td
     {

    
     border: 1px solid black;
     color:white;

     
     font-size: 130%;
    }
    button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
}
    p{
         color:white;
            font-size: 150%;
    
    }
    th {
  text-align: left;
    }
    th,td{
        height: 35px;
    }
    </style>
    <?php
if(!isset($_SESSION['appno']))
{
    echo '<script>window.location.replace("PreOdForm.php");</script>';
}
else{
    $appno=$_SESSION['appno'];
    $sql1="Select * from oddetails where appno like '$appno'";
    $data=$con->query($sql1);
    $odrow=$data->fetch_assoc();
    $sql2="Select name from registration where regno like '".$odrow['regno']."'";
    $data=$con->query($sql2);
    $temp=$data->fetch_assoc();
    $name=$temp['name'];

}

?>
</head>

<body background="../bgpic.jpg">
<?php echo "<script>Notiflix.Notify.Success('Application Submitted Successfully');</script>";?>
    <center>
        <style>
            body{
                background-image:url('../backgrd.jpg');
            }
        </style>
    <div class="page-wrapper p-t-100 p-b-100">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-image">
                    <div class="card-body">
                    <center> <h1 class="ui header" style="color:white"><b>Permission Application</b> </h1></center>

                                <div class="meta" style="color:yellow">Please note down the Applicaiton number for further communications</div><br>
                              
                            <table>
                                <tr>
                                    <td>Application:</td>
                                    <td><h2 style="color:green"><?php echo $appno;?></h2></td>                                
                                </tr>
                              
                                <tr>
                                    <td>Roll No: </td>
                                    <td><?php echo $odrow['regno'];?></td>
                                    </tr>
                                <tr>
                                    <td>Name: </td>
                                    <td><?php echo $name; ?></td>
                                </tr>
                                <tr>
                                    <td>Type:</td>
                                    <td><?php echo $odrow['odtype']; ?></td>
                                </tr>
                                <tr>
                                    <td >Applied Date: &nbsp</td>
                                    <td><?php echo date_format(date_create($odrow['appdate']),'d/m/Y');?></td>
                                </tr>
                                <tr>
                                    <td>Date: </td>
                                    <td>From: &nbsp<?php echo date_format(date_create($odrow['odfrom']),'d/m/Y');?> To &nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp<?php echo date_format(date_create($odrow['odto']),'d/m/Y');?></td>
                                
                                </tr>
                                <tr>
                                    <td>No. of Hrs: </td>
                                    <td><?php echo $odrow['hrs'];?>
                                </tr>
                                <tr>
                                    <td>Purpose: </td>
                                    <td><?php echo $odrow['purpose'];?></td>
                                </tr>
                                <tr>
                                    <td>Title: </td>
                                    <td><?php echo $odrow['title'];?></td>
                                </tr>
                                <tr>
                                    <td>OD College: </td>
                                    <td><?php echo $odrow['college'];?></td>
                                </tr>
                                <tr>
                                    <td>State: </td>
                                    <td><?php echo $odrow['state'];?></td>
                                </tr>
                            </table><br>
                        <center> <button class="ui big green button" onclick="window.location.replace('Status.php');">Okay</button></center>
                    </div>
                </div>
            </div>
    <!-- Jquery JS-->

 

</body>

</html>
