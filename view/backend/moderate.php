<?php ob_start();
    $title = "Modérer les commentaire";
    $subheading = "Retrouver la liste des commentaires signalés par les utilsateurs";
    $image = './public/admin.png';
?>
 



<!-- Liste des commentaires signalés -->
<div class="container" style="margin-bottom: 5%;">
    <div class="row">
        <a role="button" class="btn btn-info float-right" href="index.php?action=listPost" style= "text-decoration: none; margin-bottom: 5%;" >Retour à la liste des billets</a> 
        <div class="col-lg-10 col-md-10 mx-auto">
            <?php while ($comment = $reportsComments->fetch()) { ?>
            <div class="post-preview" style="background-color: #f2a59f; padding: 3% ; margin : 2% 0 2% 0; ">
                    <p class="post-subtitle">
                        <?= htmlspecialchars($comment['comment']) ?>
                    </p>
                    <p class="post-meta">Posté par <?= htmlspecialchars($comment['author']) ?> le <em> <?= $comment['comment_date_fr'] ?></em></p>
            </div>  
            <?php if (!empty($comment['reply'])) { ?>
            <div class="post-preview" style="background-color: #aff29d; padding: 3%;  margin : 2% 0 2% 3%;">
                <p class="post-subtitle">
                    <?= htmlspecialchars($comment['reply']) ?>
                </p>
                <p class="post-meta">Réponse de l'auteur </p>
            </div>            
            <?php }; ?>

            <a role="button" class="btn btn-danger" href="index.php?action=deleteReportComment&amp;id=<?= $comment['id']; ?>&amp;post=<?= $comment['post_id']; ?>" onclick="return confirm('Etes vous sûr de vouloir supprimer ce commentaire ? Attention la suppression sera definitive');" style="padding: 5px; color:white;" >Supprimer le commentaire</a>
            <a role="button" class="btn btn-warning" href="index.php?action=cancelReport&amp;id=<?= $comment['id']; ?>&amp;post=<?= $comment['post_id']; ?>" style="padding: 5px; color:white;" >Laisser le commentaire</a>
            <button type="button" class="btn btn-success"  onclick= "document.getElementById('<?= $comment['id'] ?>').style.display = 'block';" style="padding: 5px;">Répondre au commentaire</button>
            <div id="<?= $comment['id'] ?>" style="display : none">
                <form action="index.php?action=answerCommentModerate&amp;id=<?= $comment['id'];?>" method="post">
                    <textarea rows="5" style="margin-top: 2%;" class="form-control" placeholder="Message" name="answer" required data-validation-required-message="Please enter a message."></textarea><br />
                    <input class="btn btn-primary" type="submit"  style="padding: 5px; margin-top: -5%;" value="valider"/> 
                </form>
            </div>
            <?php }; ?>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean(); 
require("view/template.php"); ?>