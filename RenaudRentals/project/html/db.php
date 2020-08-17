<?php
$hn ='localhost';
$db='renau121_RenaudRentals';
$un='renau121_RenaudRentals';
$pw='helloworld';
$connect=new mysqli($hn,$un,$pw,$db);
if($connect->connect_error)die($connect->connect_error);
?>