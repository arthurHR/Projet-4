<?php ob_start();
    $title = "Modérer les commentaire";
    $subheading = "Retrouver la liste des commentaires signalés par les utilsateurs";
    $image = './public/img/admin.png';
?>
 

<!-- Liste des commentaires signalés -->
<div class="container" style="margin-bottom: 5%;">
    <div class="row">
        <a role="button" class="btn btn-info float-right" href="index.php?action=listPost">Retour à la liste des billets</a> 
        <div class="col-lg-10 col-md-10 mx-auto">
            <?php while ($comment = $reportsComments->fetch()) { ?>
                <div class="post-preview" id="moderateComment">
                    <p class="post-subtitle">
                        <?= htmlspecialchars($comment['comment']) ?>
                    </p>
                    <p class="post-meta">
                        Posté par <?= htmlspecialchars($comment['author']) ?> le <em> <?= $comment['comment_date_fr'] ?></em>
                    </p>
                </div>  
                <?php 
                if (!empty($comment['reply'])) { 
                ?>
                    <div class="post-preview" id="moderateAnswer">
                        <p class="post-subtitle">
                            <?= htmlspecialchars($comment['reply']) ?>
                        </p>
                        <p class="post-meta">Réponse de l'auteur </p>
                    </div>            
                <?php 
                }; 
                ?>
                <!-- Actions de l'administrateur pour traiter les commentaires signalés -->
                <a role="button" class="btn btn-danger" id="deleteReportComment" href="index.php?action=deleteReportComment&amp;id=<?= $comment['id']; ?>&amp;post=<?= $comment['post_id']; ?>">Supprimer le commentaire</a>
                <a role="button" class="btn btn-warning" id="deleteReport" href="index.php?action=cancelReport&amp;id=<?= $comment['id']; ?>&amp;post=<?= $comment['post_id']; ?>">Laisser le commentaire</a>
                <button type="button" class="btn btn-success"  id="showAnswerModerate" onclick= "showAnswer('<?= $comment['id'] ?>')">Répondre au commentaire</button>
                <div id="<?= $comment['id'] ?>" class="answer">
                    <form action="index.php?action=answerCommentModerate&amp;id=<?= $comment['id'];?>" method="post">
                        <textarea rows="5" class="answerTextArea" class="form-control" placeholder="Message" name="answer" required data-validation-required-message="Please enter a message."></textarea><br />
                        <input class="btn btn-primary" type="submit"  class="answerInput" value="valider"/> 
                    </form>
                </div>
            <?php 
            };
            ?>
        </div>
    </div>
</div>

<?php
    $content = ob_get_clean(); 
    require("view/template.php"); 
?>