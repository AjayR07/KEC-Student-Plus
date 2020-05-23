<?php
$dsn = 'mysql:host=localhost;dbname=regist';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
 
}