<?php

$con= new mysqli("localhost:3306","admin_abinash","K6qq%6b3xwKObrxd","student");
    if ($con->connect_error)
    {
        die("Connection failed: " . $con->connect_error);
    }

?>