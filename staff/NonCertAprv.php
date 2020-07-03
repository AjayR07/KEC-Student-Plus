<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../staffLog.php");
}
include_once('../db.php');
include_once('staffnav.php');
include_once('../assets/notiflix.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../KEC.png">
    <title>Local OD Approval</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&display=swap" rel="stylesheet">

    <link href="css/main.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="../assets/animate.min.css" type="text/css" />
    <style>
        .card {
            height: 70%;
            width: 100%;
            /*1000px;*/
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

        table {
            margin: 0px auto;
            /* text-align: center; */
        }

        @supports (-moz-appearance:none) {
            .card-3 .card-body {
                display: block;

            }
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
            height: 40px;
        }
    </style>
</head>

<body>
    <?php include_once('staffnav.php');
    include_once('../assets/notiflix.php');
    include_once('./StudentProfile.php'); ?>

    <style>
        body {
            background: url('../backstaff.jpg');
            font-family: 'Open Sans', sans-serif;
        }
    </style>
    <?php
    if (isset($_GET['id'])) {
        $appno = $_GET['id'];
        $sql1 = "Select * from noncertod where appno like '$appno'";
        $data = $con->query($sql1);
        if ($data->num_rows <= 0) {
            echo "<script> Notiflix.Report.Failure( 'KEC Student+', 'Application Number Invalid.', 'Retry', function(){location.replace('OdList.php');} ); </script>";
            exit();
        }
        $odrow = $data->fetch_assoc();
        $sql2 = "Select * from registration where regno like '" . $odrow['regno'] . "'";
        $data = $con->query($sql2);
        $temp = $data->fetch_assoc();
        $name = $temp['name'];
        $sql3 = "select * from noncertinfo where appno like '$appno'";
        $data = $con->query($sql3);
        $prerow = $data->fetch_assoc();
        $_SESSION['appno'] = $appno;
        $_SESSION['type'] = 'OD';
    }
    ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $stat = $_POST['advisor'];
        if ($_SESSION['design'] == 'Advisor') {
            $sql = "UPDATE noncertod set advisor='$stat' where appno like '" . $_SESSION['appno'] . "'";
        } else if ($_SESSION['design'] == 'Year in Charge') {
            $sql = "UPDATE noncertod set yearin='$stat' where appno like '" . $_SESSION['appno'] . "'";
        }
        if ($con->query($sql)) {
            echo "<script> Notiflix.Report.Success( 'KEC Student+', 'Application Status Updated Successfully.', 'Okay', function(){window.location.replace('OdList.php');}); </script>";
            unset($_SESSION['appno']);
            exit();
        } else {
            echo "<script> Notiflix.Report.Failure( 'KEC Student+', 'Updation Error. Please try agin later.', 'Okay', function(){window.location.replace('OdList.php');}); </script>";
            unset($_SESSION['appno']);
            exit();
        }
    }
    if (!isset($_GET['id']) && !isset($_POST['advisor'])) {
        echo "<script> Notiflix.Report.Failure( 'KEC Student+', 'Bad Gateway', 'Exit', function(){location.replace('OdList.php');} ); </script>";
        exit();
    }

    ?>


    <center>
        <br>


        <h1 align="center" style="color:bisque;">Local OD Permission Form of <?php echo $name; ?><div class="pop">
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

        <div class="page-wrapper  p-t-80 p-b-100">
            <div class="wrapper wrapper--w780">
                <div class="card card-3">
                    <div class="card-image">
                        <div class="card-body">
                            <center>
                                <h1 class="title"><b>Local OD Permission Form</b> </h1>
                            </center>
                            <br>
                            <table id="tab">
                                <tr>
                                    <td>Application:</td>
                                    <td>
                                        <?php echo $appno; ?>&nbsp
                                    </td>
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
                                    <td>Applied Date: &nbsp&nbsp&nbsp </td>
                                    <td><?php echo date_format(date_create($odrow['appdate']), 'd/m/Y'); ?></td>
                                </tr>
                                <tr>
                                    <td>Date: </td>
                                    <td>From: &nbsp<?php echo date_format(date_create($odrow['start']), 'd/m/Y'); ?> <br></br>To &nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp<?php echo date_format(date_create($odrow['end']), 'd/m/Y'); ?></td>

                                </tr>
                                <tr>
                                    <td>Authorising Faculty: </td>
                                    <td><?php echo $odrow['appfacty']; ?></td>
                                </tr>
                                <tr>
                                    <td>Activity: </td>
                                    <td><?php echo $odrow['activity']; ?></td>
                                </tr>
                                <tr>
                                    <td>No. of Days: </td>
                                    <td><?php echo $odrow['nodays']; ?></td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
                <br>

                <div class="card card-3" id="staff1">
                    <div class="card-image">
                        <div class="card-body">
                            <center>
                                <h1 class="title"><b>Application Details</b> </h1>
                            </center>
                            <br>
                            <table class="ui very basic collapsing celled inverted very padded table">
                                <tr>
                                    <th><b>Day</b></th>
                                    <th><b>Reason</b></th>
                                    <th><b>Hrs.</b></th>
                                    <th><b>Total</b></th>
                                </tr>
                                <?php
                                $qr = "SELECT * from noncertinfo where appno like '$appno'";
                                $z = $con->query($qr);
                                //$fet=$z->fetch_assoc();
                                while ($d = mysqli_fetch_array($z)) {
                                    echo '<tr>
                                    <td>' . $d['day'] . '</td>
                                    <td>' . $d['reason'] . '</td>
                                    <td>' . $d['hrs'] . '</td>
                                    <td>' . $d['total'] . '</td>
                                    </tr>';
                                }
                                ?>
                            </table><br>


                        </div>
                    </div>
                </div><br>

                <div class="card card-3">
                    <div class="card-image">
                        <div class="card-body">
                            <center>
                                <h1 class="title"><b>Give permission for On-Duty: </b> </h1>
                            </center><br>
                            <center>
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <div class="ui form">
                                        <div class="two fields">
                                            <div class="field">
                                                <button type="submit" class="big ui positive button" name="advisor" value="Approved">Approve</button>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                            <div class="field">
                                                <button type="submit" class="big ui negative button" name="advisor" value="Declined">Decline</button>
                                            </div>
                                        </div>
                                </form>
                            </center>
                        </div>
                    </div>
                </div><br>

            </div>
        </div>

    </center>

    <script>
        $(document).ready(function() {
            $('.ui.checkbox').checkbox();
        });
    </script>

</body>

</html>