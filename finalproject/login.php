<?php
session_start();
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

if (isset($_POST['submit_l'])){
    $name = $_POST['name_l'];
    $passw = $_POST['pass_l'];

    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    var_dump($result);

    foreach ($result as $t){
        if ($t['username'] == $name and $t['password'] == $passw and $t['role'] == "buyer"){
            $_SESSION['username'] = $name;
            $_SESSION['password'] = $passw;
            echo "<script> window.location.href = 'buyerpage.php' </script>";
            exit();
        }
        elseif ($t['username'] == $name and $t['password'] == $passw and $t['role'] == "admin"){
            $_SESSION['username'] = $name;
            $_SESSION['password'] = $passw;
            echo "<script> window.location.href = 'practice.php' </script>";
            exit();
        }
        else{
            echo "Invalid account";
            
        }

    }
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
    
    Login
    <form action="" method="post">
            <label for="">Name</label>
            <input type="text" name="name_l">
            <br>
            <br>
            
            <label for="">Password</label>
            <input type="password" name="pass_l">
            <input type="submit" name="submit_l">
        </form>
    <h3>Does not have an account?</h3>
    <button><a href="register.php">Register</a></button>


</body>
</html>