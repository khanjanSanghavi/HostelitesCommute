<?php

$rideid = $_GET['key_id'];

include "hosteliteClass.php";
$obj = new db();
$r = $obj->delete_ride($rideid);

if($r != 0)
{
    header("location:Dashboard.php");
}

?>