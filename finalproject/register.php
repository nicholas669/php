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
    Register
    <form action="regis_process.php" method="post">
        <label for="">Name</label>
        <input type="text" name="name_r">
        <br>
        <br>
        <label for="">Password</label>
        <input type="password" name="pass_r">
        <input type="submit" name="submit_r">
    </form>
    <button><a href="login.php"></a></button>
</body>
</html>