<?php

include("data_class.php");

$userid=$_GET['userid'];
$bookid=$_GET['bookid'];





$obj=new data();
$obj->setconnection();
$obj->requestbook($userid,$bookid);

?>