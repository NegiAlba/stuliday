<?php

$auth = true.
require 'includes/config.php';
require 'includes/connect.php';
include_once '_navbar.php';
include_once '_zoom-user.php';


$alert = false;
if (isset($_GET['error'])) {
  $alert = true;
  if ($_GET['error'] == "unknownError") {
    $type = "danger";
    $message = "Une erreur s'est produite, nous nous excusons de la gêne occasionnée. Veuillez contacter l'administrateur du site, merci.";
}
  if ($_GET['error'] == "malformedInput") {
    $type = "warning";
    $message = "Une erreur s'est produite.";
}
}
if (isset($_GET['success'])) {
  $alert = true;  
  if ('addedProduct' == $_GET['success']) {
      $type = 'success';
      $message = 'Votre annonce a bien été ajoutée';
  }
  if ('modifAnnonce' == $_GET['success']) {
      $type = 'success';
      $message = 'Votre annonce a bien été modifiée';
  }
  if ($_GET['success'] == "delete") {
    $type = 'success';
    $message = 'Votre location a bien été supprimée';
}
}
?>

<body>

<main>
<?php echo $alert ? "<div class='container mt-4 text-center p-2 alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>
<section class="d-flex justify-content-around mx-auto border border-secondary rounded mt-5" style="width:60%">
<div class="mx-auto " style="width:40%">
      <div>        
        <div class="my-3">
          <p class="fw-bold">Nom :</p>
          <p><?php echo $user['lastname']; ?></p>    
        </div>
        <div class="mb-3">
          <p class="fw-bold">Prenom :</p>
          <p><?php echo $user['firstname']; ?></p>    
        </div>
        <div class="mb-3">
          <p class="fw-bold">Adresse :</p>
          <p><?php echo $user['adress']; ?></p>    
        </div>
        <div class="mb-3">
          <p class="fw-bold">Email :</p>
          <p><?php echo $user['email']; ?></p>    
        </div>
        <div class="mb-3">
          <p class="fw-bold">Pseudo :</p>
          <p><?php echo $user['username']; ?></p>    
        </div>
  
        <a href="modifier-user.php" class="btn btn-warning col-6">Modifier mes infos</a>
      </div>
      <a class="btn btn-danger my-2 col-6" href="annonces.php" role="button">Retour aux annonces</a>
</div>
      <div class="d-flex flex-column justify-content-around align-items-start mx-auto "style="width:40%">
      <div>
        <img src="https://robohash.org/<?php echo $user['id']; ?>" alt="avatar" />
        </div>
      <a class="btn btn-success col-8" href="add-annonces.php" >Publier une nouvelle annonce</a>
      <a class="btn btn-secondary col-8" href="auth-annonces.php" >Voir mes annonces()</a>
      <a class="btn btn-primary col-8 fst-italic" href="#" >Voir mes réservations (Ce mode n'est pas encore activé)</a>
      </div>


</section>

</main>
<?php
include_once "_footer.php";
?>
</body>