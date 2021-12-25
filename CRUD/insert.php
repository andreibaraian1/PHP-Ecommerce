<?php
include '../Database.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $categorie = $_POST['categorie'];
    $descriere = $_POST['descriere'];
    $a = new Database();
    $a->insert('produse',['produs_nume'=>$name,'produs_pret'=>$price,'produs_img'=>$img,'produs_categ'=>$categorie,'produs_descriere'=>$descriere]);
    if ($a == true) {
        header('location:../products.php');
    }
    else
        echo 'Eroare';
}
?>