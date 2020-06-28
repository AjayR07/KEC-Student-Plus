

<?php
    session_start();
    include_once("../db.php");
    $register=$_SESSION['uname'];
    $sql1="SELECT R.batch,R.sec,R.dept from registration R where `regno` like '$register'";
    $row = mysqli_fetch_array($con->query($sql1));
    $batch=$row['batch'];
    $dept=$row['dept'];
    $sec=$row['sec'];


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
    
?>