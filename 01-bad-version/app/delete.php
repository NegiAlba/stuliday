<?php

$auth = true;
require 'includes/config.php';
require 'includes/connect.php';
include_once '_navbar.php';
include_once '_zoom-annonces.php';

?>


<body>

<div class="container">
    <form class="card-form" action="delete_post.php" method="POST">
    <h3>Vous allez supprimer votre location, êtes-vous sûr?</h3>
    <input type="hidden" name="id" value="<?php echo $annonce['location_id']; ?>">
    <button type="submit" class="btn btn-warning">Oui</button>
    <a href="detail.php" class="btn btn-success ">Non</a>
    </form>
</div>

</body>
<?php
include_once "_footer.php";
?>

</html>