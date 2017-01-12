<?php
//Connect to OI Database

$db_host = 'localhost';
$db_name = 'optique_india';
$db_user = 'root';
$db_pass = 'Rushabh1*';

//Create mysqli object

$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);
//Error Handler

if(mysqli_connect_errno()){
    echo ' This connection failed'.mysqli1_connect_errno();
    die();
    
}
?>
