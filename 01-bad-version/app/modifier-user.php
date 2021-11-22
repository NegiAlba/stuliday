<?php

$auth = true;
require 'includes/config.php';
require 'includes/connect.php';
include_once '_navbar.php';

include_once '_zoom-user.php';

?>

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ps ps--active-y">
    <div class="card container m-4 p-4">
       
        <form action="modifier-user_post.php" method="post" >            
            <p class="text-bold">Nom :</p>
            <input type="text" class="form-control" name="lastname" value="<?php echo $user['lastname']; ?>" />
            <hr>
            <p class="text-bold">Prénom :</p>
            <input type="text" class="form-control" name="firstname" value="<?php echo $user['firstname']; ?>" />
            <hr>
            <p class="text-bold">Adresse :</p>
            <input type="text" class="form-control" name="adress" value="<?php echo $user['adress']; ?>" />
            <hr>
            <p class="text-bold">Email :</p>
            <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" />
            <hr>
            <p class="text-bold">Pseudo :</p>
            <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>" />
            <hr>
                       
            
            <button type="submit" class="btn btn-warning col-2">Modifier votre profil</button>
        </form>
    </div>
    
</main>

<?php

include_once '_footer.php';
?>