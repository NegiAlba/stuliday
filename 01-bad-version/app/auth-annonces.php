<?php

$auth = true;
require 'includes/config.php';
require 'includes/connect.php';
include_once '_navbar.php';
include_once '_view-annonces.php';
include_once '_zoom-user.php';


$annonces = $connexion->query("SELECT location.*,user.username FROM `location` INNER JOIN user on `auth-id` = user.id WHERE user.id = {$_SESSION['id']}");
?>


<div class="d-flex">
<?php
foreach($annonces as $annonce){
?>
<div class="card m-4" style="width:20%">    
    <img src="<?php echo $annonce['image']; ?>" alt="<?php echo $annonce['type']; ?>" class="d-block w-100 img-fluid" style="oject-fit:cover; height:50%;">    
    <div class="card-body">
        <h3 class="card-title"><?php echo $annonce['type'];?> pour <?php echo $annonce['capacity']; ?> personnes à <?php echo $annonce['country']?>.</h3>                
        
        <p>Prix du séjour : <?php echo $annonce['price']; ?>€.</p>
        <hr>
        <div class="d-flex justify-content-around">
        <a href="#" class="btn btn-outline-success col-5">Choisir ce séjour</a>     
        <a href="detail.php?id=<?php echo $annonce['location_id']; ?>" class="btn btn-outline-warning col-5">Détail</a>
        </div>     
    </div>
</div>

<?php
}
?>
</div>

<?php
include_once "_footer.php";
?>