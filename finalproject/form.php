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

if (isset($_POST['submit'])){
    $id = $_POST['id'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $color = $_POST['color'];
    $year = intval($_POST['year']);
    $price = intval($_POST['price']);
    
    

    $data = "INSERT INTO car VALUES('$id','$brand','$model','$color',$year,$price)";
    
    

    if (mysqli_query($conn, $data)){
        $success = true;
        echo "New car added successfully";
    }
    else{
        echo "<script> alert('Fail to add data') </script>";
    }
    // $result = mysqli_query($conn, "SELECT * FROM car");


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


    <form action="" method="post">
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
    </form>
    <button><a href="practice.php">Car data</a></button>
</body>
</html>