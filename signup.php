<?php

    require 'dbase.php';

    $message='';

    if(!empty($_POST['email'])&& !empty($_POST['password'])){
        $sql = "INSERT INTO users(email, password) VALUES (:email, :password)";
        $stt = $conn->prepare($sql);
        $stt->bindParam(':email',$_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stt->bindParam(':password', $password);
       
        if($stt->execute()){
            $message = 'Successfully created';
        }else{
            $message = 'Sorry there must have been an issue creating your account';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php require 'partials/header.php' ?>
<?php
if(!empty($message)):
?>
<p><?= $message ?></p>
<?php endif; ?>

<h1>Registrate</h1>
<span> or <a href="login.php">Iniciar sesión</a></span>
<form action="signup.php" method="post">
<input type="text" name="email"  placeholder="  Introduce tu email" required >
        <input type="password" name="password" placeholder="  Introduce tu contraseña " required>
        <input type="password" name="confirm_password" placeholder=" Confirma tu contraseña " required>
        <input type="submit" value="Send"> 
</form>
</body>
</html>

