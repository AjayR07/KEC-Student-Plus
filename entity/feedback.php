<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Colorlib Templates" />
  <meta name="author" content="Colorlib" />
  <meta name="keywords" content="Colorlib Templates" />
  <link rel="stylesheet" href="../assets/Semantic/dist/semantic.min.css" type="text/css" />
  <link rel="stylesheet" href="../assets/animate.min.css" type="text/css" />
  <script src="../assets/jquery.min.js"></script>
  <script src="../assets/Semantic/dist/semantic.min.js"></script>
  <link rel="icon" type="image/png" href="../KEC.png">
  <title>Feedback Form</title>
  <script>
  $(document).ready(function(){
    $(".close.icon").on("click",function(){
      window.location.replace("../index.php");
    });
    $(".linkify.icon").on("click",function(){
      window.location.replace("https://forms.office.com/Pages/ResponsePage.aspx?id=DQSIkWdsW0yxEjajBLZtrQAAAAAAAAAAAAN__hxfHbFUOFNCUEFCVzQ1TERNTThDRVFFRk1FVzZJNi4u");
    });

  });
  </script>
</head>

<body class="animated pulse delay-2s">
  <style>
    body {
      background-image: url('../backlogout.jpg');
    }
  </style>
  <style> 
        body { 
            animation: fadeInAnimation ease 3s; 
            animation-iteration-count: 1; 
            animation-fill-mode: forwards; 
        } 
        @keyframes fadeInAnimation { 
            0% { 
                opacity: 0; 
            } 
            100% { 
                opacity: 1; 
            } 
        } 
    </style>
  <div class="ui raised very padded text container segment">
    <center>
     <div class="ui grid">
     <div class="two wide column"><div data-tooltip="Go to Original Feedback Page" data-inverted=""><i class="linkify icon"></i></div></div>
     <div class="twelve wide column"><h1 style="color:black" class="header">Feedback Form</h1></div>
     <div class="two wide column"><div data-tooltip="Return to Homepage" data-inverted=""><i class="close icon"></i><div></div>
     </div>
    </center><br>
    
    <iframe width="640px" height= "480px" src= "https://forms.office.com/Pages/ResponsePage.aspx?id=DQSIkWdsW0yxEjajBLZtrQAAAAAAAAAAAAN__hxfHbFUOFNCUEFCVzQ1TERNTThDRVFFRk1FVzZJNi4u&embed=true" frameborder= "0" marginwidth= "0" marginheight= "0" style= "border: none; max-width:100%; max-height:100vh" allowfullscreen webkitallowfullscreen mozallowfullscreen msallowfullscreen> </iframe>

  
  </div>
 
</body>


</html>
