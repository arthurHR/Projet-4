<?php
 	ob_start(); 
    $title = "UN BILLET SIMPLE POUR L'ALASKA";
    $subheading = "Découvrez le nouveau roman de Jean Forteroche";
    $image = './public/alaska_3.jpg';
?> 



 <!-- Post Content -->
    <article style="background-color: #404347; color: white; padding: 5%; margin-top: 10%; text-align: center;">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
          	
          	<h3>DESCRIPTION DU ROMAN</h3>
          

            <p>Une île sauvage du sud de l'Alaska, accessible uniquement par bateau ou par hydravion, tout en forêts humides et montagnes escarpées.
			C'est dans ce décor que Jim décide d'emmener son fils de treize ans pour y vivre dans une cabane isolée, une année durant. 
			Après une succession d'échecs personnels, il voit là l'occasion de prendre un nouveau départ et de renouer avec ce garçon qu'il connaît si mal.</p>

            <p>Mais la rigueur de cette vie et les défaillances du père ne tardent pas à; transformer ce séjour en cauchemar, et la situation devient vite incontrôlable.</p>

            <p>Jusqu'au drame violent et imprévisible qui scellera leur destin</p>

            <img class="img-fluid" src="public/livre.jpg" alt="">
            	<a href="index.php?action=listPost" type="button" class="btn btn-secondary" style="margin-top: 5%;">Lire le roman</a>
            
          </div>
        </div>
      </div>
    </article>

    <!-- Main Content -->
    <div class="container" style="padding: 5%; text-align: center">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            	<h1>Dernier chapitre publié</h1>
                <div class="post-preview" style="padding: 10%;">
                    <a href="index.php?action=post&amp;id=<?= $post['id'] ?>">
                        <h3>
                            <?= html_entity_decode($post['title']) ?>
                        </h3>
                        <h4 class="post-subtitle">
                            <?= (html_entity_decode(substr($post['content'],0 , 200)))?>

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