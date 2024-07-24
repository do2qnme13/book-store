<?php
include("connection.php"); 
$q = "delete from allgenre where id='{$_GET['id']}'";
$con->query($q);
unlink("img/".$_GET['img']);
header('location: booklist.php');

?>