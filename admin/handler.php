<?php
include_once('../db.php');
session_start();

if(isset($_POST["mail"]))
{
    global $con;

    $id=$_POST["id"];
    $name=$_POST["name"];
    $uname=$_POST["uname"];
    $pass=md5($_POST["pass"]);
    $mail=$_POST["mail"];
    $batch=$_POST["batch"];
    $sec=$_POST["section"];
    $design=$_POST["design"];
    $dept=$_POST["depart"];
    if(strcmp($design,"Advisor"))
    {
      $batch=="N/A";
      $sec=="N/A";
    }
    $ins="INSERT INTO `staff`(`staffid`,`name`,`userid`,`pass`,`mail`,`dept`,`batch`,`sec`,`designation`)VALUES('$id','$name','$uname','$pass','$mail','$dept','$batch','$sec','$design')";
    if($con->query($ins))
    {
      echo "Staff Record Added Successfully";
    }
    else
    {
      echo "Saving Staff Record Failed.Please try again.";
    }
  }


elseif(isset($_REQUEST["edit"]) &&$_REQUEST["edit"]==1)
    {
        global $con;
        $sid=$_REQUEST["id"];
        $sql="SELECT * FROM  `staff` where `userid` LIKE '$sid'";
        $result=$con->query($sql);
        $row = mysqli_fetch_array($result);
        echo json_encode($row);
    }
    elseif(isset($_REQUEST["delete"]) &&$_REQUEST["delete"]==1)
    {
        global $con;
        $sid=$_REQUEST["id"];
        $sql="DELETE FROM `staff` WHERE `staff`.`userid` LIKE  '$sid'";
        if($con->query($sql))
        {
          echo "Staff Record Deleted Successfully";
        }
    }


    elseif(isset($_REQUEST["updatedata"]) &&$_REQUEST["updatedata"]==1)
    {
        global $con;
        $jsonData=file_get_contents("php://input");
        $json=json_decode($jsonData);
        $staff=get_object_vars ($json );
        //echo $staff["name"];
        $id=$staff["id"];
        $name=$staff["name"];
        $uname=$staff['uname'];
        $pass=$staff["pass"];
        $mail=$staff["mail"];
        $batch=$staff["batch"];
        $sec=$staff["sec"];
        $design=$staff["design"];
        $dept=$staff["dept"];
        $sql="SELECT * from staff where staffid like '$id'";
        $data=$con->query($sql);
        $row=$data->fetch_assoc();
        if(strcmp($row['pass'],$pass)==0)
        {
          $update="UPDATE `staff` SET `staffid`='$id',`name`='$name',`mail`='$mail',`dept`='$dept',`batch`='$batch',`sec`='$sec',`designation`='$design' WHERE`userid` like '$uname' ";
        }
        else
        {
          $pass=md5($pass);
          $update="UPDATE `staff` SET `staffid`='$id',`name`='$name',`pass`='$pass',`mail`='$mail',`dept`='$dept',`batch`='$batch',`sec`='$sec',`designation`='$design' WHERE`userid` like '$uname' ";
        }
        if($con->query($update))
        {
          echo "Staff Record Updated Successfully";
        }
        else
        {
          echo "Problem updating the Staff Record.Please try again.";
        }
    }


?>
