

<?php
    //                =============================================================          
    //                 Ajax handler PHP [SERVER] scripts for all student side page
    //                =============================================================


    // Basic Student Details for all the page
    session_start();
    include_once("../db.php");
    $register=$_SESSION['uname'];
    $sql1="SELECT R.batch,R.sec,R.dept from registration R where `regno` like '$register'";
    $row = mysqli_fetch_array($con->query($sql1));
    $batch=$row['batch'];
    $dept=$row['dept'];
    $sec=$row['sec'];
    
    // Basic Student Details for all the page 




    // Server script for NonCertOd.php page  ==>  LocalOD
    if(isset($_POST["noncertod"])&&($_POST["noncertod"]=="submitted"))
    {
        $temp1=$batch%2000;
        $temp2=$dept;
        $temp3=substr($register,5);
        $appno="NC".strval($temp1).strval($temp2).strval($temp3).strval(date('d')).strval(date('m')).strval(rand(10,99));
        $appdate=date('Y-m-d');
        $appfacty=$_POST["faculty"];
        $event=$_POST["event"];

        $from = str_replace('/', '-',$_POST['odStart']);
        $start =date('Y-m-d', strtotime($from));
        $to = str_replace('/', '-',$_POST['odEnd']);
        $end =date('Y-m-d', strtotime($to));
        $n=floor((strtotime($to)-strtotime($from))/86400)+1;
        $sql="insert into noncertod values('$appno','$register','$appdate','NA','$appfacty','$event','$start','$end',$n,'Pending','Pending')";
        if(!$con->query($sql))
        {
            exit();
        }
        for ($i = 1; $i <= $n; $i++)
        {   
            $s="day".strval($i)."hour";      
            $hrs=implode(",",$_POST[$s]);
            $cnt=count($_POST[$s]);
            
            $s="day".strval($i)."reason";      
            $reason=$_POST[$s];
            $sql="insert into noncertinfo values('$appno',$i,'$hrs','$reason',$cnt)";

            if(!$con->query($sql))
            {
                $res=$con->query("DELETE FROM `noncertod` WHERE `appno` LIKE '$appno'");
                
                exit();
            }
        }
        echo "Success";

        exit();

    }
    // Server script for NonCertOd.php page  ==>  LocalOD  ==> @AjayR07


    // Server script for PreOdForm.php page  ==>  PreOD Form   
    if(isset($_POST["preod"])&&($_POST["preod"]=="submitted"))
    {
        $appdate=date('Y-m-d');
        $from = str_replace('/', '-',$_POST['odfrom']);
        $odfrom = date('Y-m-d', strtotime($from));
        $to = str_replace('/', '-',$_POST['odto']);
        $odto = date('Y-m-d', strtotime($to));
        $hrs=$_POST['hrs'];
        $type=$_POST['odtype'];
        if(strlen($_POST['odtypeother'])>0)
            $type=$_POST['odtypeother'];

        $college=$_POST['college'];
        $state=$_POST['state'];
        $title=$_POST['title'];
        $purpose=$_POST['purpose'];
        $temp1=$batch%2000;
        $temp2=$dept;
        $temp3=substr($register,5);
        $temp4=date('d');
        $temp5=date('m');
        $temp6=rand(10,99);
        $appno=strval($temp1).strval($temp2).strval($temp3).strval($temp4).strval($temp5).strval($temp6);
        $sql="INSERT into oddetails values('$appno','$register','$appdate','$type','$title','$odfrom','$odto','$hrs','$college','$state','$purpose','Pending')";
        $con->query($sql);
        if($type!='PAPER' && $type!='PROJECT')
        {
            $sql="INSERT INTO preod (appno,staff1,comments1,status1,staff2,comments2,status2,staff3,comments3,status3) VALUES ('$appno','NA','NA','Approved','NA','NA','Approved','NA','NA','Approved')";
            $con->query($sql);
        }
        else
        {
            $sql="INSERT into preod (appno) values ('$appno')";
            $con->query($sql);
        }
            
        $_SESSION['appno']=$appno;
        echo "ok";
        exit();
    }
    // Server script for PreOdForm.php page  ==>  PreOD Form  ==> @AjayR07
    
?>