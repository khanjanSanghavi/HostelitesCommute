<?php
session_start();

$id = $_SESSION['cid'];
require "hosteliteClass.php";
$obj = new db();
$r = $obj->deleteProfile($id);

if($r != 0){
    header("location:registration.html");
}else{
    echo "Error bruhhhh";
}

?>