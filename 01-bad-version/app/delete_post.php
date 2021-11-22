<?php

$auth = true;
require 'includes/connect.php';


$getId = explode('=', $_SERVER['HTTP_REFERER'])[1];



if (!($getId == $_POST['id'])) {
    header("Location:detail.php?id=$getId&error=malformedInput");
    exit();
}
    
$location_id = intval(htmlspecialchars(trim($_POST['id'])));

try{
$supprAnnonce = 'DELETE FROM location WHERE location_id=:id';
$reqSupprAnnonce = $connexion->prepare($supprAnnonce);
$reqSupprAnnonce->bindValue(':id', $location_id);

$reqSupprAnnonce->execute();   
    header('Location:profil.php?success=delete');
} catch (PDOException $erreur) {    
    echo $erreur->getMessage();
    
    exit();
}
?>
