<?php
session_start();
if(!isset($_SESSION['developer']))
{
  header('Location: login.php');
}
include_once("../db.php");
include_once('./adminnav.php');
$msg="";
?>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="icon" type="image/png" href="../KEC.png">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.4/dist/semantic.min.css">
  <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.4/dist/semantic.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
<?php include_once('./adminnav.php'); ?>
  <style>
  body
  {
  font-family: 'Open Sans', sans-serif;
  background-image: url('../bgpic.jpg');
  }
  </style>

<?php
include_once('../assets/notiflix.php');
if(isset($_POST["execute"]))
{
  $sql=$_POST['text'];
  if($con->query($sql))
  {
    $num=$con->affected_rows;
    $msg='<br><div class="ui positive message"><i class="close icon"></i><div class="header">
        Query execution successful
      </div>
      <p style="text-align:center">'.$num.' rows affected</p>
    </div>';
  }
  else
  {
      $err=$con->error;
      $msg='<br><div class="ui negative message"><i class="close icon"></i><div class="header">
          Query execution failed
        </div>
        <p style="text-align:center">'.$err.'</p>
      </div>';

  }
}
 ?>
    <div class="ui raised segment" style="width:81%;padding: 2%;margin-top:5%;margin-left:3%">
          <form class="ui reply form" action="<?php echo$_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="field">
                  <textarea id="text" name="text" required></textarea>
                </div>

                <button type="submit" name="execute" class="ui  primary submit labeled  icon button">
                  <i class="icon edit"></i> Execute
                </button>
          </form>
          <div id="info" name="info">
            <?php echo $msg;?>
          </div>
          <div class="ui right close rail">
              <div class="ui  raised compact segment">
                  <a class="ui blue ribbon label">Tables</a>
                  <div class="ui middle aligned animated list">
                        <?php
                        $res=$con->query("SHOW TABLES");
                        while($row = mysqli_fetch_assoc($res))
                        {
                          echo '<div class="item" style="padding-top:8px">
                                  <div class="content">
                                    <div class="header" style="font-size:18px"><i class="table icon" style=" color:blue"></i>'.$row["Tables_in_student"].'</div></div></div>';
                        }
                        ?>
                        <br></br>
                  <!-- <a href="schema.html" target="_blank">    -->
                   <button class="ui primary button" onclick="window.open('schema.php','_blank');">
                            <i class="eye icon"></i>
                            View Schema
                        </button>
                        <!-- </a> -->
                  </div>
              </div>
          </div>
      </div>
</body>
</html>
