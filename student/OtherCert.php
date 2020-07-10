<?php
session_start();
if(!isset($_SESSION['uname']))
{
    header("location: ../studLog.php");
}
$register=$_SESSION['uname'];
include_once('../db.php');

include_once('../assets/notiflix.php');
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="../KEC.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Other Certificate Registration</title>
</head>
<div class="pusher" background="../backlogout.jpg">

    <?php include_once('studentnav.php');
include_once('../assets/notiflix.php');
?>
    <style>
    .pusher {
        background-image: url("../backlogout.jpg");
        padding-bottom: 3%;

    }

    .ui.action.input input[type="file"] {
        display: none;
    }
    </style>

    <?php
$register=$_SESSION['uname'];
$sql="SELECT * FROM `registration` WHERE `regno` LIKE '$register'";
$data=$con->query($sql);
$row=$data->fetch_assoc();
$register=$row['regno'];
$name=$row['name'];
$temp1=$row['batch']%2000;
$temp2=$row['dept'];
$temp3=substr($row['regno'],5);
$temp4=date('d');
$temp5=date('m');
$temp6=rand(10,99);
$appno=strval("CR").strval($temp1).strval($temp2).strval($temp3).strval($temp4).strval($temp5).strval($temp6);
?>

    <div class="ui card centered" style="width:75%;">
        <div class="content">
            <div class="header">
                <h1 style="text-align:center">Other Certificate Registration</h1>
            </div>
            <div class="meta" style="text-align:center">Only authenticated certificates can be uploaded</div>
            <div class="description">
                <br>
                <form enctype="multipart/form-data" class="ui form" method="POST"
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <h2 style="text-align:center">Application Number: <?php echo $appno; ?> </h2>
                    <br>
                    <div class="field">
                        <label>Registration Number</label>
                        <input type="text" name="regno" value="<?php echo $register; ?>" required readonly>
                    </div>
                    <br>
                    <div class="field">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo $name; ?>" required readonly>
                    </div>
                    <br>
                    <div class="field">
                        <label>Applied Date</label>
                        <div class="ui calendar">
                            <div class="ui input left icon">
                                <i class="calendar icon"></i>
                                <input type="text" name="appdate" value="<?php echo date('d/m/Y'); ?>" required
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="ui form">
                        <div class="two fields">
                            <div class="field">
                                <label>Start Date</label>
                                <div class="ui calendar" id="rangestart">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" name="start" placeholder="Start" required>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>End Date</label>
                                <div class="ui calendar" id="rangeend">
                                    <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" name="end" placeholder="End" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="field">
                        <label>Certificate Category</label>
                        <div class="ui selection dropdown">
                            <input type="hidden" name="category" required>
                            <i class="dropdown icon"></i>
                            <div class="default text">Category</div>
                            <div class="menu">
                                <div class="item" data-value="WORKSHOP">Workshop</div>
                                <div class="item" data-value="INTERNSHIP">Internship</div>
                                <div class="item" data-value="IV">Industrial Visit</div>
                                <div class="item" data-value="IPT">In-Plant Training</div>
                                <div class="item" data-value="COURSE">Online Certification</div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="field">
                        <label>Name of the College/Company</label>
                        <input type="text" name="cname" placeholder="Company/College" required>
                    </div>
                    <br>
                    <div class="field">
                        <label>State</label>
                        <div class="ui selection dropdown">
                            <input type="hidden" name="state" required>
                            <i class="dropdown icon"></i>
                            <div class="default text">State</div>
                            <div class="menu">
                                <div class="item" data-value="Inside Tamilnadu">Inside Tamilnadu</div>
                                <div class="item" data-value="Outside Tamilnadu">Outside Tamilnadu</div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="field">
                        <label>Title/Job Title/Course Name</label>
                        <input type="text" name="title" placeholder="Give Student if Not Applicable" required>
                    </div>
                    <br>
                    <div class="field">
                        <label>Purpose</label>
                        <input type="text" name="purpose" placeholder="Purpose" required>
                    </div>
                    <br>
                    <div class="field">
                        <label>Select the Certificate</label>
                        <div class="ui action input">
                            <input type="text" placeholder="Upload PDF" readonly>
                            <input type="file" id="file" name="file" required>
                            <div class="ui icon button">
                                Choose <i class="attach icon"></i>
                            </div>
                        </div>
                        <br />
                    </div>
                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" tabindex="0" class="hidden" required>
                            <label>I assure that the given details were authentic and true to my knowledge.</label>
                        </div>
                    </div>
                    <br>

                    <button class="ui positive button" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("input:text").click(function() {
        $(this).parent().find("input:file").click();
    });

    $(".ui.icon.button").click(function() {
        $(this).parent().find("input:file").click();
    });

    $('input:file', '.ui.action.input')
        .on('change', function(e) {
            var name = e.target.files[0].name;
            $('input:text', $(e.target).parent()).val(name);
        });

});
</script>


