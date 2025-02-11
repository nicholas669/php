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

    $id = $_POST["edit"];
    
    $id = trim($id); // Remove unnecessary spaces
    $id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); // Convert special characters

    echo "HAA $id"; // Debugging output

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM car WHERE id_car = ?");
    $stmt->bind_param("s", $id); // 's' stands for string
    $stmt->execute();

    // Fetch data
    $result = $stmt->get_result();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php ?>
        <h1>Mobil</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Color</th>
            <th>Year</th>
            <th>Price</th>
            
        </tr>
        <?php foreach($result as $t){ ?>
            <tr>
            

            <td><?= $t['id_car']; ?></td>
            <td><?= $t['brand']; ?></td>
            <td><?= $t['model']; ?></td>
            <td><?= $t['color']; ?></td>
            <td><?= $t['year']; ?></td>
            <td><?= $t['price']; ?></td>
            </tr>
        
    </table>

    <form action="practice.php" method="post">
        <input type="hidden" name="id" value="<?= $t['id_car'] ?>">
        <br>
        <label for="">Brand</label>
        <input type="text" name="brand_e">
        <br>
        <label for="">Model</label>
        <input type="text" name="model_e">
        <br>
        <label for="">Color</label>
        <input type="text" name="color_e">
        <br>
        <label for="">Year</label>
        <input type="number" name="year_e">
        <br>
        <label for="">Price</label>
        <input type="number" name="price_e">
        <input type="submit" name="submit_e">
    </form>
    <?php } ?>
    <button><a href="practice.php">Car data</a></button>
</body>
</html>