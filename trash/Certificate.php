<?php
session_start();
include_once('../db.php');
?>


<?php
function fill_appno($con)
 {
    $output = '';
    $sql="SELECT O.appno from oddetails O inner JOIN preod PR on O.appno=PR.appno LEFT JOIN postod PO on PR.appno=PO.appno WHERE O.regno='{$_SESSION['uname']}' and PR.advisor='ACCEPTED' and PO.`certificate` IS NULL";
    $result = $con->query($sql);

    while($row = $result->fetch_array())
    {
        $output.='<option value="'.$row['appno'].'">'.$row['appno'].'</option>';
    }
    return $output;
 }
?>

<?php
if(isset($_POST['PROCEED']))
{
    $appno =$_POST['appnum'];
    $appno='18CSE002230339';
    $_SESSION['appno']=$appno;
    $sql="SELECT * FROM oddetails where appno LIKE '$appno'";
    $result = $con->query($sql);
    $odrow = $result->fetch_array();

    echo  '<script type="text/javascript">
    $(document).ready(function(){
        $("#myModalStart").modal("hide");
    });</script>';

  //  echo '<script type="text/javascript">$(document).ready(function(){$(".wrapper wrapper--w780").show();});</script>';
}

if(!isset($_POST['PROCEED']))
{

  //  echo '<script type="text/javascript">$(document).ready(function(){$("#myModalStart").modal("show");});</script>';
}
?>

<?php
        function modal($msg,$loc,$butn,$btnmsg)
        {
             echo  '<script type="text/javascript">
              $(document).ready(function(){
                  $("#myModal").modal("show");
              });</script>';
              echo '<script>
              function logout()
              {
                     location.href="'.$loc.'"
              }</script>';
echo '<div class="modal fade" id="myModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle">KEC Student+</h2>
        <button type="button" class="close" onclick="logout()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        '.$msg.'
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-'.$butn.'" onclick="logout()">'.$btnmsg.'</button>
      </div>
    </div>
  </div>
</div> ';
        }
        ?>

<?php
if(isset($_POST["upload"]))
{
    if(isset($_FILES['file']))
    {
        $sql="SELECT * FROM `registration` WHERE `regno` LIKE '{$_SESSION['uname']}'";
        $data=$con->query($sql);
        $row=$data->fetch_assoc();
        $filename=sprintf('%s_%s%s.pdf',$row['regno'],date("dM_s",time()),rand(10,100));

        $targetfolder =sprintf('../repos/certificates/%s/%s/%s/%s',$row['batch'],$row['dept'],$row['sec'],$filename);
        $ok=1;
        $file_type=$_FILES['file']['type'];
        $file_size= $_FILES['file']['size'];
        if ($file_type=="application/pdf" && $file_size < 2010000 )     //2010000bytes = 2mb
        {
            if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
            {
                $sql4="INSERT INTO `postod` (`appno`, `prize`, `certificate`, `status`) VALUES ('{$_SESSION['appno']}', '{$_POST['prize']}', '$filename', '')";
                $data=$con->query($sql4);
                echo '<script>alert("File Uploaded")</script>';
            }
            else
            {
                modal("Problem Uploading the File","try3.php","danger","Retry");
            }
        }
        else
        {
            if ($file_type!="application/pdf" )
            {
                modal("You may only upload PDFs.","try3.php","danger","Retry");
            }
            if($file_size > 2010000)
            {
                modal("PDF size exceeds Max limit 2MB.","try3.php","danger","Retry");
            }
        }

    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Title Page-->
    <title>OD Permission</title>
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="css/main.css" rel="stylesheet" media="all">
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
   <!-- The Modal -->
   <div class="modal fade" id="myModalStart">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <div class="modal-dialog modal-dialog-centered" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">On Duty</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">

                        <h4 style="color: rgb(33,37,41);"> Application Number : </h4>   <br /><br />
                    <select class="form-control" name="appnum" style="width:auto;">
                                <option class="hidden" selected disabled required > Choose your Application</option>
                                <?php echo fill_appno($con);?>
                            </select>
                         </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-rounded" name="PROCEED" >Proceed</button>
                        <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins" >
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <center><br><br><br><h1 class="title" > <b>On Duty</b></h1><center>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-12" style="margin-top: 10px;">
                        <div class="card-image">
                            <div class="card-body">

                                <table>
                                    <tr>
                                        <td>Application:</td>
                                        <td><?php echo $appno;?></td>
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


            <div class="card card-3" style="margin-top:30px;">
                <div class="card-image">
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                            <div class="row" style="color: white; font-size: 16px; padding: 0px 0px 50px 0px;text-align: left">
                            <div class="form-group">
                        <h4 style="color: rgb(33,37,41);"> Prize Won : </h4>   <br /><br />
                    <select class="form-control" name="prize" style="width:auto;">
                                <option class="hidden" selected disabled required > Choose your Award</option>
                                                <option value="First">First</option>
                                                <option value="Second">Second</option>
                                                <option value="Third">Third</option>
                                                <option value="Consolation">Consolation</option>
                                                <option value="Participation">Participation</option>
                            </select>
                         </div>
                            </div>

                            <p>Evidence Attachment:<span> &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp<span></p>
                            <div class="form-group">
                                <div class="input-group input-file" name="file">
                                    <input type="text" class="form-control" placeholder='Choose a Certificate...' />
                                    <span class="input-group-btn">
                                        <button class="btn btn-default btn-choose" type="button">Choose</button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-right" name="upload">Submit & Upload</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>




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
				$(this).find("button.btn-choose").click(function(){
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
<script type="text/javascript">
        $(window).on('load',function()
        {
            $('#myModalStart').modal('show');

        });
    </script>

</body>
</html>
