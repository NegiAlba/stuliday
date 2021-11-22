<?php

$auth = true;
require 'includes/config.php';
require 'includes/connect.php';
include_once '_navbar.php';
include_once '_zoom-annonces.php';

?>


<div class="card m-4" style="width:30%">
    <img src="<?php echo $annonce['image']; ?>" alt="<?php echo $annonce['type']; ?>" class="img-fluid">
    <div class="card-body">
        <h3 class="card-title"><?php echo $annonce['type'];?> pour <?php echo $annonce['capacity']; ?> personnes à <?php echo $annonce['country']?>.</h3>                
        <p class="fw-bold">Description :</p>
        <p><?php echo $annonce['description']; ?></p>
        <p>Son adressse complète est : <?php echo $annonce['location_adress'];?></p>
        <hr>
        <p>Période du séjour: Du <?php echo date('d-m-Y',strtotime($annonce['date_start']));?> au <?php echo date('d-m-Y',strtotime($annonce['date_end']));?></p>
        <p>Prix du séjour : <?php echo $annonce['price']; ?>€.</p>
        <hr>
        <div class="d-flex justify-content-between mt-2 ">
        <a href="#" class="btn btn-success col-5">Choisir ce séjour</a>     
        <a href="annonces.php" class="btn btn-info col-5">Revenir aux annonces</a>        
        </div>     
        <div class="d-flex justify-content-between mt-2 ">
        <a href="modifier-annonces.php?id=<?php echo $annonce['location_id']; ?>" class="btn btn-warning col-5">Modifier l'annonce</a>
        <a href="delete.php?id=<?php echo $annonce['location_id']; ?>" class="btn btn-danger col-5">Supprimer l'annonce</a>
        </div>     
    </div>
</div>
       
<?php
include_once "_footer.php";
?>   

