<?php
$con= new mysqli("localhost:3308","root","","student");
        if ($con->connect_error) 
        {
            die("Connection failed: " . $con->connect_error);
        }
?>