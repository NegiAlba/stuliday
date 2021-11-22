<?php
$viewAnnonces = 'SELECT * from location';
$reqViewAnnonces = $connexion->query($viewAnnonces);
$annonces = $reqViewAnnonces->fetchAll();
?>