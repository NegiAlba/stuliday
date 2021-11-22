<?php

include_once "_navbar.php";
?>

<div class="w-50 mx-auto mt-4">
<div class="card-body">
<form action="sign-in_post.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Adresse mail ou pseudo</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="check">
    <label class="form-check-label" for="check">Se souvenir de moi</label>
  </div>
  <button type="submit" class="btn btn-primary">Valider</button>
</form>
</div>
</div>
</div>
<?php
include_once "_footer.php";
?>