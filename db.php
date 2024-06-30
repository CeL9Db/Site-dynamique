<?php

$servername = "localhost";
$nickname = "root";
$password = "root";
$dbname = "register";

$connection = mysqli_connect($servername, $nickname, $password, $dbname);

if(!$connection)
{
    die("Connection failed". mysqli_connect_error());
}
?>