<?php

$auth = true;
require 'includes/config.php';
require 'includes/connect.php';
include_once '_navbar.php';

include_once '_zoom-annonces.php';

?>


<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ps ps--active-y">
    <div class="card container m-4 p-4">

        <form action="modifier-annonces_post.php" method="post" enctype="multipart/form-data">
            <input type="text" class="form-control form-control-lg" name="type"
                value="<?php echo $annonce['type']; ?>"></input>
            <p class="text-bold">Capacité :</p>
            <input type="number" class="form-control" name="capacity" value="<?php echo $annonce['capacity']; ?>" />
            <hr>
            <p class="text-bold">Adresse de la location :</p>
            <input type="text" class="form-control" name="location_adress"
                value="<?php echo $annonce['location_adress']; ?>" />
            <hr>
            <p class="text-bold">Pays :</p>
            <input type="text" class="form-control" name="country" value="<?php echo $annonce['country']; ?>" />
            <hr>
            <div class="col-md-4 center">
                <p class="text-bold">Image de la location</p>
                <input class="form-control" type="file" id="formFile" accept=".png,.jpg,.jpeg" name="image">
                <input class="form-control" type="hidden" id="formFile" name="image_path"
                    value="<?php echo $annonce['image']; ?>">
            </div>
            <p class="text-bold">Description :</p>
            <textarea name="description" class="form-control" rows=3><?php echo $annonce['description']; ?></textarea>
            <hr>
            <p class="text-bold">Date du séjour :</p>
            <input type="date" class="form-control" name="date_start" value="<?php echo $annonce['date_start']; ?>" />
            <hr>
            <p class="text-bold">Date du séjour :</p>
            <input type="date" class="form-control" name="date_end" value="<?php echo $annonce['date_end']; ?>" />
            <hr>
            <p class="text-bold">Prix :</p>
            <input type="number" class="form-control col-2 mb-2" name="price"
                value="<?php echo $annonce['price']; ?>" />

            <input type="hidden" name="id" value="<?php echo $annonce['location_id']; ?>">
            <button type="submit" class="btn btn-warning col-2">Modifier l'annonce</button>
        </form>
    </div>

</main>

<?php

include_once '_footer.php';
?>