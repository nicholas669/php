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

$username = $_POST['name_r'];
$password = $_POST['pass_r'];
$role = "buyer";

$stmt = $conn -> prepare("INSERT INTO user (username,password,role) VALUES(?,?,?)");
$stmt -> bind_param("sss", $username, $password, $role);

if ($stmt -> execute()){
    echo "<script> window.location.href = 'login.php' </script>";
}
else{
    echo "<script> alert('Fail to add data') </script>";
    echo "<script> window.location.href = 'register.php' </script>";

}

?>