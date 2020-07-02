<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../staffLog.php");
}
include_once('../db.php');
include_once('staffnav.php');
include_once('../assets/notiflix.php');
include_once('./StudentProfile.php');
?>
<?php
if (isset($_POST['appdrop'])) {

    $appno = $_POST['appdrop'];
    $_SESSION['appno'] = $appno;
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
            echo '<body><script>Notiflix.Report.Success("Updated Successfully", "Press Okay to continue", "Okay",function(){window.location.replace("OdList.php");}); </script></body>';
            exit();
        } else {
            echo '<body><script>Notiflix.Report.Failure("Updated Failure", "Some Error Occured. Please verify and try again", "Okay",function(){window.location.replace("OdList.php");}); </script></body>';
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
            echo '<body><script>Notiflix.Report.Success("Updated Successfully", "Press Okay to continue", "Okay",function(){window.location.replace("OdList.php");}); </script></body>';
            exit();
        } else {
            echo '<body><script>Notiflix.Report.Failure("Updated Failure", "Some Error Occured. Please verify and try again", "Okay",function(){window.location.replace("OdList.php");}); </script></body>';
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
            echo '<body><script>Notiflix.Report.Success("Updated Successfully", "Press Okay to continue", "Okay",function(){window.location.replace("OdList.php");}); </script></body>';
            exit();
        } else {
            echo '<body><script>Notiflix.Report.Failure("Updated Failure", "Some Error Occured. Please verify and try again", "Okay",function(){window.location.replace("OdList.php");}); </script></body>';
            exit();
        }
    }
    echo '<script>window.location.replace("OdList.php");</script>';
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

    <center>
        <div class="whole">
            <br>
            <h1 align="center" style="color:bisque;">OD Suggestion Form of <?php echo $name; ?>
                <div class="pop">
                    <h3><a class="ui right aligned item" id="pop">
                            <?php
                            if ($gender == 'Male')
                                echo '<img class="ui avatar image" src="../images/matthew.png"/>';
                            else if ($gender == 'Female')
                                echo '<img class="ui avatar image" src="../images/molly.png"/>';
                            else
                                echo '<img class="ui avatar image" src="../images/elyse.png"/>';
                            ?></a></h3>
                </div>

            </h1> <br>


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