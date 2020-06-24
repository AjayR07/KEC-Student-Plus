<?php
include('../db.php');
    if(isset($_POST['oldpass']))
    {
        $old=sha1($_POST["oldpass"],false);
        $new=sha1($_POST["newpass"],false);
        $staffid=$_POST["staffid"];
        $sql="SELECT * from staff where staffid like '$staffid'";
        $data=$con->query($sql);
        $row=$data->fetch_assoc();
        if($row['pass']!=$old)
        {
            echo 'Old password is not correct';
        }
        else
        {
          $sql="UPDATE `staff` set `pass`='$new', `status`='Changed' WHERE `staffid` like '$staffid'";
          $con->query($sql);
          echo 'Password Changed Succefully';
        }
    }
?>