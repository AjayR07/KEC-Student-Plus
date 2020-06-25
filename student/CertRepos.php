<?php
    session_start();
    if(!isset($_SESSION['uname']))
    {
        header("location: ../studLog.php");
    }
    $register=$_SESSION['uname'];

    include_once('../db.php');
    include_once('../assets/notiflix.php');

    $sql1="SELECT R.batch,R.sec,R.dept from registration R where `regno` like '$register'";

    $row = mysqli_fetch_array($con->query($sql1));
    $batch=$row['batch'];
    $dept=$row['dept'];
    $sec=$row['sec'];

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../KEC.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate Repository</title>
    <style>
        .pusher{
        height: 100%;
        background-size: cover ;
        font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>

<div class="pusher" background="../backlogout.jpg">
    <?php require_once('studentnav.php'); include_once('../assets/notiflix.php');?>
    <br><br>

  

    
<h1 align="center" style="color:bisque;">Your Achievements</h1> <br>
<div class="segment" style="padding:2%;">
    <table class="ui selectable inverted table" >

      <thead>
          <tr >
              <th>S.No.</th>
              <th>Date</th>
              <th>Event Category</th>
              <th>Title</th>
              <th>College</th>
              <th>Prize Won</th>
              <th style="text-align:center">Certificate</th>
          </tr>
      </thead>

      <tbody>
          <?php
                $i=1;
                $sql="SELECT OD.odfrom,OD.odtype,OD.title,OD.college,PO.prize,PO.certificate from oddetails OD INNER JOIN postod PO on OD.appno=PO.appno where `regno` like '$register' AND OD.status LIKE 'Approved' ORDER BY OD.odfrom Desc";
                $dat=$con->query($sql);
                $row1_cnt = $dat->num_rows;
                $sql2="SELECT O.start,O.type,O.title,O.cname,O.file from othercert O where `regno` like '$register' AND O.status LIKE 'Approved' ORDER BY O.start DESC";
                $data=$con->query($sql2);
                if($row1_cnt == 0)
                {
                  if($data->num_rows==0)
                  {
                  echo '<td colspan="7"><center>No Records Found</center></td>';
                  echo 'Notiflix.Report.Info("No Certificates Found","You have not submitted any certificates yet. ","Close")';
                //   header("location: PreOdForm.php");
                //   exit();
                  }
                }
                if($row1_cnt>0)
                {
                while ($row = mysqli_fetch_array($dat))
                {
                  $url=sprintf("../repos/certificates/%s/%s/%s/%s",$batch,$dept,$sec,$row['certificate']);

                  //  $filename=$row["odtype"].$row["title"].'pdf';
                  $filename=$row["title"].'.pdf';
                  echo "<tr>";
                  echo '<td>'.$i++.'</td>';
                  echo "<td>".date_format(date_create($row["odfrom"]),"d/m/Y")."</td>";
                  echo "<td>".$row["odtype"]."</td>";
                  echo '<td>'.$row["title"].'</td>';
                  echo '<td>'.$row["college"].'</td>';
                  echo '<td>'.$row["prize"].'</td>';
                  echo '<td style="text-align:center">

                  <div class="ui buttons">
                  <a href='.$url.' target="_blank" ><button class="ui button" id="Preview" data-content="This may not work on some Systems" data-variation="inverted" data-position="top center">Preview</button></a>
                  <div class="or"></div>
                  <a href='.$url.' download='.$filename.'><button class="ui positive button" id="Download" data-content="Click to download PDF" data-variation="inverted" data-position="top center">Download</button></a>

                  </div></td>';
                  echo "</tr>";

                }}
                if($data->num_rows>0)
                {
                while ($row = mysqli_fetch_array($data))
                {
                    $url=sprintf("https://docs.google.com/viewerng/viewer?url=https://kecstudent.xyz/repos/certificates/%s/%s/%s/%s",$batch,$dept,$sec,$row['file']);
                    $url1=sprintf("../repos/certificates/%s/%s/%s/%s",$batch,$dept,$sec,$row['file']);
                  //  $filename=$row["odtype"].$row["title"].'pdf';
                  $filename=$row["title"].'.pdf';
                    echo "<tr>";
                    echo '<td>'.$i++.'</td>';
                    echo "<td>".date_format(date_create($row['start']),'d/m/Y')."</td>";
                    echo "<td>".$row["type"]."</td>";
                    echo '<td>'.$row["title"].'</td>';
                    echo '<td>'.$row["cname"].'</td>';
                    echo '<td>'.'Not Applicable'.'</td>';
                    echo '<td style="text-align:center">

                    <div class="ui buttons">
                      <a href='.$url.' target="_blank" ><button class="ui button" id="Preview" data-content="This may not work on some Systems" data-variation="inverted" data-position="top center">Preview</button></a>
                        <div class="or"></div>
                    <a href='.$url1.' download='.$filename.'><button class="ui positive button" id="Download" data-content="Click to download PDF" data-variation="inverted" data-position="top center">Download</button></a>

                    </div></td>';
                  echo "</tr>";
                  //echo  date_format(date_create($row["odfrom"]),"d-m-Y");

                }}
              

                $con->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <script>
          $(document).ready(function(){
            $('.ui.dropdown').dropdown('show');
            $('#Preview').popup();
            $('#Download').popup();
          });
    </script>
    <script src="../assets/Fomantic/dist/semantic.min.js"></script>
</body>
</html>
