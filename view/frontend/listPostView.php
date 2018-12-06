<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

 ob_start(); ?>


<?php
    $title = "UN BILLET SIMPLE POUR L'ALASKA";
    $subheading = "Cliquer sur un chapitre pour le lire en entier";
    $image = './public/alaska.jpg';
?>    

<!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?php while ($data = $posts->fetch())
                { ?>
                <div class="post-preview">
                    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">
                        <h2 class="post-title">
                            <?= html_entity_decode($data['title']) ?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?= (html_entity_decode(substr($data['content'],0 , 200)))?>

                        </h3>
                    </a>
                    <p class="post-meta">Posté par Jean Rochefort le <em> <?= $data['creation_date_fr'] ?></em></p>
                </div>
                <hr>
                <?php } ?>
                <!-- Pager -->
                <div class="clearfix" style="margin-bottom: 100px;">
                    <?php if ($currentPage > 1) { ?>
                    <a class="btn btn-primary float-left" href="index.php?action=listPosts&amp;page=<?= $currentPage - 1 ?>">Page précédente</a>
                    <?php } if ($currentPage < $nbOfPosts / 5) { ?>
                    <a class="btn btn-primary float-right" href="index.php?action=listPosts&amp;page=<?= $currentPage + 1 ?>">Page suivante</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    


<?php 
$posts->closeCursor();
$content = ob_get_clean();
require("view/template.php");
?>

