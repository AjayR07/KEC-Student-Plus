<?php
include('../db.php');
if (isset($_POST['oldpass'])) // Change Password in Staff nav
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
} else if ($_POST['regno']) // Suggestion Modal Back
{
    $regno = $_POST['regno'];
    $sql = "SELECT o.appno from registration r, oddetails o, preod p where (r.regno like '$regno') and 
        (r.regno like o.regno) and (o.appno like p.appno) and (p.advisor like 'Pending')";
    $data = $con->query($sql);
    $arr = array();
    if ($data->num_rows == 0) {
        array_push($arr, 0);
    } else {
        array_push($arr, $data->num_rows);
        while ($row = mysqli_fetch_array($data)) {
            array_push($arr, $row['o.appno']);
        }
    }
    echo $arr;
}
