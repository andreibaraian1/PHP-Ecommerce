<?php
include '../Database.php';

$id = $_GET['id'];
$a = new Database();
$a->delete('produse',"produs_id='$id'");
header('location:../products.php');
?>
