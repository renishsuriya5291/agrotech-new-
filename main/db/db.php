<?php
$server = "remotemysql.com";
$username = "0x3toku0DW";
$password = "rL2tFZwORu";
$database = "0x3toku0DW";

$con = mysqli_connect($server,$username,$password,$database);


if(!$con){
    die("Database connection error");
}


?>