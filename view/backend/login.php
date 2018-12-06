

<?php ob_start();
    $title = "Acccès privé";
    $subheading = "";
    $image = './public/admin.png';
?>
 



<form action="index.php?action=admin" method="post" style="padding : 100px; background-color: #b0b0b2">
  <div class="form-group">
    <label for="pseudo">Administrateur</label>
    <input type="text" class="form-control" placeholder="Name" name="pseudo" required data-validation-required-message="Please enter your name.">
    <p class="help-block text-danger"></p>
  </div>
  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
  </div>

  <button type="submit" class="btn btn-secondary">Se connecter</button>
</form>

<?php
$content = ob_get_clean(); 
require("view/template.php"); ?>