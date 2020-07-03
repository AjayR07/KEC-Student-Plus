<!-- Student Pop Up Modal as well as main backend - Abi -->

<?php
$a = 0;
$d = 0;
$o = 0;
$p = 0;
$days = 0;
if (isset($_GET['id']))
    $appno = $_GET['id'];
else if (isset($_POST['appdrop']))
    $appno = $_POST['appdrop'];
else if (isset($_SESSION['appno']))
    $appno = $_SESSION['appno'];
else
    exit();
$sql1 = "SELECT * from oddetails where appno like '$appno'";
$data = $con->query($sql1);
if ($data->num_rows <= 0) {
    $sql1 = "SELECT * from noncertod where appno like '$appno'";
    $data = $con->query($sql1);
    if ($data->num_rows <= 0) {
        echo "<script> Notiflix.Report.Failure( 'KEC Student+', 'Application Number Invalid.', 'Retry', function(){location.replace('OdList.php');} ); </script>";
        exit();
    } else {
        $odrow = $data->fetch_assoc();
    }
} else {
    $odrow = $data->fetch_assoc();
    $sql3 = "SELECT * from preod where appno like '$appno'";
    $data = $con->query($sql3);
    $prerow = $data->fetch_assoc();
}

$sql2 = "SELECT * from registration where regno like '" . $odrow['regno'] . "'";
$data = $con->query($sql2);
$temp = $data->fetch_assoc();
$name = $temp['name'];
$mail = $temp['mail'];
$phone = $temp['phone'];
$regno = $odrow['regno'];
$name = $temp['name'];
$gender = $temp['gender'];
$sql = "SELECT o.status as status, p.status1 as status1, p.status2 as status2, p.status3 as status3,p.advisor as advisor,o.odfrom as odfrom, o.odto as odto, o.hrs as hrs from registration r, oddetails o,preod p where (r.regno like '$regno') and (r.regno like o.regno) and (o.appno like p.appno)";
//echo '<script>alert("'.$sql.'")</script>';
$sql2 = "SELECT c.status as othercert from othercert c where c.regno like '$regno'";
$data = $con->query($sql);
if ($data->num_rows == 0) {
    // echo '<tr><td colspan="6">No Record Found</td></tr>';
} else {
    while ($row = mysqli_fetch_array($data)) {
        if ($row['status'] == 'Approved' && $row['status1'] == 'Approved' && $row['status2'] == 'Approved' && $row['status3'] == 'Approved' && $row['advisor'] == 'Approved') {
            $a++;
        } else if ($row['status'] == 'Declined' || $row['status1'] == 'Declined' || $row['status2'] == 'Declined' || $row['status3'] == 'Declined' || $row['advisor'] == 'Declined') {
            $d++;
        } else if ($row['status'] == 'Pending' || $row['status1'] == 'Pending' || $row['status2'] == 'Pending' || $row['status3'] == 'Pending' || $row['advisor'] == 'Pending') {
            $p++;
        }
        $date1 = date_create($row['odfrom']);
        $date2 = date_create($row['odto']);
        $diff = date_diff($date2, $date1);
        if ($row['hrs'] == "full")
            $days += intval($diff->format("%a")) + 1;
        else
            $days += (intval($diff->format("%a")) + 1) / 2;
    }
}
$data = $con->query($sql2);
$a = $a + $data->num_rows;
if ($data->num_rows == 0) {
    //echo '<tr><td colspan="6">No Record Found</td></tr>';
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


<div class="ui longer modal" id="profile">
    <i class="close icon"></i>
    <div class="header">
        <?php echo $name . ' Details'; ?>
    </div>
    <div class="image content">

        <div class="ui large image">

            <?php
            if ($gender == 'Male')
                echo '<img src="../images/matthew.png"/>';
            else if ($gender == 'Female')
                echo '<img src="../images/molly.png"/>';
            else
                echo '<img src="../images/elyse.png"/>';
            ?>
        </div>
        <div class="description" style="height: 300px; width: 800px;overflow: auto;">

            <table class="ui compact inverted table">
                <tr>
                    <td>Phone: </td>
                    <td><a target="_blank" href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></td>
                </tr>
                <tr>
                    <td>Mail Id:</td>
                    <td><a target="_blank" href=" mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a></td>
                </tr>
                <tr>
                    <td>Total Applied:</td>
                    <td><?php echo $a + $p + $d; ?></td>
                </tr>
                <tr>
                    <td>Total Days:</td>
                    <td><?php echo $days; ?></td>
                </tr>
                <tr>
                    <td>Total Pending:</td>
                    <td><?php echo $p; ?></td>
                </tr>
                <tr>
                    <td>Total Granted:</td>
                    <td><?php echo $a; ?></td>
                </tr>
                <tr>
                    <td>Total Rejected:</td>
                    <td><?php echo $d; ?></td>
                </tr>
                <tr>
                    <td>Certificates Registered:</td>
                    <td><?php echo $o; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="actions">
        <div class="ui black deny button">
            Okay
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#pop').on("click", function() {
            $('.longer.modal').modal('setting', 'transition', 'vertical flip').modal('show');
        });
    });
</script>