<?php 

session_start();

require 'dbase.php';

if(isset($_SESSION['user_id'])){

    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute(); 
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if(count($results) > 0){
        $user = $results;
    }    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Login&Register</title>
</head>
<body>
    <?php require 'partials/header.php' ?>

    <?php if (!empty($user)): ?>
<br> Welcome. <?= $user['email'] ?>
<br>You are Succesfully Logged In 
<a href="logout.php">
    Logout
</a>
<?php else: ?>
    <h1>Bienvenido a mí aplicación con PHP y MySQL</h1>
    <h2>Inicia sesión o Regístrate</h2>

    <div class="container">
    <a class="b1" href="login.php"> <span >Login</span></a>
    <a class="b2" href="signup.php"> <span>SignUp</span></a>
    </div>
<?php endif; ?>
 </body>
</html>