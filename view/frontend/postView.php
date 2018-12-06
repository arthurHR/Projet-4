<?php
session_start();


ob_start(); 
$title = htmlspecialchars($post['title']);
$subheading =  htmlspecialchars("Posté par Jean Rochefort le ". $post['creation_date_fr']);
$image = './public/alaska_2.jpg'; 
?>
 <div class="container">
    <div class="row" style="margin-bottom: 50px;">
        <div class="col-lg-12 col-md-10 mx-auto">
                     
            <?php if(isset($_SESSION['pseudo'])) { ?>     
            <div class="dropdown" style="margin-top: -15%;">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Chapitre
                 </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a role="button" class="btn btn-info" href="index.php?action=listPost" style= "text-decoration: none;" >Retour à la liste des chapitres</a>
                   <a role="button" class="btn btn-warning" style="color : white;" href="index.php?action=updatePost&amp;id=<?= $post['id'] ?>">Modifier le chapitre</a>
            <a role="button" class="btn btn-danger" href="index.php?action=deletPost&amp;id=<?= $post['id'] ?>" onclick="return confirm('Etes vous sûr de vouloir supprimer ce chapitre ? Attention la suppression sera definitive');">Supprimer le chapitre</a> 
                  </div>
</div>                 
            
            <?php } else { ?> 
            <a role="button" class="btn btn-info float-right" href="index.php?action=listPost" style= "text-decoration: none;" >Retour à la liste des chapitres</a> 
        <?php } ?>
        </div>
    </div>
</div>
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p><?= html_entity_decode($post['content']) ?></p> 
            </div>
            <div class="col-lg-10 col-md-10 mx-auto" style="margin-bottom: 50px;">
                <a class="btn btn-primary float-left" href="index.php?action=previousPost&amp;id=<?= $post['id']?>">Chapitre précédent</a>
                <a class="btn btn-primary float-right" href="index.php?action=nextPost&amp;id=<?= $post['id']?>">Chapitre suivant</a>
            </div>
        </div>
    </div>
</article>

<?php 
require("commentsView.php");
$content = ob_get_clean(); 
require("view/template.php");
?>

