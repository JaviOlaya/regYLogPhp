<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="./assets/css/styleLogin.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<?php require 'partials/header.php' ?>
    <h1 class="tit">Inicio de sesión </h1>
    <form class="container" action="login.php" method=" post"> 
        <input type="text" name="email"  placeholder="  Introduce tu email" required >
        <input type="password" name="password" placeholder="  Introduce tu contraseña " required>
       
        <input type="submit" value="Send"> 
        <span> or <a href="signup.php">signup</a></span>
    </form>
  
</body>
</html>