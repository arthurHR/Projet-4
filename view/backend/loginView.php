<?php ob_start();
    $title = "Acccès privé";
    $subheading = "";
    $image = './public/img/admin.png';
?>
 
<form action="index.php?action=admin" method="post" id="login">
    <div class="form-group">
        <label for="pseudo">Administrateur</label>
        <input type="text" class="form-control" placeholder="Name" name="pseudo" required>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
    </div>
    <button type="submit" class="btn btn-secondary">Se connecter</button>
</form>

<?php
    $content = ob_get_clean(); 
    require("view/template.php"); 
?>