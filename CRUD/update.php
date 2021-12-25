<?php
include '../Database.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $categorie = $_POST['categorie'];
    $descriere = $_POST['descriere'];
    $a = new Database();
    $a->update('produse',['produs_nume'=>$name,'produs_pret'=>$price,'produs_img'=>$img,'produs_categ'=>$categorie,'produs_descriere'=>$descriere] ,"produs_id='$id'");
    if ($a == true) {
        header('location:../products.php');
    }
}
?>>