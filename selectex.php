<?php
include 'Database.php';
session_start();
$a = new Database();
$a->select('ex','*','note>5');
$result=$a->sql;
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <td><?php echo $row['idex']; ?></td>
    <td><?php echo $row['nume']; ?></td>
    <td><?php echo $row['note']; ?></td>
        </br>
<?php
}
?>

