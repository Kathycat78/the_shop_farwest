<?php
require_once(__DIR__ . "/partials/head.view.php");
?>
<div class="container">
    
    <div class="card text-center text-bg-dark my-2">
        <div class="card-header">
            <p><?= $myAuthor ? $myAuthor->getPseudo() : '' ?></p>
        </div>
        <div class="card-body">
            <p><?= $myCommit->getText(); ?></p>
        </div>
        <div class="card-footer text-light">
            <p>Date : <?= $myCommit->getModificationDate() ? $myCommit->getModificationDate() : $myCommit->getCreationDate() ?></p>
        <?php
            if(isset($_SESSION['user']) && $_SESSION['user']['id_user'] === $myCommit->getUserId()){
        ?>
            <a href="/modifier?id=<?= $myCommit->getIdCommit();?>" class="btn btn-warning">Modifier</a>
        <?php }?>
        </div>
    </div>
        
    <?php
        if(isset($_SESSION['user'])){
        ?>
            <form method="POST">
                <div class="container">
                    <div class="form-group">
                        <label for="comment" class="form-label">Quelque chose à dire ?</label>
                        <textarea class="form-control" id="comment" name="comment" style="height: 100px"></textarea>
                        <?php
                        if(isset($this->arrayError['comment'])){
                            ?>
                            <p class="text-danger"><?= $this->arrayError['comment']?></p>
                            <?php
                        }
                        ?>
                    </div>
                    <button type="submit" name="addComment" class="btn btn-success">Commenter !</button>
                </div>
            </form>
        <?php
        }
        if(isset($comments)){
            foreach($comments as $comment)
            {
                ?>
                    <div class="card my-2 text-bg-secondary">
                    <div class="card-header">
                        <?= $comment->getPseudo(); ?>
                    </div>
                    <div class="card-body">
                        <figure>
                        <blockquote class="blockquote">
                            <p><?= $comment->getText(); ?></p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            <!-- si tu a une date de mùodification tu l'affiche sinon tu affiche la date de création -->
                            <?= $comment->getModificationDate() ? $comment->getModificationDate() : $comment->getCreationDate(); ?>
                        </figcaption>
                        </figure>
                        <?php if(isset($_SESSION['user']) && $_SESSION['user']['id_user'] === $comment->getIdUser()){
                            ?>
                            <a class="btn btn-warning"  href="/modifCommentaire?id=<?= $comment->getIdComment() ?>">Modifier</a>
                            <?php
                        } 
                        if((isset($_SESSION['user']) && $_SESSION['user']['id_user'] === $comment->getIdUser()) || isset($_SESSION['user']) && $_SESSION['user']['id_role'] === 1){
                            ?>
                            <form action="/supprimerCommentaire" method="POST">
                                <input type="hidden" name="id" value="<?= $comment->getIdComment() ?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                            <?php
                        }
                        ?>
                    </div>
                    </div>
                <?php
            }
        }
    ?>
</div>
<?php
require_once(__DIR__ . "/partials/footer.view.php");