<?php

$viewAnnonces = 'SELECT * from location';
$reqViewAnnonces = $connexion->query($viewAnnonces);
$annonces = $reqViewAnnonces->fetchAll();

if (isset($user_id)) {
    $annonces = $connexion->query("SELECT location.*,user.username FROM `location` INNER JOIN user on `auth-id` = user.id WHERE user.id <> {$_SESSION['id']}");
}