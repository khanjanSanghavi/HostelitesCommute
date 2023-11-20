<?php
session_start();
$userId = $_SESSION['cid'];
require 'hosteliteClass.php';
$obj = new db();

$destination = $_POST["destination"];
$date = $_POST["date"];
$time = $_POST["time"];
$passengers = $_POST["passengers"];

$r = $obj->addRide($userId, $destination, $date, $time, $passengers);

if($r != 0){
    header("location:Dashboard.php");
}else{
    echo "hattt bccc";
}

?>
