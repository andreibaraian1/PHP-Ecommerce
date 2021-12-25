<?php
include 'Database.php';

$id = $_GET['id'];

$a = new Database();
$a->delete('cos',"cos_id='$id'");
header('location:cos.php');
?>