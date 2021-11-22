<?php

$auth = true;
require 'includes/config.php';
require 'includes/connect.php';
include_once "_zoom-user.php";


if (in_array('', $_POST)) {
    header('Location:modifier-user.php?error=missingInput');
    exit();
} else {
    $lastname = htmlspecialchars($_POST['lastname']);   
    $firstname = htmlspecialchars($_POST['firstname']);   
    $adress = htmlspecialchars($_POST['adress']);   
    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars(trim($_POST['username']));
}


if($user['email'] != $email || $user['username'] != $username) {

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
}


$id = $_SESSION['id'];

$modifUser = 'UPDATE user SET lastname=:lastname,firstname=:firstname,adress=:adress,email=:email,username=:username WHERE id=:id';
$reqModifUser = $connexion->prepare($modifUser);
$reqModifUser->bindValue(':lastname', $lastname, PDO::PARAM_STR);
$reqModifUser->bindValue(':firstname', $firstname, PDO::PARAM_STR);
$reqModifUser->bindValue(':adress', $adress, PDO::PARAM_STR);
$reqModifUser->bindValue(':email', $email, PDO::PARAM_STR);
$reqModifUser->bindValue(':username', $username, PDO::PARAM_STR);
$reqModifUser->bindValue(':id', $id);

if ($reqModifUser->execute()) {    
    header("Location:profil.php?success=modifAnnonce");
    exit();
} else {
    header("Location:profil.php?error=unknownError");
    exit();
}