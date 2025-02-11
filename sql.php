<?php

$host = "localhost";
$user = "root";
$pass = "root";
$db = "Car Dealer";

$conn = mysqli_connect(
    $host,
    $user,
    $pass,
    $db
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Nama Mobil</h1>
    <?php
    $data = "SELECT * FROM car";
    $value = mysqli_query($conn, $data);

    ?>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Color</th>
            <th>Year</th>
            <th>Price</th>
        </tr>
        <?php
            foreach ($value as $t) {
            ?>
        <tr>
            

            <td><?= $t['id_car']; ?></td>
            <td><?= $t['brand']; ?></td>
            <td><?= $t['model']; ?></td>
            <td><?= $t['color']; ?></td>
            <td><?= $t['year']; ?></td>
            <td><?= $t['price']; ?></td>
        </tr>
        <?php
    }
    ?>
    </table>
    

</body>

</html>