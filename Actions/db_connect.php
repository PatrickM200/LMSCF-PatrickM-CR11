<?php

$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cr11_PatrickM_petadoption";

$connect = new  mysqli($localhost, $username, $password, $dbname);

if($connect->connect_error) {
    die("connection failed: " . $connect->connect_error);
}
?>