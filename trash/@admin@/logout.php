<?php
    session_start();
?>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <link rel="icon" type="image/png" href="KEC.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body bgcolor="black">
<?php
function modal()
{
     echo  '<script type="text/javascript">
      $(document).ready(function(){
          $("#myModal").modal("show");
          $("#myModal").click(function(){
            $("#myModal").modal({
              keyboard: false
          });
          });
      });</script>'; 
      echo '<script>
      function logout()
      {
             location.href="http://localhost/test1/";
      }</script>';      
echo '<div class="modal fade" id="myModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h3 class="modal-title" id="exampleModalLongTitle">KEC Student+</h3>
<button type="button" class="close" onclick="logout()" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<center>Successfuly Logged Out!</center>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-info" onclick="logout()"> Okay!</button>
</div>
</div>
</div>
</div> ';
}
if(isset($_SESSION['uname']))
{
    modal();
    session_destroy();
	session_unset();
    
}
else{
    modal();
    session_destroy();
    session_unset();
    
   
}
?>
</body>
</html>