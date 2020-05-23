<?php
session_start();
if(!isset($_SESSION['uname']))
{
    header("Location: ../studLog.php");
}
$register=$_SESSION['uname'];
include_once('../db.php');
include_once('studentnav.php');
include_once('../assets/notiflix.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php
if(isset($_POST['PROCEED']))
{
    
    //echo '<script>alert("Getting into isset proceed");</script>';
    $appno =$_POST['appnum'];
    $sql="SELECT * FROM postod where appno LIKE '$appno'";
    $result=$con->query($sql);
    if($result->num_rows>0)
    {
        echo "<body><script>Notiflix.Report.Failure('Error','You have already submitted the proof','Return',function(){window.location.replace('Status.php');});</script></body>";
        exit();
    }
    $_SESSION['appno']=$appno;
    $sql="SELECT * FROM oddetails where appno LIKE '$appno'";
    $result = $con->query($sql);
    if($result->num_rows==0)
    {
        echo "<body><script>Notiflix.Report.Failure('Error','Certificate Number Invalid','Return',function(){window.location.replace('Status.php');});</script></body>";
        exit();
    }
    $odrow = $result->fetch_array();


   echo '<script type="text/javascript">$(document).ready(function(){$(".whole").show();$(".nupload").hide();});</script>';
}

if(!isset($_POST['PROCEED']))
{
    echo '<script type="text/javascript">$(document).ready(function(){$(".whole").hide();$(".nupload").show();});</script> ';
}
?>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <!-- Title Page-->
    <title>OD Proof Submission</title>
  
    <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
          <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script>
    $(document).ready(function(){
        $('.ui.dropdown').dropdown();
        $('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
    ;
  });
      }
        );
