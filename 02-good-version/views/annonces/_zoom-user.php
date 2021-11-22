<?php

$id = $_SESSION['id'];

$viewUser = "SELECT * from user WHERE id = :id";
$reqViewUser = $connexion->prepare($viewUser);
$reqViewUser->bindValue(':id',$id);
$reqViewUser->execute();
$user = $reqViewUser->fetch();
if(empty($user)){
    header('Location:index.php?error=noId');
        exit();
}

?>