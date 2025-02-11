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
$success = false;
$sql = "SELECT * FROM car WHERE status = 'available'";
$result = mysqli_query($conn, $sql);
$sold = "SELECT * FROM car WHERE status = 'sold'";
$result2 = mysqli_query($conn, $sold);

if (!isset($_SESSION['username'])){
    echo "<script> alert('You have not login') </script>";
    echo "<script> window.location.href = 'login.php' </script>";
}

if (isset($_POST['submit_e'])){
    $brand = $_POST['brand_e'];
    $model = $_POST['model_e'];
    $color = $_POST['color_e'];
    $year = intval($_POST['year_e']);
    $price = intval($_POST['price_e']);
    $old_id = $_POST['id'];
    

    // Secure SQL with prepared statements
    $stmt = $conn->prepare("UPDATE car SET brand = ?, model = ?, color = ?, year = ?, price = ? WHERE id_car = ?");
    $stmt->bind_param("sssiis", $brand, $model, $color, $year, $price, $old_id);

    if ($stmt->execute()) {
        echo "<script>alert('Car details updated successfully');</script>";
    } else {
        echo "<script>alert('Failed to update car details');</script>";
    }

    // Refresh the result set
    $result = $conn->query("SELECT * FROM car");
    $result2 = $conn -> query("SELECT * FROM car WHERE status = 'sold'");

}

if (isset($_POST['delete'])){
    $car_id = $_POST['delete'];

    $stmt = $conn -> prepare("DELETE FROM car WHERE id_car = ?");
    $stmt -> bind_param("s",$car_id);

    if ($stmt->execute()) {
        echo "<script>alert('Car deleted successfully');</script>";
    } else {
        echo "<script>alert('Failed to delete car');</script>";
    }

    $stmt->close();

    $result = $conn->query("SELECT * FROM car");
    $result2 = $conn -> query("SELECT * FROM car WHERE status = 'sold'");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cars</h1>
    <h2>Available</h2>
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
        <?php foreach($result as $t){ ?>
            <tr>
            

            <td><?= $t['id_car']; ?></td>
            <td><?= $t['brand']; ?></td>
            <td><?= $t['model']; ?></td>
            <td><?= $t['color']; ?></td>
            <td><?= $t['year']; ?></td>
            <td><?= $t['price']; ?></td>
            <td>
            <form method="post" action="edit.php">
                <button type="submit"  name="edit" value="<?php echo $t['id_car'] ?>">Edit</button>
                
            </form>

            <form method="POST" action="">
                <input type="hidden" name="delete" value="<?= $t['id_car'] ?>"> 
                <button type="submit">Delete</button>
            </form>

            
            
        </td>
        <td><?= $t['status'] ?></td>
        </tr>
        <?php } ?>

        <h2>Sold</h2>
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
        <?php foreach($result2 as $t){ ?>
            <tr>
            

            <td><?= $t['id_car']; ?></td>
            <td><?= $t['brand']; ?></td>
            <td><?= $t['model']; ?></td>
            <td><?= $t['color']; ?></td>
            <td><?= $t['year']; ?></td>
            <td><?= $t['price']; ?></td>
            <td>

            <form method="POST" action="">
                <input type="hidden" name="delete" value="<?= $t['id_car'] ?>"> 
                <button type="submit">Delete</button>
            </form>

            
            
        </td>
        <td><?= $t['status'] ?></td>
        </tr>
        <?php } ?>



    <button><a href="form.php">Add new car</a></button>
    <button><a href="logout.php">Logout</a></button>





    <h1></h1>
    <!-- <form action="" method="post">
        <label for="">Car id</label>
        <input type="text" name="id">
        <br>
        <label for="">Brand</label>
        <input type="text" name="brand">
        <br>
        <label for="">Model</label>
        <input type="text" name="model">
        <br>
        <label for="">Color</label>
        <input type="text" name="color">
        <br>
        <label for="">Year</label>
        <input type="number" name="year">
        <br>
        <label for="">Price</label>
        <input type="number" name="price">
        <input type="submit" name="submit">
    </form> -->




</body>
</html>