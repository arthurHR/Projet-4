<?php
if (empty($_SESSION)) { 
?>
    <!-- Ajouter un commentaire -->
    <div class="container" id="addComment">
        <div class="row">
            <div class="col-lg-10 col-md-10 mx-auto">
                <h3>Votre avis m'interesse</h3>
                <form  name="sentMessage" id="contactForm" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="pseudo">Pseudo</label>
                            <input type="text" id="pseudo" name="name" placeholder="Pseudo" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Email"  name="email" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="5" class="form-control" placeholder="Message" name="comment" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php 
}
?>

    <!-- Liste des commentaires -->
    <div class="container">
        <div class="row" id="commentsList">
            <div class="col-lg-10 col-md-10 mx-auto">
                <?php 
                while ($comment = $comments->fetch()) { 
                ?>
                    <div class="post-preview" id="comment">
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
                        <div class="post-preview" id="commentReply">
                            <p class="post-subtitle">
                                <?= htmlspecialchars($comment['reply']) ?>
                            </p>
                            <p class="post-meta">Réponse de l'auteur </p>
                        </div>            
                    <?php 
                    }; if (empty($_SESSION) && empty($comment['reply'])){ 
                    ?>
                        <a role="button" class="btn btn-warning" id="report" href="index.php?action=reportComment&amp;id=<?= $comment['id']; ?>&amp;post=<?= $comment['post_id']; ?>">Signaler</a>
                    <?php
                    }; if (!empty($_SESSION))  { 
                    ?>
                    <a role="button" class="btn btn-danger" id="deleteComment" href="index.php?action=deleteComment&amp;id=<?= $comment['id']; ?>&amp;post=<?= $comment['post_id']; ?>">Supprimer le commentaire</a>
                    <button type="button" class="btn btn-success" id="showAnswer" onclick= "showAnswer('<?= $comment['id'] ?>')">Répondre au commentaire</button> 
                    <div id="<?= $comment['id'] ?>" class="answer">
                        <form action="index.php?action=answerComment&amp;id=<?= $comment['id'];?>&amp;post=<?= $comment['post_id'];?>" method="post">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <textarea rows="5" cols="50" class="answerTextArea" class="form-control" placeholder="Message" name="answer" required></textarea><br /> 
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" class="answerInput" value="valider">Valider</button>
                            </div>
                        </form>
                    </div>     
                    <?php 
                    } 
                }
                ?>
            </div>
        </div>
    </div>

