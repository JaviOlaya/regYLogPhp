<?php
session_start();

if (isset($_SESSION['user_id'])){
    header('Location: /ejerc_php/regYLogPhp');
}

require 'dbase.php';

if(!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email ');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message ='';

    if (count($results)>0 && password_verify($_POST['password'], $results['password'])) {
     $_SESSION['user_id'] = $results['id'];
     header('Location: /ejerc_php/regYLogPhp');
    }else{
        $message = 'Sorry credentials don\'t match ';
    }
}

?>
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
<?php if (!empty($message)):?>
    <p><?= $message ?></p>
<?php endif; ?>

    <h1 class="tit">Inicio de sesión </h1>
    <span> or <a href="signup.php">signup</a></span>


    <form class="container" action="login.php" method="POST"> 
        <input type="text" name="email"  placeholder="  Introduce tu email" required >
        <input type="password" name="password" placeholder="  Introduce tu contraseña " required>
       
        <input type="submit" value="Submit"> 
        
    </form>
  
</body>
</html>