<?php
if(isset($_POST["submit"]))
{
  //echo '<script>alert("Getting inside submit");</script>';
    $appdate=date('Y-m-d');
    $type=$_POST['category'];
    $title=$_POST['title'];
    $start=$_POST['start'];
    $end=$_POST['end'];
    $cname=$_POST['cname'];
    $state=$_POST['state'];
    $purpose=$_POST['purpose'];
    $start=date("Y-m-d", strtotime(str_replace('/', '-', $start)));
    $end=date("Y-m-d", strtotime(str_replace('/', '-', $end)));
    $diff=date_diff(date_create($start),date_create($end));
    $days=$diff->format("%a")+1;
    if(isset($_FILES['file']))
    {
        //echo '<script>alert("getting inside files");</script>';
        $sql="SELECT * FROM `registration` WHERE `regno` LIKE '{$_SESSION['uname']}'";
        $data=$con->query($sql);
        $row=$data->fetch_assoc();
        $sql1="SELECT * FROM `postod` WHERE `appno` like '$appno'";
        $data1=$con->query($sql1);
        if($data1->num_rows>0)
        {
            echo '<script>$(document).ready(function(){$("#modal1").modal("open");});</script>';
        }
        $filename=sprintf('CR%s_%s_%s%s.pdf',$row['regno'],$_POST['category'],strtoupper(date("dM_s",time())),rand(10,99));
        $targetfolder =sprintf('../repos/certificates/%s/%s/%s/%s',$row['batch'],$row['dept'],$row['sec'],$filename);
        $ok=1;
        $file_type=$_FILES['file']['type'];
        $file_size= $_FILES['file']['size'];
        if ($file_type=="application/pdf" && $file_size < 2010000 )     //2010000bytes = 2mb
        {
            if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
            {
              //$filename.='.pdf';
              $sql="insert into `othercert` values('$appno','$register','$appdate','$type','$title','$start','$end','$days','$cname','$state','$purpose','$filename','Pending')";
              if(!$con->query($sql))
                      echo("Error description: " . $con->error);
              else
                echo "<script>Notiflix.Notify.Success('Proof Submitted Successfuly');</script>";
            }
            else
            {
                echo "<script> Notiflix.Report.Failure( 'Submisson Error', 'Some error occured. <br> Please try again.', 'Okay' );</script>";
            }
        }
        else
        {
            if ($file_type!="application/pdf" )
            {
                echo "<script> Notiflix.Report.Failure( 'Submisson Error', 'Only PDFs can be uploaded. <br> Please Convert and Submit.', 'Okay' );</script>";
            }
            if($file_size > 2010000)
            {
                echo "<script> Notiflix.Report.Failue( 'Submisson Error', 'File size should be 2 MB max. <br> Please Compress and Submit.', 'Okay' );</script>";
            }
        }

    }
}
?>
<script>
$(document).ready(function() {
    $('#rangestart').calendar({
        type: 'date',
        maxDate: new Date(),
        formatter: {
            date: function(date, settings) {
                if (!date) return '';
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear();
                if (day.toString().length == 1) {
                    day = "0" + day;
                }
                if (month.toString().length == 1) {
                    month = "0" + month;
                }
                return day + '/' + month + '/' + year;
            }
        },

        endCalendar: $('#rangeend')
    });
    $('#rangeend').calendar({
        type: 'date',
        maxDate: new Date(),
        formatter: {
            date: function(date, settings) {
                if (!date) return '';
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear();
                if (day.toString().length == 1) {
                    day = "0" + day;
                }
                if (month.toString().length == 1) {
                    month = "0" + month;
                }
                return day + '/' + month + '/' + year;
            }
        },
        startCalendar: $('#rangestart')
    });
    $('.ui.dropdown').dropdown();
    $('.ui.checkbox').checkbox();
});
</script>

</body>

</html>