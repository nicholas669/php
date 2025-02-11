<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Login
    <form action="" method="get">
        <label for="">Name</label>
        <input type="text" name="name_l">
        <br>
        <label for="">Password</label>
        <input type="password" name="pass_l">
        <input type="submit">
    </form>

    <?php
    $nama = $_GET["name"];
    $pass = $_GET["pass"];
    $a = 10;
    $b = "PA";
    if ($nama == null and $pass == null){
        echo "Have not registered";
    }
    elseif($_GET["name_l"] != $nama and $_GET["pass_l"] != $pass){
        echo "Register first";
        
    }
    else{
        echo "Hi " . $nama ;
    }
    ?>

</body>
</html>
