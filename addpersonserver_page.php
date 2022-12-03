<?php

include("data_class.php");

$addnames=$_POST['addname'];
$addgrade=$_POST['addgrade'];
$addpass= $_POST['addpass'];
$addemail= $_POST['addemail'];
$type= $_POST['type'];
$gender= $_POST['gender'];
$picName = $_FILES['picture']['name'];
$picTmpname = $_FILES['picture']['tmp_name'];


$obj=new data();
$obj->setconnection();
$obj->addnewuser($addnames,$addgrade,$addpass,$addemail,$type,$gender,$picName,$picTmpname);
