<?php
include('../db.php');

    // Change Password For Staffs   => Modal  => @s-abinash  
    if (isset($_POST['oldpass'])) 
    {
        $old = sha1($_POST["oldpass"], false);
        $new = sha1($_POST["newpass"], false);
        $staffid = $_POST["staffid"];
        $sql = "SELECT * from staff where staffid like '$staffid'";
        $data = $con->query($sql);
        $row = $data->fetch_assoc();
        if ($row['pass'] != $old) {
            echo 'Old password is not correct';
        } else {
            $sql = "UPDATE `staff` set `pass`='$new', `status`='Changed' WHERE `staffid` like '$staffid'";
            $con->query($sql);
            echo 'Password Changed Succefully';
        }
    } 

    // Suggestion Modal Back  =>Modal  => @s-abinash
    else if (isset($_POST["regno"])) 
    {
        $regno = $_POST['regno'];
        $sql = "SELECT o.appno from registration r, oddetails o, preod p where (r.regno like '$regno') and 
            (r.regno like o.regno) and (o.appno like p.appno) and (p.staff3 is null) and (p.advisor like 'Pending')";
        $data = $con->query($sql);
        $arr = array();
        if ($data->num_rows == 0) {
            array_push($arr, 0);
        } else {
            array_push($arr, $data->num_rows);
            while ($row = mysqli_fetch_array($data)) {
                array_push($arr, $row['appno']);
            }
        }
        echo json_encode($arr);
        exit();
    }


    // Edit OD Application => EditApplication.php => @AjayR07

    else if(isset($_POST["editApp"]))
    {
        $appno=$_POST['e_appno'];
        $d = str_replace('/', '-',$_POST['e_date']);
        $appdate = date('Y-m-d', strtotime($d));
        $from = str_replace('/', '-',$_POST['e_start']);
        $odfrom = date('Y-m-d', strtotime($from));
        $to = str_replace('/', '-',$_POST['e_end']);
        $odto = date('Y-m-d', strtotime($to));
        $hrs=$_POST['e_hrs'];
        $apptype=$_POST['odtype'];
        $type=$_POST['e_type'];
        $college=$_POST['e_college'];
        $state=$_POST['e_state'];
        $title=$_POST['e_title'];
        if($apptype=="OD")
        {
            $sql="UPDATE `oddetails` SET `appdate`='$appdate' , `odfrom`='$odfrom',`odto`='$odto',`odtype`='$type',`hrs`='$hrs',`title`='$title',`college`='$college', `state`= '$state' WHERE `appno` like '$appno'";
            if($con->query($sql))
            {
 
                if($_POST["pageFrom"]=='Post OD Approve')
                {

                    $reward=$_POST["e_reward"];
                    $sql="UPDATE `postod` SET `prize`='$reward'  WHERE `appno` like '$appno'";
                    if($con->query($sql))
                    {
                        echo "Updated Successfully";
                        exit();
                    }

                }
                echo "Updated Successfully";
                exit();
            }
        }
        else if($apptype=="CR")
        {
            $sql="UPDATE `othercert` SET `appdate`='$appdate' , `start`='$odfrom',`end`='$odto',`type`='$type',`days`='$hrs',`title`='$title',`cname`='$college', `state`= '$state' WHERE `appno` like '$appno'";
            if($con->query($sql))
            {
                echo "Updated Successfully";
                exit();
            }
        }

        exit();
    }
    
?>