</script>
<style>
body  {
  background-image: url("../backgrd.jpg");
}
</style>


    <style>
            .card
            {
                height: 100%;
                width: 100%;
            }
            table, th, td
            {

                height: 100;
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
            tr{
                height: 45px;
            }
            p{

                    color:white;
                    font-size: 150%;

            }
            th {
                    text-align: left;
            }
            .wrapper wrapper--w780
            {

                visibility:hidden;
            }

    </style>

</head>


<body>
<?php include_once('studentnav.php');
include_once('../assets/notiflix.php');
?>

<div class="nupload">
<center>
<div class="page-wrapper p-t-20 p-b-20 font-poppins" >
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <center><br><br><br><h1 style="color:white" > <b>On Duty</b></h1><center>
                            <div class="card-body">
                            <div class="ui form">
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                             <div class="fields">
                            <div class="field">
                             <label style="color: rgb(255,255,255);">Select an application number: </label>   <br />
                             <div class="ui selection dropdown">
                                    <input type="hidden" name="appnum" style="width:auto;">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Select Application Number</div>
                                    <div class="menu">
                                        <?php echo fill_appno($con);?>
                                    </div>
                                    </div>
                            </div>
                            </div>
                            <div class="field">
                                 <button type="submit" class="ui positive button" name="PROCEED" >Proceed</button>
                            </div>
                            </div>
                        </form>

                            </div>
                            </div>

                </div>
            </div>
 </center>
</div>

    <div class="whole">
        <br>
        <center>
            <div class="container" sytle="width:60%">
            <div class="ui large floating black message">
            <i class="close icon"></i>
            <div class="header">
                The Proof should satisfy these conditions:
            </div>
            <ul class="list">
                <li>Only PDFs are allowed for upload. If you have any other formats, please convert them to PDF. <a href="https://www.freepdfconvert.com/" target="_blank" class="alert-link">Click here to Convert</a></li>
                <li>The size must be less than 1 MB. You can convert it using this link. <a href="https://www.freepdfconvert.com/compress-pdf" target="_blank" class="alert-link">Click here to Compress</a></li>
            </ul>
            </div>
            </div>
            </center>
            <div class="page-wrapper p-t-10 p-b-100 font-poppins" >
            <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <center><br><br><h1 style="color:white" > <b>On Duty</b></h1><center>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-image">
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td>Application:</td>
                                        <td><div class="text text-success"><?php echo $appno;?></div></td>
                                    </tr>

                                    <tr>
                                        <td>Roll No: </td>
                                        <td><?php echo $odrow['regno'];?></td>

                                        </tr>
                                    <tr>
                                        <td>Name: </td>
                                        <td><?php echo $_SESSION['name']; ?></td>

                                    </tr>
                                    <tr>
                                        <td >Applied Date:&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp </td>
                                        <td><?php echo $odrow['appdate'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Od Date: </td>
                                    <td>From: &nbsp<?php echo $odrow['appdate'];?> <br>To &nbsp &nbsp : &nbsp   <?php echo $odrow['odto'];?></td></td>

                                    </tr>
                                    <tr>
                                        <td>No. of Hrs:</td><td><?php echo $odrow['hrs'];?></td>

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
                                        <td>College: </td>
                                        <td><?php echo $odrow['college'];?></td>
                                    </tr>
                                    <tr>
                                        <td>State: </td>
                                        <td><?php echo $odrow['state'];?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-3" style="margin-top:20px;">
            <center><br><h1 style="color:white"> <b>Submit Proof</b></h1><center>
                <div class="card-image">
                    <div class="card-body">
                        <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                            <div class="row" style="color: white; font-size: 16px; padding: 0px 0px 40px 0px;text-align: left">
                            <div class="ui form">
                            <h4 style="color: rgb(255,255,255);"> Awards Won : </h4><br/>
                            <div class="field">
                              <select class="ui dropdown" name="prize" style="width:auto;" required>
                                <option value="PARTICIPATION">Participation</option>
                                <option value="FIRST">First</option>
                                <option value="SECOND">Second</option>
                                <option value="THIRD">Third</option>
                                <option value="FOURTH">Fourth</option>
                                <option value="FIFTH">Fifth</option>
                                <option value="CONSOLATION">Consolation</option>
                              </select>
                        </div>
                      </div></div>
                        <div class="ui form">
                        <div class="field">
                        <label>Select the Certificate</label>
                        <div class="form-group">
                        <div class="input-group input-file" id="file" name="file">
                        <div class="ui fluid action input">
                            <input type="text" class="form-control" placeholder='Click here to Choose a Certificate...' required />
                            <button class="ui secondary button" type="button">Choose</button>
                        </div>
                        </div>
                        </div>
                        </div>
                            <div class="ui form">
                              <div class="two fields">
                                <div class="field">
                                <button type="submit" class="ui blue button" name="kipload">Submit & Upload</button>
                                </div>
                                <div class="field">
                                <button type="reset" class="ui negative button">Reset</button>
                            </div>
                          </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php
function fill_appno($con)
 {
    $output = '';
    $sql="SELECT O.appno from oddetails O inner JOIN preod PR on O.appno=PR.appno LEFT JOIN postod PO on PR.appno=PO.appno WHERE O.regno='{$_SESSION['uname']}' and PR.advisor='Approved' and O.`appno` not in (SELECT appno from postod)";
   // echo '<script>alert("'.$sql.'");</script>';
    $result = $con->query($sql);
    if($result->num_rows==0)
    {
        echo "<script>Notiflix.Report.Info('Info','You do not have any pending application eligible for Proof Submission','Okay',function(){window.location.replace('Status.php');});</script>";
    }
    while($row = $result->fetch_array())
    {
        $output.='<div class="item" data-value="'.$row['appno'].'">'.$row['appno'].'</div>';
    }
    return $output;
 }
?>


<?php
if(isset($_POST["kipload"]))
{
  //  echo '<script>alert("getting inside kipload");</script>';
    if(isset($_FILES['file']))
    {
        //echo '<script>alert("getting inside files");</script>';
        $sql="SELECT * FROM `registration` WHERE `regno` LIKE '{$_SESSION['uname']}'";
        $data=$con->query($sql);
        $row=$data->fetch_assoc();

        $sql1="SELECT * FROM `postod` WHERE `appno` like '{$_SESSION["appno"]}'";
        $data1=$con->query($sql1);
        if($data1->num_rows>0)
        {
            echo '<script>$(document).ready(function(){$("#modal1").modal("open");});</script>';
        }
        $filename=sprintf('%s_%s_%s%s.pdf',$row['regno'],$odrow['type'],strtoupper(date("dM_s",time())),rand(10,99));
        $targetfolder =sprintf('../repos/certificates/%s/%s/%s/%s',$row['batch'],$row['dept'],$row['sec'],$filename);
        $ok=1;
        $file_type=$_FILES['file']['type'];
        $file_size= $_FILES['file']['size'];
        if ($file_type=="application/pdf" && $file_size < 1010000 )     //2010000bytes = 2mb
        {
            if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
            {
                $sql4="INSERT INTO `postod` (`appno`, `prize`, `certificate`, `status`) VALUES ('{$_SESSION['appno']}', '{$_POST['prize']}', '$filename', 'Pending')";
                $data=$con->query($sql4);
                echo "<script>Notiflix.Report.Success('Proof Submitted Successfuly','The staff will verify and update the status. Wait Patiently','Okay',function(){window.location.replace('Status.php');});</script>";
                //echo "<script>location.reload();</script>";
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
                echo "<script> Notiflix.Report.Failue( 'Submisson Error', 'File size should be 1 MB max. <br> Please Compress and Submit.', 'Okay' );</script>";
            }
        }

    }
}
?>

<script>
    $(".dropdown-menu  a").click(function()
    {
        $(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
        $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
      });
</script>
<script>
    function bs_input_file() {
	$(".input-file").before(
		function() {
			if ( ! $(this).prev().hasClass('input-ghost') ) {
				var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
				element.attr("name",$(this).attr("name"));
				element.change(function(){
					element.next(element).find('input').val((element.val()).split('\\').pop());
				});
				$(this).find(".ui secondary button").click(function(){
					element.click();
				});
				$(this).find("button.btn-reset").click(function(){
					element.val(null);
					$(this).parents(".input-file").find('input').val('');
				});
				$(this).find('input').css("cursor","pointer");
				$(this).find('input').mousedown(function()
                {
					$(this).parents('.input-file').prev().click();
					return false;
				});
				return element;
			}
		}
	);
}
$(function() {
	bs_input_file();
});
</script>

</body>
</html>
