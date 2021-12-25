<?php
include 'Produs.php';
session_start();
include 'Database.php';

if (isset($_POST['submit'])) {
    $id=$_SESSION['id'];
    $p = $_SESSION['productarray'];
    $total = $_SESSION['total'];
    $adresa = $_POST['adresa'];
    $tojson= json_encode($p);
    $a = new Database();
    $a->insert('ordin',['ordin_produse'=>$tojson,'ordin_client_id'=>$id,'ordin_total'=>$total,'ordin_adresa'=>$adresa]);
        if ($a == true) {
            echo 'Comanda a fost plasata!';
            ?>
              <td><a href="home.php" type="text">Mergeti inapoi la home</a></td>
    <?php
        }
        else
            echo 'Eroare';
//    $a = new Database();
//    $a->insert('produse',['produs_nume'=>$name,'produs_pret'=>$price,'produs_img'=>$img,'produs_categ'=>$categorie,'produs_descriere'=>$descriere]);
//    if ($a == true) {
//        header('location:../products.php');
//    }
//    else
//        echo 'Eroare';

}
?>