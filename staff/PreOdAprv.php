<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../staffLog.php");
}
include_once('../db.php');
include_once('staffnav.php');
include_once('../assets/notiflix.php');
?>
<?php
if (isset($_POST['appdrop'])) {

    $appno = $_POST['appdrop'];
    $_SESSION['appno'] = $appno;
    $sql1 = "Select * from oddetails where appno like '$appno'";
    $data = $con->query($sql1);
    if ($data->num_rows == 0) {
        echo '<body><script> Notiflix.Report.Failure( "Application Number Invalid", "The given application number seems to be invalid. Please check.", "Okay", function(){window.location.replace("OdList.php");} ); </script></body>';
        exit();
        echo '<script type="text/javascript">$(document).ready(function(){$(".whole").hide();});</script>';
    }
    $odrow = $data->fetch_assoc();
    $sql2 = "Select * from registration where regno like '" . $odrow['regno'] . "'";
    $data = $con->query($sql2);
    $temp = $data->fetch_assoc();
    $name = $temp['name'];
    $sql3 = "select * from preod where appno like '$appno'";
    $data = $con->query($sql3);
    $prerow = $data->fetch_assoc();
    $set1 = $set2 = $set3 = false;
    if (!empty($prerow['status1'])) {
        $set1 = true;
        if (!empty($prerow['status2'])) {
            $set2 = true;
            if (!empty($prerow['status3'])) {
                $set3 = true;
            } else {
                $set3 = false;
            }
        } else {
            $set2 = false;
        }
    } else {
        $set1 = false;
    }
} else {
    $appno = $_SESSION['appno'];
    if (isset($_POST['Submit1'])) {
        $staff = $_SESSION['staffname'];
        $status = $_POST['recom'];
        $com = $_POST['comments1'];
        $sql = "UPDATE preod SET staff1='$staff', comments1='$com', status1='$status' where appno like '$appno'";
        $data = $con->query($sql);
        if ($data == true) {
            echo '<body><script>Notiflix.Report.Success("Updated Successfully", "Press Okay to continue", "Okay",window.location.replace("OdList.php")); </script></body>';
            exit();
        } else {
            echo '<body><script>Notiflix.Report.Failure("Updated Failure", "Some Error Occured. Please verify and try again", "Okay",window.location.replace("OdList.php")); </script></body>';
            exit();
        }
    }
    if (isset($_POST['Submit2'])) {
        $staff = $_SESSION['staffname'];
        $status = $_POST['recom'];
        $com = $_POST['comments2'];
        $sql = "UPDATE preod SET staff2='$staff', comments2='$com', status2='$status' where appno like '$appno'";
        $data = $con->query($sql);
        if ($data == true) {
            echo '<body><script>Notiflix.Report.Success("Updated Successfully", "Press Okay to continue", "Okay",window.location.replace("OdList.php")); </script></body>';
            exit();
        } else {
            echo '<body><script>Notiflix.Report.Failure("Updated Failure", "Some Error Occured. Please verify and try again", "Okay",window.location.replace("OdList.php")); </script></body>';
            exit();
        }
    }
    if (isset($_POST['Submit3'])) {

        $staff = $_SESSION['staffname'];
        $status = $_POST['recom'];
        $com = $_POST['comments3'];
        $sql = "UPDATE preod SET staff3='$staff', comments3='$com', status3='$status' where appno like '$appno'";
        $data = $con->query($sql);
        if ($data == true) {
            echo '<body><script>Notiflix.Report.Success("Updated Successfully", "Press Okay to continue", "Okay",window.location.replace("OdList.php")); </script></body>';
            exit();
        } else {
            echo '<body><script>Notiflix.Report.Failure("Updated Failure", "Some Error Occured. Please verify and try again", "Okay",window.location.replace("OdList.php")); </script></body>';
            exit();
        }
    }
    echo '<script>window.location.replace("OdList.php");</script>';
}
?>
<?php
$a = 0;
$d = 0;
$o = 0;
$p = 0;
$mail = $temp['mail'];
$phone = $temp['phone'];
$regno = $odrow['regno'];
$name = $temp['name'];
$sql = "SELECT o.status as status, p.status1 as status1, p.status2 as status2, p.status3 as status3,p.advisor as advisor from registration r, oddetails o,preod p where (r.regno like '$regno') and (r.regno like o.regno) and (o.appno like p.appno)";
//echo '<script>alert("'.$sql.'")</script>';
$sql2 = "SELECT c.status as othercert from othercert c where c.regno like '$regno'";
$data = $con->query($sql);
if ($data->num_rows == 0) {
    echo '<tr><td colspan="6">No Record Found</td></tr>';
} else {
    while ($row = mysqli_fetch_array($data)) {
        if ($row['status'] == 'Approved' && $row['status1'] == 'Approved' && $row['status2'] == 'Approved' && $row['status3'] == 'Approved' && $row['advisor'] == 'Approved') {
            $a++;
        } else if ($row['status'] == 'Declined' || $row['status1'] == 'Declined' || $row['status2'] == 'Declined' || $row['status3'] == 'Declined' || $row['advisor'] == 'Declined') {
            $d++;
        } else if ($row['status'] == 'Pending' || $row['status1'] == 'Pending' || $row['status2'] == 'Pending' || $row['status3'] == 'Pending' || $row['advisor'] == 'Pending') {
            $p++;
        }
    }
}
$data = $con->query($sql2);
$a = $a + $data->num_rows;
if ($data->num_rows == 0) {
    echo '<tr><td colspan="6">No Record Found</td></tr>';
} else {
    while ($row = mysqli_fetch_array($data)) {
        if ($row['othercert'] == 'Approved') {
            $o++;
        } else if ($row['othercert'] == 'Declined') {
            $d++;
        } else if ($row['othercert'] == 'Pending') {
            $p++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>OD Permission</title>

    <link href="css/main.css" rel="stylesheet" media="all">
    <style>
        .card {
            height: 70%;
            width: 100%;
        }

        body {
            font-family: 'Open Sans', sans-serif;
        }


        table,
        th,
        td {
            border: 1px solid black;
            color: white;
            font-size: 130%;
        }

        p {
            color: white;
            font-size: 150%;

        }

        th {
            text-align: left;
        }

        th,
        td {
            height: 35px;
        }
    </style>
</head>

<body>
    <?php
    include_once('staffnav.php'); ?>
    <style>
        body {
            background: url('../backstaff.jpg');
            font-family: 'Open Sans', sans-serif;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#pop').popup({
                on: 'click',
                inline: true,
                position: 'bottom center',
                popup: '#tool'
            });

        });
    </script>
    <center>
        <div class="whole">
            <br>
            <h1 align="center" style="color:bisque;">OD Suggestion Form of <?php echo $name; ?><div class="pop"><i class="user circle icon" id="pop"></i></div>
            </h1> <br>
            <div class="ui special basic popup" id="tool">
                <h1 class="header">
                    Profile
                </h1>
                <br>
                <h4 class="content">
                    Name: <?php echo $name; ?><br><br>
                    Phone: <?php echo $phone; ?><br><br>
                    Mail Id: <a href="mailto:<?php echo $mail; ?>"><i class="mail icon"></i></a><br><br>
                    Total Applied: <?php echo $a + $p + $d; ?><br><br>
                    Total Pending: <?php echo $p; ?><br><br>
                    Total Granted: <?php echo $a; ?><br><br>
                    Total Rejected: <?php echo $d; ?><br><br>
                    Certificates Registered: <?php echo $o; ?> <br>
                </h4>
            </div>

        </div>
        <?php
        if ($odrow['odtype'] != 'PAPER' && $odrow['odtype'] != 'PROJECT')
            echo '<script>Notiflix.Report.Failure( "Application Number Invalid", "Suggetion is not needed for this type of Applciations", "Okay", function(){window.location.replace("index.php");} ); </script>';
        ?>
        <div class="page-wrapper p-t-80 p-b-100">
            <div class="wrapper wrapper--w780">
                <div class="card card-3">
                    <div class="card-image">
                        <div class="card-body">
                            <center>
                                <h1 class="title"><b>Permission Form</b> </h1>
                            </center>
                            <br>
                            <table>
                                <tr>
                                    <td>Application:</td>
                                    <td><?php echo $appno; ?></td>
                                </tr>

                                <tr>
                                    <td>Roll No: </td>
                                    <td><?php echo $odrow['regno']; ?></td>
                                </tr>
                                <tr>
                                    <td>Name: </td>
                                    <td><?php echo $name; ?></td>
                                </tr>
                                <tr>
                                    <td>Category: </td>
                                    <td><?php echo $odrow['odtype']; ?></td>
                                </tr>
                                <tr>
                                    <td>Applied Date: &nbsp&nbsp&nbsp </td>
                                    <td><?php echo date_format(date_create($odrow['appdate']), 'd/m/Y'); ?></td>
                                </tr>
                                <tr>
                                    <td>Date: </td>
                                    <td>From: &nbsp<?php echo date_format(date_create($odrow['odfrom']), 'd/m/Y'); ?> <br>To &nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp<?php echo date_format(date_create($odrow['odto']), 'd/m/Y'); ?></td>

                                </tr>
                                <tr>
                                    <td>No. of Hrs: </td>
                                    <td><?php echo $odrow['hrs']; ?></td>
                                </tr>
                                <tr>
                                    <td>Purpose: </td>
                                    <td><?php echo $odrow['purpose']; ?></td>
                                </tr>
                                <tr>
                                    <td>Title: </td>
                                    <td><?php echo $odrow['title']; ?></td>
                                </tr>
                                <tr>
                                    <td>OD College: </td>
                                    <td><?php echo $odrow['college']; ?></td>
                                </tr>
                                <tr>
                                    <td>State: </td>
                                    <td><?php echo $odrow['state']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card card-3">
                    <div class="card-image">
                        <div class="card-body">
                            <center>
                                <h1 class="title"><b>Suggestion 1</b> </h1>
                            </center>
                            <br>
                            <?php if ($set1) {

                                echo '<table>
                                <tr>
                                    <td>Staff Name: </td>
                                    <td>' . $prerow["staff1"] . '</td>
                                </tr>
                                <tr>
                                    <td >Recommendation: &nbsp </td>
                                    <td>' . $prerow["status1"] . '</td>
                                </tr>
                                <tr>
                                    <td>Comments if any :&nbsp&nbsp&nbsp </td>
                                    <td>
                                    ' . $prerow["comments1"] . '

                                    </td>
                                </tr>
                                       </table><br>
                                       </div>
                                       </div>
                                   </div><br>';
                            } else {

                                echo '<form method="POST" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
                                echo '
                    <div class="ui form"><table>
                                <tr>
                                    <td>Staff Name: </td>
                                    <td>' . $_SESSION["staffname"] . '</td>
                                </tr>
                                <tr>
                                    <td>Recommendation: &nbsp </td>
                                    <td><div class="field"><div class="ui radio checkbox"><input type="radio"  id="approval" checked="" name="recom" value="Approved" tabindex="0" class="hidden" required><label for="approval"><h4 style="color:white;">Approve</h4></label> </td></div></div>

                                 <tr>
                                     <td> </td>
                                    <td><div class="field"><div class="ui radio checkbox"><input type="radio" id="decline" name="recom" value="Declined"  tabindex="0" class="hidden"> <label for="decline"><h4 style="color:white;">Decline</h4></label></td>  </div></div>
                                </tr>
                                <tr>
                                    <td>Comments:&nbsp&nbsp&nbsp </td>
                                    <td>
                                    <div class="field">
                                    <div class="ui mini icon input">
                                        <input type="text" placeholder="Type atleast 4 charcters" name="comments1" minlength="4" required>
                                        <i class="comments outline icon"></i>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                                       </table><br>
                                       <center><div class="field"><button type="submit" class="big ui teal button" name="Submit1">Submit</button></div></center>
                        </form>
                        </div>
                        </div>
                        </div>
                    </div><br>';
                            }
                            ?>
                            <?php if ($set1) {
                                echo '<div class="card card-3">
                <div class="card-image">
                    <div class="card-body">
                    <center> <h1 class="title"><b>Suggestion 2</b> </h1></center><br>';
                                if ($set2) {

                                    echo '<table>
                                <tr>
                                    <td>Staff Name: </td>
                                    <td>' . $prerow["staff2"] . '</td>
                                </tr>
                                <tr>
                                    <td >Recommendation: &nbsp </td>
                                    <td>' . $prerow["status2"] . '</td>
                                </tr>
                                <tr>
                                    <td>Comments if any :&nbsp&nbsp&nbsp </td>
                                    <td>
                                    ' . $prerow["comments2"] . '

                                    </td>
                                </tr>
                                       </table><br>
                                       </div>
                                       </div>
                                   </div><br>';
                                } else {

                                    echo '<form method="POST" class="was-validated" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
                                    echo '
                    <div class="ui form">
                    <table>

                                <tr>
                                    <td>Staff Name: </td>
                                    <td>' . $_SESSION["staffname"] . '</td>
                                </tr>

                                <tr>
                                    <td>Recommendation: &nbsp </td>
                                    <td><div class="field"><div class="ui radio checkbox"><input type="radio"  id="approval" name="recom" value="Approved"  tabindex="0" checked="" class="hidden" required><label for="approval"><h4 style="color:white;">Approve</h4></label> </td></div></div>

                                 <tr>
                                     <td> </td>
                                    <td><div class="field"><div class="ui radio checkbox"><input type="radio" id="decline" name="recom" value="Declined" tabindex="0" class="hidden"> <label for="decline"><h4 style="color:white;">Decline</h4></label></td>  </div></div>
                                </tr>
                                                    <tr>
                                    <td>Comments if any :&nbsp&nbsp&nbsp </td>
                                    <td>
                                    <div class="field">
                                    <div class="ui mini icon input">
                                    <input type="text" placeholder="Type atleast 4 charcters" name="comments2" minlength="4" required>
                                      <i class="comments outline icon"></i>
                                      </div>
                                </div>
                                    </td>
                                </tr>
                                       </table><br>
                                       <center><div class="field"><button type="submit" class="big ui teal button" name="Submit2">Submit</button></div></center>
                        </form>
                        </div>
                        </div>
                    </div><br>
                    </div>';
                                }
                            }
                            ?>


                            <?php if ($set2) {
                                echo '<div class="card card-3">
                <div class="card-image">
                    <div class="card-body">
                    <center> <h1 class="title"><b>Suggestion 3</b> </h1></center><br>';

                                if ($set3) {

                                    echo '<table>
                                <tr>
                                    <td>Staff Name: </td>
                                    <td>' . $prerow["staff3"] . '</td>
                                </tr>
                                <tr>
                                    <td >Recommendation: &nbsp </td>
                                    <td>' . $prerow["status3"] . '</td>
                                </tr>
                                <tr>
                                    <td>Comments if any :&nbsp&nbsp&nbsp </td>
                                    <td>
                                    ' . $prerow["comments3"] . '

                                    </td>
                                </tr>
                                       </table><br>
                                       </div>
                                       </div>
                                   </div><br>';
                                } else {

                                    echo '<form method="POST" class="was-validated" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
                                    echo '<div class="ui small form">



                    <table>
                                <tr>
                                    <td>Staff Name: </td>
                                    <td>' . $_SESSION["staffname"] . '</td>
                                </tr>

                                <tr>
                                    <td>Recommendation: &nbsp; </td>
                                    <td><div class="field"><div class="ui radio checkbox"><input type="radio"  id="approval" name="recom" value="Approved"  tabindex="0" class="hidden" checked="" required><label for="approval"><h4 style="color:white;">Approve</h4></label> </td></div></div>

                                 <tr>
                                     <td> </td>
                                    <td><div class="field"><div class="ui radio checkbox"><input type="radio" id="decline" name="recom" value="Declined" tabindex="0" class="hidden"> <label for="decline"><h4 style="color:white;">Decline</h4></label></td>  </div></div>
                                </tr>
                                                    <tr>
                                    <td>Comments :&nbsp;&nbsp;&nbsp; </td>
                                    <td>
                                    <div class="field">
                                    <div class="ui large icon input">
                                        <input type="text" placeholder="Type atleast 4 charcters" name="comments3" minlength="4" required>
                                        <i class="comments outline icon"></i>
                                      </div>
                                    </div>
                                    </td>
                                </tr>
                                       </table><br>
                            <center><div class="field"><button type="submit" class="big ui teal button" name="Submit3">Submit</button></div></center>
                        </form>
                        </div>
                        </div>
                        </div>
                    </div><br>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('.ui.radio.checkbox').checkbox();
                    });
                </script>

    </center>
</body>

</html>