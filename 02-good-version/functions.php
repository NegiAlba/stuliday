<?php

function imageUpload(array $image)
{
    $valid_ext = ['jpg', 'jpeg', 'png'];
    $check_ext = strtolower(substr(strrchr($image['name'], '.'), 1));

    if (!in_array($check_ext, $valid_ext)) {
        header("Location:{$_SERVER['HTTP_REFERER']}?error=wrongFormat");
        exit();
    }

    $imagePath = UPLOAD_DIR.uniqid().'/'.$image['name'];

    mkdir(dirname($imagePath));

    if (move_uploaded_file($image['tmp_name'], $imagePath)) {
        return $imagePath;
    } else {
        return false;
    }
}

function insertAnnonce($type, $capacity, $location_adress, $country, $description, $price, $imagePath, $date_start, $date_end, $id)
{
    global $connexion;
    $insertAnnonce = 'INSERT INTO location (type,capacity,location_adress,country,description,price,image,date_start,date_end,`auth-id`) VALUES(:type,:capacity,:location_adress,:country,:description,:price,:image,:date_start,:date_end,:id)';
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

    return $reqInsertAnnonce->execute();
}