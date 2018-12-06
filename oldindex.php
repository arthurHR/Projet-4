


<!--- <?php

while ($data = $posts->fetch())
{ ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars(substr($data['content'],0 , 200)))?>
            <br />
            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a>
            <?php 
            if (isset($_SESSION['pseudo']))
            { 
            ?> 
            <a href="index.php?action=deletPost&amp;id=<?= $data['id'] ?>">Supprimer l'article</a>
            <a href="index.php?action=updatePost&amp;id=<?= $data['id'] ?>">Modifier l'artcile</a>
            <?php } else {}
            ?>    
        </p>
    </div>
<?php
} ?> -->