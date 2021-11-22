<?php

require "includes/connect.php";

if (in_array('', $_POST)) {
    header('Location:sign-up.php?error=missingInput');
    exit();
} else {
    $lastname = htmlspecialchars($_POST['lastname']);   
    $firstname = htmlspecialchars($_POST['firstname']);   
    $adress = htmlspecialchars($_POST['adress']);   
    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);
}

$verifEmail = "SELECT count(*) FROM user WHERE email = :email OR username= :username";
$reqVerifEmail = $connexion->prepare($verifEmail);
$reqVerifEmail ->bindValue(':email', $email, PDO::PARAM_STR);
$reqVerifEmail ->bindValue(':username', $username, PDO::PARAM_STR);
$reqVerifEmail->execute();

$resultatVerifEmail = $reqVerifEmail->fetchColumn();

if ($resultatVerifEmail > 0) {
    header('Location:sign-up.php?error=emailExists');
    exit();
}

if ($password !== $password2) {
    header('Location:sign-up.php?error=differentPasswords');
    exit();
}

$password = password_hash($password, PASSWORD_DEFAULT);

$insertUser = "INSERT INTO user (lastname,firstname,adress,email,username,password) VALUES (:lastname,:firstname,:adress,:email,:username,:password)";
$reqInsertUser = $connexion->prepare($insertUser);
$reqInsertUser->bindValue(':lastname', $lastname, PDO::PARAM_STR);
$reqInsertUser->bindValue(':firstname', $firstname, PDO::PARAM_STR);
$reqInsertUser->bindValue(':adress', $adress, PDO::PARAM_STR);
$reqInsertUser->bindValue(':username', $username, PDO::PARAM_STR);
$reqInsertUser->bindValue(':email', $email, PDO::PARAM_STR);
$reqInsertUser->bindValue(':password', $password, PDO::PARAM_STR);

$resultatInsertUser = $reqInsertUser->execute();

if ($resultatInsertUser) {
    header('Location:sign-up.php?success=loginSuccessful');
    exit();
}