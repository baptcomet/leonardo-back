<?php

require_once('autoload.php');

use JacaDanseBack\Database;

session_start();

$loginFailed = false;

if (isset($_SESSION['logged'])) {
    header("Location: dashboard.php");
}

if (isset($_POST['email'])) {
    $database = new Database();
    $database->connect();
    $loggedin = $database->checkLogin($_POST['email'], $_POST['password']);
    $database->close();

    if ($loggedin) {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['logged'] = true;
        header("Location: dashboard.php");
    } else {
        $loginFailed = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">

    <title>JacaDanse - Connexion</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>

<body>

    <div class="container">

        <h1>Outil d'administration du site web JacaDanse</h1>

        <?php if ($loginFailed) : ?>
            <div class="alert alert-danger">Erreur de connexion : email ou password incorrect</div>
        <?php endif ?>

        <form class="form-signin" action="index.php" method="POST">
            <h2 class="form-signin-heading">Connexion</h2>
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
        </form>

    </div>
</body>
</html>
