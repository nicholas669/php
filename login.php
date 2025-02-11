<?php
    session_start();
    $user = $_SESSION['user'];
    $pass = $_SESSION['pass'];
    if (!isset($_SESSION['user'])){
        echo "<script>
    alert('Unverified Account')
    window.location.href = 'register.php'
</script>";
        
    }
    else{
        if (isset($_POST['name_l']) and isset($_POST['pass_l'])){
            if ($user == $_POST['name_l'] and $pass == $_POST['pass_l']){
        
                echo "Welcome, " . $_SESSION['user'] . "! <a href='logout.php'>Logout</a>";
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
            SS
            <label for="">Password</label>
            <input type="password" name="pass_l">
            <input type="submit">
        </form>
    
</body>
</html>