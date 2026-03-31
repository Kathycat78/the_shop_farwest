<?php
require_once(__DIR__ . "/partials/head.view.php");
?>
<h1>Création d'une presentation</h1>
<form method="POST">
    <div class="container">
        <div class="form-group">
            <label for="commit" class="form-label">Presentation pour moi  !</label>
            <textarea class="form-control" id="presentation" name="presentation" style="height: 100px"></textarea>
            <?php 
            if(isset($this->arrayError['presentation'])){
                ?>
                    <p class="text-danger"><?= $this->arrayError['presentation']?></p>
                <?php
            }
            ?>
        </div>
        <button type="submit" name="addPresentation" class="btn btn-success mt-5">presentez-vous!</button>
    </div>
</form>
<?php
require_once(__DIR__ . "/partials/footer.view.php");