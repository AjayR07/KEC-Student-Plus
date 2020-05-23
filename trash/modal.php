<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <!-- Title Page-->
    <title>OD Permission</title>
    <!-- Icons font CSS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../assets/Notiflix/Minified/notiflix-2.1.2.min.js"></script>
<link rel="stylesheet" href="../assets/Notiflix/Minified/notiflix-2.1.2.min.css">
</head>
<body>
<script type="text/javascript">
   Notiflix.Notify.Init({ borderRadius:"20px",closeButton:true, timeout:300});
    </script>
<?php
function modalopen($msg)
{
    echo "<script>Notiflix.Notify.Success('Sol lucet omnibus');</script>";
}
modalopen('Hi');
?>
</body>
</html>
