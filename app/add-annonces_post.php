<?php

$auth = true;
require 'includes/config.php';
require 'includes/connect.php';

// echo '<pre>';
// var_dump($_FILES);
// echo '</pre>';

if (empty($_POST['type']) || empty($_POST['capacity']) || empty($_POST['country']) || empty($_POST['price']) || empty($_POST['date_start']) || empty($_POST['date_end'])) {
    header('Location:add-annonces.php?error=missingInput');
    exit();
} else {
    $type = htmlspecialchars(trim($_POST['type']));
    $capacity = htmlspecialchars(floatval($_POST['capacity']));
    $country = htmlspecialchars(trim($_POST['country']));
    $price = htmlspecialchars(floatval($_POST['price']));
    $date_start = htmlspecialchars(trim($_POST['date_start']));
    $date_end = htmlspecialchars(trim($_POST['date_end']));
    $id = $_SESSION['id'];

    if (!empty($_POST['location_adress'])) {
        $location_adress = htmlspecialchars(trim($_POST['location_adress']));
    } else {
        $location_adress = null;
    }
    if (!empty($_POST['description'])) {
        $description = htmlspecialchars(trim($_POST['description']));
    } else {
        $description = null;
    }

    if (empty($_FILES['image']['name'])) {
        $imagePath = 'uploads/wait.jpg';
        $image = null;
    } else {
        $image = $_FILES['image'];
    }
}

if (null !== $date_start && null !== $date_end && $date_end < $date_start) {
    header('Location:add-annonces.php?error=pastAvailablity');
    exit();
}

if ($image) {
    $valid_ext = ['jpg', 'jpeg', 'png'];
    $check_ext = strtolower(substr(strrchr($image['name'], '.'), 1));

    if (!in_array($check_ext, $valid_ext)) {
        header('Location:add-annonces.php?error=wrongFormat');
        exit();
    }

    $imagePath = 'uploads/'.uniqid().'/'.$image['name'];

    mkdir(dirname($imagePath));

    if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
        if (!in_array($check_ext, $valid_ext)) {
            header('Location:add-annonces.php?error=unknownError');
            exit();
        }
    }
}

$insertAnnonce = 'INSERT INTO location (type,capacity,location_adress,country,description,price,image,date_start,date_end,id) VALUES(:type,:capacity,:location_adress,:country,:description,:price,:image,:date_start,:date_end,:id)';
$reqInsertAnnonce = $connexion->prepare($insertAnnonce);
$reqInsertAnnonce->bindValue(':type', $type, PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':capacity', $capacity);
$reqInsertAnnonce->bindValue(':location_adress', $location_adress, PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':country', $country, PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':description', $description, PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':price', $price);
$reqInsertAnnonce->bindValue(':image', $imagePath, PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':date_start', $date_start, PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':date_end', $date_end, PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':id', $id);

if ($reqInsertAnnonce->execute()) {
    header('Location:profil.php?success=addedProduct');
    exit();
} else {
    header('Location:add-annonces.php?error=unknownError');
    exit();
}