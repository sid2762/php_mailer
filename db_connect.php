<!-- code to connect to database -->

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$username = "phpmyadmin";
$password = "893305";
$server = "localhost";
$database = "firstForm";

$con = mysqli_connect($server, $username, $password, $database);

if(!$con){
    die("Connection to this database failed due to ");

}
?>