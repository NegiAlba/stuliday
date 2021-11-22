<?php

$auth = true;
require 'includes/config.php';
require 'includes/connect.php';

    $id = $_GET['id'];

    echo '<pre>';
    print_r($id);
    echo '</pre>';

    $reqReservation = 'UPDATE location SET reserved = :reserved WHERE location_id =:id';
    $editReservation = $connexion->prepare($reqReservation);
    $editReservation->bindValue(':reserved', true);
    $editReservation->bindValue(':id', $id);

$editReservation->execute();

echo 'everything is ok !';