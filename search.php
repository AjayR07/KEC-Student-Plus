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

    $a=0;
    $d=0;
    $o=0;
    $p=0;
    $total=0;

    if($Roll!=="")
    {
        $sql="select * from `registration` where `regno` like '$Roll'";
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
            $sql1="SELECT * from registration where `regno` like '$Roll'";

            $temp=($con->query($sql1))->fetch_assoc();
            $sql2="SELECT o.status as status, p.status1 as status1, p.status2 as status2, p.status3 as status3,p.advisor as advisor from registration r, oddetails o,preod p where (r.regno like '$Roll') and (r.regno like o.regno) and (o.appno like p.appno)";
            //echo '<script>alert("'.$sql.'")</script>';
            $sql3="SELECT c.status as othercert from othercert c where c.regno like '$Roll'";
            $data=$con->query($sql2);
            if($data->num_rows==0)
            {}
            else{
            while ($row = mysqli_fetch_array($data))
            {
                if($row['status']=='Approved' && $row['status1']=='Approved' && $row['status2']=='Approved' && $row['status3']=='Approved' && $row['advisor']=='Approved')
                { $a++; }
                else if($row['status']=='Declined' || $row['status1']=='Declined' || $row['status2']=='Declined' || $row['status3']=='Declined' || $row['advisor']=='Declined')
                { $d++; }
                else if($row['status']=='Pending' || $row['status1']=='Pending' || $row['status2']=='Pending' || $row['status3']=='Pending' || $row['advisor']=='Pending')
                { $p++; }

            }
            }
            $data=$con->query($sql3);
            $a=$a+$data->num_rows;
            if($data->num_rows==0)
            {}
            else{
            while ($row = mysqli_fetch_array($data))
            {
                    if($row['othercert']=='Approved')
                    {
                      $o++;
                    }
                    else if($row['othercert']=='Declined')
                    {
                      $d++;
                    }
                    else if($row['othercert']=='Pending')
                    {
                      $p++;
                    }
            }
            $total=$p+$a+$d;
            }
        }
        else{
            $Status="NOT FOUND";
        }
    }
$result=array("$Mail","$batch","$Dept","$Sec","$Name","$phone","$Status","$total","$p","$a","$d","$o","$Roll");
$myJSON=json_encode($result);
echo $myJSON;
?>