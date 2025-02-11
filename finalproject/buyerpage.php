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

if (!isset($_SESSION['username'])){
    echo "<script> alert('You have not login') </script>";
    echo "<script> window.location.href = 'login.php' </script>";
}

if (isset($_POST['buy'])){
    $id = $_POST['buy'];
    $stat = "sold";
    $upd = "UPDATE car SET status = $stat WHERE id_car = $id";
    $result = mysqli_query($conn, $upd);

    if ($result){
        echo "<script> alert('Fail to buy') </script>";
    }

}

$sql = "SELECT * FROM car WHERE status = 'available'";
$result = mysqli_query($conn, $sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>Mobil</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Color</th>
            <th>Year</th>
            <th>Price</th>
            <th>Action</th>
            <th>Status</th>
        </tr>
        <?php foreach($result as $t){ 
            
            ?>
            <tr>
            

            <td><?= $t['id_car']; ?></td>
            <td><?= $t['brand']; ?></td>
            <td><?= $t['model']; ?></td>
            <td><?= $t['color']; ?></td>
            <td><?= $t['year']; ?></td>
            <td><?= $t['price']; ?></td>
            <td>

            <form method="POST" action="">
                <input type="hidden" name="buy" value="<?= $t['id_car'] ?>"> 
                <button type="submit">Buy</button>
            </form>
            
        </td>
        <td><?= $t['status'] ?></td>
        </tr>
        <?php } ?>

        <button><a href="logout.php">Logout</a></button>


</body>
</html>