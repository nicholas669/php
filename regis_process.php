<?php
session_start();
if (isset($_GET['name']) and isset($_GET['pass'])){
    $_SESSION['user'] = $_GET['name'];
    $_SESSION['pass'] = $_GET['pass'];
    echo "<script> window.location.href = 'login.php' </script>";
}

?>

