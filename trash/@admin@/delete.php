<?php
session_start();
if(!isset($_SESSION['kecadmin']))
{
    header("Location:login.php");
}?>
<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM staff WHERE StaffID=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: http://localhost/test1/@admin@/index.php");
}