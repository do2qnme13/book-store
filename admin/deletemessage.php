<?php
include('connection.php');
$q = "delete from messagelist where id='{$_GET['id']}'";

$con->query($q);
header('location: message.php');
?>