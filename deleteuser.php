<?php
include("data_class.php");

$delteuser=$_GET['useriddelete'];


$obj=new data();
$obj->setconnection();
$obj->delteuserdata($delteuser);