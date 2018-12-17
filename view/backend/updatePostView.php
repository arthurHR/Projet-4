<?php ob_start();
$title = "Modifier le chapitre";
$subheading = "Veuillez corriger le titre ou le contenu du chapitre çi-dessous";
$image = './public/img/machine_a_ecrire.jpg'; ?>


<div class="container">
    <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">
            <form class="post" action="index.php?action=saveUpdate&amp;id=<?= $post['id'] ?>" method="post">
                <h4> Titre </h4>
                <br>
                <textarea id="title" type="text" rows="2" name="title"><?= htmlspecialchars($post['title']) ?></textarea>  
                <h4 class="chapterContent"> Contenu du chapitre </h4>
                <br>
                <textarea  id="content" type="text" rows="10" name="content"><?= htmlspecialchars($post['content']) ?></textarea> 
                <br>
                <input type="submit" class="btn btn-primary" value="Enregistrer" />
            </form>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); 

require("view/template.php");
