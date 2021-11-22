<?php

$auth = true;
require 'includes/config.php';
require 'includes/connect.php';

$getId = explode('=', $_SERVER['HTTP_REFERER'])[1];

if (!($getId == $_POST['id'])) {
    header("Location:modifier-annonces.php?id=$getId&error=malformedInput");
    exit();
}

if (empty($_POST['type']) || empty($_POST['capacity']) || empty($_POST['country']) || empty($_POST['price']) || empty($_POST['date_start']) || empty($_POST['date_end'])) {
    header("Location:modifier-annonces.php?id=$getId&error=missingInput");
    exit();
} else {
    $type = htmlspecialchars(trim($_POST['type']));
    $capacity = htmlspecialchars(floatval($_POST['capacity']));
    $country = htmlspecialchars(trim($_POST['country']));
    $price = htmlspecialchars(floatval($_POST['price']));
    $date_start = htmlspecialchars(trim($_POST['date_start']));
    $date_end = htmlspecialchars(trim($_POST['date_end']));
    $image_path = htmlspecialchars(trim($_POST['image_path']));
    $location_id = $_POST['id'];

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

    if (null !== $date_start && null !== $date_end && $date_end < $date_start) {
        header('Location:add-annonces.php?error=pastAvailablity');
        exit();
    }

    if (empty($_FILES['image']['name'])) {
        $imageToUpload = $image_path;
        $image = null;
    } else {
        $image = $_FILES['image'];
    }

    if ($image) {
        if ('uploads/wait.jpg' != $image_path) {
            unlink($image_path);
            rmdir(dirname($image_path));
        }
        $valid_ext = ['jpg', 'jpeg', 'png'];
        $check_ext = strtolower(substr(strrchr($image['name'], '.'), 1));

        if (!in_array($check_ext, $valid_ext)) {
            header('Location:add-annonces.php?error=wrongFormat');
            exit();
        }

        $imageToUpload = 'uploads/'.uniqid().'/'.$image['name'];

        mkdir(dirname($imageToUpload));

        if (!move_uploaded_file($image['tmp_name'], $imageToUpload)) {
            if (!in_array($check_ext, $valid_ext)) {
                header('Location:add-annonces.php?error=unknownError');
                exit();
            }
        }
    }
}

$modifAnnonces = 'UPDATE location SET type=:type,capacity=:capacity,location_adress=:location_adress,country=:country,description=:description, price=:price,image=:image,date_start=:date_start,date_end=:date_end WHERE location_id=:id';
$reqModifAnnonces = $connexion->prepare($modifAnnonces);
$reqModifAnnonces->bindValue(':type', $type, PDO::PARAM_STR);
$reqModifAnnonces->bindValue(':capacity', $capacity, );
$reqModifAnnonces->bindValue(':location_adress', $location_adress, PDO::PARAM_STR);
$reqModifAnnonces->bindValue(':country', $country, PDO::PARAM_STR);
$reqModifAnnonces->bindValue(':description', $description, PDO::PARAM_STR);
$reqModifAnnonces->bindValue(':price', $price);
$reqModifAnnonces->bindValue(':image', $imageToUpload, PDO::PARAM_STR);
$reqModifAnnonces->bindValue(':date_start', $date_start, PDO::PARAM_STR);
$reqModifAnnonces->bindValue(':date_end', $date_end, PDO::PARAM_STR);
$reqModifAnnonces->bindValue(':id', $location_id);

if ($reqModifAnnonces->execute()) {
    header('Location:profil.php?success=modifAnnonce');
    exit();
} else {
    header("Location:profil.php?id=$getId&error=unknownError");
    exit();
}