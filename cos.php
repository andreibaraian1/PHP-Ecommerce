<?php
session_start();
?>
<html>
<head>
    <title>creare cos permament in PHP</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
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
<div id="shopping-cart">
    <div class="txt-heading">

    </div>

        <table cellpadding="10" cellspacing="1">
            <tbody>
            <tr>
                <th style="text-align: left;"><strong>Name</strong></th>
                <th style="text-align: right;"><strong>Pret</strong></th>
                <th style="text-align: right;"><strong>Cantitate</strong></th>
                <th style="text-align: center;"><strong>Action</strong></th>
            </tr>
            <?php
            include 'Database.php';
            include 'Produs.php';
            $id=$_SESSION['id'];
            $b = new Database();
            $cart=$b->getProduse($id);
            $total=0;
            $productarr=array();

            ?>

            <?php
            if($cart) {
                foreach($cart as $row) {
                    $productarr[] =new Produs($row['id'],$row['cos_cantitate']);
                    $total=$total+($row['pret']*$row['cos_cantitate']);
            ?>


            <tr>

                <td><?php echo $row['nume']   ?></td>
                <td><?php echo $row['pret']   ?> lei</td>
                <td><?php echo $row['cos_cantitate']  ?></td>
                <td><a href="deleteCos.php?id=<?php echo $row['cos_id']; ?>" type="button" class="btn btn-primary btn-danger">Delete</a></td>


            </tr>
                <?php
                }
            }
            else
            {
                ?>
            <tr>
                <td>empty</td>
                <td>empty</td>
                <td>empty</td>
                <td>empty</td>

            </tr>
            <?php
            }
            ?>
                <td colspan="3" align=right><strong>Total:<?php echo $total?></strong> lei</td>

                <td align=right></td>
                <td></td>
            </tr>
            <form action="SendOrder.php" method="POST">
                <?php
                $_SESSION['productarray'] = $productarr;
                $_SESSION['total'] = $total;
                ?>
                <input type="text" name="adresa" placeholder="Adresa de livrare">
                <input type="submit"  name="submit" value="Plaseaza comanda">

            </form>
            </tbody>
        </table>
</div>
<div><a href="ProductsUsers.php">Alegeti alt produs</a></div>
</body>
</html>
