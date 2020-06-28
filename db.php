<?php
$con= new mysqli("localhost","root","","student");
if ($con->connect_error)
{
    $con= new mysqli("localhost","root","","student");
    if ($con->connect_error)
    {
        die("Connection failed: " . $con->connect_error);
    }
}
?>

