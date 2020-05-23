<?php include_once('../db.php');
$regno="18CSR002";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Responsive</title>
  <link rel="stylesheet" href="../assets/Semantic/dist/semantic.min.css" type="text/css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../assets/Semantic/dist/semantic.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.button').popup();
    });
  </script>
</head>

<body>
<?php include_once('../assets/notiflix.php');?>
<?php
$a=0;
$d=0;
$o=0;
$p=0;
$sql="SELECT o.status as status, p.status1 as status1, p.status2 as status2, p.status3 as status3,p.advisor as advisor, c.status as othercert from registration r, oddetails o,preod p,othercert c where (r.regno like '$regno') and (r.regno like c.regno) and (r.regno like o.regno) and (o.appno like p.appno)";
echo '<script>alert("'.$sql.'")</script>';
$data=$con->query($sql);
if($data->num_rows==0)
{
    echo '<tr><td colspan="6">No Record Found</td></tr>';
}
else{
while ($row = mysqli_fetch_array($data))
{
    if($row['status']=='Approved' && $row['status1']=='Approved' && $row['status2']=='Approved' && $row['status3']=='Approved' && $row['advisor']=='Approved')
    { $a++; }
    else if($row['status']=='Declined' || $row['status1']=='Declined' || $row['status2']=='Declined' || $row['status3']=='Declined' || $row['advisor']=='Declined' || $row['othercert']=='Declined')
    { $d++; }
    else if($row['status']=='Pending' || $row['status1']=='Pending' || $row['status2']=='Pending' || $row['status3']=='Pending' || $row['advisor']=='Pending' || $row['othercert']=='Pending')
    { $p++; }
    else if($row['othercert']=='Approved')
    {
      $o++;
    }
}
}
//echo "<script>alert('".$a."'   '".$d."'  '".$p."' '".$o."');</script>";
echo $a;
echo '<br>';
echo $d;
echo '<br>';
echo $p;
echo '<br>';
echo $o;
echo '<br>';
?>
<div class="ui button">Show flowing popup</div>
<div class="ui flowing popup bottom left transition hidden" id="tool">
  <div class="header">
    KEC Student+ Profile
  </div>
<br>
<h3 class="content">
  Name: Abinash S<br><br>
  Phone: 8807973185<br><br>
  Mail Id: <i class="mail icon"></i><br><br>
  No. of OD's Applied: 7<br><br>
  No. of OD's Granted: 7<br><br>
  No. of OD's Rejected: 1<br><br>
  No. of Backlogs: NIL<br><br>

</h3>

  </div>
</div>

  </body>

</html>
