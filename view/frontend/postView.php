<?php ob_start(); 
    $title = strip_tags($post['title']);
    $subheading =  strip_tags("Posté par Jean Rochefort le ". $post['creation_date_fr']);
    $image = './public/img/alaska_2.jpg'; 
?>

    <!-- navigation dans le chapitre -->
    <div class="container">
        <div class="row" id="navigation">
            <div class="col-lg-12 col-md-10 mx-auto">     
                <?php 
                if(isset($_SESSION['pseudo'])) { 
                ?>     
                    <div class="dropdown" id="navDropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chapitre</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a role="button" class="btn btn-info" href="index.php?action=listPost">Retour à la liste des chapitres</a>
                            <a role="button" class="btn btn-warning" id="updatePost" href="index.php?action=updatePost&amp;id=<?= $post['id'] ?>">Modifier le chapitre</a>
                            <a role="button" class="btn btn-danger" id="deletePost" href="index.php?action=deletPost&amp;id=<?= $post['id'] ?>">Supprimer le chapitre</a> 
                        </div>
                    </div>                 
                <?php 
                } else { 
                ?> 
                    <a role="button" class="btn btn-info float-right"  id="listPost" href="index.php?action=listPost">Retour à la liste des chapitres</a> 
                <?php 
                } 
                ?>
            </div>
        </div>
    </div>

    <!-- contenu du chapitre -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <p><?= html_entity_decode($post['content']) ?></p> 
                </div>
                <!-- pagination -->
                <div class="col-lg-10 col-md-10 mx-auto" id="paginationPost">
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

