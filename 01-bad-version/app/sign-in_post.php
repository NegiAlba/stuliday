<?php

require 'includes/config.php';
require 'includes/connect.php';

if(empty($_POST['email']) || empty($_POST['password'])) {
    header('Location:sign-in.php?error=missingInput');
    exit();
} else {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
}

try {
    $verifIdentity = 'SELECT * FROM user where email = :email or username = :email LIMIT 1';
    $reqVerifIdentity = $connexion->prepare($verifIdentity);
    $reqVerifIdentity->bindvalue(':email', $email, PDO::PARAM_STR);
    $reqVerifIdentity->execute();

    $user = $reqVerifIdentity->fetch();
} catch (PDOException $exception) {
    echo $exception->getMessage();
}

if($user){
    if(!password_verify($password, $user['password'])){
        header('location:sign-in.php?error=passwordNotMatch');
        exit();
    } else {
        $_SESSION['user'] = $user['username'];
        $_SESSION['id'] = $user['id'];
        header('location:index.php?success');
    }
}
