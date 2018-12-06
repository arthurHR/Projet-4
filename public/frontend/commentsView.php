<?php
if (empty($_SESSION)){ ?>
<!-- Ajouter un commentaire -->
<div class="container" style="margin-top: 7%;">
    <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">
            <h3>Votre avis m'interesse</h3>
            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post" name="sentMessage" id="contactForm" novalidate>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Pseudo</label>
                        <input type="text" class="form-control" placeholder="Name" name="author" required data-validation-required-message="Please enter your name.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Email Address</label>
                        <input type="email" class="form-control" placeholder="Email Address"  name="email" required data-validation-required-message="Please enter your email address.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Message</label>
                        <textarea rows="5" class="form-control" placeholder="Message" name="comment" required data-validation-required-message="Please enter a message."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php } ?>

<!-- Liste des commentaires -->
<div class="container">
    <div class="row" style="margin-bottom: 50px;">
        <div class="col-lg-10 col-md-10 mx-auto">
            <?php while ($comment = $comments->fetch()) { ?>
            <div class="post-preview" style="background-color: #bacfef; padding: 3% ; margin : 2% 0 2% 0; ">
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
            <?php }; if (empty($_SESSION) && empty($comment['reply'])){ ?>
            <form action="index.php?action=reportComment&amp;id=<?= $comment['id']; ?>&amp;post=<?= $comment['post_id']; ?>" onclick="return confirm('Etes vous sûr de vouloir signaler ce commentaire ?');"  method="post">
                <input class="btn btn-warning"  id="formGroupInputSmall" type="submit" name="report" value="signaler" style="padding: 5px; color: white;" /> 
                </form>

            <?php }; if (!empty($_SESSION))  { ?>
            <a role="button" class="btn btn-danger" href="index.php?action=deleteComment&amp;id=<?= $comment['id']; ?>&amp;post=<?= $comment['post_id']; ?>" onclick="return confirm('Etes vous sûr de vouloir Supprimer ce commentaire ? Attention la suppression sera definitive');" style="padding: 5px; color:white;" >Supprimer le commentaire</a>
            <button type="button" class="btn btn-success"  onclick= "document.getElementById('<?= $comment['id'] ?>').style.display = 'block';" style="padding: 5px;">Répondre au commentaire</button>
            <div id="<?= $comment['id'] ?>" style="display : none">
                <form action="index.php?action=answerComment&amp;id=<?= $comment['id'];?>&amp;post=<?= $comment['post_id'];?>" method="post">
                    <textarea rows="5" style="margin-top: 2%;" class="form-control" placeholder="Message" name="answer" required data-validation-required-message="Please enter a message."></textarea><br />
                    <input class="btn btn-primary" type="submit"  style="padding: 5px; margin-top: -5%;" value="valider"/> 
                </form>
            </div>
            <?php } } ?>
        </div>
    </div>
</div>

