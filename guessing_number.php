<?php 
session_start();

if (!isset($_SESSION['lives'])){
    $_SESSION['lives'] = 6;
    $_SESSION['num'] = rand(1,50);
}
$lives = $_SESSION['lives'];
$num = $_SESSION['num'];
$message = "";

if (isset($_GET['guess'])){
    $guess = intval($_GET["guess"]);

    if ($guess != $num){
        $_SESSION['lives'] -= 1;
        $lives = $_SESSION['lives'];
        if ($lives > 0){
            $message = $guess < $num ? "The number is higher" : "The number is lower";
        }
        else{
            $message = "Game Over !! The num was $num";
            session_destroy();
        }
    }
    else{
        $message = "You win!";
        session_destroy();
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
<h1>Guessing Number Game</h1>
<h3>Guess the number 1 - 50</h3>
    <h3 id="lives_count">Lives: <?= $lives ?></h3>
    <form action="" method="get">
        <input type="text" name="guess">
        <input type="submit">
    </form>
    <p><?= $message ?></p>
</body>
</html>
