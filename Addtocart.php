<?php
session_start();
include 'Database.php';

    if (isset($_POST['submit'])) {
        $a = new Database();
        $id = $_SESSION['id'];
        $produsID = $_POST['produsID'];
        $coscantitate = $_POST['coscantitate'];
        $cos=$a->getCos($produsID,$id);
        if($cos) {
            $a->update('cos',['cos_cantitate'=>$coscantitate],'cos_id');
        }
        else
        $a->insert('cos', ['cos_clientID' => $id, 'cos_produsID' => $produsID, 'cos_cantitate' => $coscantitate]);
        if($a==true)
        header('location:./cos.php');
        else
            echo 'Eroare';


    }



?>