<?php
 	ob_start(); 
    $title = "UN BILLET SIMPLE POUR L'ALASKA";
    $subheading = "Découvrez le nouveau roman de Jean Forteroche";
    $image = './public/img/alaska_3.jpg';
?> 



 	<!-- Description -->
    <article id="articleHome">
        <div class="container">
        	<div class="row">
          		<div class="col-lg-8 col-md-10 mx-auto">
	          		<h3>DESCRIPTION DU ROMAN</h3>
		            <p>Une île sauvage du sud de l'Alaska, accessible uniquement par bateau ou par hydravion, tout en forêts humides et montagnes escarpées.
					C'est dans ce décor que Jim décide d'emmener son fils de treize ans pour y vivre dans une cabane isolée, une année durant. 
					Après une succession d'échecs personnels, il voit là l'occasion de prendre un nouveau départ et de renouer avec ce garçon qu'il connaît si mal.</p>
	            	<p>Mais la rigueur de cette vie et les défaillances du père ne tardent pas à; transformer ce séjour en cauchemar, et la situation devient vite incontrôlable.</p>
				    <p>Jusqu'au drame violent et imprévisible qui scellera leur destin</p>
	            	<img class="img-fluid" src="public/img/livre.jpg" alt="">
	            	<a class="btn btn-secondary" id="book" href="index.php?action=listPost">Voir les chapitres</a>
            	</div>
        	</div>
        </div>
    </article>

    <!-- Last chapter -->
    <div class="container" id="lastChapter">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            	<h1>Dernier chapitre publié</h1>
                <div class="post-preview" id="lastChapterContent">
                    <a href="index.php?action=post&amp;id=<?= $post['id'] ?>">
                        <h3>
                            <?= strip_tags($post['title']) ?>
                        </h3>
                        <h4 class="post-subtitle">
                            <?= (strip_tags(substr($post['content'],0 , 200))) ?>
                        </h4>
                    </a>
                    <p class="post-meta">Posté par Jean Rochefort le <em> <?= $post['creation_date_fr'] ?></em></p>
                </div>
                <hr>
                </div>
            </div>
        </div>
    </div>

<?php 
	$content = ob_get_clean();
	require("view/template.php");
?>