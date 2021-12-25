
<?php

session_start();

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <style>
        .hed{
            background: #ccc;
            color: blue;
        }
        .hed h1{
            padding-top: 20px;
            padding-bottom: 25px;
        }
        .form{
            margin-top: 50px;
            background: #ccc;
        }
        .table{
            margin-top: 50px;
        }
    </style>
</head>
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
<body class="stretched">
<div id="wrapper" class="clearfix">
    <section id="page-title">
        <div class="container clearfix hed">

        </div>
    </section>

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row">
                    <div class="col-md-12" id="hide">

                    </div>
                    <div class="col-md-12 p-0">
                        <table class="table table-dark">
                            <thead>
                            <tr>

                                <th scope="col">Nume</th>
                                <th scope="col">Pret</th>
                                <th scope="col">Img</th>
                                <th scope="col">Categorie</th>
                                <th scope="col">Descriere</th>
                                <th scope="col" colspan="3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include 'Database.php';
                            $b = new Database();
                            $b->select("produse","*");
                            $result = $b->sql;
                            ?>

                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>


                                <tr>

                                    <td><?php echo $row['produs_nume']; ?></td>
                                    <td><?php echo $row['produs_pret']; ?></td>
                                    <td><img style="max-width:1080px;width:100%" src="<?php echo $row['produs_img']?>"></td>
                                    <td><?php echo $row['produs_categ']; ?></td>
                                    <td><?php echo $row['produs_descriere']; ?></td>

                                    <td><a href="view.php?id=<?php echo $row['produs_id']; ?>" type="button" class="btn btn-success btn-sm">View</a></td>
                                    <td>
                                        <form action="Addtocart.php" method="POST">
                                            <input type="hidden" name="produsID" value="<?php  echo $row['produs_id'] ?>" >
                                            <input type="text" name="coscantitate" name="quantity" value="1" size="2"/>
                                            <input type="submit"  name="submit" value="Add to cart">
                                        </form>
                                    </td>
                                </tr>

                            <?php }
                            
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

</body>
</html>