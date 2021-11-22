<?php

include_once "_navbar.php";
?>


<body>
<div class="w-50 mx-auto mt-4">

<form action="sign-up_post.php" method="POST">
  <div class="mb-3">
    <label for="lastname" class="form-label">Nom</label>
    <input type="text" class="form-control" id="lastname" name="lastname">    
  </div>
  <div class="mb-3">
    <label for="firstname" class="form-label">Prénom</label>
    <input type="text" class="form-control" id="firstname" name="firstname">    
  </div>
  <div class="mb-3">
    <label for="adress" class="form-label">Adresse</label>
    <input type="text" class="form-control" id="adress" name="adress">    
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">Pseudo</label>
    <input type="text" class="form-control" id="username" name="username">    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="password2" class="form-label">Confirmez le mot de passe</label>
    <input type="password" class="form-control" id="password2" name="password2">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
  </div>
  <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>
</div>
</body>

<?php
include_once "_footer.php";
?>

