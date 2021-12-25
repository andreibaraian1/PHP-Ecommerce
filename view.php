<?php
session_start();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <title>Show</title>
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
<?php
include 'Database.php';

$id = $_GET['id'];
$b = new Database();
$b->select("produse","*","produs_id='$id'");
$result = $b->sql;

$row = mysqli_fetch_assoc($result);
?>
<body class="stretched">
<div class="col-md-12 hed">
    <center>

        <h1 style="color:black">Produsul <?php echo $row['produs_nume']; ?> </h1>
    </center>
</div>
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-12 p-0">
                    <table class="table table-dark">

                        <tbody>
                        <tr>
                            <th>Id</th>
                            <td><?php echo $row['produs_id']; ?></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $row['produs_nume']; ?></td>
                        </tr>
                        <tr>
                            <th>Pret</th>
                            <td><?php echo $row['produs_pret']; ?></td>
                        </tr>
                        <tr>
                            <th>Img</th>
                            <td><img src="<?php echo $row['produs_img']?>"</td>
                        </tr>
                        <tr>
                            <th>Categorie</th>
                            <td><?php echo $row['produs_categ']; ?></td>
                        </tr>
                        <tr>
                            <th>Descriere</th>
                            <td><?php echo $row['produs_descriere']; ?></td>
                        </tr>
                            <th>Back To Home</th>
                        <?php
                        if($_SESSION['isAdmin']==1)
                        {
?>
                            <td><a href="products.php" type="button" class="btn btn-primary">Back</a></td>
                        <?php
                        } else {
                        ?>
                            <td><a href="ProductsUsers.php" type="button" class="btn btn-primary">Back</a></td>
                        <?php
                        }
                        ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>