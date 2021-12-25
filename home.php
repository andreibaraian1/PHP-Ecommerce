<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pagina proiect parolata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body class="loggedin">
<nav class="navtop">
    <div>

        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" style="color:white;" href="home.php"><i class="fas fa-user-circle"></i>Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="ProductsUsers.php">Produse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="cos.php">Cos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="comenziUser.php">Comenzile mele</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="logout.php">Logout</a>
                    </li>
                    <?php
                    if($_SESSION['isAdmin']==1)
                        echo '<li class="nav-item">
                        <a class="nav-link" style="color:white;" href="products.php">Editare produse</a>
                        </li>'

                    ?>
                </ul>
            </div>
        </nav>

    </div>
</nav>
<div class="content">
    <p>Bine ati revenit, <?=$_SESSION['name']?>!</p>

</div>
</body>
</html>