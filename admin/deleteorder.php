<?php
include("connection.php"); 
$q = "delete from orderlist where id='{$_GET['id']}'";
$con->query($q);
header('location: order.php');

?>