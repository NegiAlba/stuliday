<?php

include_once "_navbar.php";
include_once 'includes/config.php';

$alert = false;

if (isset($_GET['success'])) {
    $alert = true;
    
        $type = 'success';
        $message = 'Vous êtes connectés';
    }
if (isset($_GET["error"])) {
    $alert = true;
  if ($_GET['error'] == "noId") {
    $type = "secondary";
    $message = "Il n'y a aucune annonce pour l'instant.";
}
}

?>


<body>


  <div class="mx-auto col-md-6">
      <div id="carouselExampleSlidesOnly" class="carousel slide w-100 my-md-5 my-3 px-3" data-bs-ride="carousel">
        <div class="carousel-inner" style="height:550px">
          <div class="carousel-item active" data-bs-interval="3000">
            <img src="assets/accueil.jpg" class="d-block w-100 img-fluid" style="oject-fit:cover; height:50%;" alt="...">
          </div>
          <div class="carousel-item " data-bs-interval="3000">
            <img src="assets/beach.jpg" class="d-block w-100 img-fluid" style="oject-fit:cover; height:50%;" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="3000">
            <img src="assets/italie.jpg" class="d-block w-100 img-fluid" style="oject-fit:cover; height:50%;" alt="...">
          </div>
        </div>
      </div>
    </div>

    <?php echo $alert ? "<div class='container mt-4 text-center p-2 alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>
    
    <?php
    if ($user){
      ?>
      
      <div class="container mt-4 text-center bg-secondary p-2 " style="--bs-bg-opacity: .25">
      <h1 >Bienvenue sur STULIDAY !</h1>
        <div class="d-flex justify-content-center">
            <a href="auth-annonces.php" >Voir mes annonces</a>
            <p class="mx-2">ou</p>
            <a href="annonces.php">Voir les annonces disponibles</a>
        </div>
    </div>
    <?php  
    }else{
    ?>
    <div class="container mt-4 text-center bg-secondary p-2 " style="--bs-bg-opacity: .25">
      <h1 >Bienvenue sur STULIDAY !</h1>
        <div class="d-flex justify-content-center">
            <a href="sign-in.php" > Connectez-vous</a>
            <p class="mx-2">ou</p>
            <a href="sign-up.php"> Inscrivez-vous</a>
        </div>
    </div>
    <?php
    }
    ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>