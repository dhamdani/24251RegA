<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "kasirku";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn){
        die("Connection Failed:".mysqli_connect_error());
    }
    
date_default_timezone_set('Asia/Jakarta');   

$db['host'] = "localhost"; //host
$db['user'] = "root"; //username database
$db['pass'] = ""; //password database
$db['name'] = "kasirku"; //nama database
$config = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']);



?>