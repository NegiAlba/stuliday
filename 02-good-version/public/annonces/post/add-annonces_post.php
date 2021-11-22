<?php

require '../../../globals.php';

$auth = true;
require ROOT.'database.php';
require ROOT.'functions.php';

// echo '<pre>';
// var_dump($_FILES);
// echo '</pre>';

if (empty($_POST['type']) || empty($_POST['capacity']) || empty($_POST['country']) || empty($_POST['price']) || empty($_POST['date_start']) || empty($_POST['date_end'])) {
    header("Location:{$_SERVER['HTTP_REFERER']}?error=missingInput");
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
    header("Location:{$_SERVER['HTTP_REFERER']}?error=pastAvailablity");
    exit();
}

if ($image) {
    $imagePath = imageUpload($image);
}

// insertAnnonce($type, $capacity, $location_adress, $country, $description, $price, $imagePath, $date_start, $date_end, $id);

if (insertAnnonce($type, $capacity, $location_adress, $country, $description, $price, $imagePath, $date_start, $date_end, $id)) {
    header('Location:../../public/user/profil.php?success=addedProduct');
    exit();
} else {
    header("Location:{$_SERVER['HTTP_REFERER']}?error=unknownError");
    exit();
}