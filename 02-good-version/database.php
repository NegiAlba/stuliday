<?php

require 'dev.env.php';

$connexion_string = 'mysql:dbname='.DATABASE.';host='.SERVER;

try {
    $connexion = new PDO($connexion_string, USER, PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $connexion = null;
    echo 'Erreur : '.$e->getMessage();
}

session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location:index.php');
}

if (empty($_SESSION)) {
    if (isset($auth)) {
        header('Location:sign-in.php?auth');
        exit();
    }
    $user = null;
} else {
    $user = $_SESSION['user'];
}