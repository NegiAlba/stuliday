<?php

$auth = true.
require 'includes/config.php';
require 'includes/connect.php';
include_once '_navbar.php';

$alert = false;
if (isset($_GET["error"])) {
    $alert = true;
    if ($_GET['error'] == "missingInput") {
        $type = "secondary";
        $message = "Les champs requis sont vides";
    }
    if ($_GET['error'] == "pastAvailablity") {
        $type = "secondary";
        $message = "La date de réservation est trop proche.";
    }
    if ($_GET['error'] == "wrongFormat") {
        $type = "warning";
        $message = "L'image est au mauvais format : Les formats acceptés sont jpg,png,jpeg";
    }
    if ($_GET['error'] == "unknownError") {
        $type = "warning";
        $message = "Une erreur s'est produite, nous nous excusons de la gêne occasionnée. Veuillez contacter l'administrateur du site, merci.";
    }
}
?>

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ps ps--active-y">
    <form action="add-annonces_post.php" method="post" class="container" enctype="multipart/form-data">
        <?php echo $alert ? "<div class='alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>
        <div class="mb-3">
            <label for="type" class="form-label">Type de bien*</label>
            <input type="text" class="form-control" id="type" name="type" required>    
        </div>
        <div class="mb-3">
            <label for="capacity" class="form-label">Capacité*</label>
            <input type="number" class="form-control" id="capacity" min="1" name="capacity" required>    
        </div>
        <div class="mb-3">
            <label for="location_adress" class="form-label">Adresse de location</label>
            <input type="text" class="form-control" id="location_adress" name="location_adress">    
        </div>
        <div class="mb-3">
            <label for="Country" class="form-label">Pays*</label>
            <input type="text" class="form-control" id="Country" name="country" required>    
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prix du séjour*</label>
            <input type="number" min="1" step="0.1" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Image de la location</label>
            <input class="form-control" type="file" id="formFile" accept=".png,.jpg,.jpeg" name="image">
        </div>
        <div class="mb-3">
            <label for="date_start" class="form-label">Date de début du séjour*</label>
            <input type="date" class="form-control" id="date_start" name="date_start" >
        </div>
        <div class="mb-3">
            <label for="date_end" class="form-label">Date de fin du séjour*</label>
            <input type="date" class="form-control" id="date_end" name="date_end" >
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-outline-success btn-lg">Ajouter produit</button>
        </div>

    </form>

</main>
<?php
include_once '_footer.php';
?>