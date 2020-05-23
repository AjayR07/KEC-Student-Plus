<?php
    include_once('db.php');
    $Roll=$_GET['roll'];
    $Mail='';
    $batch='';
    $Dept='';
    $Sec='';
    $Name='';
    $phone='';
    $Status='';
    if($Roll!=="")
    {
        $sql="select * from `getdetails` where `rollno` like '$Roll'";
        $data=$con->query($sql);
        if($data->num_rows!=0){
        $row=$data->fetch_assoc();
        $Mail=$row['mail'];
        $phone=$row['phone'];
        $batch=$row['batch'];
        $Dept=$row['dept'];
        $Sec=$row['sec'];
        $Name=$row['name'];
        $Status="FOUND";
        }
        else{
            $Status="NOT FOUND";
        }
    }
$result=array("$Mail","$batch","$Dept","$Sec","$Name","$phone","$Status");
$myJSON=json_encode($result);


echo $myJSON;
   
 

?>