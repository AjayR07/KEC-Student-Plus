<?php
session_start();
if(!isset($_SESSION['kecadmin']))
{
    header("Location: ./login.php");
}
else
{
    //$staff=$_SESSION['user'];
    include_once('adminnav.php');
    include_once('../assets/notiflix.php');
}
?>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../KEC.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.4/semantic.min.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.4/semantic.min.js"></script>
<script>
      $(document).ready(function(){
        $('.ui.dropdown').dropdown('show');});
</script>

<style>
body,.root{
background: url('../backstaff.jpg');
background-size: cover ;
font-family: 'Open Sans', sans-serif;
}
.landpage-image{
    background-image: url('../backstaff.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
}
.css{
  top-margin: 15%;
  bottom-margin:15%;
}

</style>
<title>Class Info</title>

</head>
<body>
<?php require_once('adminnav.php'); include_once('../assets/notiflix.php');?><br><br>
<style>
body,.root{
background: url('../bgpic.jpg');
background-size: cover ;
font-family: 'Open Sans', sans-serif;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.4/semantic.min.js"></script>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<div class="css">
<div class="ui container">
<div class="ui segment landpage-image">
     <br>
     <center><h1 class="ui header">
        <i class="info circle icon"></i>
        <div class="content">
            Data Download
            <div class="sub header">Download Class Data</div>
        </div>
        </h1>
</center><br><br>
        <div class="ui form">
        <center><div class="three fields">
                <div class="ui field">
                <label>Select Batch:</label>
             <select class="ui search dropdown" id="batch" name="batch" required>
                 <option selected disabled>Select Batch</option>
                 <option value="2017">2017</option>
                 <option value="2018">2018</option>
                 <option value="2019">2019</option>

             </select>
              </div>
              <div class="ui field">
              <label>Select Department:</label>
             <select class="ui search dropdown" id="dep" name="dep" required>
                 <option selected disabled>Select Department</option>
                 <option value="CSE">CSE</option>
                 <option value="IT">IT</option>
                 <option value="ECE">ECE</option>

             </select>
              </div>
              <div class="ui field">
                  <label>Select Section:</label>
             <select class="ui search dropdown" id="sec" name="sec" required>
                 <option selected disabled>Select Section</option>
                 <option value="A">A</option>
                 <option value="B">B</option>
                 <option value="C">C</option>
                 <option value="D">D</option>
                 <option value="NA">No Section</option>
             </select>
              </div>
            </div></center>
           <center>  <br><button type="submit" class="ui positive button" value="submit">Download File</button></center>
        </div>

</div>
</div>
</div>
<br><br>
</form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['batch'])&&isset($_POST['dep'])&&isset($_POST['sec']))
    {
    $filename="";
    $batch=$_POST['batch'];
    $dep=$_POST['dep'];
    $sec=$_POST['sec'];
    $file=$batch.$dep.$sec;
    $filename.=$sec.'.xlsx';
    $filepath='../ClassInfo/'.$batch.'/'.$dep.'/'.$filename;
    //echo '<script>alert("'.$filepath.'");</script>';
    if(file_exists("$filepath"))
    {
        echo '<p hidden><a class="button" href="'.$filepath.'" id="down" download="'.$file.'">Download</a></p>';
        echo '<script>document.getElementById("down").click()</script>';
        echo '<script>
        $(document).ready(function () {
          $("body").toast({
            class: "success",
            title: "File Download Successful",
            message: "Please download the file and save in appropriate location!",
            showProgress: "top",
            progressUp: true,
          });
        });
      </script>';
    }
    else{
        echo '<script>
        $(document).ready(function () {
          $("body").toast({
            class: "error",
            title: "File Not Found",
            message: "We will try to add them soon!",
            showProgress: "top",
            progressUp: true,
          });
        });
      </script>';
    }
    }
    else
    {
        echo '<script>
        $(document).ready(function () {
          $("body").toast({
            class: "warning",
            title: "Select all Fields",
            message: "Select all the fields to fetch the file",
            showProgress: "top",
            progressUp: true,
          });
        });
      </script>';
    }

}
?>

</body>
</html>
